<?php
/**
 * Création d'un compte administrateur, en ligne de commande uniquement :
 *   php create_admin.php <nom_utilisateur> <email>
 * Le mot de passe est saisi dans le terminal (il n'apparaît ni dans l'historique ni dans le code).
 */
if (PHP_SAPI !== 'cli') {
    http_response_code(404);
    exit;
}

require_once __DIR__ . '/includes/functions.php';

if ($argc !== 3) {
    fwrite(STDERR, "Usage : php create_admin.php <nom_utilisateur> <email>\n");
    exit(1);
}

[, $username, $email] = $argv;

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    fwrite(STDERR, "Email invalide.\n");
    exit(1);
}

fwrite(STDOUT, "Mot de passe : ");
$password = trim(fgets(STDIN));

if (!is_password_complex($password)) {
    fwrite(STDERR, "Mot de passe trop faible (8 caractères minimum, majuscule, minuscule, chiffre et caractère spécial).\n");
    exit(1);
}

$connx = connexionDB();
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, 'admin')";
$stmt = mysqli_prepare($connx, $sql);
mysqli_stmt_bind_param($stmt, 'sss', $username, $email, $hashed_password);

if (mysqli_stmt_execute($stmt)) {
    fwrite(STDOUT, "Administrateur « $username » créé.\n");
    exit(0);
}

fwrite(STDERR, "Erreur : " . mysqli_error($connx) . "\n");
exit(1);
