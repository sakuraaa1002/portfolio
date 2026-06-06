<?php
require '../composants/fonction.php';
session_start();
require_once '../config/connexion.php';
enregistrer_visite($pdo, 'contact.php'); ?>
<?php
$erreurs = [];
$succes = false;
$prenom = '';
$nom = '';
$email = '';
$sujet = '';
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verifier_token_csrf($_POST['csrf_token'] ?? '')) {
        $erreurs[] = "Token CSRF invalide. Veuillez réessayer.";
    } else {
    }
    // Nettoyage des données
    $prenom = nettoyer_champ($_POST['prenom'] ?? '');
    $nom = nettoyer_champ($_POST['nom'] ?? '');
    $email = nettoyer_champ($_POST['email'] ?? '');
    $sujet = nettoyer_champ($_POST['sujet'] ?? '');
    $message = nettoyer_champ($_POST['message'] ?? '');

    // Validation des champs
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
    if (!champ_requis($sujet)) {
        $erreurs[] = "Le sujet est requis.";
    }
    if (!champ_requis($message)) {
        $erreurs[] = "Le message est requis.";
    }

    // Si pas d'erreurs, traiter le formulaire (ex: envoyer un email)
    if (empty($erreurs)) {
        $nom_complet = $prenom . ' ' . $nom;
        $stmt = $pdo->prepare("INSERT INTO messages_contact (nom, email, message) VALUES (?, ?, ?)");
        $stmt->execute([$nom_complet, $email, $sujet . '-' . $message]);

        // Code pour envoyer l'email ou enregistrer le message
        // ...

        $succes = true;
        // Réinitialiser les champs après succès
        $prenom = '';
        $nom = '';
        $email = '';
        $sujet = '';
        $message = '';
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact — Alimatou Sadiya Diouf</title>
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
            <div class="section-tag">Contact</div>
            <h1 class="section-title">
                Travaillons<br><em>ensemble</em>
            </h1>
            <p>
                Une idée de projet, une proposition de stage ou simplement
                envie d'échanger ? Je suis disponible!
            </p>
        </div>
    </section>

    <!-- ══════════════════════════════════════
       CONTACT
  ══════════════════════════════════════ -->
    <section class="contact-section">
        <div class="max-w">
            <div class="contact-grid">

                <!-- Infos contact -->
                <div class="contact-info reveal">
                    <h3>Une idée ?<br>Parlons-en.</h3>
                    <p>
                        Que vous ayez un projet concret, une mission de stage ou
                        simplement envie d'échanger, je suis disponible.
                    </p>

                    <div class="contact-links">

                        <a href="mailto:miss.sereree10@email.com" class="contact-link">
                            <div class="contact-link-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.8">
                                    <rect x="2" y="4" width="20" height="16" rx="2" />
                                    <path d="M2 7l10 7 10-7" />
                                </svg>
                            </div>
                            <div>
                                <div class="contact-link-label">Email</div>
                                <div class="contact-link-val">miss.sereree.10@email.com</div>
                            </div>
                        </a>

                        <a href="https://linkedin.com/in/alimatou-sadiya-diouf" target="_blank" rel="noopener"
                            class="contact-link">
                            <div class="contact-link-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.8">
                                    <path
                                        d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z" />
                                    <rect x="2" y="9" width="4" height="12" />
                                    <circle cx="4" cy="4" r="2" />
                                </svg>
                            </div>
                            <div>
                                <div class="contact-link-label">LinkedIn</div>
                                <div class="contact-link-val">linkedin.com/in/alimatou-sadiya-diouf</div>
                            </div>
                        </a>

                        <a href="https://github.com/sakuraaa1002" target="_blank" rel="noopener" class="contact-link">
                            <div class="contact-link-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.8">
                                    <path
                                        d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22" />
                                </svg>
                            </div>
                            <div>
                                <div class="contact-link-label">GitHub</div>
                                <div class="contact-link-val">github.com/sakuraaa1002</div>
                            </div>
                        </a>

                        <a href="https://www.instagram.com/__sokhna_si__" target="_blank" rel="noopener"
                            class="contact-link">
                            <div class="contact-link-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.8">
                                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5" />
                                    <circle cx="12" cy="12" r="4" />
                                    <circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none" />
                                </svg>
                            </div>
                            <div>
                                <div class="contact-link-label">Instagram</div>
                                <div class="contact-link-val">@__sokhna_si__</div>
                            </div>
                        </a>

                        <a href="https://wa.me/221XXXXXXXXX" target="_blank" rel="noopener" class="contact-link">
                            <div class="contact-link-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.8">
                                    <path
                                        d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z" />
                                </svg>
                            </div>
                            <div>
                                <div class="contact-link-label">WhatsApp</div>
                                <div class="contact-link-val">+221 75 658 26 76</div>
                            </div>
                        </a>

                    </div>
                </div>

                <!-- Formulaire -->
                <div class="reveal reveal-d2">
                    <div class="contact-form">
                        <h3>Envoie-moi un message</h3>
                        <?php if ($succes) : ?>
                            <div class="form-success">
                                ✅ Ton message a été envoyé avec succès ! Je te réponds dans les 24h.
                            </div>

                        <?php endif; ?>
                        <?php if (!empty($erreurs)) : ?>
                            <div class="alert-erreur">
                                <ul>
                                    <?php foreach ($erreurs as $erreur) : ?>
                                        <li><?= $erreur ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <form method="POST" action="">
                            <input type="hidden" name="csrf_token" value="<?= generer_token_csrf() ?>" />
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="prenom">Prénom</label>
                                    <input type="text" id="prenom" name="prenom" placeholder="Ton prénom" value="<?= $prenom ?>" />
                                </div>
                                <div class="form-group">
                                    <label for="nom">Nom</label>
                                    <input type="text" id="nom" name="nom" placeholder="Ton nom" value="<?= $nom ?>" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" placeholder="ton@email.com" value="<?= $email ?>" />
                            </div>

                            <div class="form-group">
                                <label for="sujet">Sujet</label>
                                <input type="text" id="sujet" name="sujet" placeholder="Proposition de stage, projet freelance…" value="<?= $sujet ?>" />
                            </div>

                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea id="message" name="message" placeholder="Décris ton projet ou ta demande…"><?= $message ?></textarea>
                            </div>

                            <button type="submit" class="btn-primary" style="width:100%; justify-content:center;">
                                Envoyer le message ✉️
                            </button>


                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ══════════════════════════════════════
       FOOTER
  ══════════════════════════════════════ -->
    <?php require '../composants/footer.php'; ?>


</body>

</html>