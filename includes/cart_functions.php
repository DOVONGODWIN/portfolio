<?php

// Quantité maximale d'un même produit dans le panier
const MAX_CART_QUANTITY = 50;

// Initialiser le panier s'il n'existe pas
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Ajouter un produit au panier
function addToCart($product_id, $quantity = 1) {
    $product_id = (int) $product_id;
    $current = $_SESSION['cart'][$product_id] ?? 0;
    $_SESSION['cart'][$product_id] = min(MAX_CART_QUANTITY, $current + max(1, (int) $quantity));
}

// Retirer un produit du panier
function removeFromCart($product_id) {
    unset($_SESSION['cart'][(int) $product_id]);
}

// Mettre à jour la quantité d'un produit dans le panier
function updateCartQuantity($product_id, $quantity) {
    $product_id = (int) $product_id;
    $quantity = (int) $quantity;
    if (!isset($_SESSION['cart'][$product_id])) {
        return;
    }
    if ($quantity > 0) {
        $_SESSION['cart'][$product_id] = min(MAX_CART_QUANTITY, $quantity);
    } else {
        removeFromCart($product_id);
    }
}

// Obtenir le contenu du panier
function getCartContents() {
    return $_SESSION['cart'];
}

// Vider le panier
function emptyCart() {
    $_SESSION['cart'] = array();
}
