<?php
// Fichier de test pour diagnostiquer les problèmes d'email
echo "<h1>Diagnostic Email - Portfolio Contact</h1>";

// Test 1: Vérification de PHP
echo "<h2>1. Informations PHP</h2>";
echo "<p>Version PHP: " . phpversion() . "</p>";
echo "<p>Fonction mail() disponible: " . (function_exists('mail') ? 'OUI' : 'NON') . "</p>";

// Test 2: Vérification des extensions
echo "<h2>2. Extensions PHP</h2>";
$required_extensions = ['openssl', 'mbstring', 'json'];
foreach ($required_extensions as $ext) {
    echo "<p>Extension $ext: " . (extension_loaded($ext) ? 'Chargée' : 'Non chargée') . "</p>";
}

// Test 3: Test de la fonction mail() native
echo "<h2>3. Test de la fonction mail() native</h2>";
if (function_exists('mail')) {
    $test_to = 'godwindovon@gmail.com';
    $test_subject = 'Test Email Portfolio - ' . date('Y-m-d H:i:s');
    $test_body = "Ceci est un test de la fonction mail() PHP.\n\nTimestamp: " . date('Y-m-d H:i:s');
    $test_headers = "From: test@portfolio.local\r\n";
    
    echo "<p>Tentative d'envoi d'un email de test...</p>";
    
    if (mail($test_to, $test_subject, $test_body, $test_headers)) {
        echo "<p style='color: green;'>✓ Email de test envoyé avec succès !</p>";
    } else {
        echo "<p style='color: red;'>✗ Échec de l'envoi de l'email de test</p>";
    }
} else {
    echo "<p style='color: red;'>✗ Fonction mail() non disponible</p>";
}

// Test 4: Vérification de PHPMailer
echo "<h2>4. Vérification de PHPMailer</h2>";
if (file_exists('vendor/autoload.php')) {
    echo "<p style='color: green;'>✓ PHPMailer installé</p>";
    require 'vendor/autoload.php';
    
    if (class_exists('PHPMailer\PHPMailer\PHPMailer')) {
        echo "<p style='color: green;'>✓ Classe PHPMailer disponible</p>";
    } else {
        echo "<p style='color: red;'>✗ Classe PHPMailer non trouvée</p>";
    }
} else {
    echo "<p style='color: orange;'>⚠ PHPMailer non installé</p>";
    echo "<p>Pour installer PHPMailer, exécutez: <code>composer install</code></p>";
}

// Test 5: Vérification des permissions de fichiers
echo "<h2>5. Permissions des fichiers</h2>";
$files_to_check = ['contact_log.txt', 'pending_emails.json'];
foreach ($files_to_check as $file) {
    if (file_exists($file)) {
        $writable = is_writable($file) ? 'Écriture autorisée' : 'Écriture refusée';
        echo "<p>$file: $writable</p>";
    } else {
        echo "<p>$file: Fichier créé lors du premier test</p>";
    }
}

// Test 6: Configuration SMTP recommandée
echo "<h2>6. Configuration SMTP recommandée</h2>";
echo "<p>Pour un envoi d'email fiable, configurez PHPMailer avec Gmail :</p>";
echo "<ul>";
echo "<li>Activez l'authentification à 2 facteurs sur votre compte Gmail</li>";
echo "<li>Générez un mot de passe d'application</li>";
echo "<li>Utilisez le serveur SMTP: smtp.gmail.com</li>";
echo "<li>Port: 587 avec TLS</li>";
echo "</ul>";

// Test 7: Création d'un fichier de test
echo "<h2>7. Test de création de fichier</h2>";
$test_data = [
    'test' => true,
    'timestamp' => date('Y-m-d H:i:s'),
    'message' => 'Test de création de fichier'
];

if (file_put_contents('test_file.json', json_encode($test_data, JSON_PRETTY_PRINT))) {
    echo "<p style='color: green;'>✓ Fichier de test créé avec succès</p>";
    unlink('test_file.json'); // Suppression du fichier de test
} else {
    echo "<p style='color: red;'>✗ Impossible de créer le fichier de test</p>";
}

echo "<hr>";
echo "<p><strong>Note:</strong> Ce fichier de test vous aide à diagnostiquer les problèmes d'email. Supprimez-le après utilisation.</p>";
?>
