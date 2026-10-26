<?php
if (!defined('APP_ROUTER')) { header('Location: index.php?page=profile'); exit; }

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php?page=login');
    exit();
}

if (isset($_GET['message']) && $_GET['message'] == 'complete_info') {
    $info_message = "Veuillez compléter votre adresse et votre numéro de téléphone pour pouvoir passer une commande.";
}

$user_id = $_SESSION['user_id'];
$user = get_user_info($user_id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_csrf();

    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $address = trim($_POST['address'] ?? '');

    if (!preg_match('/^[\p{L}0-9._-]{3,50}$/u', $username)) {
        $error_message = "Le nom d'utilisateur doit contenir 3 à 50 caractères (lettres, chiffres, . _ -).";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "L'adresse email n'est pas valide.";
    } elseif ($phone !== '' && !preg_match('/^[0-9 +().-]{6,30}$/', $phone)) {
        $error_message = "Le numéro de téléphone n'est pas valide.";
    } elseif (mb_strlen($address) > 255) {
        $error_message = "L'adresse est trop longue.";
    } elseif (update_user_info($user_id, $username, $email, $phone, $address)) {
        $_SESSION['username'] = $username;
        $success_message = "Profil mis à jour avec succès !";
        $user = get_user_info($user_id); // Recharger les infos utilisateur
    } else {
        $error_message = "Une erreur est survenue (ce nom d'utilisateur ou cet email est peut-être déjà utilisé).";
    }
}
?>

<section class="profile">
    <div class="profile-container">
    <h2>Profil de <?php echo e($user['username']); ?></h2>
        
        <?php if (isset($info_message)): ?>
            <div class="info-message"><?php echo e($info_message); ?></div>
        <?php endif; ?>
        
        <?php if (isset($success_message)): ?>
            <div class="success-message"><?php echo e($success_message); ?></div>
        <?php endif; ?>
        
        <?php if (isset($error_message)): ?>
            <div class="error-message"><?php echo e($error_message); ?></div>
        <?php endif; ?>

        <form action="index.php?page=profile" method="post">
            <?php echo csrf_field(); ?>
            <div class="inputboite">
                <input type="text" id="username" name="username" value="<?php echo e($user['username']); ?>" required>
                <label for="username">Nom d'utilisateur</label>
            </div>
            <div class="inputboite">
                <input type="email" id="email" name="email" value="<?php echo e($user['email']); ?>" required>
                <label for="email">Email</label>
            </div>
            <div class="inputboite">
                <input type="tel" id="phone" name="phone" value="<?php echo e($user['phone'] ?? ''); ?>">
                <label for="phone">Téléphone</label>
            </div>
            <div class="inputboite">
                <textarea id="address" name="address"><?php echo e($user['address'] ?? ''); ?></textarea>
                <label for="address">Adresse</label>
            </div>
            <button type="submit">Mettre à jour le profil</button>
        </form>
    </div>
</section>