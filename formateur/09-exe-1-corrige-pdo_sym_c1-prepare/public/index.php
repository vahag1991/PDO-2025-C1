<?php
# CONTROLLER
/*
 * Contrôleur frontal
 */

# chargement des variables indispensables
require_once '../config-dev.php';

# connexion à la base de donnée MariaDB pdo_sym_c1
try{
    // instanciation avec PDO
    $db = new PDO(
        dsn:DB_CONNECT_TYPE.":host=".DB_CONNECT_HOST.";dbname=".DB_CONNECT_NAME.";port=".DB_CONNECT_PORT.";charset=".DB_CONNECT_CHARSET,
        username:DB_CONNECT_USER,
        password:DB_CONNECT_PWD,
    );
    // affichage exception en cas d'erreurs SQL
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // les données récupérées de SQL sont formatés par défaut en tableau associatif
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}catch(Exception $e){
    // arrêt du script et affichage de l'erreur de connexion
    die("Code erreur : {$e->getCode()} | Message : {$e->getMessage()}");
}


// on va chercher le contrôleur public, celui utilisé pour les non-connectés
include "../controller/publicController.php";

// bonne pratique (fermeture de la connexion)
$db = null;