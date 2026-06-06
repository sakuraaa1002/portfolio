<?php
session_start();
require_once '../../config/connexion.php';
require_once '../../composants/fonction.php';
// Vérification de l'authentification admin
if (!isset($_SESSION['admin_id'])) {
    header('Location: ../index.php');
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verifier_token_csrf($_POST['csrf_token'] ?? '')) {
        die("Token CSRF invalide. Veuillez réessayer.");
    } else {
        $id = (int)($_POST['id'] ?? 0);
        $stmt = $pdo->prepare("DELETE FROM projets WHERE id = ?");
        $stmt->execute([$id]);
    }
}

header('Location: index.php');
exit();
