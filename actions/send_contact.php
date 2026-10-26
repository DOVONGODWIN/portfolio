<?php
// Point d'entrée unique du formulaire de contact (appelé en AJAX par contact-modern.php)
header('Content-Type: application/json; charset=utf-8');

function respond($success, $message, $status = 200) {
    http_response_code($status);
    echo json_encode(['success' => $success, 'message' => $message]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respond(false, 'Méthode non autorisée', 405);
}

$root = dirname(__DIR__);
$config_file = $root . '/config.php';
$config = file_exists($config_file) ? require $config_file : require $root . '/config.example.php';
$data_dir = $root . '/data';

// Honeypot : champ invisible que seuls les robots remplissent
if (!empty($_POST['website'])) {
    respond(true, 'Message reçu, merci !');
}

// Limitation de débit : un message par minute et par adresse IP
$rate_file = $data_dir . '/rate_' . sha1($_SERVER['REMOTE_ADDR'] ?? 'unknown');
if (file_exists($rate_file) && time() - filemtime($rate_file) < 60) {
    respond(false, 'Merci de patienter une minute avant de renvoyer un message.', 429);
}

// Nettoyage : suppression des retours à la ligne dans les champs utilisés en en-tête (injection d'en-têtes)
$name    = trim(str_replace(["\r", "\n"], ' ', $_POST['name'] ?? ''));
$email   = trim($_POST['email'] ?? '');
$subject = trim(str_replace(["\r", "\n"], ' ', $_POST['subject'] ?? ''));
$message = trim($_POST['message'] ?? '');

if ($name === '' || $email === '' || $subject === '' || $message === '') {
    respond(false, 'Tous les champs sont obligatoires', 400);
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    respond(false, 'Adresse email invalide', 400);
}
if (mb_strlen($name) > 100 || mb_strlen($subject) > 150 || mb_strlen($message) > 5000) {
    respond(false, 'Un des champs est trop long', 400);
}

touch($rate_file);

$body  = "Nouveau message depuis le portfolio.\n\n";
$body .= "Nom : $name\n";
$body .= "Email : $email\n";
$body .= "Sujet : $subject\n\n";
$body .= "Message :\n$message\n";

// Envoi SMTP si un mot de passe est configuré
$smtp = $config['smtp'];
if (!empty($smtp['password']) && file_exists($root . '/vendor/autoload.php')) {
    require $root . '/vendor/autoload.php';

    try {
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = $smtp['host'];
        $mail->SMTPAuth = true;
        $mail->Username = $smtp['username'];
        $mail->Password = $smtp['password'];
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = $smtp['port'];
        $mail->CharSet = 'UTF-8';

        // L'expéditeur est toujours notre adresse (SPF/DMARC) ; le visiteur est en Reply-To
        $mail->setFrom($config['mail_from'], 'Portfolio - Contact');
        $mail->addAddress($config['mail_to']);
        $mail->addReplyTo($email, $name);

        $mail->isHTML(false);
        $mail->Subject = "Portfolio - $subject";
        $mail->Body = $body;
        $mail->send();

        respond(true, 'Message envoyé ! Je vous répondrai dans les plus brefs délais.');
    } catch (Exception $e) {
        error_log('Contact portfolio - échec SMTP : ' . $e->getMessage());
    }
}

// Sinon (ou en cas d'échec SMTP) : sauvegarde dans un fichier non accessible depuis le web
$contacts_file = $data_dir . '/contacts.json';
$fp = fopen($contacts_file, 'c+');
if ($fp && flock($fp, LOCK_EX)) {
    $contacts = json_decode(stream_get_contents($fp), true) ?: [];
    $contacts[] = [
        'name' => $name,
        'email' => $email,
        'subject' => $subject,
        'message' => $message,
        'timestamp' => date('Y-m-d H:i:s'),
    ];
    ftruncate($fp, 0);
    rewind($fp);
    fwrite($fp, json_encode($contacts, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    flock($fp, LOCK_UN);
    fclose($fp);
    respond(true, 'Message bien reçu ! Je vous répondrai dans les plus brefs délais.');
}

respond(false, "Le message n'a pas pu être enregistré. Écrivez-moi directement à " . $config['mail_to'], 500);
