<?php

# index.php | Contrôleur frontal

// on appelle le fichier config-prod.php (requis une seule fois).
require_once "../config-prod.php";

try {

    $db = new PDO(
        DB_CONNECT_TYPE . ":host=" . DB_CONNECT_HOST . ";dbname=" . DB_CONNECT_NAME . ";port=" . DB_CONNECT_PORT . ";charset=" . DB_CONNECT_CHARSET,
        DB_CONNECT_USER,
        DB_CONNECT_PWD,
    );

} catch (Exception $e) {

    die($e->getMessage());
}

// suivant l'existence de certaines variables get page
if (isset($_GET["page"])) {

    switch ($_GET["page"]) {
        case "rubriques":
            $request = $db->query(' SELECT * FROM section');
            $art = $request->fetchAll(PDO::FETCH_ASSOC);
            $request->closeCursor();

            include "../view/rubriques.view.php";
            break;
        case "users":
            $request = $db->query('SELECT username, fullname
                FROM user
                ORDER BY username ASC;
                ');

            $art = $request->fetchAll(PDO::FETCH_ASSOC);
            $request->closeCursor();

            include "../view/users.view.php";
            break;
        case "articles":
            $request = $db->query('SELECT *
                    FROM article
                    ORDER BY article_date_create DESC
                    LIMIT 30;
                    ');

            $art = $request->fetchAll(PDO::FETCH_ASSOC);
            $request->closeCursor();

            include "../view/articles.view.php";
            break;
        ### a faire
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