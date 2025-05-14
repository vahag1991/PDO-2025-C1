<?php
# public/index.php

/*
 * Contrôleur frontal
 */

# chargement des constantes de connexion en mode prod
require_once "../config.php";
# chargement du modèle (fonctions)
require_once "../model/MessagesModel.php";

# connexion à PDO
try{
    // nouvelle instance de PDO
    $db = new PDO(DB_DSN, DB_CONNECT_USER, DB_CONNECT_PWD,
        // tableau d'options
        [
            // par défaut les résultats sont en tableau associatif
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            // Afficher les exceptions
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]
    );
}catch(Exception $e){
    // arrêt du script et affichage du code erreur, et du message
    die("Code : {$e->getCode()} <br> Message : {$e->getMessage()}");
}

# ici notre code de traitement de la page

// si on a envoyé le formulaire avec les bons champs


    // on va tenter l'insertion, car on a protégé addMessage()







/*
 * Bonus mise en place de la pagination
 */

// on vérifie sur quelle page on est (et que c'est un string qui contient que des numériques sans "." ni "-" => ctype_digit) !empty vaut == 0 (non vide)
if(isset($_GET[PAGINATION_GET])&& ctype_digit($_GET[PAGINATION_GET])&& !empty($_GET[PAGINATION_GET])){
    $page = $_GET[PAGINATION_GET];
// accueil ou attaque
}else{
    // page par défaut
    $page = 1;
}

//echo $page;


# on compte le nombre total de messages
$nbArticle = countTotalArticle($db);

# on récupère la pagination en utilisant les constantes de config.php
$pagination = pagination($nbArticle,$page,PAGINATION_GET,PAGINATION_NB);



# pour obtenir le $offset pour les messages page
# $page = 1; => (1-1)*3 => 0
# $page = 2; => (2-1)*3 => 3
# $page = 3; => (3-1)*3 => 6
# $page = 4; => (4-1)*3 => 9
$offsetArticles = ($page-1)*PAGINATION_NB;


# on veut récupérer les messages de la page courante
$messages = getArticleByPage($db,$offsetArticles,PAGINATION_NB);

# chargement de la vue
require_once "../view/homepage.view.php";

# bonne pratique
# fermeture de connexion
$db = null;