<?php
# Appel du fichier de configuration nommé config.php
// config.dev.php doit rester dans le dossier
require_once"../config.php";

# Connexion PDO

try {
    // instanciation d'un objet
    $connectDB = new PDO(
        DB_CONNECT_TYPE.":host=".DB_CONNECT_HOST.";dbname=".DB_CONNECT_NAME.";port=".DB_CONNECT_PORT.";charset=".DB_CONNECT_CHARSET,
        DB_CONNECT_USER,
        DB_CONNECT_PWD,
        [
            // connexion permanente, doit être déclarée dans
            // ce tableau d'options, setAttribute()
            // PDO::ATTR_PERSISTENT => true
            ]
    );
    // on force l'affichage des erreurs sur les requêtes
    $connectDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // on force choisit le fetch mode en tableau associatif
    $connectDB->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

}catch (Exception $e){
    die($e->getMessage());
}


// Première requête SQL envoyée et récupérée
/*
 * Sélectionnez les champs `thearticle`.`thearticletitle`,
 * `thearticle`.`thearticletext`,
 *  et `thearticle`.`thearticledate` des
 *  20 derniers `thearticle` classé par `thearticle`.`thearticledate`descendant.
 */

// chaine de la requête, on utilise un WHERE commenter
// pour simuler qu'on ne récupère pas d'articles
$sql = "
    SELECT `thearticletitle`, `thearticletext`, `thearticledate`
        FROM `thearticle`
   --  WHERE `idthearticle` = 10000
    ORDER BY `thearticledate` DESC
    LIMIT 20;
";

// requête
$requestArticles = $connectDB->query($sql);

// nombre de résultats
$nbArticles = $requestArticles->rowCount();

// si pas de résultats
if($nbArticles === 0){
    // articles est un string
    $articles = "Pas encore d'articles";
}else{
    // articles est un array indexé
    $articles = $requestArticles->fetchAll();
}





# Bonnes pratiques

// fermeture de la requête (pour l'exécuter à nouveau)
$requestArticles->closeCursor();
// fermeture de connexion
$connectDB = null;

// chargement de notre vue
include "../view/homepageView.php";
// débogage
var_dump($sql,$requestArticles,$nbArticles,$articles);




