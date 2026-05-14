<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Alimatou Sadiya Diouf — Portfolio</title>
    <link rel="stylesheet" href="./css/style.css" />
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
    <?php require './composants/nav.php'; ?>
    <!-- ══════════════════════════════════════
       HERO
  ══════════════════════════════════════ -->
    <section id="hero">

        <!-- Décoration fond -->
        <div class="hero-deco deco-circle1"></div>
        <div class="hero-deco deco-circle2"></div>
        <div class="hero-deco deco-grain"></div>

        <div class="hero-inner max-w">

            <!-- Texte gauche -->
            <div class="hero-text">
                <div class="hero-badge">
                    <span class="badge-pulse"></span>
                    Disponible — Stage &amp; Alternance 2026
                </div>

                <h1 class="hero-title">
                    <span class="line-small">Bonjour, je suis</span>
                    <span class="line-name"> <em>Alimatou</em> <br> <em>Sadiya DIOUF</em> </span>
                    <span class="line-role">Etudiante en Ingénierie Informatique </span>
                </h1>

                <p class="hero-desc">
                    Étudiante en Ingénierie Informatique basée à l'Ecole Supérieure de Technologie et de Management de
                    Dakar, je suis passionnée par la création de solutions
                    numériques élégantes et fonctionnelles. Mon parcours académique m'a permis d'acquérir des
                    compétences solides en développement web, en gestion de réseaux et en design d'interaction. Je suis
                    constamment à la recherche de nouveaux défis pour apprendre et grandir dans le domaine de la
                    technologie.
                </p>

                <div class="hero-actions">
                    <a href="./pages/projets.php" class="btn-primary">Voir mes projets</a>
                    <a href="./pages/contact.php" class="btn-outline">Me contacter</a>
                </div>

                <div class="hero-socials">
                    <a href="https://github.com/sakuraaa1002" target="_blank" rel="noopener" class="social-link">
                        <!-- GitHub SVG -->
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <path
                                d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22" />
                        </svg>
                        GitHub
                    </a>
                    <a href="https://linkedin.com/in/alimatou-sadiya-diouf" target="_blank" rel="noopener"
                        class="social-link">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z" />
                            <rect x="2" y="9" width="4" height="12" />
                            <circle cx="4" cy="4" r="2" />
                        </svg>
                        LinkedIn
                    </a>
                </div>
            </div>

            <!-- Visuel droite -->
            <div class="hero-visual">
                <div class="photo-frame">
                    <div class="photo-border"></div>
                    <img src="./images/image.jpeg" alt="Photo d'Alimatou Sadiya Diouf" class="hero-photo" />
                    <div class="photo-placeholder"><span></span></div>
                </div>

                <!-- Cartes flottantes -->
                <div class="float-card card-top">
                    <span class="card-emoji">📍</span>
                    <div>
                        <div class="card-label">Basée à</div>
                        <div class="card-val">Dakar, Sénégal</div>
                    </div>
                </div>

                <div class="float-card card-bottom">
                    <span class="card-emoji">🎓</span>
                    <div>
                        <div class="card-label">Formation</div>
                        <div class="card-val">Génie Logiciel &amp; Administration Réseaux</div>
                    </div>
                </div>

                <!-- Bulle tech -->
                <div class="tech-bubble">
                    <span>HTML</span><span>CSS</span><span>JS</span><span>PHP</span>
                </div>
            </div>

        </div>

        <!-- Scroll hint -->
        <div class="scroll-hint" aria-hidden="true">
            <div class="scroll-mouse">
                <div class="scroll-wheel"></div>
            </div>
            <span>Défiler</span>
        </div>

    </section>

    <!-- ══════════════════════════════════════
       STATS RAPIDES
  ══════════════════════════════════════ -->
    <section id="stats">
        <div class="max-w stats-grid">
            <div class="stat-item reveal">
                <div class="stat-number">5<span>+</span></div>
                <div class="stat-label">Projets réalisés</div>
            </div>
            <div class="stat-divider"></div>
            <div class="stat-item reveal reveal-d1">
                <div class="stat-number">2<span>ans</span></div>
                <div class="stat-label">D'apprentissage</div>
            </div>
            <div class="stat-divider"></div>
            <div class="stat-item reveal reveal-d2">
                <div class="stat-number">3<span>+</span></div>
                <div class="stat-label">Technologies maîtrisées</div>
            </div>
            <div class="stat-divider"></div>
            <div class="stat-item reveal reveal-d3">
                <div class="stat-number">100<span>%</span></div>
                <div class="stat-label">Investissement</div>
            </div>
        </div>
    </section>

    <!-- ══════════════════════════════════════
       FOOTER
  ══════════════════════════════════════ -->
    <?php require './composants/footer.php'; ?>

    <!-- ══════════════════════════════════════
       JAVASCRIPT
  ══════════════════════════════════════ -->


</body>

</html>