<?php
session_start();
require_once '../config/connexion.php';
require_once '../composants/fonction.php';
enregistrer_visite($pdo, 'demande.php');

$erreurs = [];
$succes = false;
$nom = '';
$email = '';
$sujet = '';
$type_projet = '';
$description = '';
$budget = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verifier_token_csrf($_POST['csrf_token'] ?? '')) {
        $erreurs[] = "Token CSRF invalide. Veuillez réessayer.";
    } else {
        // Nettoyage des données
        $nom = nettoyer_champ($_POST['nom'] ?? '');
        $email = nettoyer_champ($_POST['email'] ?? '');
        $sujet = nettoyer_champ($_POST['sujet'] ?? '');
        $type_projet = nettoyer_champ($_POST['type_projet'] ?? '');
        $description = nettoyer_champ($_POST['description'] ?? '');
        $budget = nettoyer_champ($_POST['budget'] ?? '');

        // Validation des champs
        if (!champ_requis($nom)) {
            $erreurs[] = "Le nom est requis.";
        }
        if (!champ_requis($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erreurs[] = "Un email valide est requis.";
        }
        if (!champ_requis($sujet)) {
            $erreurs[] = "Le sujet est requis.";
        }
        if (!champ_requis($type_projet)) {
            $erreurs[] = "Le type de projet est requis.";
        }
        if (!champ_requis($description)) {
            $erreurs[] = "La description du projet est requise.";
        }


        // Si pas d'erreurs, traiter le formulaire (ex: enregistrer en base ou envoyer un email)
        if (empty($erreurs)) {
            // Exemple d'enregistrement en base de données
            $stmt = $pdo->prepare("INSERT INTO demandes_projet(nom, email, type_projet, description, budget) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$nom, $email, $type_projet, $description, $budget]);
            $succes = true;
            // Réinitialiser les champs
            $nom = '';
            $email = '';
            $sujet = '';
            $type_projet = '';
            $description = '';
            $budget = '';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Demande de projet — Alimatou Sadiya Diouf</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Outfit:wght@300;400;500;600&display=swap"
        rel="stylesheet" />
</head>

<body>
    <!-- ══════════════════════════════════════
       NAVIGATION
  ══════════════════════════════════════ -->
    <?php require '../composants/nav.php'; ?>

    <!-- ══════════════════════════════════════
       HERO PAGE
  ══════════════════════════════════════ -->
    <section class="page-hero">
        <div class="page-hero-inner">
            <div class="section-tag">Demande de projet</div>
            <h1 class="section-title">
                Proposez votre projet<br><em>collaboratif</em>
            </h1>
            <p>
                Vous avez une idée de projet ou une opportunité de collaboration ? Remplissez ce formulaire pour me contacter.
            </p>
        </div>
    </section>

    <!-- ══════════════════════════════════════
       FORMULAIRE DE DEMANDE
  ══════════════════════════════════════ -->
    <section class="contact-section">
        <div class="max-w">
            <h3>Décrivez votre projet</h3>

            <!-- Affichage des erreurs ou du succès -->
            <?php if (!empty($erreurs)) : ?>
                <div class="form-errors">
                    <ul>
                        <?php foreach ($erreurs as $erreur) : ?>
                            <li><?= htmlspecialchars($erreur) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php elseif ($succes) : ?>
                <div class="form-success">
                    ✔🟢 Votre demande a été envoyée avec succès. Je vous contacterai bientôt !
                </div>
            <?php endif; ?>
            <form method="POST" action="">
                <input type="hidden" name="csrf_token" value="<?= generer_token_csrf() ?>" />
                <div class="form-row">
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($nom) ?>" required />
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?= htmlspecialchars($email) ?>" required />
                    </div>
                </div>
                <div class="form-group">
                    <label for="sujet">Sujet</label>
                    <input type="text" id="sujet" name="sujet" value="<?= htmlspecialchars($sujet) ?>" required />
                </div>
                <div class="form-group">
                    <label for="type_projet">Type de projet</label>
                    <select id="type_projet" name="type_projet" required>
                        <option value="">Sélectionnez un type de projet</option>
                        <option value="web" <?= $type_projet === 'web' ? 'selected' : '' ?>>Projet web</option>
                        <option value="mobile" <?= $type_projet === 'mobile' ? 'selected' : '' ?>>Projet mobile</option>
                        <option value="design" <?= $type_projet === 'design' ? 'selected' : '' ?>>Projet de design</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="5" required><?= htmlspecialchars($description) ?></textarea>
                </div>
                <div class="form-group">
                    <label for="budget">Budget (en Fcfa)</label>
                    <input type="number" id="budget" name="budget" value="<?= htmlspecialchars($budget) ?>" step="0.01" min="0" required />
                </div>
                <button type="submit" class="btn-primary">Envoyer la demande</button>
            </form>
        </div>
    </section>
    <?php require '../composants/footer.php'; ?>
</body>

</html>