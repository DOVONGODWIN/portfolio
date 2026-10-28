<?php
if (!defined('APP_ROUTER')) { header('Location: ../index.php?page=mes_commandes'); exit; }

require_once __DIR__ . '/../includes/functions.php';

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php?page=login');
    exit();
}

$user_id = $_SESSION['user_id'];
$is_admin = is_admin($user_id);

// Récupérer les commandes
if ($is_admin) {
    // Pour l'admin, récupérer toutes les commandes
    $orders = get_all_orders();
} else {
    // Pour l'utilisateur, récupérer ses propres commandes
    $orders = get_user_orders($user_id);
}

// Recherche de commandes (pour l'admin)
if ($is_admin && is_string($_GET['search'] ?? null) && $_GET['search'] !== '') {
    $search_term = $_GET['search'];
    $orders = search_orders($search_term);
}

// Traitement des actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_csrf();

    $order_id = (int) ($_POST['order_id'] ?? 0);
    if (isset($_POST['cancel_order'])) {
        if ($is_admin || can_cancel_order($user_id, $order_id)) {
            cancel_order($order_id);
        }
    } elseif ($is_admin && isset($_POST['update_status'])) {
        $new_status = $_POST['new_status'] ?? '';
        update_order_status($order_id, $new_status);
    }
    
    // Recharger les commandes après une action
    if ($is_admin) {
        $orders = get_all_orders();
    } else {
        $orders = get_user_orders($user_id);
    }
}


?>

<section class="mes-commandes">
    <h2><?php echo $is_admin ? "Toutes les Commandes" : "Mes Commandes"; ?></h2>
    <?php flash_messages(); ?>
    
    <?php if ($is_admin): ?>
    <form method="get" class="search-form">
        <input type="hidden" name="page" value="mes_commandes">
        <input type="text" name="search" placeholder="Rechercher une commande..." value="<?php echo e($_GET['search'] ?? ''); ?>">
        <button type="submit">Rechercher</button>
    </form>
    <?php endif; ?>

    <?php if (empty($orders)): ?>
        <p>Aucune commande trouvée.</p>
    <?php else: ?>
        <?php foreach ($orders as $order): ?>
            <div class="commande-item">
                <div class="commande-info">
                    <h3>Commande #<?php echo $order['id']; ?></h3>
                    <p>Date : <?php echo date('d/m/Y H:i', strtotime($order['created_at'])); ?></p>
                    <p>Statut : <span class="status <?php echo e($order['status']); ?>"><?php echo get_status_fr($order['status']); ?></span></p>
                    <p>Total : <?php echo format_price($order['total_amount']); ?></p>
                    <?php if ($is_admin): ?>
                        <p>Client : <?php echo e(get_username_by_id($order['user_id'])); ?></p>
                    <?php endif; ?>
                </div>
                <div class="commande-actions">
                    <?php if ($order['status'] === 'pending' && ($is_admin || $order['user_id'] == $user_id)): ?>
                        <form method="post">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                            <button type="submit" name="cancel_order" class="btn-cancel">Annuler</button>
                        </form>
                    <?php endif; ?>
                    <?php if ($is_admin): ?>
                        <form method="post">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                            <select name="new_status">
                                <option value="pending">En attente</option>
                                <option value="processing">En cours</option>
                                <option value="completed">Terminé</option>
                                <option value="cancelled">Annulé</option>
                            </select>
                            <button type="submit" name="update_status" class="btn-update">Mettre à jour</button>
                        </form>
                    <?php endif; ?>
                    <a href="index.php?page=detail_commande&amp;id=<?php echo $order['id']; ?>" class="btn-detail">Voir détails</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</section>