<?php
# CONTROLLER
# contrôleur pour les personnes non connectées
// chargement des dépendances

require_once "../model/ArticleModel.php"; // modèle de article

//var_dump($pdo);

// actions
// chargement de la fonction qui récupère les 10 derniers articles
// champs : title , title_slug, text et article_date_create
// classés par article_date_create DESC

//var_dump($pdo);

// final on appel la vue
include_once "../view/public.homepage.view.php";