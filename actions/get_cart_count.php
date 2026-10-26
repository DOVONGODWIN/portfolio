<?php
require_once __DIR__ . '/../includes/functions.php';
start_session();
require_once __DIR__ . '/../includes/cart_functions.php';

header('Content-Type: application/json; charset=utf-8');
echo json_encode(['count' => array_sum(getCartContents())]);
