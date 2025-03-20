<?php

require_once "../config.php";


try {

    $db = new PDO(
        DB_CONNECT_TYPE . ":host=" . DB_CONNECT_HOST . ";dbname=" . DB_CONNECT_NAME . ";port=" . DB_CONNECT_PORT . ";charset=" . DB_CONNECT_CHARSET,
        DB_CONNECT_USER,
        DB_CONNECT_PWD,
    );

} catch (Exception $e) {

    die($e->getMessage());
}
$request = $db->query(' SELECT 
     thearticle.thearticletitle,
     thearticle.thearticletext,
     thearticle.thearticledate
 FROM 
     thearticle
 -- WHERE thearticle.idthearticle = 10000
 ORDER BY
     thearticle.thearticledate DESC
 LIMIT 20;');
$nbResponse = $request->rowCount();

try {
    if ($nbResponse > 0) {
        $articles = $request->fetchAll(PDO::FETCH_ASSOC);
    } else {
        throw new Exception("Pas encore de message", 10002);
    }
} catch (Exception $e) {
    die($error="Code : " . $e->getCode() . "<br>" . "Message : " . $e->getMessage() . "<br>");
}
$request->closeCursor();

include "../view/homepageView.php";






