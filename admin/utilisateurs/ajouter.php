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
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO administrateurs (nom, email, mot_de_passe) VALUES (?, ?, ?)");
    $stmt->execute([$nom, $email, $mot_de_passe]);

    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ajouter un utilisateur — Alimatou Sadiya Diouf</title>
    <link rel="stylesheet" href="../../css/style.css" />
</head>

<body>
    <nav style="background: #2d4a3e; padding:1rem 2rem; display:flex; justify-content:space-between; align-items:center;">
        <span style="color: #fff; font-weight: 600px;">Admin - <?= htmlspecialchars($_SESSION['admin_nom']) ?></span>
        <div style="display:flex; gap:1rem;">
            <a href="../dashboard.php" style="color: white; text-decoration: none; margin-right: 20px;">Dashboard</a>
            <a href="../projets/index.php" style="color: white; text-decoration: none; margin-right: 20px;">Projets</a>
            <a href="../demandes/index.php" style="color: white; text-decoration: none; margin-right: 20px;">Demandes</a>
            <a href="../utilisateurs/index.php" style="color: white; text-decoration: none; margin-right: 20px;">Utilisateurs</a>
            <a href="../deconnexion.php" style="color: white; text-decoration: none;">Déconnexion</a>
        </div>
    </nav>
    <section>
        <div class="max-w">
            <h1 style="margin-bottom: 1.5rem;">Ajouter un utilisateur</h1>
            <form method="post">
                <div style="margin-bottom: 1rem;">
                    <label for="nom" style="display:block; margin-bottom: 0.5rem;">Nom :</label>
                    <input type="text" id="nom" name="nom" required />
                </div>
                <div style="margin-bottom: 1rem;">
                    <label for="email" style="display:block; margin-bottom: 0.5rem;">Email :</label>
                    <input type="email" id="email" name="email" required />
                </div>
                <div style="margin-bottom: 1rem;">
                    <label for="mot_de_passe" style="display:block; margin-bottom: 0.5rem;">Mot de passe :</label>
                    <input type="password" id="mot_de_passe" name="mot_de_passe" required />
                </div>
                <button type="submit" style="background-color: #2d4a3e; color: white; border:none; padding:.5rem 1rem; cursor:pointer;">Ajouter l'utilisateur</button>
            </form>
        </div>
    </section>