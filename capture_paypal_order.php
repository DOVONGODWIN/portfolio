<?php
// Capture du paiement PayPal et validation de la commande correspondante
require_once 'includes/functions.php';
start_session();
require_once 'includes/cart_functions.php';
require_once 'get_paypal_token.php';

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_SESSION['user_id'])) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Connectez-vous pour commander.']);
    exit;
}
require_csrf(true);

$user_id = $_SESSION['user_id'];
$input = json_decode(file_get_contents('php://input'), true);
$paypal_order_id = $input['orderID'] ?? '';

// L'identifiant PayPal doit correspondre à une commande en attente de cet utilisateur
if (!is_string($paypal_order_id) || !preg_match('/^[A-Z0-9]{1,64}$/', $paypal_order_id)
    || !($order = get_pending_order_by_paypal_id($paypal_order_id, $user_id))) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Commande introuvable.']);
    exit;
}

try {
    $result = paypal_post('/v2/checkout/orders/' . $paypal_order_id . '/capture');

    $capture = $result['purchase_units'][0]['payments']['captures'][0] ?? null;
    $captured_amount = (float) ($capture['amount']['value'] ?? 0);
    $captured_currency = $capture['amount']['currency_code'] ?? '';

    if (($result['status'] ?? '') !== 'COMPLETED'
        || abs($captured_amount - (float) $order['total_amount']) > 0.001
        || $captured_currency !== app_config()['paypal']['currency']) {
        throw new Exception('Payment not completed or amount mismatch');
    }

    update_order_status($order['id'], 'completed');
    emptyCart();

    echo json_encode([
        'success' => true,
        'id' => $order['id'],
        'redirect' => 'index.php?page=confirmation&order_id=' . $order['id'],
    ]);
} catch (Exception $e) {
    error_log('PayPal - capture de la commande ' . $order['id'] . ' : ' . $e->getMessage());
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => "Le paiement n'a pas pu être validé."]);
}
