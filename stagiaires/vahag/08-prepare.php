<?php

require_once "config-dev.php";

try{
    // instanciation avec PDO
    $db = new PDO(
        DB_CONNECT_TYPE.":host=".DB_CONNECT_HOST.";dbname=".DB_CONNECT_NAME.";port=".DB_CONNECT_PORT.";charset=".DB_CONNECT_CHARSET,
        DB_CONNECT_USER,
        DB_CONNECT_PWD,
    );

    // on va attribuer à la connexion la manière de gérer les données par PHP
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    // activation des erreurs
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(Exception $e){

    die($e->getMessage());
}


// préparation de la requête avec des
// marqueurs nommés ( :nom )
$prepare = $db->prepare("
    SELECT * 
        FROM `article`
    WHERE id > :myid 
      AND article_date_create > :mydate
");

// on va donner des valeurs à nos
// marqueurs nommés
$prepare->bindParam(":mydate", $mondate, PDO::PARAM_STR,15);
$prepare->bindParam(":myid", $monid, PDO::PARAM_INT);


$monid = 930;
$mondate = "2024-06-01 01:01:01";

// exécution de la requête
$prepare->execute();

$nbRows = $prepare->rowCount();

$results = $prepare->fetchAll();

// bonne pratique
$prepare->closeCursor();

$monid = 960;

// exécution de la requête
$prepare->execute();

$nbRows2 = $prepare->rowCount();

$results2 = $prepare->fetchAll();

// bonne pratique
$prepare->closeCursor();

// marqueurs ?
$prepare2 = $db->prepare("
    SELECT * 
        FROM `article`
    WHERE id > ?
      AND article_date_create > ?
    LIMIT ?
");

// on va donner des valeurs à nos
// marqueurs non nommés
$prepare2->bindParam(1, $monid, PDO::PARAM_INT);
$prepare2->bindParam(2, $mondate, PDO::PARAM_STR,15);
$prepare2->bindParam(3, $monlimit, PDO::PARAM_INT);

$monlimit= 5;
$monid = 930;
$mondate = "2024-06-01 01:01:01";

$prepare2->execute();

$nbRows3 = $prepare2->rowCount();

$results3 = $prepare2->fetchAll();

$monlimit= 10;
$monid = 900;
$mondate = "2024-06-01 01:01:01";

$prepare2->execute();

$nbRows4 = $prepare2->rowCount();

$results4 = $prepare2->fetchAll();

$db = NULL;

var_dump($prepare2,$nbRows3,$nbRows4,$results3,$results4);
echo "<hr><br>";
var_dump($prepare,$nbRows,$nbRows2,$results,$results2);