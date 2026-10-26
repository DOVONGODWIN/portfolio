<?php
if (!defined('APP_ROUTER')) { header('Location: index.php'); exit; }

require_once 'includes/functions.php';

if (!isset($_SESSION['user_id']) || !ctype_digit((string) ($_GET['order_id'] ?? ''))) {
    header('Location: index.php');
    exit();
}

$order_id = (int) $_GET['order_id'];
$order = get_order_details($order_id, $_SESSION['user_id']);

if (!$order) {
    header('Location: index.php');
    exit();
}
?>

<section class="confirmation">
    <h2>Confirmation de commande</h2>
    <p>Merci pour votre commande ! Votre numéro de commande est #<?php echo $order_id; ?> (<?php echo format_price($order['total_amount']); ?>).</p>
    <p>Vous pouvez consulter les détails de votre commande dans la section "Mes Commandes".</p>
    <a href="index.php?page=mes_commandes" class="btn">Voir mes commandes</a>
</section>
