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
$stmt = $pdo->prepare("SELECT * FROM projets WHERE id = ?");
$stmt->execute([$id]);
$projet = $stmt->fetch();
if (!$projet) {
    header('Location: index.php');
    exit();
}

$erreurs = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verifier_token_csrf($_POST['csrf_token'] ?? '')) {
        $erreurs[] = "Token CSRF invalide. Veuillez réessayer.";
    } else {
        $titre = nettoyer_champ($_POST['titre'] ?? '');
        $description = nettoyer_champ($_POST['description'] ?? '');
        $technologies = nettoyer_champ($_POST['technologies'] ?? '');
        $lien = nettoyer_champ($_POST['lien'] ?? '');
        $image = $projet['image']; // Gérer l'upload d'image si nécessaire

        if (!champ_requis($titre)) {
            $erreurs[] = "Le titre du projet est requis.";
        }
        if (!champ_requis($description)) {
            $erreurs[] = "La description du projet est requise.";
        }
        if (!champ_requis($technologies)) {
            $erreurs[] = "Les technologies du projet sont requises.";
        }
        //upload d'image 
        if (!empty($_FILES['image']['name'])) {
            $target_dir = "../../images/projets/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $extensions_autorisees = ['jpg', 'jpeg', 'png', 'gif'];
            if (in_array($imageFileType, $extensions_autorisees)) {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $image = basename($_FILES["image"]["name"]);
                } else {
                    $erreurs[] = "Erreur lors de l'upload de l'image.";
                }
            } else {
                $erreurs[] = "Seules les images JPG, JPEG, PNG et GIF sont autorisées.";
                $nom_fichier = uniqid() . '.' . $imageFileType;
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $nom_fichier);
                $image = $nom_fichier;
            }
        }
        if (empty($erreurs)) {
            $stmt = $pdo->prepare("UPDATE projets SET titre = ?, description = ?, technologies = ?, lien = ?, image = ? WHERE id = ?");
            $stmt->execute([$titre, $description, $technologies, $lien, $image, $id]);
            header('Location: index.php');
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le projet</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>

<body>
    <nav style="background:#2d4a3e; padding:1rem 2rem; display:flex; justify-content:space-between; align-items:center;">
        <span style="color:#fff; font-weight:600;">Admin</span>
        <h2>Admin Panel</h2>
        <div>
            <a href="../dashboard.php" style="color:#fff; margin-right:1rem;">Dashboard</a>
            <a href="index.php" style="color:#fff; margin-right:1rem;">Projets</a>
            <a href="../demandes/index.php" style="color:#fff; margin-right:1rem;">Demandes</a>
            <a href="../messages/index.php" style="color:#fff; margin-right:1rem;">Messages</a>
            <a href="../deconnexion.php" style="color:#fff;">Déconnexion</a>
        </div>
    </nav>
    <section class="contact-section">
        <div class="max-w">
            <div class="contact-form" style="max-width: 600px;margin:0 auto;">
                <h1 style="margin-bottom: 1.5rem;">Modifier le projet</h1>
                <?php if (!empty($erreurs)) : ?>
                    <div class="form-error">
                        <?php foreach ($erreurs as $erreur) : ?>
                            <p><?= htmlspecialchars($erreur) ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <form method="POST" action="" enctype="multipart/form-data">
                    <input type="hidden" name="csrf_token" value="<?= generer_token_csrf() ?>">
                    <div class="form-group">
                        <label for="titre">Titre</label>
                        <input type="text" id="titre" name="titre" value="<?= htmlspecialchars($projet['titre']) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" required><?= htmlspecialchars($projet['description']) ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="technologies">Technologies</label>
                        <input type="text" id="technologies" name="technologies" value="<?= htmlspecialchars($projet['technologies']) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="lien">Lien</label>
                        <input type="text" id="lien" name="lien" value="<?= htmlspecialchars($projet['lien']) ?>">
                    </div>
                    <div class="form-group">
                        <label for="image">Image (laisser vide pour conserver l'image actuelle)</label>
                        <input type="file" id="image" name="image" accept="image/*">
                    </div>
                    <button type="submit">Enregistrer les modifications</button>
                </form>
            </div>
        </div>
    </section>
</body>

</html>