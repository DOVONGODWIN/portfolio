<?php
/**
 * pour importer la base de donner sur cette page
 */
require_once 'includes/functions.php';
start_session();

// Nombre d'échecs autorisés par adresse IP avant blocage temporaire
const MAX_LOGIN_ATTEMPTS = 5;
const LOGIN_LOCK_SECONDS = 900;

/**
 * Fichier de suivi des tentatives de connexion échouées pour l'IP courante
 */
function login_attempts_file() {
    return sys_get_temp_dir() . '/resto_login_' . sha1($_SERVER['REMOTE_ADDR'] ?? 'unknown');
}

function login_is_locked() {
    $file = login_attempts_file();
    if (!file_exists($file)) {
        return false;
    }
    if (time() - filemtime($file) > LOGIN_LOCK_SECONDS) {
        unlink($file);
        return false;
    }
    return (int) file_get_contents($file) >= MAX_LOGIN_ATTEMPTS;
}

function login_record_failure() {
    $file = login_attempts_file();
    $count = file_exists($file) ? (int) file_get_contents($file) : 0;
    file_put_contents($file, $count + 1, LOCK_EX);
}

/**
 * Traite la demande de connexion de l'utilisateur
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_csrf();

    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        $_SESSION['error'] = "Veuillez remplir tous les champs.";
        header("Location: index.php?page=login");
        exit();
    }

    if (login_is_locked()) {
        $_SESSION['error'] = "Trop de tentatives de connexion. Réessayez dans 15 minutes.";
        header("Location: index.php?page=login");
        exit();
    }

    $user = verify_user($username, $password);

    if ($user) {
        // Nouvel identifiant de session après connexion (protection contre la fixation de session)
        session_regenerate_id(true);
        @unlink(login_attempts_file());

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['is_admin'] = $user['role'] == 'admin';
        header("Location: index.php");
        exit();
    } else {
        login_record_failure();
        $_SESSION['error'] = "Nom d'utilisateur ou mot de passe incorrect.";
        header("Location: index.php?page=login");
        exit();
    }
}

header("Location: index.php?page=login");
exit();

/**
 * Vérifie les informations d'identification de l'utilisateur
 *
 * @param string $username Nom d'utilisateur
 * @param string $password Mot de passe
 * @return array|false Retourne les informations de l'utilisateur si la vérification réussit, sinon false
 */
function verify_user($username, $password) {
    $connx = connexionDB();

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_prepare($connx, $sql);
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);
    mysqli_close($connx);

    if ($user && password_verify($password, $user['password'])) {
        return $user;
    }

    return false;
}
?>
