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
if(isset($_POST['surname'],$_POST['email'],$_POST['message'])){

    // création de variables locales
    $surname = strip_tags($_POST['surname']); // on retire les tags
    $surname = htmlspecialchars($surname,ENT_QUOTES);// on encode les caractères spéciaux
    $surname = trim($surname); // efface les espaces avant et arrière

    $email = filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);// faut false si mail pas valide

    $message = trim(htmlspecialchars(strip_tags($_POST['message']),ENT_QUOTES));

    // on est ici

    setArticle($db,$surname,$email,$message);
}

// si on a envoyé le formulaire avec les bons champs


// on veut récupérer tous les messages de la table `article` par date DESC

$messages = getAllMessagesByDateDesc($db);





# chargement de la vue
require_once "../view/homepage.view.php";

# bonne pratique
# fermeture de connexion
$db = null;