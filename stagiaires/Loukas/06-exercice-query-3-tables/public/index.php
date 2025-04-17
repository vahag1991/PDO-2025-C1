<?php

# index.php | Contrôleur frontal

// on appelle le fichier config-prod.php (requis une seule fois).
require_once "../config-prod.php";

// en utilisant un try / catch
$dsn = DB_CONNECT_TYPE . ":host=" . DB_CONNECT_HOST . ";dbname=" . DB_CONNECT_NAME . ";port=" . DB_CONNECT_PORT . ";charset=" . DB_CONNECT_CHARSET;
$username = DB_CONNECT_USER;
$password = DB_CONNECT_PWD;

try {
    $db = new PDO($dsn, $username, $password);
    // echo "Connection successful!";
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    // arrêt du script et affichage de l'erreur de connexion
    die("Code erreur : {$e->getCode()} | Message : {$e->getMessage()}");
}

// on se connecte à la DB 'pdo_sym_c1' via PDO
// en utilisant les constantes de connexion
// et en activant les erreurs et le fetchAssoc par défaut

// suivant l'existence de certaines variables get page

if (isset($_GET["page"])) {

    switch ($_GET["page"]) {
        case "articles":
            $articlesDbSortDate = $db->query("SELECT * FROM article ORDER BY `article_date_create` DESC LIMIT 30");
            $numReqArtc = $articlesDbSortDate->rowCount();
            if ($numReqArtc > 0) {

                $allArticles = $articlesDbSortDate->fetchAll(PDO::FETCH_ASSOC);
                $articlesDbSortDate->closeCursor();
            } else {
                $error = "Pas d'article";
            }
            include "../view/articles.view.php";
            break;
        case "users":
            $allUsersDb = $db->query("SELECT * FROM user ORDER BY username ASC");
            $numReqUser = $allUsersDb->rowCount();
            if ($numReqUser > 0) {
                $allUsers = $allUsersDb->fetchAll(PDO::FETCH_ASSOC);
                $allUsersDb->closeCursor();
            } else {
                $error = "Pas d'utilisateur";
            }
            include "../view/users.view.php";
            break;
        case "rubriques":
            // ici nos requêtes SQL
            $articlesDb = $db->query("SELECT * FROM article");
            $numReqArtDb = $articlesDb->rowCount();
            if ($numReqArtDb > 0) {

                $allArticles = $articlesDb->fetchAll(PDO::FETCH_ASSOC);
                $articlesDb->closeCursor();
            } else {
                $error = "Pas d'article";
            }
            // fermeture de la requête
            // appel de la vue des rubriques
            include "../view/rubriques.view.php";
            break;
        ### a faire
        default:
            // appel de la vue d'une erreur
            include "../view/error404.view.php";
            break;
    }
} else {
    // appel de la vue de l'accueil
    include "../view/accueil.view.php";
}



// fermeture de connexion