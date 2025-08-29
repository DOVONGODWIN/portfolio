<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Header Example</title>
  <link rel="stylesheet" href="gg.css">
</head>
<style>
   .header {
    background: rgba(255, 255, 255, 0.1);  /* transparence blanche */
  backdrop-filter: blur(10px);           /* effet de flou */
  -webkit-backdrop-filter: blur(10px);   /* compatibilité Safari */
  border-radius: 15px;
  border: 1px solid rgba(255, 255, 255, 0.2);
  box-shadow: 0 4px 30px rgba(0, 0, 0, 0.3);
  color: white;
    padding: 20px 40px;
    position: sticky;
    top: 0;
    z-index: 100;
  }
  
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
<body>
  <header class="header">
    <div class="container">
      <div class="logo">
        <a href="portfolio.php"><img src="Sans titre - 1_Plan de travail 1-02.png" alt="Logo"></a>
        <span>godwindovon@gmail.com</span>
      </div>
      <nav class="nav">
        <a href="portfolio.php">Accueil</a>
        <a href="projet.php">Réalisations</a>
      </nav>
      <div class="cta">
        <a href="contact-modern.php" class="btn">Contact</a>
      </div>
    </div>
  </header>