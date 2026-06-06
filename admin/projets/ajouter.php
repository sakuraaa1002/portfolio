<?php
session_start();
require_once '../../config/connexion.php';
require_once '../../composants/fonction.php';

// Vérification de l'authentification admin
if (!isset($_SESSION['admin_id'])) {
    header('Location: ../index.php');
    exit();
}
$erreurs = [];
$succes = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verifier_token_csrf($_POST['csrf_token'] ?? '')) {
        $erreurs[] = "Token CSRF invalide. Veuillez réessayer.";
    } else {
        $titre = nettoyer_champ($_POST['titre'] ?? '');
        $description = nettoyer_champ($_POST['description'] ?? '');
        $technologies = nettoyer_champ($_POST['technologies'] ?? '');
        $lien = nettoyer_champ($_POST['lien'] ?? '');
        $image = ''; // Gérer l'upload d'image si nécessaire

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
            $target_dir = "../images/projets/";
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
            $stmt = $pdo->prepare("INSERT INTO projets (titre, description, technologies, lien, image) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$titre, $description, $technologies, $lien, $image]);
            $succes = true;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ajouter Projet — Alimatou Sadiya Diouf</title>
    <link rel="stylesheet" href="../../css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Outfit:wght@300;400;500;600&display=swap"
        rel="stylesheet" />
</head>

<body>
    <nav style="background:#2d4a3e; padding:1rem 2rem; display:flex; justify-content:space-between; align-items:center;">
        <span style="color: #fff; font-weight: 600px;">Admin - <?= htmlspecialchars($_SESSION['admin_nom']) ?></span>
        <a href="../dashboard.php" style="color: #fff; margin-right: 1rem;">Dashboard</a>
        <a href="../projets/index.php" style="color: #fff; margin-right: 1rem;">Projets</a>
        <a href="../demandes/index.php" style="color: #fff; margin-right: 1rem;">Demandes</a>
        <a href="../messages/index.php" style="color: #fff; margin-right: 1rem;">Messages</a>
        <a href="../../index.php" style="color: #fff;">Déconnexion</a>
    </nav>
    <section class="contact-section">
        <h2>Ajouter un Projet</h2>
        <?php if (!empty($erreurs)) : ?>
            <div class="form-error">
                <?php foreach ($erreurs as $erreur) : ?>
                    <p><?= htmlspecialchars($erreur) ?></p>
                <?php endforeach; ?>
            </div>
        <?php elseif ($succes) : ?>
            <div class="form-success">
                ✔🟢 Projet ajouté avec succès !
            </div>
        <?php endif; ?>
        <form method="POST" action="" enctype="multipart/form-data">
            <input type="hidden" name="csrf_token" value="<?= generer_token_csrf() ?>">
            <div class="form-group">
                <label for="titre">Titre du projet</label>
                <input type="text" id="titre" name="titre" required />
            </div>
            <div class="form-group">
                <label for="description">Description du projet</label>
                <textarea id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="technologies">Technologies utilisées</label>
                <input type="text" id="technologies" name="technologies" required />
            </div>
            <div class="form-group">
                <label for="lien">Lien du projet (optionnel)</label>
                <input type="url" id="lien" name="lien" />
            </div>
            <div class="form-group">
                <label for="image">Image du projet (optionnel)</label>
                <input type="file" id="image" name="image" accept="image/*" />
            </div>
            <button type="submit">Ajouter le projet</button>
        </form>
    </section>
</body>

</html>