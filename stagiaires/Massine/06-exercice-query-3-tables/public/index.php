<?php

# index.php | Contrôleur frontal

// on appelle le fichier config-prod.php (requis une seule fois).
require_once "../config-prod.php";

// en utilisant un try / catch
// on se connecte à la DB 'pdo_sym_c1' via PDO
// en utilisant les constantes de connexion
// et en activant les erreurs et le fetchAssoc par défaut
try {
    // instanciation avec PDO
    $db = new PDO(
        DB_CONNECT_TYPE . ":host=" . DB_CONNECT_HOST . ";dbname=" . DB_CONNECT_NAME . ";port=" . DB_CONNECT_PORT . ";charset=" . DB_CONNECT_CHARSET,
        DB_CONNECT_USER,
        DB_CONNECT_PWD,
    );
    // on va attribuer à la connexion la manière de gérer les données par PHP
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    // si erreur, instanciation de 'Exception' avec $e comme pointeur
} catch (Exception $e) {
    // arrêt du script avec die(), et affichage de la méthode se trouvant dans l'instance de 'Exception' via $e
    die($e->getMessage());
}
// suivant l'existence de certaines variables get page
if (isset($_GET["page"])) {

    switch ($_GET["page"]) {
        case "rubriques":
            // ici nos requêtes SQL
            $request = $db->query("SELECT * FROM `section`");
            $rubrique = $request->fetchAll(PDO::FETCH_ASSOC);
            // fermeture de la requête
            $request->closeCursor();
            // appel de la vue des rubriques
            include "../view/rubriques.view.php";
            break;
        case "users":
            $request = $db->query("SELECT username, fullname FROM user ORDER BY username ASC");
            $user = $request->fetchAll(PDO::FETCH_ASSOC);
            $request->closeCursor();
            include "../view/users.view.php";
            break;
        case "articles":
            $request = $db->query("SELECT * FROM article ORDER BY article_date_create DESC LIMIT 30");
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
$db = null;