<?php
if (!defined('APP_ROUTER')) { header('Location: index.php?page=mes_commandes'); exit; }

require_once 'includes/functions.php';

if (!isset($_SESSION['user_id']) || !isset($_GET['id']) || !ctype_digit((string) $_GET['id'])) {
    header('Location: index.php?page=mes_commandes');
    exit();
}

$user_id = $_SESSION['user_id'];
$order_id = (int) $_GET['id'];

$order = get_order_details($order_id, $user_id);

if (!$order) {
    header('Location: index.php?page=mes_commandes');
    exit();
}

$is_admin = is_admin($user_id);

// Suppression réservée à l'administrateur : un client peut seulement annuler une commande en attente (page Mes commandes)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_order'])) {
    require_csrf();

    if ($is_admin) {
        if (delete_order($order_id)) {
            $_SESSION['success'] = "La commande a été supprimée avec succès.";
            header('Location: index.php?page=mes_commandes');
            exit();
        } else {
            $error_message = "Une erreur est survenue lors de la suppression de la commande.";
        }
    } else {
        $error_message = "Vous n'avez pas les droits pour supprimer cette commande.";
    }
}
?>

<section class="detail-commande">
    <h2>Détails de la commande #<?php echo (int) $order['id']; ?></h2>

    <?php if (!empty($error_message)): ?>
        <div class="error-message"><?php echo e($error_message); ?></div>
    <?php endif; ?>

    <div class="order-summary">
        <p>Date : <?php echo isset($order['created_at']) ? date('d/m/Y H:i', strtotime($order['created_at'])) : 'N/A'; ?></p>
        <p>Statut : <span class="status <?php echo e($order['status'] ?? ''); ?>"><?php echo get_status_fr($order['status'] ?? ''); ?></span></p>
        <p>Total : <?php echo format_price($order['total_amount'] ?? 0); ?></p>
    </div>
    <h3>Articles commandés</h3>
    <table class="order-items">
        <thead>
            <tr>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Prix unitaire</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($order['items'])): ?>
            <?php foreach ($order['items'] as $item): ?>
                <tr>
                    <td><?php echo e($item['name'] ?? 'Produit supprimé'); ?></td>
                    <td><?php echo (int) ($item['quantity'] ?? 0); ?></td>
                    <td><?php echo format_price($item['price'] ?? 0); ?></td>
                    <td><?php echo format_price(($item['price'] ?? 0) * ($item['quantity'] ?? 0)); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">Aucun article trouvé pour cette commande.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
    <div class="order-actions">
        <a href="index.php?page=mes_commandes" class="btn-back">Retour aux commandes</a>
        <a href="index.php?page=menu" class="btn-order-again">Commander à nouveau</a>
        <?php if ($is_admin): ?>
            <form method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette commande ?');">
                <?php echo csrf_field(); ?>
                <button type="submit" name="delete_order" class="btn-delete">Supprimer la commande</button>
            </form>
        <?php endif; ?>
    </div>
</section>
