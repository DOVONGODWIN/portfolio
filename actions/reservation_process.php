<?php
require_once __DIR__ . '/../includes/functions.php';
start_session();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../index.php?page=reservation');
    exit();
}

if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php?page=login');
    exit();
}
require_csrf();

$date = $_POST['date'] ?? '';
$time = $_POST['time'] ?? '';
$people = filter_var($_POST['people'] ?? null, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 20]]);
$special_requests = trim($_POST['special_requests'] ?? '');

$date_obj = DateTime::createFromFormat('Y-m-d H:i', "$date $time");

if (!$date_obj || $date_obj->format('Y-m-d H:i') !== "$date $time") {
    $_SESSION['error'] = "La date ou l'heure n'est pas valide.";
} elseif ($date_obj < new DateTime()) {
    $_SESSION['error'] = "La réservation doit être dans le futur.";
} elseif (!$people) {
    $_SESSION['error'] = "Le nombre de personnes doit être compris entre 1 et 20.";
} elseif (mb_strlen($special_requests) > 1000) {
    $_SESSION['error'] = "Les demandes spéciales sont trop longues.";
} elseif (add_reservation($_SESSION['user_id'], $date, $time, $people, $special_requests)) {
    $_SESSION['success'] = "Votre réservation pour $people personne(s) le " . $date_obj->format('d/m/Y à H:i') . " a bien été enregistrée.";
} else {
    $_SESSION['error'] = "Une erreur est survenue lors de la réservation.";
}

header('Location: ../index.php?page=reservation');
exit();
