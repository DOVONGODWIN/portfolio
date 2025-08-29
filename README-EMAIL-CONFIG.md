# Configuration Email - Portfolio Contact

## Problème identifié
Votre formulaire de contact ne fonctionne pas car XAMPP n'a pas de serveur SMTP configuré par défaut. La fonction PHP `mail()` nécessite un serveur SMTP fonctionnel.

## Solutions disponibles

### Solution 1 : Configuration SMTP avec PHPMailer (Recommandée)

#### Étape 1 : Installation de Composer et PHPMailer
```bash
# Dans votre dossier portfolio, exécutez :
composer install
```

#### Étape 2 : Configuration Gmail SMTP
1. **Activez l'authentification à 2 facteurs** sur votre compte Gmail
2. **Générez un mot de passe d'application** :
   - Allez dans les paramètres de votre compte Google
   - Sécurité → Authentification à 2 facteurs
   - Mots de passe d'application → Générer
3. **Modifiez le fichier `send_contact_phpmailer.php`** :
   - Remplacez `VOTRE_MOT_DE_PASSE_APP` par votre mot de passe d'application
   - Vérifiez que l'email est correct : `godwindovon@gmail.com`

#### Étape 3 : Test de la configuration
1. Ouvrez `test_email.php` dans votre navigateur
2. Vérifiez que tous les tests passent
3. Testez l'envoi d'un email réel

### Solution 2 : Configuration XAMPP SMTP (Alternative)

#### Étape 1 : Configuration php.ini
1. Ouvrez `C:\xampp\php\php.ini`
2. Trouvez la section `[mail function]`
3. Configurez :
```ini
[mail function]
SMTP = smtp.gmail.com
smtp_port = 587
sendmail_from = godwindovon@gmail.com
sendmail_path = "\"C:\xampp\sendmail\sendmail.exe\" -t"
```

#### Étape 2 : Configuration sendmail
1. Ouvrez `C:\xampp\sendmail\sendmail.ini`
2. Configurez :
```ini
[sendmail]
smtp_server=smtp.gmail.com
smtp_port=587
error_logfile=error.log
debug_logfile=debug.log
auth_username=godwindovon@gmail.com
auth_password=VOTRE_MOT_DE_PASSE_APP
force_sender=godwindovon@gmail.com
hostname=localhost
```

### Solution 3 : Utilisation d'un service externe (Simple)

#### Option A : Formspree
1. Allez sur [formspree.io](https://formspree.io)
2. Créez un compte gratuit
3. Remplacez l'action du formulaire dans `contact-modern.php` :
```html
<form class="contact-form" id="contactForm" action="https://formspree.io/f/VOTRE_ID" method="POST">
```

#### Option B : Netlify Forms
1. Déployez votre portfolio sur Netlify
2. Ajoutez `data-netlify="true"` à votre formulaire
3. Les emails seront automatiquement gérés

## Fichiers créés/modifiés

### Nouveaux fichiers :
- `composer.json` - Configuration des dépendances
- `send_contact_phpmailer.php` - Version PHPMailer du script d'envoi
- `test_email.php` - Diagnostic des problèmes d'email
- `README-EMAIL-CONFIG.md` - Ce fichier d'instructions

### Fichiers modifiés :
- `send_contact.php` - Version améliorée avec fallback

## Test et diagnostic

### Test rapide :
1. Ouvrez `test_email.php` dans votre navigateur
2. Vérifiez les résultats de chaque test
3. Identifiez les problèmes spécifiques

### Logs et monitoring :
- `contact_log.txt` - Historique des emails envoyés
- `pending_emails.json` - Emails en attente (si échec d'envoi)

## Dépannage courant

### Erreur "SMTP connect() failed"
- Vérifiez vos identifiants Gmail
- Assurez-vous que l'authentification à 2 facteurs est activée
- Vérifiez que le mot de passe d'application est correct

### Erreur "Permission denied"
- Vérifiez les permissions des dossiers
- Assurez-vous que PHP peut écrire dans le répertoire

### Emails non reçus
- Vérifiez le dossier spam
- Testez avec `test_email.php`
- Consultez les logs d'erreur

## Support
Si vous rencontrez des problèmes :
1. Consultez `test_email.php` pour le diagnostic
2. Vérifiez les logs d'erreur
3. Testez avec un email simple
4. Vérifiez la configuration SMTP

## Sécurité
- Ne partagez jamais vos mots de passe d'application
- Utilisez HTTPS en production
- Validez toujours les données d'entrée
- Limitez le taux d'envoi d'emails
