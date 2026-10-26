<?php
require_once 'includes/functions.php';
start_session();
require_once 'includes/cart_functions.php';

header('Content-Type: application/json; charset=utf-8');
echo json_encode(['count' => array_sum(getCartContents())]);
