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
        DB_CONNECT_TYPE.":host=".DB_CONNECT_HOST.";dbname=".DB_CONNECT_NAME.";port=".DB_CONNECT_PORT.";charset=".DB_CONNECT_CHARSET,
        DB_CONNECT_USER,
        DB_CONNECT_PWD,

    );
  
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(Exception $e){
    // arrêt du script et affichage de l'erreur de connexion
    die("Code erreur : {$e->getCode()} | Message : {$e->getMessage()}");
}

// on va chercher le contrôleur public, celui utilisé pour les non-connectés
include "../controller/publicController.php";

// bonne pratique (fermeture de la connexion)
$db = null;