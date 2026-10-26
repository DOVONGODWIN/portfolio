<?php if (!defined('APP_ROUTER')) { header('Location: ../index.php?page=register'); exit; } ?>
<div class="auth-container">
    <div class="register">
        <h2>Inscription</h2>
        <?php flash_messages(); ?>
        <form action="actions/register_process.php" method="post">
            <?php echo csrf_field(); ?>
            <div class="inputboite">
                <input type="text" name="username" required>
                <label>Nom d'utilisateur</label>
            </div>
            <div class="inputboite">
                <input type="email" name="email" required>
                <label>Email</label>
            </div>
            <div class="inputboite">
                <input type="password" name="password" autocomplete="new-password" minlength="8" required>
                <label>Mot de passe</label>
            </div>
            <div class="inputboite">
                <input type="password" name="confirm_password" autocomplete="new-password" minlength="8" required>
                <label>Confirmer le mot de passe</label>
            </div>
            <input type="submit" value="S'inscrire">
        </form>
        <div class="auth-switch">
            Déjà un compte ? <a href="index.php?page=login">Se connecter</a>
        </div>
    </div>
</div>
