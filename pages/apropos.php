<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>À Propos — Alimatou Sadiya Diouf</title>
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
            <div class="section-tag">À propos</div>
            <h1 class="section-title">
                Curieuse par nature,<br><em>créative par passion</em>
            </h1>
            <p>
                Je suis Alimatou Sadiya Diouf — étudiante et entrepreneuse
                basée à Dakar. Voici mon histoire.
            </p>
        </div>
    </section>

    <!-- ══════════════════════════════════════
       QUI SUIS-JE
  ══════════════════════════════════════ -->
    <section class="about-section">
        <div class="max-w">
            <div class="about-grid">

                <!-- Photo -->
                <div class="about-photo-wrap reveal">
                    <img src="../images/image.jpeg" alt="Alimatou Sadiya Diouf" class="about-photo" />

                    <div class="about-deco-border"></div>
                </div>

                <!-- Texte -->
                <div class="about-content">
                    <div class="section-tag reveal">Qui suis-je ?</div>

                    <p class="reveal reveal-d1">
                        Je m'appelle <strong>Alimatou Sadiya Diouf</strong>. Je suis étudiante en
                        Licence Génie Logiciel et Administration Réseaux. Depuis que j'ai écrit
                        mes premières lignes de code, j'ai compris que la technologie n'est pas
                        juste un outil, c'est un langage pour exprimer des idées, résoudre des
                        problèmes et créer de la valeur.
                    </p>

                    <p class="reveal reveal-d2">
                        Mon parcours mêle rigueur académique et curiosité sans limites : projets
                        en équipe, hackathons, et même une aventure entrepreneuriale avec le
                        lancement de ma propre marque de parfumerie. Chaque expérience m'a appris
                        quelque chose que les cours ne peuvent pas enseigner.
                    </p>

                    <p class="reveal reveal-d2">
                        En dehors du code, je m'intéresse au design d'interaction et à l'IA appliquée à la création
                        visuelle. Je crois que
                        les meilleures interfaces sont celles qui semblent avoir été faites
                        pour toi, et c'est ce que j'essaie de créer.
                    </p>

                    <!-- Tags -->
                    <div class="about-tags reveal reveal-d3">
                        <span class="about-tag">💻 Développement Web</span>
                        <span class="about-tag">🤖 Systèmes Embarqués</span>
                        <span class="about-tag">🌿 Entrepreneuriat</span>
                        <span class="about-tag">🧠 Data Science</span>
                    </div>

                    <!-- Stats -->
                    <div class="about-stats reveal reveal-d3">
                        <div class="about-stat">
                            <div class="about-stat-num">5+</div>
                            <div class="about-stat-lbl">Projets réalisés</div>
                        </div>
                        <div class="about-stat">
                            <div class="about-stat-num">2</div>
                            <div class="about-stat-lbl">Ans d'expérience</div>
                        </div>
                        <div class="about-stat">
                            <div class="about-stat-num">100%</div>
                            <div class="about-stat-lbl">Investissement</div>
                        </div>
                    </div>

                    <!-- CV -->
                    <div class="reveal reveal-d3" style="margin-top:2rem;">
                        <a href="./images/cv.pdf" download class="btn-primary">
                            Télécharger mon CV →
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- ══════════════════════════════════════
       TIMELINE — MON PARCOURS
  ══════════════════════════════════════ -->
    <section style="background: var(--cream-dark); padding: 6rem 5%;">
        <div class="max-w">
            <div class="section-tag reveal">Mon parcours</div>
            <h2 class="section-title reveal reveal-d1">
                De la curiosité<br><em>à la compétence</em>
            </h2>
            <p class="section-sub reveal reveal-d2" style="margin-bottom:3rem;">
                Voici les grandes étapes qui ont façonné qui je suis aujourd'hui.
            </p>

            <div class="timeline">

                <div class="timeline-item reveal">
                    <div class="timeline-date">2025</div>
                    <div class="timeline-title">🎓 Entrée en Licence Informatique</div>
                    <div class="timeline-desc">
                        Début de ma formation en Génie Logiciel et Administration Réseaux.
                        Premiers pas en HTML, CSS et algorithmique.
                    </div>
                </div>

                <div class="timeline-item reveal reveal-d1">
                    <div class="timeline-date">2025</div>
                    <div class="timeline-title">💻 Premier projet web</div>
                    <div class="timeline-desc">
                        Réalisation de mon premier portfolio étudiant en HTML et CSS.
                        Découverte du JavaScript et de la logique front-end.
                    </div>
                </div>

                <div class="timeline-item reveal reveal-d1">
                    <div class="timeline-date">2026</div>
                    <div class="timeline-title">🤖 Projet embarqué — Poubelle Intelligente</div>
                    <div class="timeline-desc">
                        Conception d'une poubelle intelligente avec Arduino, capteurs et matériaux recyclés.
                        Première expérience en C++ et en électronique appliquée.
                    </div>
                </div>

                <div class="timeline-item reveal reveal-d2">
                    <div class="timeline-date">2025</div>
                    <div class="timeline-title">🌿 Lancement de Scent House</div>
                    <div class="timeline-desc">
                        Création de ma première marque de parfumerie. Une aventure
                        entrepreneuriale qui m'a appris le branding, le marketing
                        et la gestion de projet.
                    </div>
                </div>

                <div class="timeline-item reveal reveal-d2">
                    <div class="timeline-date">2026 — aujourd'hui</div>
                    <div class="timeline-title">🚀 Approfondissement & nouveaux projets</div>
                    <div class="timeline-desc">
                        Python, bases de données, hackathons nationaux et internationaux.
                        En recherche active de stage ou alternance pour mettre
                        mes compétences au service d'une équipe.
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ══════════════════════════════════════
       CE QUI ME PASSIONNE
  ══════════════════════════════════════ -->
    <section style="background: var(--white); padding: 6rem 5%;">
        <div class="max-w">
            <div class="section-tag reveal">Mes passions</div>
            <h2 class="section-title reveal reveal-d1">
                Au-delà du code,<br><em>ce qui m'anime</em>
            </h2>

            <div class="passions-grid">

                <div class="passion-card reveal">
                    <div class="passion-icon">🥋</div>
                    <h3>Sport</h3>
                    <p>Je pratique du Vovinam Viet Vo Dao depuis plusieurs années et cet art martial m'a appris à
                        persévèrer dans les moments difficiles et comme on dit en vovinam:"être fort pour être utile".
                    </p>
                </div>

                <div class="passion-card reveal reveal-d1">
                    <div class="passion-icon">🌍</div>
                    <h3>Tech Africaine</h3>
                    <p>Je crois profondément au potentiel de l'Afrique dans le secteur technologique. Je veux contribuer
                        à construire des solutions pensées pour notre contexte.</p>
                </div>

                <div class="passion-card reveal reveal-d2">
                    <div class="passion-icon">🧠</div>
                    <h3>Intelligence Artificielle</h3>
                    <p>L'IA générative appliquée à la création visuelle me fascine. J'explore ses possibilités pour
                        enrichir mes projets de design et de développement.</p>
                </div>

                <div class="passion-card reveal reveal-d3">
                    <div class="passion-icon">🌿</div>
                    <h3>Entrepreneuriat</h3>
                    <p>Créer quelque chose de zéro, le voir prendre vie et toucher des gens — c'est une sensation
                        incomparable que j'ai découverte avec Scent House.</p>
                </div>

            </div>
        </div>
    </section>

    <!-- ══════════════════════════════════════
       FOOTER
  ══════════════════════════════════════ -->
    <?php require '../composants/footer.php'; ?>

    <!-- ══════════════════════════════════════
       JAVASCRIPT
  ══════════════════════════════════════ -->


</body>

</html>