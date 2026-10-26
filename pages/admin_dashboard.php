<?php
if (!defined('APP_ROUTER')) { header('Location: ../index.php?page=admin_dashboard'); exit; }

require_once __DIR__ . '/../includes/functions.php';

// Vérifier si l'utilisateur est un admin
if (!isset($_SESSION['user_id']) || !is_admin($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

// Traitement des actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_csrf();

    if (isset($_POST['approve_testimonial'])) {
        approve_testimonial((int) $_POST['testimonial_id']);
    } elseif (isset($_POST['delete_user'])) {
        $target_id = (int) $_POST['user_id'];
        // Un administrateur ne peut pas supprimer son propre compte depuis le tableau de bord
        if ($target_id !== (int) $_SESSION['user_id']) {
            delete_user($target_id);
        }
    } elseif (isset($_POST['add_promotion'])) {
        add_promotion((int) $_POST['product_id'], $_POST['discount'] ?? 0);
    }

    // Post/Redirect/Get : éviter une double soumission en rechargeant la page
    header("Location: index.php?page=admin_dashboard");
    exit();
}

// Récupérer les statistiques
$total_users = get_total_users();
$total_products = get_total_products();
$total_revenue = get_total_revenue();
$messages = get_contact_messages() ?: [];

// Récupérer tous les témoignages
$testimonials = get_all_testimonials() ?: [];

// Récupérer la liste des utilisateurs et des produits
$users = get_all_users() ?: [];
$products = get_all_products() ?: [];
?>

<div class="admin-dashboard">
    <h1>Tableau de bord Administrateur</h1>

    <section class="stats">
        <h2>Statistiques</h2>
        <div class="stat-item">
            <p>Nombre d'utilisateurs inscrits : <?php echo (int) $total_users; ?></p>
        </div>
        <div class="stat-item">
            <p>Nombre total de produits : <?php echo (int) $total_products; ?></p>
        </div>
        <div class="stat-item">
            <p>Chiffre d'affaires total : <?php echo format_price($total_revenue); ?></p>
        </div>
    </section>

    <section class="messages">
        <h2>Messages de contact</h2>
        <?php if (empty($messages)): ?>
            <p>Aucun message.</p>
        <?php endif; ?>
        <?php foreach ($messages as $message): ?>
            <div class="message">
                <p><strong>De :</strong> <?php echo e($message['name']); ?></p>
                <p><strong>Email :</strong> <?php echo e($message['email']); ?></p>
                <p><strong>Message :</strong> <?php echo nl2br(e($message['message'])); ?></p>
                <p><strong>Date :</strong> <?php echo date('d/m/Y H:i', strtotime($message['created_at'])); ?></p>
            </div>
        <?php endforeach; ?>
    </section>

    <section class="user-management">
        <h2>Gestion des utilisateurs</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom d'utilisateur</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo (int) $user['id']; ?></td>
                        <td><?php echo e($user['username']); ?></td>
                        <td><?php echo e($user['email']); ?></td>
                        <td><?php echo e($user['role']); ?></td>
                        <td>
                            <?php if ((int) $user['id'] !== (int) $_SESSION['user_id']): ?>
                                <form method="post">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="user_id" value="<?php echo (int) $user['id']; ?>">
                                    <button type="submit" name="delete_user" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">Supprimer</button>
                                </form>
                            <?php else: ?>
                                (vous)
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <section class="testimonial-management">
        <h2>Gestion des témoignages</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Utilisateur</th>
                    <th>Contenu</th>
                    <th>Note</th>
                    <th>Statut</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($testimonials as $testimonial): ?>
                    <tr>
                        <td><?php echo (int) $testimonial['id']; ?></td>
                        <td><?php echo e(get_username($testimonial['user_id'])); ?></td>
                        <td><?php echo e($testimonial['content']); ?></td>
                        <td><?php echo (int) $testimonial['rating']; ?></td>
                        <td><?php echo $testimonial['is_approved'] ? 'Approuvé' : 'En attente'; ?></td>
                        <td>
                            <?php if (!$testimonial['is_approved']): ?>
                                <form method="post">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="testimonial_id" value="<?php echo (int) $testimonial['id']; ?>">
                                    <button type="submit" name="approve_testimonial">Approuver</button>
                                </form>
                            <?php else: ?>
                                Déjà approuvé
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <section class="product-management">
        <h2>Gestion des promotions</h2>
        <p>La remise s'applique toujours au prix d'origine. Saisir 0 % pour annuler une promotion.</p>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom du produit</th>
                    <th>Prix actuel</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo (int) $product['id']; ?></td>
                        <td><?php echo e($product['name']); ?></td>
                        <td>
                            <?php echo format_price($product['price']); ?>
                            <?php if (!empty($product['original_price'])): ?>
                                <del><?php echo format_price($product['original_price']); ?></del>
                            <?php endif; ?>
                        </td>
                        <td>
                            <form method="post">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="product_id" value="<?php echo (int) $product['id']; ?>">
                                <input type="number" name="discount" min="0" max="90" placeholder="% de réduction" required>
                                <button type="submit" name="add_promotion">Appliquer la promotion</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</div>
