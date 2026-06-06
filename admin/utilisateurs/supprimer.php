<?php
session_start();
require_once '../../config/connexion.php';
require_once '../../composants/fonction.php';
// Vérification de l'authentification admin
if (!isset($_SESSION['admin_id'])) {
    header('Location: ../index.php');
    exit();
}
$id = (int)($_POST['id'] ?? 0);
//Empecher de se suppriemr soi-meme
if ($id !== $_SESSION['admin_id']) {
    $stmt = $pdo->prepare("DELETE FROM administrateurs WHERE id = ?");
    $stmt->execute([$id]);
}
header('Location: index.php');
exit();
