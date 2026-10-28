<?php
// Chargement des fonctions testées (aucune connexion à la base n'est ouverte au chargement)
require_once dirname(__DIR__) . '/vendor/autoload.php';

$_SESSION = [];

require_once dirname(__DIR__) . '/projets/restaurant/includes/functions.php';
require_once dirname(__DIR__) . '/projets/restaurant/includes/cart_functions.php';
