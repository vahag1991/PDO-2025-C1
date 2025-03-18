<?php
# Appel du fichier de configuration
require_once "config.php";

# Connexion PDO

try{
    // instanciation avec PDO
    $db = new PDO(
        dsn:DB_CONNECT_TYPE.":host=".DB_CONNECT_HOST.";dbname=".DB_CONNECT_NAME.";port=".DB_CONNECT_PORT.";charset=".DB_CONNECT_CHARSET,
        username:DB_CONNECT_USER,
        password:DB_CONNECT_PWD,
    );
    // pour être certain de l'affichage des erreurs des requêtes
    // activations des erreurs sur n'importe quel serveur
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(Exception $e){
    // arrêt du script et affichage de l'erreur de connexion
    die("Code erreur : {$e->getCode()} | Message : {$e->getMessage()}");
}


// Première requête SQL envoyée et récupérée
$request = $db->query("SELECT * FROM theuser");

// nombre de résultats
$nbResponse = $request->rowCount();

// transformation de la requête en format
// lisible par PHP en utilisant fetch ou fetchAll
// Pour PHP, le tableau associatif est le mieux
$response = $request->fetchAll(PDO::FETCH_ASSOC);

# Bonnes pratiques

// fermeture de la requête (pour l'exécuter à nouveau):
$request->closeCursor();

// fermeture de connexion
$db = null;


// chargement de notre vue
include "index.view.php";
// débogage
#var_dump($db,$request,$nbResponse,$response);




