<?php
// Fichier pour effacer tous les contacts reçus
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Méthode non autorisée']);
    exit;
}

$contacts_file = 'contacts_received.json';

if (file_exists($contacts_file)) {
    if (unlink($contacts_file)) {
        echo json_encode(['success' => true, 'message' => 'Tous les contacts ont été effacés']);
    } else {
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Erreur lors de l\'effacement des contacts']);
    }
} else {
    echo json_encode(['success' => true, 'message' => 'Aucun fichier de contacts à effacer']);
}
?>
