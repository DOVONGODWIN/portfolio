<?php
require_once 'includes/functions.php';
start_session();
require_once 'includes/cart_functions.php';

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_SESSION['user_id'])) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Connectez-vous pour ajouter des produits au panier.']);
    exit;
}
require_csrf(true);

$product_id = filter_var($_POST['product_id'] ?? null, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
if (!$product_id || !get_product_details($product_id)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Produit introuvable.']);
    exit;
}

addToCart($product_id);
echo json_encode(['success' => true]);
