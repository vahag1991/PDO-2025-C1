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
        DB_CONNECT_TYPE.":host=". DB_CONNECT_HOST. ";dbname=" .DB_CONNECT_NAME.";charset=".
        DB_CONNECT_CHARSET.";port=".DB_CONNECT_PORT,
        DB_CONNECT_USER,
        DB_CONNECT_PWD,
    );
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(Exception $e){
    // arrêt du script et affichage de l'erreur de connexion
    die("Code erreur : {$e->getCode()} | Message : {$e->getMessage()}");
}
// suivant l'existence de certaines variables get page
if (isset($_GET["page"])) {

    switch($_GET["page"]) {
        case "rubriques":
            // ici nos requêtes SQL

            // fermeture de la requête
            // appel de la vue des rubriques
            $request = $db->query(' SELECT * FROM section');
            $article = $request->fetchAll(PDO::FETCH_ASSOC);
            $request->closeCursor();
 
            include "../view/rubriques.view.php";
            break;

            case "users":
                $request = $db->query('SELECT username, fullname
                FROM user
                ORDER BY username ASC;
                ');
 
            $article = $request->fetchAll(PDO::FETCH_ASSOC);
            $request->closeCursor();
 
            include "../view/users.view.php";
            break;
            
            case "articles":
                $request = $db->query('SELECT *
                    FROM article
                    ORDER BY article_date_create DESC
                    LIMIT 30;
                    ');
 
            $article = $request->fetchAll(PDO::FETCH_ASSOC);
            $request->closeCursor();
 
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