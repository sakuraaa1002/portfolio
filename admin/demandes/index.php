<?php
session_start();
require_once '../../config/connexion.php';
require_once '../../composants/fonction.php';

// Vérification de l'authentification admin
if (!isset($_SESSION['admin_id'])) {
    header('Location: ../index.php');
    exit();
}
if (isset($_GET['Lire'])) {
    $stmt = $pdo->prepare("UPDATE demandes_projet SET lu = 1 WHERE id = ?");
    $stmt->execute([(int)$_GET['Lire']]);
    header('Location: index.php');
    exit();
}
// Récupération des demandes
$demandes = $pdo->query("SELECT * FROM demandes_projet ORDER BY date_demande DESC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Demandes — Alimatou Sadiya Diouf</title>
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
            <h1 style="margin-bottom: 1.5rem;">Demandes reçues</h1>
            <?php if (empty($demandes)) : ?>
                <p>Aucune demande reçue pour le moment.</p>
            <?php else : ?>
                <table style="width:100%; border-collapse: collapse;">
                    <thead>
                        <tr style="border-bottom: 2px solid #e5e7eb;">
                            <th style="border: 1px solid #ddd; padding: 8px;">ID</th>
                            <th style="border: 1px solid #ddd; padding: 8px;">Nom</th>
                            <th style="border: 1px solid #ddd; padding: 8px;">Email</th>
                            <th style="border: 1px solid #ddd; padding: 8px;">Message</th>
                            <th style="border: 1px solid #ddd; padding: 8px;">Date de demande</th>
                            <th style="border: 1px solid #ddd; padding: 8px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($demandes as $demande) : ?>
                            <tr style="border-bottom: 1px solid #ddd; background-color: <?= $demande['lu'] ? '#f9f9f9' : '#fff' ?>;">
                                <td style="border: 1px solid #ddd; padding: 8px;"><?= htmlspecialchars($demande['id']) ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px;"><?= htmlspecialchars($demande['nom']) ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px;"><?= htmlspecialchars($demande['email']) ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px;"><?= htmlspecialchars($demande['date_demande']) ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px;">
                                    <?php if (!$demande['lu']) : ?>
                                        <a href="?Lire=<?= $demande['id'] ?>" style="color: #2d4a3e; text-decoration: none;">Marquer comme lu</a>
                                    <?php else : ?>
                                        <span style="color: #6b7280;">Lu</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </section>