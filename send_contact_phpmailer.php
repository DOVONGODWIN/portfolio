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

// Tentative d'envoi avec PHPMailer si disponible
if (file_exists('vendor/autoload.php')) {
    require 'vendor/autoload.php';
    
    try {
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        
        // Configuration du serveur SMTP (Gmail)
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'godwindovon@gmail.com'; // Votre email Gmail
        $mail->Password = 'VOTRE_MOT_DE_PASSE_APP'; // Mot de passe d'application Gmail
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->CharSet = 'UTF-8';
        
        // Expéditeur et destinataire
        $mail->setFrom('godwindovon@gmail.com', 'Portfolio Contact');
        $mail->addAddress($to, 'Dovon Godwin');
        $mail->addReplyTo($email, $name);
        
        // Contenu
        $mail->isHTML(false);
        $mail->Subject = $email_subject;
        $mail->Body = $email_body;
        
        // Envoi
        if ($mail->send()) {
            echo json_encode([
                'success' => true, 
                'message' => 'Message envoyé avec succès ! Je vous répondrai dans les plus brefs délais.'
            ]);
            
            // Enregistrement dans un fichier log
            $log_entry = date('Y-m-d H:i:s') . " - Message de $name ($email) - $subject (PHPMailer)\n";
            file_put_contents('contact_log.txt', $log_entry, FILE_APPEND | LOCK_EX);
            
        } else {
            throw new Exception('Erreur lors de l\'envoi avec PHPMailer');
        }
        
    } catch (Exception $e) {
        // En cas d'échec avec PHPMailer, essayer la méthode native
        $fallback_result = sendEmailFallback($to, $email_subject, $email_body, $name, $email);
        if ($fallback_result) {
            echo json_encode([
                'success' => true, 
                'message' => 'Message envoyé avec succès ! Je vous répondrai dans les plus brefs délais.'
            ]);
        } else {
            http_response_code(500);
            echo json_encode([
                'success' => false, 
                'message' => 'Erreur lors de l\'envoi. Veuillez me contacter directement à godwindovon@gmail.com'
            ]);
        }
    }
    
} else {
    // PHPMailer non disponible, utiliser la méthode native
    $fallback_result = sendEmailFallback($to, $email_subject, $email_body, $name, $email);
    if ($fallback_result) {
        echo json_encode([
            'success' => true, 
            'message' => 'Message envoyé avec succès ! Je vous répondrai dans les plus brefs délais.'
        ]);
    } else {
        http_response_code(500);
        echo json_encode([
            'success' => false, 
            'message' => 'Erreur lors de l\'envoi. Veuillez me contacter directement à godwindovon@gmail.com'
        ]);
    }
}

// Fonction de fallback utilisant la méthode native PHP
function sendEmailFallback($to, $subject, $body, $from_name, $from_email) {
    if (function_exists('mail')) {
        $headers = "From: $from_email\r\n";
        $headers .= "Reply-To: $from_email\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();
        
        if (mail($to, $subject, $body, $headers)) {
            // Enregistrement dans un fichier log
            $log_entry = date('Y-m-d H:i:s') . " - Message de $from_name ($from_email) - $subject (PHP mail)\n";
            file_put_contents('contact_log.txt', $log_entry, FILE_APPEND | LOCK_EX);
            return true;
        }
    }
    
    // Si tout échoue, sauvegarder dans un fichier
    return saveEmailToFile($to, $subject, $body, $from_name, $from_email);
}

// Fonction de sauvegarde des emails en cas d'échec
function saveEmailToFile($to, $subject, $body, $from_name, $from_email) {
    $email_data = [
        'to' => $to,
        'subject' => $subject,
        'body' => $body,
        'from_name' => $from_name,
        'from_email' => $from_email,
        'timestamp' => date('Y-m-d H:i:s'),
        'status' => 'pending'
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
