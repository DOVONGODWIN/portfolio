<?php
// En-tête commun : chaque page définit $pageTitle / $pageDescription avant d'inclure ce fichier
$pageTitle = $pageTitle ?? 'Godwin Dovon - Développeur Full-Stack';
$pageDescription = $pageDescription ?? 'Portfolio de Godwin Dovon, développeur full-stack et designer graphique : projets web, PHP, React, WordPress et maquettes Figma.';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($pageTitle); ?></title>
  <meta name="description" content="<?php echo htmlspecialchars($pageDescription); ?>">
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?php echo htmlspecialchars($pageTitle); ?>">
  <meta property="og:description" content="<?php echo htmlspecialchars($pageDescription); ?>">
  <meta property="og:image" content="assets/images/logo.png">
  <link rel="icon" type="image/png" href="assets/images/logo.png">
  <link rel="stylesheet" href="assets/css/style.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <style>
  /* === Responsive Tablette (≤ 1024px) === */
  @media screen and (max-width: 1024px) {
    .container {
      flex-direction: column;
      align-items: flex-start;
      gap: 15px;
    }

    .nav {
      justify-content: flex-start;
      flex-wrap: wrap;
      gap: 15px;
    }

    .cta {
      align-self: flex-start;
    }
  }

  /* === Responsive Mobile (≤ 768px) === */
  @media screen and (max-width: 768px) {
    .container {
      flex-direction: column;
      align-items: center;
      text-align: center;
      gap: 20px;
    }

    .logo {
      flex-direction: column;
      gap: 5px;
    }

    .logo span {
      font-size: 14px;
      word-break: break-word;
    }

    .nav {
      flex-direction: column;
      align-items: center;
      gap: 10px;
    }

    .nav a {
      font-size: 16px;
    }

    .cta {
      width: 100%;
      display: flex;
      justify-content: center;
    }

    .btn {
      width: 80%;
      text-align: center;
    }
  }
  </style>
</head>
<body>
  <header class="header">
    <div class="container">
      <div class="logo">
        <a href="./"><img src="assets/images/logo.png" alt="Logo Godwin Dovon"></a>
        <span>godwindovon@gmail.com</span>
      </div>
      <nav class="nav">
        <a href="./">Accueil</a>
        <a href="realisations.php">Réalisations</a>
      </nav>
      <div class="cta">
        <a href="contact.php" class="btn">Contact</a>
      </div>
    </div>
  </header>
