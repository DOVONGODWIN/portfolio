<?php
// Test du formulaire de contact simplifié
echo "<h1>Test Formulaire Contact Simplifié</h1>";

// Test 1: Vérification des données POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<h2>✅ Données POST reçues</h2>";
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    
    // Test de validation
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $subject = $_POST['subject'] ?? '';
    $message = $_POST['message'] ?? '';
    
    echo "<h3>Validation des données:</h3>";
    echo "<p>Nom: " . (empty($name) ? '❌ Vide' : '✅ OK') . "</p>";
    echo "<p>Email: " . (empty($email) ? '❌ Vide' : '✅ OK') . "</p>";
    echo "<p>Sujet: " . (empty($subject) ? '❌ Vide' : '✅ OK') . "</p>";
    echo "<p>Message: " . (empty($message) ? '❌ Vide' : '✅ OK') . "</p>";
    
    // Test de validation email
    if (!empty($email)) {
        $email_valid = filter_var($email, FILTER_VALIDATE_EMAIL);
        echo "<p>Email valide: " . ($email_valid ? '✅ OUI' : '❌ NON') . "</p>";
    }
    
    // Test de sauvegarde
    if (!empty($name) && !empty($email) && !empty($subject) && !empty($message)) {
        echo "<h3>Test de sauvegarde:</h3>";
        
        $contact_data = [
            'name' => $name,
            'email' => $email,
            'subject' => $subject,
            'message' => $message,
            'timestamp' => date('Y-m-d H:i:s'),
            'status' => 'test'
        ];
        
        $contacts_file = 'contacts_received.json';
        $contacts = [];
        
        // Lecture des contacts existants
        if (file_exists($contacts_file)) {
            $contacts = json_decode(file_get_contents($contacts_file), true) ?: [];
        }
        
        // Ajout du nouveau contact
        $contacts[] = $contact_data;
        
        // Sauvegarde
        if (file_put_contents($contacts_file, json_encode($contacts, JSON_PRETTY_PRINT))) {
            echo "<p>✅ Contact sauvegardé avec succès</p>";
            echo "<p>Total contacts: " . count($contacts) . "</p>";
        } else {
            echo "<p>❌ Erreur lors de la sauvegarde</p>";
        }
    }
    
} else {
    echo "<h2>⚠ Aucune méthode POST reçue</h2>";
    echo "<p>Utilisez le formulaire ci-dessous pour tester</p>";
}
?>

<h2>Formulaire de test</h2>
<form method="POST" action="">
    <p>
        <label>Nom complet *: <br>
        <input type="text" name="name" value="Test User" required></label>
    </p>
    
    <p>
        <label>Email *: <br>
        <input type="email" name="email" value="test@example.com" required></label>
    </p>
    
    <p>
        <label>Sujet *: <br>
        <input type="text" name="subject" value="Test du formulaire" required></label>
    </p>
    
    <p>
        <label>Message *: <br>
        <textarea name="message" rows="4" required>Ceci est un message de test pour vérifier que le formulaire fonctionne correctement.</textarea></label>
    </p>
    
    <p>
        <button type="submit">Tester l'envoi</button>
    </p>
</form>

<hr>

<h2>Vérification des fichiers</h2>
<?php
$files_to_check = [
    'send_contact_simple.php' => 'Script d\'envoi simplifié',
    'contacts_received.json' => 'Fichier des contacts reçus',
    'contact_log.txt' => 'Log des emails envoyés'
];

foreach ($files_to_check as $file => $description) {
    if (file_exists($file)) {
        $size = filesize($file);
        $writable = is_writable($file) ? '✅ Écriture' : '❌ Lecture seule';
        echo "<p><strong>$file</strong> ($description): Existe ✅, Taille: $size octets, $writable</p>";
    } else {
        echo "<p><strong>$file</strong> ($description): ❌ N'existe pas</p>";
    }
}
?>

<hr>

<h2>Liens utiles</h2>
<ul>
    <li><a href="test_simple.php">Test Simple PHP</a></li>
    <li><a href="test_email.php">Test Email Complet</a></li>
    <li><a href="view_contacts.php">Voir les Contacts</a></li>
    <li><a href="contact-modern.php">Page de Contact</a></li>
</ul>
