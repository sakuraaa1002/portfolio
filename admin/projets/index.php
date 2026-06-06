<?php
session_start();
require_once '../../config/connexion.php';
require_once '../../composants/fonction.php';

// Vérification de l'authentification admin
if (!isset($_SESSION['admin_id'])) {
    header('Location: ../index.php');
    exit();
}
//récupération des projets
$projets = $pdo->query("SELECT * FROM projets")->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Projets — Alimatou Sadiya Diouf</title>
    <link rel="stylesheet" href="../../css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Outfit:wght@300;400;500;600&display=swap"
        rel="stylesheet" />
</head>

<body>
    <!-- Header Admin-->
    <nav style="background:#2d4a3e; padding:1rem 2rem; display:flex; justify-content:space-between; align-items:center;">
        <span style="color: #fff; font-weight: 600px;">Admin - <?= htmlspecialchars($_SESSION['admin_nom']) ?></span>
        <a href="../dashboard.php" style="color: #fff; margin-right: 1rem;">Dashboard</a>
        <a href="../projets/index.php" style="color: #fff; margin-right: 1rem;">Projets</a>
        <a href="../demandes/index.php" style="color: #fff; margin-right: 1rem;">Demandes</a>
        <a href="../messages/index.php" style="color: #fff; margin-right: 1rem;">Messages</a>
        <a href="../deconnexion.php" style="color: #fff;">Déconnexion</a>
    </nav>
    <section class="contact-section">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom: 1rem;">
            <h2>Gestion des Projets</h2>
            <a href="ajouter.php" class="btn-primary">+ Ajouter un projet</a>
        </div>
        <p>Voici la liste de tous les projets enregistrés.</p>
        <table style="width:100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="border: 1px solid #ddd; padding: 8px;">ID</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">Titre</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">Description</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">Technologies</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">Date de création</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($projets as $projet) : ?>
                    <tr>
                        <td style="border: 1px solid #ddd; padding: 8px;"><?= htmlspecialchars($projet['id']) ?></td>
                        <td style="border: 1px solid #ddd; padding: 8px;"><?= htmlspecialchars($projet['titre']) ?></td>
                        <td style="border: 1px solid #ddd; padding: 8px;"><?= htmlspecialchars($projet['description']) ?></td>
                        <td style="border: 1px solid #ddd; padding: 8px;"><?= htmlspecialchars($projet['technologies']) ?></td>
                        <td style="border: 1px solid #ddd; padding: 8px;"><?= htmlspecialchars($projet['date_creation']) ?></td>
                        <td style="border: 1px solid #ddd; padding: 8px;">
                            <a href="modifier.php?id=<?= $projet['id'] ?>" style="color: #2d4a3e; margin-right: 10px;">Modifier</a>
                            <form method="POST" action="supprimer.php" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce projet ?');">
                                <input type="hidden" name="csrf_token" value="<?= generer_token_csrf() ?>">
                                <input type="hidden" name="id" value="<?= $projet['id'] ?>">
                                <button type="submit" style="background: none; border: none; color: red; cursor: pointer;">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</body>