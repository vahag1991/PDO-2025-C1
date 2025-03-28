<?php
# CONTROLLER
# contrôleur pour les personnes non connectées
// chargement des dépendances
require_once "../model/SectionModel.php"; // modèle de section
require_once "../model/ArticleModel.php"; // modèle de article

//var_dump($pdo);

// actions
// chargement du menu MODEL
$menu = getAllSectionsMenu($pdo);

//var_dump($pdo);

// final on appel la vue
include_once "../view/public.homepage.view.php";