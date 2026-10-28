<?php
if (!defined('APP_ROUTER')) { header('Location: ../index.php?page=temoignages'); exit; }

require_once __DIR__ . '/../includes/functions.php';

// Affichage des témoignages
$testimonials = get_approved_testimonials() ?: [];

$status_messages = [
    'success' => ['success-message', 'Merci ! Votre témoignage sera publié après validation.'],
    'invalid' => ['error-message', 'Veuillez saisir un commentaire et une note entre 1 et 5.'],
    'image'   => ['error-message', "L'image n'est pas valide (JPG, PNG, GIF ou WebP, 5 Mo maximum)."],
    'error'   => ['error-message', "Une erreur est survenue lors de l'ajout du témoignage."],
];
$status = $status_messages[$_GET['status'] ?? ''] ?? null;
?>

<section id="temoignage" class="temoignage">
    <div class="titre blanc">
        <h2 class="titre-text">Que Disent Nos <span>C</span>lients</h2>
        <p>Découvrez les expériences de nos clients satisfaits.</p>
    </div>
    <div class="contenu">
        <?php foreach ($testimonials as $testimonial): ?>
        <div class="box">
            <div class="imbox">
                <?php $image = get_user_image($testimonial['user_id']); ?>
                <?php if ($image && file_exists($image)): ?>
                    <img src="<?php echo e($image); ?>" alt="Photo de profil">
                <?php else: ?>
                    <img src="assets/images/icones/utilisateur.png" alt="Photo de profil">
                <?php endif; ?>
            </div>
            <div class="text">
                <p><?php echo e($testimonial['content']); ?></p>
                <div class="rating">
                    <?php
                    for ($i = 1; $i <= 5; $i++) {
                        echo $i <= $testimonial['rating'] ? '★' : '☆';
                    }
                    ?>
                </div>
                <h3><?php echo e(get_username($testimonial['user_id'])); ?></h3>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <?php if ($status): ?>
        <div class="<?php echo $status[0]; ?>"><?php echo e($status[1]); ?></div>
    <?php endif; ?>

    <?php if (isset($_SESSION['user_id'])): ?>
    <!-- Formulaire d'ajout de témoignage -->
    <div class="add-testimonial">
        <h3>Partagez votre expérience</h3>
        <form action="actions/add_testimonial.php" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="inputboite">
                <textarea name="content" placeholder="Votre commentaire" maxlength="2000" required></textarea>
            </div>
            <div class="inputboite">
                <select name="rating" required>
                    <option value="">Sélectionnez une note</option>
                    <option value="1">1 étoile</option>
                    <option value="2">2 étoiles</option>
                    <option value="3">3 étoiles</option>
                    <option value="4">4 étoiles</option>
                    <option value="5">5 étoiles</option>
                </select>
            </div>
            <div class="inputboite">
                <input type="file" name="image" accept="image/jpeg,image/png,image/gif,image/webp">
            </div>
            <div class="inputboite">
                <input type="submit" value="Ajouter votre témoignage">
            </div>
        </form>
    </div>
    <?php else: ?>
    <p><a href="index.php?page=login">Connectez-vous</a> pour laisser un témoignage.</p>
    <?php endif; ?>
</section>