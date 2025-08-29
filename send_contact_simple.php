<?php
// Configuration des en-têtes
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Vérification de la méthode HTTP
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Méthode non autorisée']);
    exit;
}

// Récupération des données du formulaire
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$subject = $_POST['subject'] ?? '';
$message = $_POST['message'] ?? '';

// Validation des données
if (empty($name) || empty($email) || empty($subject) || empty($message)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Tous les champs sont obligatoires']);
    exit;
}

// Validation de l'email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Adresse email invalide']);
    exit;
}

// Configuration de l'email
$to = 'godwindovon@gmail.com';
$email_subject = "Nouveau message de contact - $subject";

// Construction du contenu de l'email
$email_body = "Vous avez reçu un nouveau message de contact depuis votre portfolio.\n\n";
$email_body .= "Détails du message :\n";
$email_body .= "Nom : $name\n";
$email_body .= "Email : $email\n";
$email_body .= "Sujet : $subject\n";
$email_body .= "Message :\n$message\n\n";
$email_body .= "---\n";
$email_body .= "Ce message a été envoyé depuis le formulaire de contact de votre portfolio.";

// Tentative d'envoi avec la fonction mail() native
$headers = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

// Test de la fonction mail()
if (function_exists('mail')) {
    // Tentative d'envoi
    if (mail($to, $email_subject, $email_body, $headers)) {
        // Email envoyé avec succès
        echo json_encode([
            'success' => true, 
            'message' => 'Message envoyé avec succès ! Je vous répondrai dans les plus brefs délais.'
        ]);
        
        // Enregistrement dans un fichier log
        $log_entry = date('Y-m-d H:i:s') . " - Message de $name ($email) - $subject\n";
        file_put_contents('contact_log.txt', $log_entry, FILE_APPEND | LOCK_EX);
        
    } else {
        // Échec de l'envoi - sauvegarder dans un fichier
        $save_result = saveContactToFile($name, $email, $subject, $message);
        if ($save_result) {
            echo json_encode([
                'success' => true, 
                'message' => 'Message reçu ! Je vous répondrai dans les plus brefs délais. (Sauvegardé localement)'
            ]);
        } else {
            http_response_code(500);
            echo json_encode([
                'success' => false, 
                'message' => 'Erreur lors de l\'enregistrement. Veuillez me contacter directement à godwindovon@gmail.com'
            ]);
        }
    }
} else {
    // Fonction mail() non disponible - sauvegarder dans un fichier
    $save_result = saveContactToFile($name, $email, $subject, $message);
    if ($save_result) {
        echo json_encode([
            'success' => true, 
            'message' => 'Message reçu ! Je vous répondrai dans les plus brefs délais. (Sauvegardé localement)'
        ]);
    } else {
        http_response_code(500);
        echo json_encode([
            'success' => false, 
            'message' => 'Erreur lors de l\'enregistrement. Veuillez me contacter directement à godwindovon@gmail.com'
        ]);
    }
}

// Fonction de sauvegarde des contacts
function saveContactToFile($name, $email, $subject, $message) {
    $contact_data = [
        'name' => $name,
        'email' => $email,
        'subject' => $subject,
        'message' => $message,
        'timestamp' => date('Y-m-d H:i:s'),
        'status' => 'new'
    ];
    
    $contacts_file = 'contacts_received.json';
    $contacts = [];
    
    // Lecture des contacts existants
    if (file_exists($contacts_file)) {
        $contacts = json_decode(file_get_contents($contacts_file), true) ?: [];
    }
    
    // Ajout du nouveau contact
    $contacts[] = $contact_data;
    
    // Sauvegarde
    if (file_put_contents($contacts_file, json_encode($contacts, JSON_PRETTY_PRINT))) {
        return true;
    }
    
    return false;
}
?>
