<?php
# Appel du fichier de configuration nommé config.php
// config.dev.php doit rester dans le dossier
require_once "../config.php";

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
/*
 * Sélectionnez les champs `thearticle`.`thearticletitle`,
 * `thearticle`.`thearticletext`,
 *  et `thearticle`.`thearticledate` des
 *  20 derniers `thearticle` classé par `thearticle`.`thearticledate`descendant.
 */

$request = $db->query("SELECT 
    thearticle.thearticletitle,
    thearticle.thearticletext,
    thearticle.thearticledate
FROM 
    thearticle
-- WHERE idthearticle = 10000
ORDER BY 
    thearticle.thearticledate DESC
LIMIT 20;
");

// nombre de résultats

$nbResponse = $request->rowCount();

// si le nombre de résultats est plus grand que 0
if ($nbResponse>0){
    // transformation de la requête en format
    // lisible par PHP en utilisant fetchAll
    // Pour PHP, choisissez tableau associatif
    $response = $request->fetchAll(PDO::FETCH_ASSOC);
} else{// sinon

    // création d'un message contenant la chaine "Pas encore de message"


    echo $Error= "pas encor de message";
};


# Bonnes pratiques

// fermeture de la requête (pour l'exécuter à nouveau)
$request->closeCursor();
// fermeture de connexion
$db = null;
// chargement de notre vue
include "../view/homepageView.php";
// débogage





