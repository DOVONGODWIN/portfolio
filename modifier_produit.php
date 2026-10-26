<?php
if (!defined('APP_ROUTER')) { header('Location: index.php?page=menu'); exit; }

require_once 'includes/functions.php';

// Vérifier si l'utilisateur est un administrateur
if (!isset($_SESSION['user_id']) || !is_admin($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$error_message = '';
$success_message = '';

// Vérifier si un ID de produit est fourni
if (!isset($_GET['id']) || !ctype_digit((string) $_GET['id'])) {
    header('Location: index.php?page=menu');
    exit();
}

$product_id = (int) $_GET['id'];
$product = get_product_details($product_id);

if (!$product) {
    header('Location: index.php?page=menu');
    exit();
}

// Traitement du formulaire de modification
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_csrf();

    $name = trim($_POST['name'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $price = $_POST['price'] ?? '';
    $category = trim($_POST['category'] ?? '');

    // Validation simple
    if ($name === '' || !is_numeric($price) || $price <= 0) {
        $error_message = "Le nom et un prix valide sont obligatoires.";
    } else {
        $image = $product['image']; // Garder l'ancienne image par défaut
        try {
            if (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
                $image = save_uploaded_image($_FILES['image'], 'images/menu');
            }

            // Mettre à jour le produit dans la base de données
            if (update_product($product_id, $name, $description, (float) $price, $image, $category)) {
                $success_message = "Le produit a été mis à jour avec succès.";
                $product = get_product_details($product_id); // Recharger les détails du produit
            } else {
                $error_message = "Une erreur est survenue lors de la mise à jour du produit.";
            }
        } catch (RuntimeException $ex) {
            $error_message = $ex->getMessage();
        }
    }
}
?>

<section class="modifier-produit">
    <h2>Modifier le produit</h2>
    <?php if (!empty($error_message)) : ?>
        <p class="error-message"><?php echo e($error_message); ?></p>
    <?php endif; ?>
    <?php if (!empty($success_message)) : ?>
        <p class="success-message"><?php echo e($success_message); ?></p>
    <?php endif; ?>
    <form action="index.php?page=modifier_produit&amp;id=<?php echo $product_id; ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="name">Nom du produit :</label>
            <input type="text" id="name" name="name" value="<?php echo e($product['name']); ?>" required>
        </div>
        <div class="form-group">
            <label for="description">Description :</label>
            <textarea id="description" name="description"><?php echo e($product['description']); ?></textarea>
        </div>
        <div class="form-group">
            <label for="price">Prix (€) :</label>
            <input type="number" id="price" name="price" step="0.01" min="0.01" value="<?php echo e($product['price']); ?>" required>
        </div>
        <div class="form-group">
            <label for="category">Catégorie :</label>
            <input type="text" id="category" name="category" value="<?php echo e($product['category']); ?>">
        </div>
        <div class="form-group">
            <label for="image">Image :</label>
            <input type="file" id="image" name="image" accept="image/jpeg,image/png,image/gif,image/webp">
            <?php if (!empty($product['image'])) : ?>
                <p>Image actuelle :</p>
                <img src="<?php echo e($product['image']); ?>" alt="<?php echo e($product['name']); ?>" style="max-width: 200px;">
            <?php endif; ?>
        </div>
        <button type="submit">Mettre à jour le produit</button>
    </form>
</section>
