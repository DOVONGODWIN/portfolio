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
$to = 'godwindovon@gmail.com'; // Votre adresse email
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

// Tentative d'envoi de l'email avec la fonction mail() native
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
        // Erreur lors de l'envoi - essai avec une alternative
        $alternative_result = sendEmailAlternative($to, $email_subject, $email_body, $name, $email);
        if ($alternative_result) {
            echo json_encode([
                'success' => true, 
                'message' => 'Message envoyé avec succès ! Je vous répondrai dans les plus brefs délais.'
            ]);
            
            // Enregistrement dans un fichier log
            $log_entry = date('Y-m-d H:i:s') . " - Message de $name ($email) - $subject (méthode alternative)\n";
            file_put_contents('contact_log.txt', $log_entry, FILE_APPEND | LOCK_EX);
        } else {
            // Échec complet
            http_response_code(500);
            echo json_encode([
                'success' => false, 
                'message' => 'Erreur lors de l\'envoi du message. Veuillez me contacter directement à godwindovon@gmail.com'
            ]);
        }
    }
} else {
    // Fonction mail() non disponible
    http_response_code(500);
    echo json_encode([
        'success' => false, 
        'message' => 'Fonction d\'envoi d\'email non disponible. Veuillez me contacter directement à godwindovon@gmail.com'
    ]);
}

// Fonction alternative d'envoi d'email (sauvegarde dans un fichier)
function sendEmailAlternative($to, $subject, $body, $from_name, $from_email) {
    $email_data = [
        'to' => $to,
        'subject' => $subject,
        'body' => $body,
        'from_name' => $from_name,
        'from_email' => $from_email,
        'timestamp' => date('Y-m-d H:i:s')
    ];
    
    $email_file = 'pending_emails.json';
    $emails = [];
    
    // Lecture des emails en attente existants
    if (file_exists($email_file)) {
        $emails = json_decode(file_get_contents($email_file), true) ?: [];
    }
    
    // Ajout du nouvel email
    $emails[] = $email_data;
    
    // Sauvegarde
    if (file_put_contents($email_file, json_encode($emails, JSON_PRETTY_PRINT))) {
        return true;
    }
    
    return false;
}
?>
