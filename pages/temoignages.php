<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Témoignages — Alimatou Sadiya Diouf</title>
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
            <div class="section-tag">Témoignages</div>
            <h1 class="section-title">
                Ce qu'ils disent<br><em>de moi</em>
            </h1>
            <p>
                Les mots de ceux qui ont travaillé avec moi, étudié à mes côtés
                ou suivi mon parcours de près.
            </p>
        </div>
    </section>

    <!-- ══════════════════════════════════════
       TÉMOIGNAGES
  ══════════════════════════════════════ -->
    <section class="temoignages-section">
        <div class="max-w">

            <div class="temoignages-grid">

                <!-- Témoignage 1 -->
                <div class="temoignage-card reveal">
                    <div class="quote-icon">"</div>
                    <div class="stars">★★★★★</div>
                    <p class="temoignage-text">
                        C'est une étudiante très brillante, parfois un peu trop
                        perfectionniste, mais c'est justement ce qui la rend si
                        précieuse dans notre équipe. Elle ne lâche jamais avant
                        que ce soit parfait.
                    </p>
                    <div class="temoignage-author">
                        <div class="author-avatar-wrap">
                            <div class="author-avatar">BD</div>
                        </div>
                        <div>
                            <div class="author-name">Bineta DIA</div>
                            <div class="author-role">Camarade étudiante</div>
                        </div>
                    </div>
                </div>

                <!-- Témoignage 2 -->
                <div class="temoignage-card reveal reveal-d1">
                    <div class="quote-icon">"</div>
                    <div class="stars">★★★★★</div>
                    <p class="temoignage-text">
                        Travailler avec Alimatou peut paraître intense parfois,
                        mais la finalité demeure toujours positive. Elle apporte
                        une énergie et une rigueur qui tirent toute l'équipe vers
                        le haut.
                    </p>
                    <div class="temoignage-author">
                        <div class="author-avatar-wrap">
                            <div class="author-avatar">PAT</div>
                        </div>
                        <div>
                            <div class="author-name">Papa Amadou THOMAS</div>
                            <div class="author-role">Collègue et camarade étudiant</div>
                        </div>
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