<?php
require_once __DIR__ . '/db.php';

/**
 * Démarre la session avec des cookies sécurisés (HttpOnly, SameSite)
 */
function start_session() {
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params([
            'httponly' => true,
            'samesite' => 'Lax',
            'secure'   => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
        ]);
        session_start();
    }
}

/**
 * Échappe une valeur pour l'afficher dans du HTML
 */
function e($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

/**
 * Formate un montant en euros
 */
function format_price($amount) {
    return number_format((float) $amount, 2, ',', ' ') . ' €';
}

/**
 * Affiche puis efface les messages de succès / d'erreur stockés en session
 */
function flash_messages() {
    foreach (['success' => 'success-message', 'error' => 'error-message'] as $key => $class) {
        if (!empty($_SESSION[$key])) {
            echo '<div class="' . $class . '">' . e($_SESSION[$key]) . '</div>';
            unset($_SESSION[$key]);
        }
    }
}

/**
 * Jeton anti-CSRF de la session
 */
function csrf_token() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Champ caché à placer dans chaque formulaire POST
 */
function csrf_field() {
    return '<input type="hidden" name="csrf_token" value="' . csrf_token() . '">';
}

/**
 * Vérifie le jeton envoyé en POST ou dans l'en-tête X-CSRF-Token (requêtes fetch)
 */
function csrf_is_valid() {
    $token = $_POST['csrf_token'] ?? $_SERVER['HTTP_X_CSRF_TOKEN'] ?? '';
    return is_string($token) && !empty($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * Interrompt la requête si le jeton CSRF est absent ou invalide
 *
 * @param bool $json Répondre en JSON (endpoints appelés en fetch)
 */
function require_csrf($json = false) {
    if (csrf_is_valid()) {
        return;
    }
    http_response_code(403);
    if ($json) {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['success' => false, 'message' => 'Jeton de sécurité invalide. Rechargez la page.']);
    } else {
        echo "Jeton de sécurité invalide. Rechargez la page et réessayez.";
    }
    exit;
}

/**
 * Enregistre un fichier image envoyé par formulaire sous un nom aléatoire
 *
 * Le type est vérifié sur le contenu réel du fichier (et non sur le nom ou le type MIME envoyés par le navigateur).
 *
 * @param array $file Entrée de $_FILES
 * @param string $dir Dossier de destination (relatif à la racine de l'application)
 * @return string Chemin relatif de l'image enregistrée
 * @throws RuntimeException Si le fichier est invalide
 */
function save_uploaded_image($file, $dir) {
    if (!isset($file['error']) || $file['error'] !== UPLOAD_ERR_OK) {
        throw new RuntimeException("Le téléchargement de l'image a échoué.");
    }
    if ($file['size'] > 5 * 1024 * 1024) {
        throw new RuntimeException("L'image dépasse la taille maximale de 5 Mo.");
    }

    $extensions = [IMAGETYPE_JPEG => 'jpg', IMAGETYPE_PNG => 'png', IMAGETYPE_GIF => 'gif', IMAGETYPE_WEBP => 'webp'];
    $info = @getimagesize($file['tmp_name']);
    if ($info === false || !isset($extensions[$info[2]])) {
        throw new RuntimeException("Format d'image non autorisé (JPG, PNG, GIF ou WebP uniquement).");
    }

    $dir = rtrim($dir, '/');
    $absolute_dir = dirname(__DIR__) . '/' . $dir;
    if (!is_dir($absolute_dir)) {
        mkdir($absolute_dir, 0755, true);
    }

    $filename = bin2hex(random_bytes(16)) . '.' . $extensions[$info[2]];
    if (!move_uploaded_file($file['tmp_name'], $absolute_dir . '/' . $filename)) {
        throw new RuntimeException("Impossible d'enregistrer l'image.");
    }

    return $dir . '/' . $filename;
}

/**
 * Fonction pour récupérer tous les éléments du menu
 *
 * @param string $search Terme de recherche optionnel
 * @param float|null $min_price Prix minimum optionnel
 * @param float|null $max_price Prix maximum optionnel
 * @param string $sort Critère de tri (par défaut 'name')
 * @param string $category Catégorie optionnelle
 * @return array|false Retourne un tableau d'éléments du menu ou false en cas d'échec
 */
function get_menu_items($search = '', $min_price = null, $max_price = null, $sort = 'name', $category = '') {
    $connx = connexionDB();
    
    $sql = "SELECT * FROM menu_items WHERE 1=1";
    $types = '';
    $params = [];
    
    if (!empty($search)) {
        $sql .= " AND (name LIKE ? OR description LIKE ?)";
        $types .= 'ss';
        $search_param = "%$search%";
        $params[] = &$search_param;
        $params[] = &$search_param;
    }
    
    if (!empty($min_price)) {
        $sql .= " AND price >= ?";
        $types .= 'd';
        $params[] = &$min_price;
    }
    
    if (!empty($max_price)) {
        $sql .= " AND price <= ?";
        $types .= 'd';
        $params[] = &$max_price;
    }

    if (!empty($category)) {
        $sql .= " AND category = ?";
        $types .= 's';
        $params[] = &$category;
    }

    switch ($sort) {
        case 'price_asc':
            $sql .= " ORDER BY price ASC";
            break;
        case 'price_desc':
            $sql .= " ORDER BY price DESC";
            break;
        case 'popularity':
            $sql .= " ORDER BY popularity DESC";
            break;
        default:
            $sql .= " ORDER BY name ASC";
    }
    
    $stmt = mysqli_prepare($connx, $sql);
    
    if (!empty($params)) {
        mysqli_stmt_bind_param($stmt, $types, ...$params);
    }
    
    $result = mysqli_stmt_execute($stmt);
    
    if ($result) {
        $resultData = mysqli_stmt_get_result($stmt);
        $items = mysqli_fetch_all($resultData, MYSQLI_ASSOC);
        mysqli_stmt_close($stmt);
        mysqli_close($connx);
        return $items;
    } else {
        mysqli_stmt_close($stmt);
        mysqli_close($connx);
        return false;
    }
}

/**
 * Récupère toutes les catégories uniques des éléments du menu
 *
 * @return array Tableau contenant toutes les catégories uniques
 */
function get_all_categories() {
    $connx = connexionDB();
    
    $sql = "SELECT DISTINCT category FROM menu_items WHERE category IS NOT NULL AND category != '' ORDER BY category";
    $result = mysqli_query($connx, $sql);
    
    $categories = array();
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $categories[] = $row['category'];
        }
        mysqli_free_result($result);
    }
    
    mysqli_close($connx);
    
    return $categories;
}

