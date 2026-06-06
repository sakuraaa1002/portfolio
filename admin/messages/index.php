<?php
session_start();
require_once '../../config/connexion.php';
require_once '../../composants/fonction.php';
// Vérification de l'authentification admin
if (!isset($_SESSION['admin_id'])) {
    header('Location: ../index.php');
    exit();
}
//Marquer comme lu
if (isset($_GET['Lire'])) {
    $stmt = $pdo->prepare("UPDATE messages_contact SET lu = 1 WHERE id = ?");
    $stmt->execute([(int)$_GET['Lire']]);
    header('Location: index.php');
    exit();
}
//récupération des messages
$messages = $pdo->query("SELECT * FROM messages_contact ORDER BY date_envoi DESC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Messages — Alimatou Sadiya Diouf</title>
    <link rel="stylesheet" href="../../css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Outfit:wght@300;400;500;600&display=swap"
        rel="stylesheet" />
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
    <section class="contact-section">
        <div class="max-w">
            <h1 style="margin-bottom: 1.5rem;">Messages reçus</h1>
            <?php if (empty($messages)) : ?>
                <p>Aucun message reçu pour le moment.</p>
            <?php else : ?>
                <table style="width:100%; border-collapse: collapse;">
                    <thead>
                        <tr style="border-bottom: 2px solid #e5e7eb;">
                            <th style="border: 1px solid #ddd; padding: 8px;">ID</th>
                            <th style="border: 1px solid #ddd; padding: 8px;">Nom</th>
                            <th style="border: 1px solid #ddd; padding: 8px;">Email</th>
                            <th style="border: 1px solid #ddd; padding: 8px;">Message</th>
                            <th style="border: 1px solid #ddd; padding: 8px;">Date d'envoi</th>
                            <th style="border: 1px solid #ddd; padding: 8px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($messages as $message) : ?>
                            <tr style="border-bottom: 1px solid #ddd; background-color: <?= $message['lu'] ? '#f9f9f9' : '#fff' ?>;">
                                <td style="border: 1px solid #ddd; padding: 8px;"><?= htmlspecialchars($message['id']) ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px;"><?= htmlspecialchars($message['nom']) ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px;"><?= htmlspecialchars($message['email']) ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px;"><?= nl2br(htmlspecialchars($message['message'])) ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px;"><?= htmlspecialchars($message['date_envoi']) ?></td>
                                <td style="border: 1px solid #ddd; padding: 8px;">
                                    <?php if (!$message['lu']) : ?>
                                        <a href="?Lire=<?= $message['id'] ?>" style="color: #2d4a3e; text-decoration: none;">Marquer comme lu</a>
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
</body>

</html>