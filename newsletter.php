<?php
$pageTitle = 'Newsletter';
include __DIR__ . '/includes/header.php';
?>
<div class="newsletter-container">
        <h2>Abonnez-vous à notre Newsletter</h2>
        <p>Recevez les dernières nouvelles et mises à jour directement dans votre boîte mail.</p>
        <form action="#" method="POST">
            <input type="email" name="email" placeholder="Entrez votre email" required>
            <button type="submit">S'abonner</button>
        </form>
        <p class="privacy-text">Nous respectons votre vie privée. Aucun spam.</p>
    </div>

<?php include __DIR__ . '/includes/footer.php'; ?>