/**
 * Fonction pour mettre à jour un produit
 *
 * @param int $id ID du produit
 * @param string $name Nouveau nom du produit
 * @param string $description Nouvelle description du produit
 * @param float $price Nouveau prix du produit
 * @param string $image Nouvelle image du produit
 * @param string $category Nouvelle catégorie du produit
 * @return bool Retourne true en cas de succès, sinon false
 */
function update_product($id, $name, $description, $price, $image, $category) {
    $connx = connexionDB();
    
    $sql = "UPDATE menu_items SET name = ?, description = ?, price = ?, image = ?, category = ? WHERE id = ?";
    $stmt = mysqli_prepare($connx, $sql);
    mysqli_stmt_bind_param($stmt, 'ssdssi', $name, $description, $price, $image, $category, $id);
    
    $result = mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);
    mysqli_close($connx);
    
    return $result;
}

/**
 * Fonction pour récupérer tous les témoignages
 *
 * @return array|false Retourne un tableau de témoignages ou false en cas d'échec
 */
function get_testimonials() {
    $connx = connexionDB();
    
    $sql = "SELECT * FROM testimonials";
    $result = mysqli_query($connx, $sql);
    
    if ($result) {
        $testimonials = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($connx);
        return $testimonials;
    } else {
        mysqli_close($connx);
        return false;
    }
}
/**
 * Fonction pour récupérer tous les témoignages
 */

 function get_all_testimonials() {
    $connx = connexionDB();
    
    $sql = "SELECT * FROM testimonials ORDER BY created_at DESC";
    $result = mysqli_query($connx, $sql);
    
    if ($result) {
        $testimonials = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($connx);
        return $testimonials;
    } else {
        mysqli_close($connx);
        return false;
    }
}


/**
 * Fonction pour récupérer les détails d'un produit spécifique
 *
 * @param int $product_id ID du produit
 * @return array|false Retourne les détails du produit ou false en cas d'échec
 */
function get_product_details($product_id) {
    $connx = connexionDB();
    
    $sql = "SELECT * FROM menu_items WHERE id = ?";
    $stmt = mysqli_prepare($connx, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $product_id);
    
    $result = mysqli_stmt_execute($stmt);
    
    if ($result) {
        $resultData = mysqli_stmt_get_result($stmt);
        $product = mysqli_fetch_assoc($resultData);
        mysqli_stmt_close($stmt);
        mysqli_close($connx);
        return $product;
    } else {
        mysqli_stmt_close($stmt);
        mysqli_close($connx);
        return false;
    }
}

