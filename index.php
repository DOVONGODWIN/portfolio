<?php
// Tampon de sortie : les pages incluses peuvent encore faire des redirections (header Location)
ob_start();

// Les fichiers de pages vérifient cette constante pour refuser l'accès direct
define('APP_ROUTER', true);

require_once 'includes/functions.php';
start_session();
require_once 'includes/cart_functions.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo csrf_token(); ?>">
    <title>Resto.</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main>
    <?php
    // Définition des pages autorisées avec leurs fichiers correspondants
    $allowed_pages = [
        'accueil' => 'pages/accueil.php',
        'a-propos' => 'pages/a-propos.php',
        'menu' => 'pages/menu.php',
        'temoignages' => 'pages/temoignages.php',
        'contact' => 'pages/contact.php',
        'login' => 'pages/login.php',
        'register' => 'pages/register.php',
        'panier' => 'pages/panier.php',
        'reservation' => 'pages/reservation.php',
        'ajouter_produit' => 'pages/ajouter_produit.php',
        'detail_produit' => 'pages/detail_produit.php',
        'profile' => 'pages/profile.php',
        'modifier_produit' => 'pages/modifier_produit.php',
        'mes_commandes' => 'pages/mes_commandes.php',
        'detail_commande' => 'pages/detail_commande.php',
        'confirmation' => 'pages/confirmation.php',
        'admin_dashboard' => 'pages/admin_dashboard.php'
    ];

    // Pages réservées aux utilisateurs connectés / aux administrateurs
    $login_required = ['panier', 'profile', 'mes_commandes', 'detail_commande', 'confirmation', 'reservation'];
    $admin_required = ['ajouter_produit', 'modifier_produit', 'admin_dashboard'];

    // Récupération de la page demandée, avec 'accueil' comme valeur par défaut
    $page = $_GET['page'] ?? 'accueil';
    if (!is_string($page) || !array_key_exists($page, $allowed_pages)) {
        $page = 'accueil';
    }

    $user_id = $_SESSION['user_id'] ?? null;

    if (in_array($page, $admin_required, true) && (!$user_id || !is_admin($user_id))) {
        $page = 'accueil';
    } elseif (in_array($page, $login_required, true) && !$user_id) {
        $page = 'login';
    } elseif ($page === 'detail_produit' && !ctype_digit((string) ($_GET['id'] ?? ''))) {
        $page = 'menu';
    } elseif ($page === 'detail_commande'
        && (!ctype_digit((string) ($_GET['id'] ?? '')) || !can_view_order($user_id, (int) $_GET['id']))) {
        $page = 'mes_commandes';
    } elseif ($page === 'confirmation' && !ctype_digit((string) ($_GET['order_id'] ?? ''))) {
        $page = 'accueil';
    }

    if (file_exists($allowed_pages[$page])) {
        include $allowed_pages[$page];
    } else {
        include 'pages/404.php';
    }
    ?>
    </main>

    <?php include 'includes/footer.php'; ?>

    <script src="assets/js/script.js"></script>
</body>
</html>
<?php ob_end_flush(); ?>
