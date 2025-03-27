<?php
# contrôleur pour les personnes non connectées
// chargement des dépendances
require_once "../model/SectionModel.php"; // modèle de section

// actions
// chargement du menu
$menu = getAllSectionsMenu($pdo);

//var_dump($pdo);

// final on appel la vue
include_once "../view/public.homepage.view.php";