/**
 * Fonction pour calculer le total du panier
 *
 * @param array $cart_items Tableau d'articles du panier
 * @return float Le total du panier
 */
function calculate_cart_total($cart_items) {
    $total = 0;
    foreach ($cart_items as $item) {
        $total += $item['price'] * $item['quantity'];
    }
    return round($total, 2);
}

/**
 * Construit le détail du panier à partir de la session, avec les prix lus en base
 *
 * Les prix ne viennent jamais du navigateur : seul l'identifiant et la quantité sont stockés en session.
 *
 * @param array $cart Panier de session [id_produit => quantité]
 * @return array Liste d'articles (id, name, price, quantity)
 */
function get_cart_items($cart) {
    $items = [];
    foreach ($cart as $product_id => $quantity) {
        $product = get_product_details((int) $product_id);
        if ($product && $quantity > 0) {
            $items[] = [
                'id' => (int) $product_id,
                'name' => $product['name'],
                'price' => (float) $product['price'],
                'quantity' => (int) $quantity,
            ];
        }
    }
    return $items;
}

/**
 * Fonction pour vérifier si un utilisateur est administrateur
 *
 * @param int $user_id ID de l'utilisateur
 * @return bool Retourne true si l'utilisateur est admin, sinon false
 */
function is_admin($user_id) {
    $connx = connexionDB();
    
    $sql = "SELECT role FROM users WHERE id = ?";
    $stmt = mysqli_prepare($connx, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $user_id);
    
    $result = mysqli_stmt_execute($stmt);
    
    if ($result) {
        $resultData = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($resultData);
        mysqli_stmt_close($stmt);
        mysqli_close($connx);
        return $user && $user['role'] == 'admin';
    } else {
        mysqli_stmt_close($stmt);
        mysqli_close($connx);
        return false;
    }
}


/**
 * Vérifie si l'utilisateur a une adresse et un numéro de téléphone
 *
 * @param int $user_id ID de l'utilisateur
 * @return bool Retourne true si l'utilisateur a une adresse et un numéro de téléphone, sinon false
 */
function user_has_address_and_phone($user_id) {
    $connx = connexionDB();
    
    $sql = "SELECT phone, address FROM users WHERE id = ?";
    $stmt = mysqli_prepare($connx, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);
    
    mysqli_stmt_close($stmt);
    mysqli_close($connx);
    
    return !empty($user['phone']) && !empty($user['address']);
}
/**
 * Fonction pour récupérer les informations d'un utilisateur
 *
 * @param int $user_id ID de l'utilisateur
 * @return array|false Retourne les informations de l'utilisateur ou false en cas d'échec
 */
function get_user_info($user_id) {
    $connx = connexionDB();
    
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = mysqli_prepare($connx, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $user_id);
    
    $result = mysqli_stmt_execute($stmt);
    
    if ($result) {
        $resultData = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($resultData);
        mysqli_stmt_close($stmt);
        mysqli_close($connx);
        return $user;
    } else {
        mysqli_stmt_close($stmt);
        mysqli_close($connx);
        return false;
    }
}

/**
 * Fonction pour mettre à jour les informations d'un utilisateur
 *
 * @param int $user_id ID de l'utilisateur
 * @param string $username Nouveau nom d'utilisateur
 * @param string $email Nouvelle adresse email
 * @param string $phone Nouveau numéro de téléphone
 * @param string $address Nouvelle adresse
 * @return bool Retourne true en cas de succès, sinon false
 */
function update_user_info($user_id, $username, $email, $phone, $address) {
    $connx = connexionDB();
    
    $sql = "UPDATE users SET username = ?, email = ?, phone = ?, address = ? WHERE id = ?";
    $stmt = mysqli_prepare($connx, $sql);
    mysqli_stmt_bind_param($stmt, 'ssssi', $username, $email, $phone, $address, $user_id);
    
    $result = mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);
    mysqli_close($connx);
    
    return $result;
}

/**
 * Fonction pour récupérer les commandes d'un utilisateur
 *
 * @param int $user_id ID de l'utilisateur
 * @return array|false Retourne un tableau de commandes ou false en cas d'échec
 */
