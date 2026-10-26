<?php
/**
 * Retourne la configuration de l'application (includes/config.php, ignoré par git)
 */
function app_config() {
    static $config = null;

    if ($config === null) {
        $file = __DIR__ . '/config.php';
        if (!file_exists($file)) {
            http_response_code(500);
            exit("Configuration manquante : copiez includes/config.example.php en includes/config.php.");
        }
        $config = require $file;

        ini_set('display_errors', $config['debug'] ? '1' : '0');
        error_reporting(E_ALL);
    }

    return $config;
}

function connexionDB() {
    $db = app_config()['db'];

    mysqli_report(MYSQLI_REPORT_OFF);
    $connx = mysqli_connect($db['host'], $db['user'], $db['password'], $db['name']);

    if (!$connx) {
        // Le détail technique va dans les logs, jamais à l'écran
        error_log("Échec de la connexion MySQL : " . mysqli_connect_error());
        http_response_code(500);
        exit("Le service est momentanément indisponible.");
    }

    mysqli_set_charset($connx, 'utf8mb4');

    return $connx;
}
?>
