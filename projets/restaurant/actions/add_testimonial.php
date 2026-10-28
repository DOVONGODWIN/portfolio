<?php
require_once __DIR__ . '/../includes/functions.php';
start_session();

/**
 * Fonction pour ajouter un témoignage
 *
 * @param int $user_id ID de l'utilisateur
 * @param string $content Contenu du témoignage
 * @param int $rating Note donnée
 * @param string|null $image_path Chemin de l'image de profil (optionnel)
 * @return bool Retourne true en cas de succès, sinon false
 */
function add_testimonial($user_id, $content, $rating, $image_path = null) {
    $connx = connexionDB();
    
    mysqli_begin_transaction($connx);
    
    try {
        if ($image_path) {
            $sql = "UPDATE users SET profile_image = ? WHERE id = ?";
            $stmt = mysqli_prepare($connx, $sql);
            mysqli_stmt_bind_param($stmt, 'si', $image_path, $user_id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
        
        $sql = "INSERT INTO testimonials (user_id, content, rating, is_approved) VALUES (?, ?, ?, 0)";
        $stmt = mysqli_prepare($connx, $sql);
        mysqli_stmt_bind_param($stmt, 'isi', $user_id, $content, $rating);
        $result = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        
        if ($result) {
            mysqli_commit($connx);
            mysqli_close($connx);
            return true;
        } else {
            throw new Exception("Erreur lors de l'ajout du témoignage");
        }
    } catch (Exception $e) {
        mysqli_rollback($connx);
        mysqli_close($connx);
        error_log("Erreur lors de l'ajout du témoignage : " . $e->getMessage());
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_SESSION['user_id'])) {
    header('Location: ../index.php?page=login');
    exit();
}
require_csrf();

$user_id = $_SESSION['user_id'];

// Vérification et nettoyage des entrées
$content = trim($_POST['content'] ?? '');
$rating = filter_var($_POST['rating'] ?? null, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 5]]);

if ($content === '' || mb_strlen($content) > 2000 || !$rating) {
    header('Location: ../index.php?page=temoignages&status=invalid');
    exit();
}

// Traitement de l'image (optionnelle)
$image_path = null;
if (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
    try {
        $image_path = save_uploaded_image($_FILES['image'], 'uploads/profils');
    } catch (RuntimeException $ex) {
        header('Location: ../index.php?page=temoignages&status=image');
        exit();
    }
}

// Ajout du témoignage
$status = add_testimonial($user_id, $content, $rating, $image_path) ? 'success' : 'error';
header("Location: ../index.php?page=temoignages&status=$status");
exit();
