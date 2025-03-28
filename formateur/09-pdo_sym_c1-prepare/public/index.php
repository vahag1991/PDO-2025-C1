<?php
# CONTROLLER
/*
 * Contrôleur frontal
 */

# chargement des variables indispensables
require_once '../config-dev.php';

# connexion à la base de donnée MariaDB pdo_sym_c1
try{
    // instanciation de PDO
    $pdo = new PDO(
        DB_CONNECT_TYPE.":host=".DB_CONNECT_HOST.";dbname=".DB_CONNECT_NAME.";port=".DB_CONNECT_PORT.";charset=".DB_CONNECT_CHARSET,
        DB_CONNECT_USER,
        DB_CONNECT_PWD,
    );

    // on va attribuer à la connexion la manière de gérer les données par PHP
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    // activation des erreurs
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(Exception $e){

    die($e->getMessage());
}

// on va chercher le contrôleur public, celui utilisé pour les non-connectés
include "../controller/publicController.php";

// bonne pratique
$pdo = null;