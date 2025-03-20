<?php

# index.php | Contrôleur frontal

// on appelle le fichier config-prod.php (requis une seule fois).
require_once "../config-prod.php";

// en utilisant un try / catch
// on se connecte à la DB 'pdo_sym_c1' via PDO
// en utilisant les constantes de connexion
// et en activant les erreurs et le fetchAssoc par défaut
try {
    $db = new PDO(
        dsn:DB_CONNECT_TYPE.":host=".DB_CONNECT_HOST.";dbname=".DB_CONNECT_NAME.";port=".DB_CONNECT_PORT.";charset=".DB_CONNECT_CHARSET,
        username:DB_CONNECT_USER,
        password:DB_CONNECT_PWD,
    );
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die($e->getMessage());
}

// suivant l'existence de certaines variables get page
if (isset($_GET["page"])) {

    switch ($_GET["page"]) {
        case "rubriques":
            // ici nos requêtes SQL
            $request = $db->query('SELECT *
FROM section
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
                $error = 'Pas encore de message';
            }

            // fermeture de la requête
            // appel de la vue des rubriques
            include "../view/rubriques.view.php";
            break;
        case "users":
            $request = $db->query('SELECT username, fullname
FROM user
ORDER BY username ASC;
');
            $numreq = $request->rowCount();

            if ($numreq > 0) {
                $allUser = $request->fetchAll(PDO::FETCH_ASSOC);
                $request->closeCursor();
            } else {
                $error = 'Pas encore de message';
            }

            include "../view/users.view.php";
            break;
        case "articles":
            // ici nos requêtes SQL
            $request = $db->query('SELECT *
FROM article
ORDER BY article_date_create DESC
LIMIT 30;
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
                $error = 'Pas encore de message';
            }

            // fermeture de la requête
            // appel de la vue des rubriques
            include "../view/articles.view.php";
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
$db = null;
