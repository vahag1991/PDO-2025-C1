<?php
# Appel du fichier de configuration nommé config.php
// include "config.php";
// config.dev.php doit rester dans le dossier


# Connexion PDO
try {
    $db = new PDO(
        'mysql:host=localhost;dbname=pdo_c1;port=3306;charset=utf8',
        'root',
        '',

    );
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die($e->getMessage());
}

// Première requête SQL envoyée et récupérée
/*
 * Sélectionnez les champs `thearticle`.`thearticletitle`,
 * `thearticle`.`thearticletext`,
 *  et `thearticle`.`thearticledate` des
 *  20 derniers `thearticle` classé par `thearticle`.`thearticledate`descendant.
 */
$request = $db->query('SELECT 
    thearticle.thearticletitle,
    thearticle.thearticletext,
    thearticle.thearticledate
FROM 
    thearticle
WHERE thearticle.idthearticle=20010
ORDER BY 
    thearticle.thearticledate DESC
LIMIT 20;
');

// nombre de résultats
$numreq = $request->rowCount();

// si le nombre de résultats est plus grand que 0
if ($numreq > 0) {
    $allUser = $request->fetchAll(PDO::FETCH_ASSOC);
    // transformation de la requête en format
    // lisible par PHP en utilisant fetchAll
    // Pour PHP, choisissez tableau associatif
    $request->closeCursor();
} else {
    // création d'un message contenant la chaine "Pas encore de message"
    $error='Pas encore de message';
}





# Bonnes pratiques

// fermeture de la requête (pour l'exécuter à nouveau)
// fermeture de connexion
$db = null;
// chargement de notre vue
include "../view/homepageView.php";
// débogage
// var_dump($allUser);