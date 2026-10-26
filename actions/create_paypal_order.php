<?php
// Création de la commande PayPal : le montant est recalculé ici à partir du panier en session et des prix en base
require_once __DIR__ . '/../includes/functions.php';
start_session();
require_once __DIR__ . '/../includes/cart_functions.php';
require_once __DIR__ . '/../includes/paypal.php';

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_SESSION['user_id'])) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Connectez-vous pour commander.']);
    exit;
}
require_csrf(true);

$user_id = $_SESSION['user_id'];
$cart_items = get_cart_items(getCartContents());
$total = calculate_cart_total($cart_items);

if (empty($cart_items) || $total <= 0) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Votre panier est vide.']);
    exit;
}

try {
    $result = paypal_post('/v2/checkout/orders', [
        "intent" => "CAPTURE",
        "purchase_units" => [
            [
                "amount" => [
                    "currency_code" => app_config()['paypal']['currency'],
                    "value" => number_format($total, 2, '.', ''),
                ],
            ],
        ],
    ]);

    if (!isset($result['id'])) {
        throw new Exception('Failed to create PayPal order');
    }

    // Commande en attente dans la base, avec ses articles au prix du moment
    $db_order_id = create_order($user_id, $total, 'pending', $result['id']);
    if (!$db_order_id) {
        throw new Exception('Failed to save order');
    }
    foreach ($cart_items as $item) {
        add_order_item($db_order_id, $item['id'], $item['quantity'], $item['price']);
    }

    echo json_encode(['id' => $result['id']]);
} catch (Exception $e) {
    error_log('PayPal - création de commande : ' . $e->getMessage());
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Le paiement est momentanément indisponible.']);
}
