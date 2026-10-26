<?php
// Modèle de configuration : copier ce fichier en config.php puis renseigner les vraies valeurs.
// config.php est ignoré par git, ne jamais y committer d'identifiants.
return [
    'mail_to'   => 'godwindovon@gmail.com',
    'mail_from' => 'godwindovon@gmail.com',

    // Pour Gmail : activer la double authentification puis générer un "mot de passe d'application"
    // (https://myaccount.google.com/apppasswords). Laisser 'password' vide désactive l'envoi SMTP :
    // les messages sont alors seulement enregistrés dans data/contacts.json.
    'smtp' => [
        'host'     => 'smtp.gmail.com',
        'port'     => 587,
        'username' => 'godwindovon@gmail.com',
        'password' => '',
    ],
];
