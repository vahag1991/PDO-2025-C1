<?php
# Appel du fichier de configuration nommé config.php
require_once "../config.php";


# Connexion PDO
$dsn = DB_CONNECT_TYPE . ":host=" . DB_CONNECT_HOST . ";dbname=" . DB_CONNECT_NAME . ";port=" . DB_CONNECT_PORT . ";charset=" . DB_CONNECT_CHARSET;
$username = DB_CONNECT_USER;
$password = DB_CONNECT_PWD;

try {
    $db = new PDO($dsn, $username, $password);
    //echo "Connection successful!";
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    // arrêt du script et affichage de l'erreur de connexion
    die("Code erreur : {$e->getCode()} | Message : {$e->getMessage()}");
}

// Première requête SQL envoyée et récupérée

$request = $db->query('SELECT * FROM `thearticle`
         -- WHERE `thearticle`.`idthearticle` = 10000
         ORDER BY `thearticle`.`thearticledate` DESC
LIMIT 20;
');

// nombre de résultats
$numreq = $request->rowCount();
//echo $numreq;

// si le nombre de résultats est plus grand que 0
if ($numreq > 0) {
    $allUser = $request->fetchAll(PDO::FETCH_ASSOC);
    // transformation de la requête en format
    // lisible par PHP en utilisant fetchAll
    // Pour PHP, choisissez tableau associatif
    $request->closeCursor();
} else {
    // création d'un message contenant la chaine "Pas encore de message"
    $error = 'Pas encore de message';
}





# Bonnes pratiques

// fermeture de la requête (pour l'exécuter à nouveau)
// fermeture de connexion
$db = null;
// chargement de notre vue
include "../view/homepageView.php";
// débogage
// var_dump($allUser);