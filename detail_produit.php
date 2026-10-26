<?php
if (!defined('APP_ROUTER')) { header('Location: index.php?page=menu'); exit; }

require_once 'includes/functions.php';

// Vérifier si un ID de produit est fourni
if (!isset($_GET['id']) || !ctype_digit((string) $_GET['id'])) {
    header('Location: index.php?page=menu');
    exit();
}

$product_id = (int) $_GET['id'];

// Récupérer les détails du produit
$product = get_product_details($product_id);

if (!$product) {
    header('Location: index.php?page=menu');
    exit();
}
?>

<style>
    .product-details {
        max-width: 800px;
        margin: 50px auto;
        background-color: #fff;
        border-radius: 15px;
        box-shadow: 0 15px 50px rgba(0, 0, 0, 0.1);
        padding: 50px;
    }

    .product-details h2 {
        color: #333;
        font-size: 2.5em;
        margin-bottom: 20px;
    }

    .product-image {
        width: 100%;
        max-width: 400px;
        height: auto;
        margin-bottom: 20px;
        border-radius: 10px;
    }

    .product-info p {
        margin-bottom: 10px;
        font-size: 1.1em;
    }

    .product-price {
        font-size: 1.5em;
        color: #fb911f;
        font-weight: bold;
        margin-top: 20px;
    }

    .add-to-cart {
        display: inline-block;
        background-color: #fb911f;
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        margin-top: 20px;
        transition: background-color 0.3s;
    }

    .add-to-cart:hover {
        background-color: #d87710;
    }
</style>

<section class="product-details">
    <h2><?php echo e($product['name']); ?></h2>
    <?php if (!empty($product['image'])): ?>
        <img src="<?php echo e($product['image']); ?>" alt="<?php echo e($product['name']); ?>" class="product-image">
    <?php endif; ?>
    <div class="product-info">
        <p><?php echo nl2br(e($product['description'])); ?></p>
        <p>Catégorie : <?php echo e($product['category']); ?></p>
        <p class="product-price">Prix : <?php echo format_price($product['price']); ?></p>
        <?php if (isset($_SESSION['user_id'])): ?>
            <button class="add-to-cart" data-id="<?php echo $product_id; ?>">Ajouter au panier</button>
        <?php else: ?>
            <p><a href="index.php?page=login">Connectez-vous</a> pour commander.</p>
        <?php endif; ?>
    </div>
</section>
