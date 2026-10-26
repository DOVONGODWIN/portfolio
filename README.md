# Resto - application de restaurant (PHP / MySQL)

Menu en ligne, panier, paiement PayPal, réservations, témoignages clients et tableau de bord d'administration.

## Installation

1. Importer la base : `mysql -u root -p < resto_db.sql`
   (base existante créée avec une ancienne version : `mysql -u root -p resto_db < migrations/2026-10-securite.sql`)
2. Copier `includes/config.example.php` en `includes/config.php` et renseigner les accès MySQL et PayPal.
3. Créer un administrateur : `php create_admin.php <nom_utilisateur> <email>`
4. Ouvrir `index.php`.

`includes/config.php` est ignoré par git : ne jamais y committer d'identifiants.

## Sécurité

- Requêtes préparées partout, échappement des sorties (`e()`)
- Jeton CSRF sur tous les formulaires et appels AJAX
- Montant du paiement recalculé côté serveur, vérifié à la capture PayPal
- Images envoyées validées sur leur contenu et renommées aléatoirement
- Limitation des tentatives de connexion, régénération de session à la connexion
