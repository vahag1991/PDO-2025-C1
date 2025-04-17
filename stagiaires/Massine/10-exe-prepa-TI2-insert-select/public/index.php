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
# connexion à PDO
try {
    // nouvelle instance de PDO
    $db = new PDO(
        DB_DSN,
        DB_CONNECT_USER,
        DB_CONNECT_PWD,
        // tableau d'options
        [
            // par défaut les résultats sont en tableau associatif
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            // Afficher les exceptions
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]
    );
} catch (Exception $e) {
    // arrêt du script et affichage du code erreur, et du message
    die("Code : {$e->getCode()} <br> Message : {$e->getMessage()}");
}

// si on a envoyé le formulaire avec les bons champs
// ça a fonctionné# code...
// tentative d'insertion


if (isset($_POST['name'], $_POST['email'],$_POST['text'], $_POST['date'])) {

    // tentative d'insertion
    $insert = setArticle($db, $_POST['name'],$_POST['email'], $_POST['text'], $_POST['date']);
    // ça a fonctionné
    if ($insert === true) {
        header("Location: ./");
        exit();
    } else {
        $error = $insert;
    }
}
$messages = getAllMessagesByDateDesc($db);



# ici notre code de traitement de la page
require_once "../view/homepage.view.php";



// on veut récupérer tous les messages de la table `article`

// $insert = setArticle($db, $name, $message, $date);
// setArticle($db, $name, $message, $date);




# chargement de la vue


# bonne pratique
# fermeture de connexion
$db = null;
