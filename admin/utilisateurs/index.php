<?php
session_start();
require_once '../../config/connexion.php';
require_once '../../composants/fonction.php';

// Vérification de l'authentification admin
if (!isset($_SESSION['admin_id'])) {
    header('Location: ../index.php');
    exit();
}

// Récupération des utilisateurs
$utilisateurs = $pdo->query("SELECT * FROM administrateurs ORDER BY nom ASC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Utilisateurs — Alimatou Sadiya Diouf</title>
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
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom: 1.5rem;">
                <h1 style="margin-bottom: 0;">Utilisateurs</h1>
                <a href="ajouter.php" style="background-color: #2d4a3e; color: white; text-decoration: none; padding: 0.5rem 1rem; border-radius: 4px;">Ajouter un utilisateur</a>
            </div>
            <?php if (empty($utilisateurs)) : ?>
                <p>Aucun utilisateur enregistré pour le moment.</p>
            <?php else : ?>
                <table style="width:100%; border-collapse: collapse;">
                    <thead>
                        <tr style="border-bottom: 2px solid #e5e7eb;">
                            <th style="border: 1px solid #ddd; padding: 8px;">ID</th>
                            <th style="border: 1px solid #ddd; padding: 8px;">Nom</th>
                            <th style="border: 1px solid #ddd; padding: 8px;">Email</th>
                            <th style="border: 1px solid #ddd; padding: 8px;">Date d'inscription</th>
                            <th style="border: 1px solid #ddd; padding: 8px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($utilisateurs as $utilisateur) : ?>
                            <tr style="border-bottom: 1px solid #ddd;">
                                <td style="border: 1px solid #ddd; padding: 8px;"><?= htmlspecialchars($utilisateur['id']) ?></td>
                                <td style="border: 1px solid #ddd; padding:8px;"><?= htmlspecialchars($utilisateur['nom']) ?></td>
                                <td style="border:1px solid #ddd; padding:8px;"><?php echo htmlspecialchars($utilisateur['email']); ?></td>
                                <td style="border:1px solid #ddd; padding:8px;"><?php echo htmlspecialchars($utilisateur['date_de_creation']); ?></td>
                                <td style="border:1px solid #ddd; padding:8px;">
                                    <a href="modifier.php?id=<?= $utilisateur['id'] ?>" style="color: #2d4a3e; margin-right: 10px;">Modifier</a>
                                    <?php if ($utilisateur['id'] != $_SESSION['admin_id']) : ?>
                                        <a href="supprimer.php?id=<?= $utilisateur['id'] ?>" style="color: red;" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">Supprimer</a>
                                    <?php else : ?>
                                        <span style="color: #9ca3af;">Vous</span>
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