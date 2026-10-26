<?php
// En-tête commun : chaque page définit $pageTitle (et éventuellement $extraHead) avant d'inclure ce fichier
$pageTitle = isset($pageTitle) ? $pageTitle . ' - The Circle' : 'The Circle - Conciergerie de luxe';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
    <meta name="description" content="The Circle, conciergerie de luxe en Provence-Alpes-Côte d'Azur : location de voitures, bateaux, villas et activités d'exception.">
    <link rel="icon" type="image/png" href="assets/images/logos/logo-the-circle.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+4:ital,opsz,wght@0,8..60,200..900;1,8..60,200..900&display=swap" rel="stylesheet">
    <?php echo $extraHead ?? ''; ?>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header class="AAA">
        <div class="logo">
            <div class="lll">
                <a href="./"><img class="img" src="assets/images/logos/logo-the-circle-blanc.png" alt="The Circle - accueil"></a>
            </div>
        </div>
        <div class="menu">
            <ul>
                <li><a href="services.php">NOS SERVICES</a></li>
                <li><a href="contact.php">CONTACT</a></li>
                <li><a href="qui-sommes-nous.php">QUI SOMMES-NOUS</a></li>
            </ul>
        </div>
    </header>