function get_user_orders($user_id) {
    $connx = connexionDB();
    
    $sql = "SELECT * FROM orders WHERE user_id = ? ORDER BY created_at DESC";
    $stmt = mysqli_prepare($connx, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $user_id);
    
    $result = mysqli_stmt_execute($stmt);
    
    if ($result) {
        $resultData = mysqli_stmt_get_result($stmt);
        $orders = mysqli_fetch_all($resultData, MYSQLI_ASSOC);
        mysqli_stmt_close($stmt);
        mysqli_close($connx);
        return $orders;
    } else {
        mysqli_stmt_close($stmt);
        mysqli_close($connx);
        return false;
    }
}

/**
 * Fonction pour annuler une commande
 *
 * @param int $order_id ID de la commande
 * @return bool Retourne true en cas de succès, sinon false
 */
function cancel_order($order_id) {
    $connx = connexionDB();
    
    $sql = "UPDATE orders SET status = 'cancelled' WHERE id = ?";
    $stmt = mysqli_prepare($connx, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $order_id);
    
    $result = mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);
    mysqli_close($connx);
    
    return $result;
}

/**
 * Fonction pour récupérer les détails d'une commande
 *
 * @param int $order_id ID de la commande
 * @param int $user_id ID de l'utilisateur
 * @return array|null|false Retourne les détails de la commande, null si non trouvée, ou false en cas d'erreur
 */
function get_order_details($order_id, $user_id) {
    // Un administrateur peut consulter toutes les commandes, un client uniquement les siennes
    $admin = is_admin($user_id);

    $connx = connexionDB();

    if ($admin) {
        $sql = "SELECT * FROM orders WHERE id = ?";
        $stmt = mysqli_prepare($connx, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $order_id);
    } else {
        $sql = "SELECT * FROM orders WHERE id = ? AND user_id = ?";
        $stmt = mysqli_prepare($connx, $sql);
        mysqli_stmt_bind_param($stmt, 'ii', $order_id, $user_id);
    }
    
    $result = mysqli_stmt_execute($stmt);
    
    if ($result) {
        $resultData = mysqli_stmt_get_result($stmt);
        $order = mysqli_fetch_assoc($resultData);
        
        if ($order) {
            $sql = "SELECT oi.*, p.name FROM order_items oi 
                    JOIN menu_items p ON oi.item_id = p.id 
                    WHERE oi.order_id = ?";
            $stmt = mysqli_prepare($connx, $sql);
            mysqli_stmt_bind_param($stmt, 'i', $order_id);
            
            $result = mysqli_stmt_execute($stmt);
            
            if ($result) {
                $resultData = mysqli_stmt_get_result($stmt);
                $order['items'] = mysqli_fetch_all($resultData, MYSQLI_ASSOC);
            }
        }
        
        mysqli_stmt_close($stmt);
        mysqli_close($connx);
        return $order;
    } else {
        mysqli_stmt_close($stmt);
        mysqli_close($connx);
        return false;
    }
}

/**
 * Fonction pour récupérer toutes les commandes (pour l'administrateur)
 *
 * @return array|false Retourne un tableau de toutes les commandes ou false en cas d'échec
 */
function get_all_orders() {
    $connx = connexionDB();
    
    $sql = "SELECT * FROM orders ORDER BY created_at DESC";
    $result = mysqli_query($connx, $sql);
    
    if ($result) {
        $orders = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($connx);
        return $orders;
    } else {
        mysqli_close($connx);
        return false;
    }
}

/**
 * Fonction pour rechercher des commandes
 *
 * @param string $search_term Terme de recherche
 * @return array|false Retourne un tableau de commandes correspondantes ou false en cas d'échec
 */
function search_orders($search_term) {
    $connx = connexionDB();
    
    $sql = "SELECT * FROM orders WHERE id LIKE ? OR user_id IN (SELECT id FROM users WHERE username LIKE ?) ORDER BY created_at DESC";
    $stmt = mysqli_prepare($connx, $sql);
    $search_param = "%$search_term%";
    mysqli_stmt_bind_param($stmt, 'ss', $search_param, $search_param);
    
    $result = mysqli_stmt_execute($stmt);
    
    if ($result) {
        $resultData = mysqli_stmt_get_result($stmt);
        $orders = mysqli_fetch_all($resultData, MYSQLI_ASSOC);
        mysqli_stmt_close($stmt);
        mysqli_close($connx);
        return $orders;
    } else {
        mysqli_stmt_close($stmt);
        mysqli_close($connx);
        return false;
    }
}

/**
 * Fonction pour vérifier si un utilisateur peut annuler une commande
 *
 * @param int $user_id ID de l'utilisateur
 * @param int $order_id ID de la commande
 * @return bool Retourne true si l'utilisateur peut annuler la commande, sinon false
 */
