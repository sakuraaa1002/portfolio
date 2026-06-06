<?php
session_start();
require_once '../../config/connexion.php';
require_once '../../composants/fonction.php';

// Vérification de l'authentification admin
if (!isset($_SESSION['admin_id'])) {
    header('Location: ../index.php');
    exit();
}

$id = (int)($_GET['id'] ?? 0);
$stmt = $pdo->prepare("SELECT * FROM administrateurs WHERE id = ?");
$stmt->execute([$id]);
$admin = $stmt->fetch();
if (!$admin) {
    header('Location: index.php');
    exit();
}
$erreurs = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verifier_token_csrf($_POST['csrf_token'] ?? '')) {
        $erreurs[] = "Token CSRF invalide. Veuillez réessayer.";
    } else {
        $prenom = nettoyer_champ($_POST['prenom'] ?? '');
        $nom = nettoyer_champ($_POST['nom'] ?? '');
        $email = nettoyer_champ($_POST['email'] ?? '');
        $mot_de_passe = $_POST['mot_de_passe'] ?? '';

        if (!champ_requis($prenom)) {
            $erreurs[] = "Le prénom est requis.";
        }
        if (!champ_requis($nom)) {
            $erreurs[] = "Le nom est requis.";
        }
        if (!champ_requis($email)) {
            $erreurs[] = "L'email est requis.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erreurs[] = "L'email n'est pas valide.";
        }
        if (!champ_requis($mot_de_passe)) {
            $erreurs[] = "Le mot de passe est requis.";
        }

        if (empty($erreurs)) {
            $stmt = $pdo->prepare("UPDATE administrateurs SET prenom = ?, nom = ?, email = ?, mot_de_passe = ? WHERE id = ?");
            $stmt->execute([$prenom, $nom, $email, password_hash($mot_de_passe, PASSWORD_DEFAULT), $id]);
            if (empty($erreurs)) {
                header('Location: index.php');
                exit();
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'utilisateur</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet" />
</head>

<body>
    <nav style="background:#2d4a3e; padding:1rem 2rem; display:flex; justify-content:space-between; align-items:center;">
        <span style="color: #fff; font-weight: 600px;">Admin - <?= htmlspecialchars($_SESSION['admin_id']) ?></span>
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
            <div class="contact-form" style="max-width: 600px;margin:0 auto;">
                <h1 style="margin-bottom: 1.5rem;">Modifier l'utilisateur</h1>
                <?php if (!empty($erreurs)) : ?>
                    <div class="form-error">
                        <ul>
                            <?php foreach ($erreurs as $erreur) : ?>
                                <li><?= htmlspecialchars($erreur) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <form method="POST" action="">
                    <input type="hidden" name="csrf_token" value="<?= generer_token_csrf() ?>">
                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input type="text" id="prenom" name="prenom" value="<?= htmlspecialchars($admin['prenom']) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($admin['nom']) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?= htmlspecialchars($admin['email']) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="mot_de_passe">Mot de passe</label>
                        <input type="password" id="mot_de_passe" name="mot_de_passe" required>
                    </div>
                    <button type="submit" style="background-color: #2d4a3e; color: white; border:none; padding:.5rem 1rem; cursor:pointer;">Enregistrer les modifications</button>
                </form>
            </div>
        </div>
    </section>
</body>

</html>