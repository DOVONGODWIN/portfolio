<?php
if (!defined('APP_ROUTER')) { header('Location: index.php?page=ajouter_produit'); exit; }

require_once 'includes/functions.php';

/**
 * Fonction pour ajouter un nouveau produit
 *
 * @param string $name Nom du produit
 * @param string $description Description du produit
 * @param float $price Prix du produit
 * @param string $image Chemin de l'image du produit
 * @param string $category Catégorie du produit
 * @return bool Retourne true en cas de succès, sinon false
 */
function add_product($name, $description, $price, $image, $category) {
    $connx = connexionDB();
    
    $sql = "INSERT INTO menu_items (name, description, price, image, category) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connx, $sql);
    mysqli_stmt_bind_param($stmt, 'ssdss', $name, $description, $price, $image, $category);
    
    $result = mysqli_stmt_execute($stmt);
    
    if (!$result) {
        $error = mysqli_stmt_error($stmt);
        error_log("Erreur SQL lors de l'ajout du produit : " . $error);
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($connx);
    
    return $result;
}

// Vérifier si l'utilisateur est connecté et est un administrateur
if (!isset($_SESSION['user_id']) || !is_admin($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$message = '';
$success = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_csrf();

    $name = trim($_POST['name'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $price = $_POST['price'] ?? '';
    $category = trim($_POST['category'] ?? '');

    if ($name === '' || !is_numeric($price) || $price <= 0) {
        $message = "Le nom et un prix valide sont obligatoires.";
    } else {
        $image = '';
        try {
            if (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
                $image = save_uploaded_image($_FILES['image'], 'images/menu');
            }

            if (add_product($name, $description, (float) $price, $image, $category)) {
                $success = true;
                $message = "Le produit a été ajouté avec succès.";
            } else {
                $message = "Une erreur est survenue lors de l'ajout du produit. Veuillez réessayer.";
            }
        } catch (RuntimeException $ex) {
            $message = $ex->getMessage();
        }
    }
}
?>

<style>
.add-product {
    background-color: #f9f9f9;
    padding: 100px 0;
}

.add-product-container {
    max-width: 600px;
    margin: 0 auto;
    background-color: #fff;
    border-radius: 15px;
    box-shadow: 0 15px 50px rgba(0, 0, 0, 0.1);
    padding: 50px;
}

.add-product h2 {
    text-align: center;
    color: #333;
    font-size: 2.5em;
    margin-bottom: 40px;
    text-transform: capitalize;
}

.add-product .inputboite {
    position: relative;
    width: 100%;
    margin-bottom: 30px;
}

.add-product .inputboite input,
.add-product .inputboite textarea,
.add-product .inputboite select {
    width: 100%;
    padding: 15px;
    font-size: 16px;
    color: #333;
    border: none;
    outline: none;
    background: #f5f5f5;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.add-product .inputboite input:focus,
.add-product .inputboite textarea:focus,
.add-product .inputboite select:focus {
    box-shadow: 0 0 10px rgba(251, 145, 31, 0.5);
}

.add-product .inputboite textarea {
    height: 150px;
    resize: none;
}

.add-product .inputboite label {
    position: absolute;
    left: 15px;
    top: 16px;
    font-size: 16px;
    color: #777;
    transition: all 0.3s ease;
    pointer-events: none;
}

.add-product .inputboite input:focus ~ label,
.add-product .inputboite textarea:focus ~ label,
.add-product .inputboite input:valid ~ label,
.add-product .inputboite textarea:valid ~ label,
.add-product .inputboite select:valid ~ label {
    top: -12px;
    left: 10px;
    font-size: 12px;
    color: #fb911f;
    background: #fff;
    padding: 2px 4px;
    border-radius: 3px;
}

.add-product .inputboite input[type="file"] {
    padding: 10px;
    background-color: #fff;
    border: 1px solid #ddd;
}

.add-product button[type="submit"] {
    background: #fb911f;
    color: #fff;
    border: none;
    cursor: pointer;
    padding: 15px;
    font-size: 18px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 2px;
    transition: 0.5s;
    border-radius: 50px;
    width: 100%;
}

.add-product button[type="submit"]:hover {
    background: #d87710;
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(251, 145, 31, 0.4);
}

.message {
    padding: 15px;
    margin-bottom: 20px;
    border-radius: 8px;
    text-align: center;
    font-size: 16px;
}

.success {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.error {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

@media (max-width: 768px) {
    .add-product-container {
        padding: 30px;
    }

    .add-product h2 {
        font-size: 2em;
    }
}
</style>

<section class="add-product">
    <div class="add-product-container">
        <h2>Ajouter un produit</h2>
        <?php if (!empty($message)) : ?>
            <div class="message <?php echo $success ? 'success' : 'error'; ?>">
                <?php echo e($message); ?>
            </div>
        <?php endif; ?>
        <form action="index.php?page=ajouter_produit" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="inputboite">
                <input type="text" id="name" name="name" required>
                <label for="name">Nom du produit</label>
            </div>
            <div class="inputboite">
                <textarea id="description" name="description" required></textarea>
                <label for="description">Description</label>
            </div>
            <div class="inputboite">
                <input type="number" id="price" name="price" step="0.01" required>
                <label for="price">Prix</label>
            </div>
            <div class="inputboite">
                <input type="text" id="category" name="category" required>
                <label for="category">Catégorie</label>
            </div>
            <div class="inputboite">
                <input type="file" id="image" name="image" required>
                <label for="image">Image</label>
            </div>
            <button type="submit">Ajouter le produit</button>
        </form>
    </div>
</section>
  