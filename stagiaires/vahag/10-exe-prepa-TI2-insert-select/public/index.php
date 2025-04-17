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
 
// si on a envoyé le formulaire
if(isset($_POST['surname'],$_POST['email'],$_POST['message'])){
 
    // tentative d'insertion
    $insert = addNewarticle($db, $_POST['surname'],$_POST['email'],$_POST['message']);
    // ça a fonctionné
    if($insert===true){
        header("Location: ./");
        exit();
    }else{
        $error = $insert;
    }
}
 
 
 
# chargement de tous nos articles
$articles = getAllarticleByDateDesc($db);
 
 
 
 
 
# chargement de la vue
require_once "../view/homepage.view.php";
 
# bonne pratique
# fermeture de connexion
$db = null;
 