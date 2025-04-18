<?php
# public/index.php

/*
 * Contrôleur frontal
 */

# chargement des constantes de connexion en mode prod
require_once "../config.php";
# chargement du modèle (fonctions)
require_once "../model/ArticleModel.php";


# connexion à PDO
try{
    $connectPDO = new PDO(DB_DSN, DB_CONNECT_USER, DB_CONNECT_PWD,
        [
            // par défaut les résultats des requêtes sont en tableau associatif
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            // Afficher les exceptions pour les requêtes
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]
    );
}catch(Exception $e){
    die("Code : {$e->getCode()} <br> Message : {$e->getMessage()}");
}


# ici notre code de traitement de la page

// si on a envoyé le formulaire avec les bons champs
if(isset($_POST['thename'],$_POST['theemail'],$_POST['themessage'])){
    // appel de la fonction qui insert
    $insert = addArticle($connectPDO,$_POST['thename'],$_POST['theemail'],$_POST['themessage']);
    // si c'est true (insertion réussie)
    if($insert===true) {
        // pour afficher la réussite
        $great = "Bravo, votre message est inséré";
    }else{
        // pour récupérer les messages d'erreurs
        $error = $insert;
    }

}


// on veut récupérer tous les messages de la table `article` par date DESC
$articles = getAllArticlesByDateDesc($connectPDO);
// on met le nombre d'article(s) récupérés dans une variable
$nbArticles = count($articles);





# chargement de la vue
require_once "../view/homepage.view.php";

# bonne pratique
# fermeture de connexion
$connectPDO = null;