function can_cancel_order($user_id, $order_id) {
    $connx = connexionDB();
    
    $sql = "SELECT user_id, status FROM orders WHERE id = ?";
    $stmt = mysqli_prepare($connx, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $order_id);
    
    $result = mysqli_stmt_execute($stmt);
    
    if ($result) {
        $resultData = mysqli_stmt_get_result($stmt);
        $order = mysqli_fetch_assoc($resultData);
        mysqli_stmt_close($stmt);
        mysqli_close($connx);
        return $order && $order['user_id'] == $user_id && $order['status'] == 'pending';
    } else {
        mysqli_stmt_close($stmt);
        mysqli_close($connx);
        return false;
    }
}

/**
 * Fonction pour mettre à jour le statut d'une commande
 *
 * @param int $order_id ID de la commande
 * @param string $new_status Nouveau statut
 * @return bool Retourne true en cas de succès, sinon false
 */
function update_order_status($order_id, $new_status) {
    if (!in_array($new_status, ['pending', 'processing', 'completed', 'cancelled'], true)) {
        return false;
    }

    $connx = connexionDB();
    
    $sql = "UPDATE orders SET status = ? WHERE id = ?";
    $stmt = mysqli_prepare($connx, $sql);
    mysqli_stmt_bind_param($stmt, 'si', $new_status, $order_id);
    
    $result = mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);
    mysqli_close($connx);
    
    return $result;
}

/**
 * Fonction pour obtenir le nom d'utilisateur à partir de son ID
 *
 * @param int $user_id ID de l'utilisateur
 * @return string Retourne le nom d'utilisateur ou 'Utilisateur inconnu' si non trouvé
 */
function get_username_by_id($user_id) {
    $connx = connexionDB();
    
    $sql = "SELECT username FROM users WHERE id = ?";
    $stmt = mysqli_prepare($connx, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $user_id);
    
    $result = mysqli_stmt_execute($stmt);
    
    if ($result) {
        $resultData = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($resultData);
        mysqli_stmt_close($stmt);
        mysqli_close($connx);
        return $user ? $user['username'] : 'Utilisateur inconnu';
    } else {
        mysqli_stmt_close($stmt);
        mysqli_close($connx);
        return 'Utilisateur inconnu';
    }
}

/**
 * Fonction pour obtenir le nombre total d'utilisateurs
 *
 * @return int|false Retourne le nombre total d'utilisateurs ou false en cas d'échec
 */
function get_total_users() {
    $connx = connexionDB();
    
    $sql = "SELECT COUNT(*) FROM users";
    $result = mysqli_query($connx, $sql);
    
    if ($result) {
        $count = mysqli_fetch_row($result)[0];
        mysqli_free_result($result);
        mysqli_close($connx);
        return $count;
    } else {
        mysqli_close($connx);
        return false;
    }
}

/**
 * Fonction pour obtenir le nombre total de produits
 *
 * @return int|false Retourne le nombre total de produits ou false en cas d'échec
 */
function get_total_products() {
    $connx = connexionDB();
    
    $sql = "SELECT COUNT(*) FROM menu_items";
    $result = mysqli_query($connx, $sql);
    
    if ($result) {
        $count = mysqli_fetch_row($result)[0];
        mysqli_free_result($result);
        mysqli_close($connx);
        return $count;
    } else {
        mysqli_close($connx);
        return false;
    }
}

/**
 * Fonction pour obtenir le chiffre d'affaires total
 *
 * @return float|false Retourne le chiffre d'affaires total ou false en cas d'échec
 */
function get_total_revenue() {
    $connx = connexionDB();
    
    $sql = "SELECT SUM(total_amount) FROM orders WHERE status = 'completed'";
    $result = mysqli_query($connx, $sql);
    
    if ($result) {
        $revenue = mysqli_fetch_row($result)[0];
        mysqli_free_result($result);
        mysqli_close($connx);
        return $revenue;
    } else {
        mysqli_close($connx);
        return false;
    }
}

/**
 * Fonction pour récupérer les messages de contact
 *
 * @return array|false Retourne un tableau de messages de contact ou false en cas d'échec
 */
function get_contact_messages() {
    $connx = connexionDB();
    
    $sql = "SELECT * FROM contact_messages ORDER BY created_at DESC";
    $result = mysqli_query($connx, $sql);
    
    if ($result) {
        $messages = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($connx);
        return $messages;
    } else {
        mysqli_close($connx);
        return false;
    }
}

