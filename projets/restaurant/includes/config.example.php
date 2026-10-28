<?php
// Modèle de configuration : copier ce fichier en includes/config.php et renseigner les vraies valeurs.
// includes/config.php est ignoré par git : ne jamais y committer d'identifiants.
return [
    'db' => [
        'host'     => 'localhost',
        'user'     => 'resto_app',
        'password' => '',
        'name'     => 'resto_db',
    ],

    // Identifiants PayPal (https://developer.paypal.com/dashboard/applications)
    'paypal' => [
        'client_id' => '',
        'secret'    => '',
        // https://api-m.sandbox.paypal.com en test, https://api-m.paypal.com en production
        'api_base'  => 'https://api-m.sandbox.paypal.com',
        'currency'  => 'EUR',
    ],

    // false en production : les erreurs sont journalisées mais jamais affichées
    'debug' => false,
];
