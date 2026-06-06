<?php
session_start();
require_once '../config/connexion.php';
require_once '../composants/fonction.php';
enregistrer_visite($pdo, 'projets.php');
//Recherche et affichage des projets
$recherche = nettoyer_champ($_GET['recherche'] ?? '');
if (!empty($recherche)) {
    $stmt = $pdo->prepare("SELECT * FROM projets WHERE titre LIKE ? OR description LIKE ? OR technologies LIKE ? OR ORDER BY date_creation DESC");
    $likeRecherche = '%' . $recherche . '%';
    $stmt->execute([$likeRecherche, $likeRecherche, $likeRecherche]);
} else {
    $stmt = $pdo->query("SELECT * FROM projets ORDER BY date_creation DESC");
}
$projets = $stmt->fetchAll();
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
            <form action="" method="GET">
                <div class="search-bar-wrap reveal">
                    <svg class="search-icon" width="18" height="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    <input type="text" name="recherche" class="search-input" placeholder="Rechercher un projet..." value="<?= $recherche ?>" />
                </div>
            </form>

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
                    <article class="project-card reveal" data-category="<?= htmlspecialchars($projet['titre']) ?>">
                        <div class="project-thumb <?= htmlspecialchars($projet['thumb']) ?>">
                            <?php if (!empty($projet['image'])) : ?>
                                <img src="../images/projets/<?= htmlspecialchars($projet['image']) ?>?> ?>" />
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