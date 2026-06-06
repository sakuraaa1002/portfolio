<?php
// Admin index page
session_start();
require_once '../config/connexion.php';
require_once '../composants/fonction.php';
//Si admin est déj connecté redirection vers dashboard
if (isset($_SESSION['admin_id'])) {
    header('Location: dashboard.php');
    exit();
}
$erreur = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verifier_token_csrf($_POST['csrf_token'] ?? '')) {
        $erreur = "Identifiants incorrects. Veuillez réessayer.";
    } else {
        $email = nettoyer_champ($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        if (champ_requis($email) && champ_requis($password)) {
            $stmt = $pdo->prepare("SELECT * FROM administrateurs WHERE email = ?");
            $stmt->execute([$email]);
            $administrateurs = $stmt->fetch();
            if ($administrateurs && password_verify($password, $administrateurs['mot_de_passe'])) {
                session_regenerate_id(true);
                $_SESSION['admin_id'] = $administrateurs['id'];
                $_SESSION['admin_nom'] = $administrateurs['nom'];
                header('Location: dashboard.php');
                exit();
            } else {
                $erreur = "Identifiants invalides.";
            }
        } else {
            $erreur = "Tous les champs sont requis.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login — Alimatou Sadiya Diouf</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Outfit:wght@300;400;500;600&display=swap"
        rel="stylesheet" />
</head>

<body>
    <section class="admin-login-section">
        <div class="admin-login-container">
            <h1>Admin Login</h1>
            <?php if (!empty($erreur)) : ?>
                <div class="form-error">
                    <?= htmlspecialchars($erreur) ?>
                </div>
            <?php endif; ?>
            <form method="POST" action="">
                <input type="hidden" name="csrf_token" value="<?= generer_token_csrf() ?>">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required />
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" required />
                </div>
                <button type="submit">Se connecter</button>
            </form>
        </div>
    </section>
</body>

</html>