/**
 * Fonction pour récupérer tous les utilisateurs
 *
 * @return array|false Retourne un tableau de tous les utilisateurs ou false en cas d'échec
 */
function get_all_users() {
    $connx = connexionDB();
    
    $sql = "SELECT * FROM users";
    $result = mysqli_query($connx, $sql);
    
    if ($result) {
        $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($connx);
        return $users;
    } else {
        mysqli_close($connx);
        return false;
    }
}

/**
 * Fonction pour récupérer tous les produits
 *
 * @return array|false Retourne un tableau de tous les produits ou false en cas d'échec
 */
function get_all_products() {
    $connx = connexionDB();
    
    $sql = "SELECT * FROM menu_items";
    $result = mysqli_query($connx, $sql);
    
    if ($result) {
        $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($connx);
        return $products;
    } else {
        mysqli_close($connx);
        return false;
    }
}

/**
 * Fonction pour supprimer un utilisateur
 *
 * @param int $user_id ID de l'utilisateur à supprimer
 * @return bool Retourne true en cas de succès, sinon false
 */
function delete_user($user_id) {
    $connx = connexionDB();
    
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = mysqli_prepare($connx, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $user_id);
    
    $result = mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);
    mysqli_close($connx);
    
    return $result;
}

/**
 * Fonction pour ajouter une promotion à un produit
 *
 * @param int $product_id ID du produit
 * @param float $discount Montant de la réduction
 * @return bool Retourne true en cas de succès, sinon false
 */
function add_promotion($product_id, $discount_percentage) {
    $discount = max(0, min(90, (float) $discount_percentage));

    $connx = connexionDB();

    if ($discount == 0) {
        // 0 % : retour au prix d'origine
        $sql = "UPDATE menu_items SET price = COALESCE(original_price, price), original_price = NULL WHERE id = ?";
        $stmt = mysqli_prepare($connx, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $product_id);
    } else {
        // La remise s'applique toujours au prix d'origine : deux promotions successives ne se cumulent pas
        $sql = "UPDATE menu_items
                SET original_price = COALESCE(original_price, price),
                    price = ROUND(original_price * (1 - ? / 100), 2)
                WHERE id = ?";
        $stmt = mysqli_prepare($connx, $sql);
        mysqli_stmt_bind_param($stmt, 'di', $discount, $product_id);
    }

    $result = mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);
    mysqli_close($connx);
    
    return $result;
}

/**
 * Fonction pour obtenir le statut en français
 *
 * @param string $status Statut en anglais
 * @return string Statut en français
 */
function get_status_fr($status) {
    switch ($status) {
        case 'pending':
            return 'En attente';
        case 'processing':
            return 'En cours de traitement';
        case 'completed':
            return 'Terminée';
        case 'cancelled':
            return 'Annulée';
        default:
            return 'Statut inconnu';
    }
}

/**
 * Fonction pour récupérer les témoignages approuvés
 *
 * @return array|false Retourne un tableau de témoignages approuvés ou false en cas d'échec
 */
function get_approved_testimonials() {
    $connx = connexionDB();
    
    $sql = "SELECT * FROM testimonials WHERE is_approved = 1 ORDER BY created_at DESC";
    $result = mysqli_query($connx, $sql);
    
    if ($result) {
        $testimonials = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($connx);
        return $testimonials;
    } else {
        mysqli_close($connx);
        return false;
    }
}

/**
 * Fonction pour récupérer l'image d'un utilisateur
 *
 * @param int $user_id ID de l'utilisateur
 * @return string Chemin de l'image de profil ou image par défaut
 */
function get_user_image($user_id) {
    $connx = connexionDB();
    
    $sql = "SELECT profile_image FROM users WHERE id = ?";
    $stmt = mysqli_prepare($connx, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $user_id);
    
    $result = mysqli_stmt_execute($stmt);
    
    if ($result) {
        $resultData = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($resultData);
        mysqli_stmt_close($stmt);
        mysqli_close($connx);
        return $user['profile_image'] ?? 'default_profile.jpg';
    } else {
        mysqli_stmt_close($stmt);
        mysqli_close($connx);
        return 'default_profile.jpg';
    }
}

/**
 * Fonction pour récupérer le nom d'utilisateur
 *
 * @param int $user_id ID de l'utilisateur
 * @return string Nom d'utilisateur ou 'Utilisateur inconnu'
 */
