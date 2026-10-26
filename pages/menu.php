<?php
if (!defined('APP_ROUTER')) { header('Location: ../index.php?page=menu'); exit; }

require_once __DIR__ . '/../includes/functions.php';

$search = is_string($_GET['search'] ?? null) ? trim($_GET['search']) : '';
$min_price = is_numeric($_GET['min_price'] ?? null) ? (float) $_GET['min_price'] : '';
$max_price = is_numeric($_GET['max_price'] ?? null) ? (float) $_GET['max_price'] : '';
$sort = is_string($_GET['sort'] ?? null) ? $_GET['sort'] : 'name';
$category = is_string($_GET['category'] ?? null) ? $_GET['category'] : '';

$menu_items = get_menu_items($search, $min_price, $max_price, $sort, $category);
$is_admin = isset($_SESSION['user_id']) && is_admin($_SESSION['user_id']);
$categories = get_all_categories();
$selected_category = $category;
?>

<section id="menu" class="menu">
    <div class="titre">
        <h2 class="titre-text">Notre <span>M</span>enu</h2>
        <p>Découvrez nos délicieuses spécialités préparées avec soin.</p>
    </div>

    <div class="search-sort">
        <form action="index.php" method="GET">
            <input type="hidden" name="page" value="menu">
            <input type="text" name="search" placeholder="Rechercher un plat" value="<?php echo e($search); ?>">
            <input type="number" name="min_price" placeholder="Prix min" value="<?php echo e($min_price); ?>">
            <input type="number" name="max_price" placeholder="Prix max" value="<?php echo e($max_price); ?>">
            <select name="category">
                <option value="">Toutes les catégories</option>
                <?php foreach ($categories as $cat): ?>
                    <option value="<?php echo e($cat); ?>" <?php echo $selected_category === $cat ? 'selected' : ''; ?>>
                        <?php echo e($cat); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <select name="sort">
                <option value="name" <?php echo $sort == 'name' ? 'selected' : ''; ?>>Nom</option>
                <option value="price_asc" <?php echo $sort == 'price_asc' ? 'selected' : ''; ?>>Prix croissant</option>
                <option value="price_desc" <?php echo $sort == 'price_desc' ? 'selected' : ''; ?>>Prix décroissant</option>
                <option value="popularity" <?php echo $sort == 'popularity' ? 'selected' : ''; ?>>Popularité</option>
            </select>
            <button type="submit">Rechercher</button>
        </form>
    </div>

    <div class="contenu">
        <?php if (empty($menu_items)): ?>
            <p>Aucun plat ne correspond à votre recherche.</p>
        <?php endif; ?>
        <?php foreach ($menu_items ?: [] as $item): ?>
        <div class="box">
            <div class="imbox">
                <img src="<?php echo e($item['image']); ?>" alt="<?php echo e($item['name']); ?>">
            </div>
            <div class="text">
                <h3><?php echo e($item['name']); ?></h3>
                <p><?php echo e(mb_strimwidth($item['description'] ?? '', 0, 100, '...')); ?></p>
                <span class="price"><?php echo format_price($item['price']); ?></span>
            </div>
            <a href="index.php?page=detail_produit&amp;id=<?php echo (int) $item['id']; ?>" class="details-btn">Voir les détails</a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <button class="acheter" data-id="<?php echo (int) $item['id']; ?>">Ajouter au panier</button>
            <?php endif; ?>
            <?php if ($is_admin): ?>
                <a href="index.php?page=modifier_produit&amp;id=<?php echo (int) $item['id']; ?>" class="admin-btn">Modifier</a>
                <button class="admin-btn delete-product" data-id="<?php echo (int) $item['id']; ?>">Supprimer</button>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>
</section>
