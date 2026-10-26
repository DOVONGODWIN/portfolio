<?php
// L'historique est conservé par visiteur (session) : on n'affiche plus les résultats des autres visiteurs
session_start();

$taille = $_POST['first_name'] ?? '';
$poids = $_POST['last_name'] ?? '';
$erreurs = [];
$resultat = null;
$diagnostic = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!is_numeric($taille) || $taille <= 0 || $taille > 300) {
        $erreurs[] = 'Veuillez saisir une taille valide en cm (entre 1 et 300).';
    }
    if (!is_numeric($poids) || $poids <= 0 || $poids > 500) {
        $erreurs[] = 'Veuillez saisir un poids valide en kg (entre 1 et 500).';
    }

    if (empty($erreurs)) {
        $resultat = round($poids / (($taille / 100) ** 2), 2);

        // [seuil max, classe CSS, message]
        $paliers = [
            [16.5, 'famine', 'Attention, vous êtes en situation de famine. Consultez votre médecin ou un professionnel de la nutrition pour en déterminer les causes.'],
            [18.5, 'maigreur', 'Attention, vous êtes en situation de maigreur. Consultez votre médecin ou un professionnel de la nutrition pour en déterminer les causes.'],
            [25, 'corpulencenormale', 'Vous avez une corpulence normale.'],
            [30, 'surpoids', 'Vous êtes en surpoids.'],
            [35, 'obésitémodérée', "Vous êtes en situation d'obésité modérée."],
            [40, 'obésitésévère', "Vous êtes en situation d'obésité sévère."],
            [INF, 'obésitémorbid', "Vous êtes en situation d'obésité morbide."],
        ];
        foreach ($paliers as [$max, $classe, $message]) {
            if ($resultat <= $max) {
                $diagnostic = ['classe' => $classe, 'message' => $message];
                break;
            }
        }

        $_SESSION['historique_imc'][] = $resultat;
        $_SESSION['historique_imc'] = array_slice($_SESSION['historique_imc'], -10);
        $taille = $poids = '';
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculateur d'IMC - Godwin Dovon</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .form2 {
            height: 50vh;
            justify-content: center;
        }
    </style>
</head>
<body>
    <header>
        <h1>Mon IMC</h1>
        <p>Dovon Messanh Godwin</p>
    </header>

    <main>
        <?php foreach ($erreurs as $erreur): ?>
            <div class="alertalert-danger" role="alert"><?php echo htmlspecialchars($erreur); ?></div>
        <?php endforeach; ?>

        <?php if ($resultat !== null): ?>
            <div role="status">Votre IMC est de <?php echo number_format($resultat, 2, ',', ''); ?></div>
            <div class="<?php echo $diagnostic['classe']; ?>" role="alert"><?php echo htmlspecialchars($diagnostic['message']); ?></div>
        <?php endif; ?>

        <?php if (!empty($_SESSION['historique_imc'])): ?>
            <h2>Vos derniers calculs</h2>
            <ul>
                <?php foreach (array_reverse($_SESSION['historique_imc']) as $valeur): ?>
                    <li><?php echo number_format($valeur, 2, ',', ''); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <form action="index.php" method="post" class="form2">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="last_name">Poids</label>
                    <input type="number" step="0.1" min="1" class="form-control" id="last_name" name="last_name" value="<?php echo htmlspecialchars($poids); ?>" placeholder="Votre poids en kg" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="first_name">Taille</label>
                    <input type="number" step="1" min="1" class="form-control" id="first_name" name="first_name" value="<?php echo htmlspecialchars($taille); ?>" placeholder="Votre taille en cm" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Calculer</button>
        </form>
    </main>

    <footer>
        <p>© <?php echo date('Y'); ?> - Godwin Dovon</p>
    </footer>
</body>
</html>
