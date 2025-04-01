<?php
# CONTROLLER
# contrôleur pour les personnes non connectées
// chargement des dépendances
require_once "../model/SectionModel.php"; // modèle de section
require_once "../model/ArticleModel.php"; // modèle d'article

//var_dump($pdo);

// ACTIONS
// chargement du menu MODEL
$menu = getAllSectionsMenu($db);
// chargement de la fonction qui récupère les 10 derniers articles
// champs : title , title_slug, text et article_date_create
// classés par article_date_create DESC
$articles = getTenLastArticles($db);

// nombre total d'articles publiés
$nbPublishedArticles = countArticlesPublished($db);

//var_dump($pdo);

// final on appel la vue
include_once "../view/public.homepage.view.php";