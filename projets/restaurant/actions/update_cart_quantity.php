<?php
require_once __DIR__ . '/../includes/functions.php';
start_session();
require_once __DIR__ . '/../includes/cart_functions.php';

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['product_id'], $_POST['quantity'])) {
    http_response_code(400);
    echo json_encode(['success' => false]);
    exit;
}
require_csrf(true);

updateCartQuantity($_POST['product_id'], $_POST['quantity']);
echo json_encode(['success' => true]);
