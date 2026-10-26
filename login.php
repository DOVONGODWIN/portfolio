<?php if (!defined('APP_ROUTER')) { header('Location: index.php?page=login'); exit; } ?>
<div class="auth-container">
    <div class="login">
        <h2>Connexion</h2>
        <?php flash_messages(); ?>
        <form action="login_process.php" method="post">
            <?php echo csrf_field(); ?>
            <div class="inputboite">
                <input type="text" name="username" autocomplete="username" required>
                <label>Nom d'utilisateur</label>
            </div>
            <div class="inputboite">
                <input type="password" name="password" autocomplete="current-password" required>
                <label>Mot de passe</label>
            </div>
            <input type="submit" value="Se connecter">
        </form>
        <div class="auth-switch">
            Pas encore de compte ? <a href="index.php?page=register">S'inscrire</a>
        </div>
    </div>
</div>