function get_username($user_id) {
    $connx = connexionDB();
    
    $sql = "SELECT username FROM users WHERE id = ?";
    $stmt = mysqli_prepare($connx, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $user_id);
    
    $result = mysqli_stmt_execute($stmt);
    
    if ($result) {
        $resultData = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($resultData);
        mysqli_stmt_close($stmt);
        mysqli_close($connx);
        return $user['username'] ?? 'Utilisateur inconnu';
    } else {
        mysqli_stmt_close($stmt);
        mysqli_close($connx);
        return 'Utilisateur inconnu';
    }
}

/**
 * Fonction pour approuver un témoignage
 *
 * @param int $testimonial_id ID du témoignage
 * @return bool Retourne true en cas de succès, sinon false
 */
function approve_testimonial($testimonial_id) {
    $connx = connexionDB();
    
    $sql = "UPDATE testimonials SET is_approved = 1 WHERE id = ?";
    $stmt = mysqli_prepare($connx, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $testimonial_id);
    
    $result = mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);
    mysqli_close($connx);
    
    return $result;
}

/**
 * Fonction pour enregistrer un nouvel utilisateur
 *
 * @param string $username Nom d'utilisateur
 * @param string $email Adresse email
 * @param string $password Mot de passe
 * @return int|false Retourne l'ID du nouvel utilisateur en cas de succès, sinon false
 */
