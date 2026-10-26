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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
    <?php
    // Définition des pages autorisées avec leurs fichiers correspondants
    $allowed_pages = [
        'accueil' => 'accueil.php',
        'a-propos' => 'a-propos.php',
        'menu' => 'menu.php',
        'temoignages' => 'temoignages.php',
        'contact' => 'contact.php',
        'login' => 'login.php',
        'register' => 'register.php',
        'panier' => 'panier.php',
        'reservation' => 'reservation.php',
        'ajouter_produit' => 'ajouter_produit.php',
        'detail_produit' => 'detail_produit.php',
        'profile' => 'profile.php',
        'modifier_produit' => 'modifier_produit.php',
        'mes_commandes' => 'mes_commandes.php',
        'detail_commande' => 'detail_commande.php',
        'confirmation' => 'confirmation.php',
        'admin_dashboard' => 'admin_dashboard.php'
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
        include '404.php';
    }
    ?>
    </main>

    <?php include 'footer.php'; ?>

    <script src="js/script.js"></script>
</body>
</html>
<?php ob_end_flush(); ?>
