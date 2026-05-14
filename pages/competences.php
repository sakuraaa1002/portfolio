<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Compétences — Alimatou Sadiya Diouf</title>
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
            <div class="section-tag">Compétences</div>
            <h1 class="section-title">
                Ce que je sais<br><em>faire vraiment</em>
            </h1>
            <p>
                Un socle technique construit à travers des formations, des projets
                personnels et beaucoup de curiosité. Voici mes outils du quotidien.
            </p>
        </div>
    </section>

    <!-- ══════════════════════════════════════
       COMPÉTENCES TECHNIQUES
  ══════════════════════════════════════ -->
    <section class="skills-section">
        <div class="max-w">
            <div class="section-tag reveal">Technique</div>
            <h2 class="section-title reveal reveal-d1">Mes <em>compétences</em></h2>
            <p class="section-sub reveal reveal-d2">
                Chaque barre représente mon niveau de maîtrise actuel — honnêtement.
            </p>

            <div class="skills-grid">

                <!-- React / HTML -->
                <div class="skill-card reveal">
                    <div class="skill-icon-wrap">
                        <div class="skill-icon-fallback">⚛️</div>
                    </div>
                    <div class="skill-name"> HTML</div>
                    <div class="skill-desc">
                        Développement d'interfaces dynamiques et modernes.
                        C'est là où je me sens le plus à l'aise — créer ce qu'on voit.
                    </div>
                    <div class="skill-bar-track">
                        <div class="skill-bar-fill" style="--bar-width: 90%"></div>
                    </div>
                    <div class="skill-pct">90%</div>
                </div>

                <!-- CSS / Design -->
                <div class="skill-card reveal reveal-d1">
                    <div class="skill-icon-wrap">
                        <div class="skill-icon-fallback">🎨</div>
                    </div>
                    <div class="skill-name">CSS </div>
                    <div class="skill-desc">
                        Mise en page, animations, responsive design.
                        Je crois que le style, c'est aussi une compétence technique.
                    </div>
                    <div class="skill-bar-track">
                        <div class="skill-bar-fill" style="--bar-width: 85%"></div>
                    </div>
                    <div class="skill-pct">85%</div>
                </div>

                <!-- Analyses / Maths -->
                <div class="skill-card reveal reveal-d1">
                    <div class="skill-icon-wrap">
                        <div class="skill-icon-fallback">➕</div>
                    </div>
                    <div class="skill-name">Analyses / Maths</div>
                    <div class="skill-desc">
                        Étude approfondie des fonctions, limites, dérivées et intégrales.
                        La rigueur mathématique nourrit ma logique de développeuse.
                    </div>
                    <div class="skill-bar-track">
                        <div class="skill-bar-fill" style="--bar-width: 80%"></div>
                    </div>
                    <div class="skill-pct">80%</div>
                </div>

                <!-- Python -->
                <div class="skill-card reveal reveal-d2">
                    <div class="skill-icon-wrap">
                        <div class="skill-icon-fallback">🐍</div>
                    </div>
                    <div class="skill-name">Python </div>
                    <div class="skill-desc">
                        Scripting, analyse de données et initiation au machine learning
                        avec Pandas et NumPy. En progression constante.
                    </div>
                    <div class="skill-bar-track">
                        <div class="skill-bar-fill" style="--bar-width: 20%"></div>
                    </div>
                    <div class="skill-pct">20%</div>
                </div>

                <!-- Base de données -->
                <div class="skill-card reveal reveal-d2">
                    <div class="skill-icon-wrap">
                        <div class="skill-icon-fallback">🗄️</div>
                    </div>
                    <div class="skill-name">Base de données</div>
                    <div class="skill-desc">
                        Conception et manipulation de bases SQL (MySQL, PostgreSQL)
                        et NoSQL (MongoDB). Je progresse activement.
                    </div>
                    <div class="skill-bar-track">
                        <div class="skill-bar-fill" style="--bar-width: 15%"></div>
                    </div>
                    <div class="skill-pct">15%</div>
                </div>

                <!-- Arduino / Embarqué -->
                <div class="skill-card reveal reveal-d3">
                    <div class="skill-icon-wrap">
                        <div class="skill-icon-fallback">🤖</div>
                    </div>
                    <div class="skill-name">Arduino / Embarqué</div>
                    <div class="skill-desc">
                        Programmation de systèmes embarqués en C++.
                        Expérience concrète avec la Poubelle Intelligente.
                    </div>
                    <div class="skill-bar-track">
                        <div class="skill-bar-fill" style="--bar-width: 55%"></div>
                    </div>
                    <div class="skill-pct">55%</div>
                </div>

            </div>
        </div>
    </section>

    <!-- ══════════════════════════════════════
       OUTILS & TECHNOLOGIES
  ══════════════════════════════════════ -->
    <section class="tech-badges-section">
        <div class="max-w">
            <div class="section-tag reveal">Outils</div>
            <h2 class="section-title reveal reveal-d1">
                Mon <em>environnement</em> de travail
            </h2>
            <p class="section-sub reveal reveal-d2">
                Les outils que j'utilise au quotidien pour concevoir, développer et livrer.
            </p>

            <div class="badges-grid reveal reveal-d2">

                <div class="badge-item">
                    <span class="badge-icon-fallback">💻</span>
                    VS Code
                </div>

                <div class="badge-item">
                    <span class="badge-icon-fallback">🎨</span>
                    Figma
                </div>

                <div class="badge-item">
                    <span class="badge-icon-fallback">🐙</span>
                    GitHub
                </div>

                <div class="badge-item">
                    <span class="badge-icon-fallback">🖼️</span>
                    Canva
                </div>

                <div class="badge-item">
                    <span class="badge-icon-fallback">🔧</span>
                    Arduino IDE
                </div>
                <div class="badge-item">
                    <span class="badge-icon-fallback">🗄️</span>
                    MySQL
                </div>

                <div class="badge-item">
                    <span class="badge-icon-fallback">🧠</span>
                    IA Générative
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


</body>

</html>