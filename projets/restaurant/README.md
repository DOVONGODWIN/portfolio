# Resto - application de restaurant (PHP / MySQL)

Menu en ligne, panier, paiement PayPal, réservations, témoignages clients et tableau de bord d'administration.

## Arborescence

| Dossier | Contenu |
|---|---|
| `index.php` | Routeur : affiche la page demandée (`index.php?page=menu`, `?page=panier`…) |
| `pages/` | Contenu des pages, inclus par le routeur (inaccessibles directement) |
| `actions/` | Traitements de formulaires et appels AJAX (connexion, panier, paiement…) |
| `includes/` | Configuration, connexion BDD, fonctions, en-tête et pied de page |
| `assets/` | CSS, JavaScript, icônes et images de fond |
| `uploads/` | Images des plats (`plats/`) et photos de profil (`profils/`) |
| `database/` | Schéma SQL et migrations |
| `scripts/` | Outils en ligne de commande |

## Installation

1. Importer la base : `mysql -u root -p < database/resto_db.sql`
   Base existante créée avec une ancienne version : exécuter les fichiers de `database/migrations/` dans l'ordre.
2. Copier `includes/config.example.php` en `includes/config.php` et renseigner les accès MySQL et PayPal.
3. Créer un administrateur : `php scripts/create_admin.php <nom_utilisateur> <email>`
4. Ouvrir `index.php`.

`includes/config.php` est ignoré par git : ne jamais y committer d'identifiants.

## Sécurité

- Requêtes préparées partout, échappement des sorties (`e()`)
- Jeton CSRF sur tous les formulaires et appels AJAX
- Montant du paiement recalculé côté serveur, vérifié à la capture PayPal
- Images envoyées validées sur leur contenu, renommées aléatoirement, exécution de scripts bloquée dans `uploads/`
- Limitation des tentatives de connexion, régénération de session à la connexion
