<?php
require_once 'includes/functions.php';
start_session();
require_once 'includes/cart_functions.php';

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['product_id'])) {
    http_response_code(400);
    echo json_encode(['success' => false]);
    exit;
}
require_csrf(true);

removeFromCart($_POST['product_id']);
echo json_encode(['success' => true]);
