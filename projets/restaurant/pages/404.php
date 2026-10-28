<?php if (!defined('APP_ROUTER')) { header('Location: ../index.php'); exit; } ?>
<?php http_response_code(404); ?>
<section class="erreur-404" style="padding: 20vh 20px; text-align: center;">
    <h1>Page introuvable</h1>
    <p>La page demandée n'existe pas ou a été déplacée.</p>
    <a href="index.php" class="btn">Retour à l'accueil</a>
</section>
