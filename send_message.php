<?php
require_once 'includes/functions.php';
start_session();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_csrf();

    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if ($name === '' || $email === '' || $message === '') {
        $_SESSION['error'] = "Tous les champs sont obligatoires.";
        header('Location: index.php?page=contact');
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "L'adresse e-mail n'est pas valide.";
        header('Location: index.php?page=contact');
        exit();
    }

    if (mb_strlen($name) > 100 || mb_strlen($email) > 100 || mb_strlen($message) > 5000) {
        $_SESSION['error'] = "Un des champs est trop long.";
        header('Location: index.php?page=contact');
        exit();
    }

    if (add_contact_message($name, $email, $message)) {
        $_SESSION['success'] = "Votre message a été envoyé avec succès.";
    } else {
        $_SESSION['error'] = "Une erreur s'est produite lors de l'envoi du message.";
    }
}

header('Location: index.php?page=contact');
exit();
