<?php

# index.php | Contrôleur frontal

// on appelle le fichier config-prod.php (requis une seule fois).
require_once "../config-prod.php";

// en utilisant un try / catch
// on se connecte à la DB 'pdo_sym_c1' via PDO
// en utilisant les constantes de connexion
// et en activant les erreurs et le fetchAssoc par défaut

// suivant l'existence de certaines variables get page
if (isset($_GET["page"])) {

    switch($_GET["page"]) {
        case "rubriques":
            // ici nos requêtes SQL

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