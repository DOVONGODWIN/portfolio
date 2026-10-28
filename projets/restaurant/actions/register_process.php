<?php
require_once __DIR__ . '/../includes/functions.php';
start_session();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_csrf();

    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Vérifiez si tous les champs sont remplis
    if ($username === '' || $email === '' || $password === '' || $confirm_password === '') {
        $_SESSION['error'] = "Veuillez remplir tous les champs.";
        header("Location: ../index.php?page=register");
        exit();
    }

    // Nom d'utilisateur : lettres, chiffres, point, tiret et underscore
    if (!preg_match('/^[\p{L}0-9._-]{3,50}$/u', $username)) {
        $_SESSION['error'] = "Le nom d'utilisateur doit contenir 3 à 50 caractères (lettres, chiffres, . _ -).";
        header("Location: ../index.php?page=register");
        exit();
    }

      // Vérification de la complexité du mot de passe
    if (!is_password_complex($password)) {
        $_SESSION['error'] = "Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial.";
        header("Location: ../index.php?page=register");
        exit();
    }

    // Vérifiez si les mots de passe correspondent
    if ($password !== $confirm_password) {
        $_SESSION['error'] = "Les mots de passe ne correspondent pas.";
        header("Location: ../index.php?page=register");
        exit();
    }

     // Vérification de la validité de l'email
     if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 100) {
        $_SESSION['error'] = "L'adresse email n'est pas valide.";
        header("Location: ../index.php?page=register");
        exit();
    }

    // Tentez d'enregistrer l'utilisateur
    $user_id = register_user($username, $email, $password);

    if ($user_id) {
        session_regenerate_id(true);
        $_SESSION['user_id'] = $user_id;
        $_SESSION['username'] = $username;
        $_SESSION['is_admin'] = false;
        header("Location: ../index.php");
        exit();
    } else {
        $_SESSION['error'] = "L'inscription a échoué. L'utilisateur ou l'email existe peut-être déjà.";
        header("Location: ../index.php?page=register");
        exit();
    }
}

header("Location: ../index.php?page=register");
exit();
