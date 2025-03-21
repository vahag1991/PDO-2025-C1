<?php

# index.php | Contrôleur frontal

// on appelle le fichier config-prod.php (requis une seule fois).
require_once "../config-prod.php";

// en utilisant un try / catch
// on se connecte à la DB 'pdo_sym_c1' via PDO
// en utilisant les constantes de connexion
// et en activant les erreurs et le fetchAssoc par défaut
# Connexion PDO
try{

    $db = new PDO(
        dsn:DB_CONNECT_TYPE.":host=".DB_CONNECT_HOST.";dbname=".DB_CONNECT_NAME.";port=".DB_CONNECT_PORT.";charset=".DB_CONNECT_CHARSET,
        username:DB_CONNECT_USER,
        password:DB_CONNECT_PWD,
    );
 
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(Exception $e){

    die("Code erreur : {$e->getCode()} | Message : {$e->getMessage()}");
}

// suivant l'existence de certaines variables get page
if (isset($_GET["page"])) {
   
    switch($_GET["page"]) {
        case "rubriques":
            // ici nos requêtes SQL
            $request = $db->query(' SELECT * FROM section');
 
            $response = $request->fetchAll(PDO::FETCH_ASSOC);
            // fermeture de la requête.
            $request->closeCursor();
            // appel de la vue des rubriques
            include "../view/rubriques.view.php";
            break;
            ### a faire
        case "users":
            $request = $db->query('SELECT username, fullname
            FROM user
            ORDER BY username ASC;
            ');

            $response = $request->fetchAll(PDO::FETCH_ASSOC);
            // fermeture de la requête.
            $request->closeCursor();
            // appel de la vue des rubriques
            include "../view/users.view.php";
            break;
            

        case "articles":
            $request = $db->query('SELECT *
            FROM article
            ORDER BY article_date_create DESC
            LIMIT 30;
            ');
    
                $response = $request->fetchAll(PDO::FETCH_ASSOC);
                // fermeture de la requête.
                $request->closeCursor();
                // appel de la vue des rubriques
                include "../view/articles.view.php";
                break;
                
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
$db= null;