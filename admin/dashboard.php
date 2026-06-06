<?php
session_start();
require_once '../config/connexion.php';
require_once '../composants/fonction.php';
// Vérification de l'authentification admin
if (!isset($_SESSION['admin_id'])) {
    header('Location: index.php');
    exit();
}

//visualisation des stats
$nb_visites = $pdo->query("SELECT COUNT(*) FROM visites")->fetchColumn();
$nb_projets = $pdo->query("SELECT COUNT(*) FROM projets")->fetchColumn();
$nb_demandes = $pdo->query("SELECT COUNT(*) FROM demandes_projet")->fetchColumn();
$nb_messages = $pdo->query("SELECT COUNT(*) FROM messages_contact")->fetchColumn();
//dernières visites
$dernieres_visites = $pdo->query("SELECT * FROM visites ORDER BY date_visite DESC LIMIT 10")->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard — Alimatou Sadiya Diouf</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Outfit:wght@300;400;500;600&display=swap"
        rel="stylesheet" />
</head>

<body>
    <nav style="background:#2d4a3e; padding:1rem 2rem; display:flex; justify-content:space-between; align-items:center;">
        <span style="color: #fff; font-weight: 600px;">Admin - <?= htmlspecialchars($_SESSION['admin_id']) ?></span>
        <div>
            <a href="dashboard.php" style="color: #fff; margin-right: 1rem;">Dashboard</a>
            <a href="projets/index.php" style="color: #fff; margin-right: 1rem;">Projets</a>
            <a href="demandes/index.php" style="color: #fff; margin-right: 1rem;">Demandes</a>
            <a href="messages/index.php" style="color: #fff; margin-right: 1rem;">Messages</a>
            <a href="../index.php" style="color: #fff;">Retour au site</a>
        </div>
    </nav>
    <section class="contact-section">
        <h2>Dashboard Admin</h2>
        <p>Bienvenue sur votre espace administratif.</p>
        <!--Stats-->
        <div class="stats-grid">
            <div class="stat-card">
                <h3>Visites</h3>
                <p><?= $nb_visites ?></p>
            </div>
            <div class="stat-card">
                <h3>Projets</h3>
                <p><?= $nb_projets ?></p>
            </div>
            <div class="stat-card">
                <h3>Demandes de projet</h3>
                <p><?= $nb_demandes ?></p>
            </div>
            <div class="stat-card">
                <h3>Messages</h3>
                <p><?= $nb_messages ?></p>
            </div>
        </div>
        <!-- Dernières visites -->
        <h3 style="margin-bottom: 1rem;">Dernières visites</h3>
        <div class="contact-form">
            <table style="width:100%; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="border: 1px solid #ddd; padding: 8px;">ID</th>
                        <th style="border: 1px solid #ddd; padding: 8px;">Page</th>
                        <th style="border: 1px solid #ddd; padding: 8px;">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dernieres_visites as $visite) : ?>
                        <tr>
                            <td style="border: 1px solid #ddd; padding: 8px;"><?= htmlspecialchars($visite['id']) ?></td>
                            <td style="border: 1px solid #ddd; padding: 8px;"><?= htmlspecialchars($visite['page']) ?></td>
                            <td style="border: 1px solid #ddd; padding: 8px;"><?= htmlspecialchars($visite['date_visite']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        </div>
    </section>
</body>

</html>