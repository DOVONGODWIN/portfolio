<?php
echo "<h1>Test Simple - Portfolio</h1>";

// Test 1: PHP fonctionne
echo "<h2>1. Test PHP</h2>";
echo "<p>✅ PHP fonctionne - Version: " . phpversion() . "</p>";

// Test 2: Test de réception POST
echo "<h2>2. Test réception POST</h2>";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<p>✅ Méthode POST reçue</p>";
    echo "<p>Données reçues:</p>";
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
} else {
    echo "<p>⚠ Aucune méthode POST reçue</p>";
}

// Test 3: Test de création de fichier
echo "<h2>3. Test création de fichier</h2>";
$test_file = 'test_simple_' . date('Y-m-d_H-i-s') . '.txt';
$test_content = "Test de création de fichier - " . date('Y-m-d H:i:s');

if (file_put_contents($test_file, $test_content)) {
    echo "<p>✅ Fichier créé avec succès: $test_file</p>";
    
    // Lecture du fichier
    $read_content = file_get_contents($test_file);
    echo "<p>Contenu lu: $read_content</p>";
    
    // Suppression du fichier de test
    unlink($test_file);
    echo "<p>✅ Fichier de test supprimé</p>";
} else {
    echo "<p>❌ Impossible de créer le fichier</p>";
}

// Test 4: Test JSON
echo "<h2>4. Test JSON</h2>";
$test_data = [
    'test' => true,
    'timestamp' => date('Y-m-d H:i:s'),
    'message' => 'Test JSON'
];

$json_string = json_encode($test_data, JSON_PRETTY_PRINT);
if ($json_string !== false) {
    echo "<p>✅ JSON fonctionne</p>";
    echo "<pre>$json_string</pre>";
} else {
    echo "<p>❌ Erreur JSON</p>";
}

// Test 5: Formulaire de test
echo "<h2>5. Formulaire de test</h2>";
?>
<form method="POST" action="">
    <p>
        <label>Nom: <input type="text" name="test_name" value="Test User"></label>
    </p>
    <p>
        <label>Email: <input type="email" name="test_email" value="test@example.com"></label>
    </p>
    <p>
        <label>Message: <textarea name="test_message">Message de test</textarea></label>
    </p>
    <p>
        <button type="submit">Tester l'envoi</button>
    </p>
</form>

<?php
// Test 6: Vérification des erreurs
echo "<h2>6. Vérification des erreurs</h2>";
if (error_reporting()) {
    echo "<p>✅ Rapport d'erreurs activé</p>";
} else {
    echo "<p>⚠ Rapport d'erreurs désactivé</p>";
}

// Test 7: Permissions du dossier
echo "<h2>7. Permissions du dossier</h2>";
$current_dir = __DIR__;
echo "<p>Dossier actuel: $current_dir</p>";
echo "<p>Lecture: " . (is_readable($current_dir) ? '✅' : '❌') . "</p>";
echo "<p>Écriture: " . (is_writable($current_dir) ? '✅' : '❌') . "</p>";

echo "<hr>";
echo "<p><strong>Note:</strong> Ce fichier vous aide à diagnostiquer les problèmes de base.</p>";
?>
