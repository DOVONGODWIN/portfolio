<?php
// Fichier de visualisation des contacts reçus
$contacts_file = 'contacts_received.json';
$contacts = [];

if (file_exists($contacts_file)) {
    $contacts = json_decode(file_get_contents($contacts_file), true) ?: [];
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts Reçus - Portfolio</title>
    <style>
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #0f0f23 0%, #1a1a2e 50%, #16213e 100%);
            color: #ffffff;
            margin: 0;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #6366f1;
        }
        
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .stat-number {
            font-size: 2em;
            font-weight: bold;
            color: #6366f1;
        }
        
        .contacts-list {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 20px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .contact-item {
            background: rgba(255, 255, 255, 0.05);
            margin-bottom: 15px;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #6366f1;
        }
        
        .contact-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        
        .contact-name {
            font-weight: bold;
            color: #6366f1;
        }
        
        .contact-timestamp {
            font-size: 0.9em;
            color: #a1a1aa;
        }
        
        .contact-email {
            color: #10b981;
            margin-bottom: 10px;
        }
        
        .contact-subject {
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        .contact-message {
            background: rgba(0, 0, 0, 0.3);
            padding: 15px;
            border-radius: 5px;
            white-space: pre-wrap;
        }
        
        .no-contacts {
            text-align: center;
            padding: 40px;
            color: #a1a1aa;
        }
        
        .actions {
            text-align: center;
            margin-top: 20px;
        }
        
        .btn {
            background: #6366f1;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin: 0 10px;
        }
        
        .btn:hover {
            background: #4f46e5;
        }
        
        .btn-danger {
            background: #ef4444;
        }
        
        .btn-danger:hover {
            background: #dc2626;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📧 Contacts Reçus - Portfolio</h1>
        
        <div class="stats">
            <div class="stat-card">
                <div class="stat-number"><?php echo count($contacts); ?></div>
                <div>Total Contacts</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php echo count(array_filter($contacts, function($c) { return $c['status'] === 'new'; })); ?></div>
                <div>Nouveaux</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php echo count(array_filter($contacts, function($c) { return $c['status'] === 'read'; })); ?></div>
                <div>Lus</div>
            </div>
        </div>
        
        <div class="contacts-list">
            <?php if (empty($contacts)): ?>
                <div class="no-contacts">
                    <h3>Aucun contact reçu pour le moment</h3>
                    <p>Les messages envoyés via le formulaire de contact apparaîtront ici.</p>
                </div>
            <?php else: ?>
                <?php foreach (array_reverse($contacts) as $index => $contact): ?>
                    <div class="contact-item">
                        <div class="contact-header">
                            <div class="contact-name"><?php echo htmlspecialchars($contact['name']); ?></div>
                            <div class="contact-timestamp"><?php echo $contact['timestamp']; ?></div>
                        </div>
                        <div class="contact-email">📧 <?php echo htmlspecialchars($contact['email']); ?></div>
                        <div class="contact-subject">📝 <?php echo htmlspecialchars($contact['subject']); ?></div>
                        <div class="contact-message"><?php echo htmlspecialchars($contact['message']); ?></div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        
        <div class="actions">
            <a href="contact-modern.php" class="btn">Retour au Contact</a>
            <a href="portfolio.php" class="btn">Accueil Portfolio</a>
            <?php if (!empty($contacts)): ?>
                <button onclick="clearContacts()" class="btn btn-danger">Effacer Tous les Contacts</button>
            <?php endif; ?>
        </div>
    </div>
    
    <script>
        function clearContacts() {
            if (confirm('Êtes-vous sûr de vouloir effacer tous les contacts ? Cette action est irréversible.')) {
                fetch('clear_contacts.php', {
                    method: 'POST'
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert('Erreur lors de l\'effacement des contacts');
                    }
                })
                .catch(error => {
                    console.error('Erreur:', error);
                    alert('Erreur lors de l\'effacement des contacts');
                });
            }
        }
    </script>
</body>
</html>
