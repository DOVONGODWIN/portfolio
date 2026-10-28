# Portfolio - Godwin Dovon

Portfolio de développeur full-stack : présentation, réalisations et formulaire de contact.

## Arborescence

```
.
├── index.php                 Accueil (parcours, compétences)
├── realisations.php          Réalisations, avec filtres par technologie
├── contact.php               Coordonnées et CV
├── .htaccess                 Redirections des anciennes adresses + fichiers protégés
├── includes/                 header.php, footer.php (communs à toutes les pages)
├── actions/                  send_contact.php (formulaire de contact)
├── assets/
│   ├── css/style.css
│   ├── documents/            CV en PDF
│   └── images/               logo, competences/, projets/, divers/
├── config.example.php        Modèle de configuration (copier en config.php)
├── data/                     Messages de contact enregistrés (non versionné, non servi)
└── projets/                  Démos des réalisations
    ├── restaurant/           Application PHP/MySQL avec PayPal
    ├── site-vitrine/         Site vitrine The Circle
    ├── calculateur-imc/      Calculateur d'IMC en PHP
    ├── todo-javascript/      Todo list en JavaScript natif
    └── todo-react/           Todo list React (app/ = sources, demo/ = version compilée)
```

Les anciennes adresses (`portfolio.php`, `projet.php`, `contact-modern.php`, `D1/`, `PARTIEL/`, `DEVOIR/`…) redirigent automatiquement vers les nouvelles (`.htaccess`, Apache).

## Installation

```bash
composer install
cp config.example.php config.php   # puis renseigner le mot de passe d'application Gmail
```

`config.php`, `data/` et `_prive/` sont ignorés par git : ils ne doivent jamais être commités.

Pour régénérer la démo React : `cd projets/todo-react/app && npm install && npm run build:demo`.
