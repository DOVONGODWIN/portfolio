<?php if (!defined('APP_ROUTER')) { header('Location: ../index.php?page=contact'); exit; } ?>
<section id="contact" class="contact">
    <div class="titre noir">
        <h2 class="titre-text"><span>C</span>ontact</h2>
        <p>Nous sommes à votre écoute. N'hésitez pas à nous contacter.</p>
    </div>
    <div class="contactform">
        <h3>Envoyer un message</h3>
        <?php flash_messages(); ?>
        <form action="actions/send_message.php" method="post">
            <?php echo csrf_field(); ?>
            <div class="inputboite">
                <input type="text" name="name" placeholder="Nom" maxlength="100" required>
            </div>
            <div class="inputboite">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="inputboite">
                <textarea name="message" placeholder="Message" maxlength="5000" required></textarea>
            </div>
            <div class="inputboite">
                <input type="submit" value="Envoyer">
            </div>
        </form>
    </div>
</section>