function register_user($username, $email, $password) {
    $connx = connexionDB();

    // Vérifiez si l'utilisateur ou l'email existe déjà
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
    $stmt = mysqli_prepare($connx, $sql);
    mysqli_stmt_bind_param($stmt, 'ss', $username, $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if (mysqli_num_rows($result) > 0) {
        mysqli_stmt_close($stmt);
        mysqli_close($connx);
        return false; // L'utilisateur ou l'email existe déjà
    }
    
    // Hachez le mot de passe
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Insérez le nouvel utilisateur
    $sql = "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, 'client')";
    $stmt = mysqli_prepare($connx, $sql);
    mysqli_stmt_bind_param($stmt, 'sss', $username, $email, $hashed_password);
    
    if (mysqli_stmt_execute($stmt)) {
        $new_user_id = mysqli_insert_id($connx);
        mysqli_stmt_close($stmt);
        mysqli_close($connx);
        return $new_user_id;
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($connx);
    return false;
}

/**
 * Fonction pour créer une nouvelle commande
 *
 * @param int $user_id ID de l'utilisateur
 * @param float $total_amount Montant total de la commande
 * @return int|false Retourne l'ID de la nouvelle commande en cas de succès, sinon false
 */
function create_order($user_id, $total_amount, $status = 'pending', $paypal_order_id = null) {
    $connx = connexionDB();

    $sql = "INSERT INTO orders (user_id, total_amount, status, paypal_order_id) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($connx, $sql);
    mysqli_stmt_bind_param($stmt, 'idss', $user_id, $total_amount, $status, $paypal_order_id);
    
    if (mysqli_stmt_execute($stmt)) {
        $new_order_id = mysqli_insert_id($connx);
        mysqli_stmt_close($stmt);
        mysqli_close($connx);
        return $new_order_id;
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($connx);
    return false;
}

/**
 * Fonction pour ajouter un article à une commande
 *
 * @param int $order_id ID de la commande
 * @param int $product_id ID du produit
 * @param int $quantity Quantité
 * @param float $price Prix unitaire
 * @return bool Retourne true en cas de succès, sinon false
 */
function add_order_item($order_id, $product_id, $quantity, $price) {
    $connx = connexionDB();
    
    $sql = "INSERT INTO order_items (order_id, item_id, quantity, price) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($connx, $sql);
    mysqli_stmt_bind_param($stmt, 'iiid', $order_id, $product_id, $quantity, $price);
    
    $result = mysqli_stmt_execute($stmt);
    
    if (!$result) {
        error_log("Erreur lors de l'insertion de l'article de commande : " . mysqli_error($connx));
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($connx);
    
    return $result;
}

/**
 * Vérifie si le mot de passe est suffisamment complexe
 *
 * @param string $password Le mot de passe à vérifier
 * @return bool Retourne true si le mot de passe est complexe, sinon false
 */
function is_password_complex($password) {
    // Au moins 8 caractères
    if (strlen($password) < 8) {
        return false;
    }
    
    // Au moins une lettre minuscule
    if (!preg_match('/[a-z]/', $password)) {
        return false;
    }
    
    // Au moins une lettre majuscule
    if (!preg_match('/[A-Z]/', $password)) {
        return false;
    }
    
    // Au moins un chiffre
    if (!preg_match('/\d/', $password)) {
        return false;
    }
    
    // Au moins un caractère spécial
    if (!preg_match('/[^A-Za-z0-9]/', $password)) {
        return false;
    }
    
    return true;
}

/**
 * Fonction pour ajouter un message de contact
 *
 * @param string $name Nom de l'expéditeur
 * @param string $email Email de l'expéditeur
 * @param string $message Contenu du message
 * @return bool Retourne true en cas de succès, sinon false
 */
function add_contact_message($name, $email, $message) {
    $connx = connexionDB();
    
    $sql = "INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($connx, $sql);
    mysqli_stmt_bind_param($stmt, 'sss', $name, $email, $message);
    
    $result = mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);
    mysqli_close($connx);
    
    return $result;
}

/**
 * Fonction pour supprimer une commande
 *
 * @param int $order_id ID de la commande
 * @return bool Retourne true en cas de succès, sinon false
 */
function delete_order($order_id) {
    $connx = connexionDB();
    
    mysqli_autocommit($connx, false);
    
    $sql1 = "DELETE FROM order_items WHERE order_id = ?";
    $stmt1 = mysqli_prepare($connx, $sql1);
    mysqli_stmt_bind_param($stmt1, 'i', $order_id);
    $result1 = mysqli_stmt_execute($stmt1);
    
    $sql2 = "DELETE FROM orders WHERE id = ?";
    $stmt2 = mysqli_prepare($connx, $sql2);
    mysqli_stmt_bind_param($stmt2, 'i', $order_id);
    $result2 = mysqli_stmt_execute($stmt2);
    
    if ($result1 && $result2) {
        mysqli_commit($connx);
        mysqli_stmt_close($stmt1);
        mysqli_stmt_close($stmt2);
        mysqli_close($connx);
        return true;
    } else {
        mysqli_rollback($connx);
        mysqli_stmt_close($stmt1);
        mysqli_stmt_close($stmt2);
        mysqli_close($connx);
        return false;
    }
}

/**
 * Fonction pour vérifier si un utilisateur peut voir une commande
 *
 * @param int $user_id ID de l'utilisateur
 * @param int $order_id ID de la commande
 * @return bool Retourne true si l'utilisateur peut voir la commande, sinon false
 */
function can_view_order($user_id, $order_id) {
    if (is_admin($user_id)) {
        return true;
    }
    
    $connx = connexionDB();
    
    $sql = "SELECT user_id FROM orders WHERE id = ?";
    $stmt = mysqli_prepare($connx, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $order_id);
    
    $result = mysqli_stmt_execute($stmt);
    
    if ($result) {
        $resultData = mysqli_stmt_get_result($stmt);
        $order = mysqli_fetch_assoc($resultData);
        mysqli_stmt_close($stmt);
        mysqli_close($connx);
        return $order && $order['user_id'] == $user_id;
    } else {
        mysqli_stmt_close($stmt);
        mysqli_close($connx);
        return false;
    }
}

/**
 * Récupère la commande en attente liée à une commande PayPal, pour un utilisateur donné
 *
 * @param string $paypal_order_id ID de la commande côté PayPal
 * @param int $user_id ID de l'utilisateur
 * @return array|null Retourne la commande ou null si introuvable
 */
function get_pending_order_by_paypal_id($paypal_order_id, $user_id) {
    $connx = connexionDB();

    $sql = "SELECT * FROM orders WHERE paypal_order_id = ? AND user_id = ? AND status = 'pending'";
    $stmt = mysqli_prepare($connx, $sql);
    mysqli_stmt_bind_param($stmt, 'si', $paypal_order_id, $user_id);
    mysqli_stmt_execute($stmt);
    $order = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

    mysqli_stmt_close($stmt);
    mysqli_close($connx);

    return $order ?: null;
}

/**
 * Fonction pour enregistrer une réservation
 *
 * @param int $user_id ID de l'utilisateur
 * @param string $date Date (AAAA-MM-JJ)
 * @param string $time Heure (HH:MM)
 * @param int $people Nombre de personnes
 * @param string $special_requests Demandes spéciales
 * @return bool Retourne true en cas de succès, sinon false
 */
function add_reservation($user_id, $date, $time, $people, $special_requests) {
    $connx = connexionDB();

    $sql = "INSERT INTO reservations (user_id, date, time, people, special_requests) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connx, $sql);
    mysqli_stmt_bind_param($stmt, 'issis', $user_id, $date, $time, $people, $special_requests);

    $result = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    mysqli_close($connx);

    return $result;
}

?>