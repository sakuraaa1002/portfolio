<?php
$projets = [
    [
        'titre' => 'Portfolio Étudiant',
        'description' => "Mon premier site web personnel — une vitrine de mes compétences et réalisations académiques. Le projet qui m'a donné le goût du développement front-end.",
        'technologies' => ['HTML5', 'CSS3', 'JavaScript'],
        'categorie' => 'web',
        'thumb' => 'thumb-terracotta',
        'chip' => 'Web',
        'image' => '/Portfolioo1/images/portfolio.png',
    ],
    [
        'titre' => 'Maquette UI — Application Web',
        'description' => "Conception d'une maquette d'application web sur Figma. Travail sur l'ergonomie, les couleurs et l'expérience utilisateur.",
        'technologies' => ['Figma', 'UI/UX', 'Prototypage'],
        'categorie' => 'design',
        'thumb' => 'thumb-terracotta',
        'chip' => 'Design',
        'image' => '/Portfolioo1/images/Capture-ecran.png',
    ],
    [
        'titre' => 'Site Vitrine — Projet Académique',
        'description' => "Réalisation d'un site vitrine complet en équipe dans le cadre d'un projet universitaire.",
        'technologies' => ['HTML5', 'CSS3', 'PHP', 'Arduino', 'C++'],
        'categorie' => 'web',
        'thumb' => 'thumb-sage',
        'chip' => 'Projet Tutoré',
        'icon' => 'En cours...🌐',
        'image' => null, // Image à venir
    ],
    [
        'titre' => 'Poubelle Intelligente',
        'description' => "Système embarqué avec capteurs de détection et gestion automatique des déchets. Mon premier projet hardware — apprendre en touchant les fils !",
        'technologies' => ['C++', 'Arduino'],
        'categorie' => 'embarque',
        'thumb' => 'thumb-sage',
        'chip' => 'Embarqué',
        'image' => '/Portfolioo1/images/poubelle intelligente.jpeg',
    ],
    [
        'titre' => 'Scent House',
        'description' => "Lancement de ma première marque de parfumerie. De l'idée au produit fini — branding, marketing, gestion de stock. Une aventure qui m'a tout appris sur l'entrepreneuriat.",
        'technologies' => ['Branding', 'Marketing', 'Gestion'],
        'categorie' => 'business',
        'thumb' => 'thumb-cream',
        'chip' => 'Business',
        'image' => '/Portfolioo1/images/Logo.png',
    ],
];
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Projets — Alimatou Sadiya Diouf</title>
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
            <div class="section-tag">Projets</div>
            <h1 class="section-title">
                Ce que j'ai<br><em>construit</em>
            </h1>
            <p>
                Des projets académiques, personnels et entrepreneuriaux.
                Chacun raconte une histoire et une leçon apprise.
            </p>
        </div>
    </section>

    <!-- ══════════════════════════════════════
       RECHERCHE + FILTRES
  ══════════════════════════════════════ -->
    <section class="projects-section">
        <div class="max-w">

            <!-- Barre de recherche -->
            <div class="search-bar-wrap reveal">
                <svg class="search-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2">
                    <circle cx="11" cy="11" r="8" />
                    <path d="m21 21-4.35-4.35" />
                </svg>
                <input type="text" id="searchInput" placeholder="Rechercher un projet, une technologie…" />
            </div>

            <!-- Filtres par catégorie -->
            <div class="projects-filters reveal reveal-d1">
                <button class="filter-btn active" data-filter="tous">Tous</button>
                <button class="filter-btn" data-filter="web">Web</button>
                <button class="filter-btn" data-filter="embarque">Embarqué</button>
                <button class="filter-btn" data-filter="business">Business</button>
                <button class="filter-btn" data-filter="design">Design</button>
            </div>

            <!-- Grille projets -->
            <div class="projects-full-grid" id="projectsGrid">

                <!-- Projet 1 -->
                <?php foreach ($projets as $projet) : ?>
                    <article class="project-card reveal" data-category="htmlspecialchars($projet['categorie'])?>"
                        data-keywords="htmlspecialchars($projet['keywords'])?>">
                        <div class="project-thumb <?= htmlspecialchars($projet['thumb']) ?>">
                            <?php if (!empty($projet['image'])) : ?>
                                <img src="<?= htmlspecialchars($projet['image']) ?>" alt="<?= htmlspecialchars($projet['titre']) ?>" class="project-thumb-img" />
                            <?php endif; ?>
                            <div class="project-thumb-fallback">
                                <span class="project-icon"> <?= !empty($projet['icon']) ? $projet['icon'] : '' ?></span>
                            </div>
                            <span class="project-tag-chip"><?= htmlspecialchars($projet['chip']) ?></span>
                        </div>
                        <div class="project-body">
                            <h3 class="project-title"><?= htmlspecialchars($projet['titre']) ?></h3>
                            <p class="project-desc">
                                <?= htmlspecialchars($projet['description']) ?>
                            </p>
                            <div class="project-techs">
                                <?php foreach ($projet['technologies'] as $tech) : ?>
                                    <span class="tech-chip"><?= htmlspecialchars($tech) ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
                <div class="no-results" id="noResults" style="display:none ">
                    <p>Aucun projet trouvé.</p>
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