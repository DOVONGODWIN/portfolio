<?php
require_once 'includes/functions.php';
start_session();

header('Content-Type: application/json; charset=utf-8');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['hasInfo' => false]);
    exit;
}

echo json_encode(['hasInfo' => user_has_address_and_phone($_SESSION['user_id'])]);
