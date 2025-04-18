<?php
# fonctions en lien avec la table article

# chargement des articles classés par `create_date` DESC
function getAllArticlesByDateDesc(PDO $db): array
{
    try{
        // requête SELECT sans données utilisateur (query)
        $request = $db->query("
        SELECT * FROM `article`
          ORDER BY create_date DESC;
             ");
        // transformation du résultat en tableau indexé
        $result =  $request->fetchAll();
        // bonne pratique
        $request->closeCursor();
        // retour d'un tableau
        return $result;
    }catch(Exception $e){
        die($e->getMessage());
    }

}

# insertion d'un article après vérification
function addArticle(PDO $db, string $name, string $mail, string $text): bool|string
{
    // création d'une chaîne vide en cas d'erreur
    $erreur = "";

    // vérification de $name
    $surname = strip_tags($name);// on retire les tags (XSS impossible)
    $surname = htmlspecialchars($surname,ENT_QUOTES); // on retire transforme en html les caractères dangereux, le ENT_QUOTES convertit ' et le "
    $surname = trim($surname); // on retire le vide avant et après la chaîne
        // si $name est vide
        if(empty($surname)) $erreur .= "Votre nom est vide<br>";
        // si $name est trop long
        elseif(strlen($surname)>60) $erreur .= "Votre nom dépasse 60 caractères<br>";

    // vérification du mail, met le mail dans $email si valide
    // retourne false si le mail est non valide
    $email = filter_var($mail, FILTER_VALIDATE_EMAIL);
        // si le mail n'est pas valide
        if($email===false) $erreur .="Votre mail est invalide<br>";
        // si le mail est trop long
        elseif(strlen($email)>120) $erreur .= "Votre mail est trop long<br>";

    // vérification du message
    $message = trim(htmlspecialchars(strip_tags($text),ENT_QUOTES));
        // si $message est vide
        if(empty($message)) $erreur .= "Votre message est vide<br>";
        // si $message est trop long
        elseif(strlen($message)>500) $erreur .= "Votre message dépasse 500 caractères<br>";

    // si on a une erreur, on la renvoie et on arrête le script
    if(!empty($erreur)) return $erreur;

    // pas d'erreurs, on va insérer dans la DB

        // création du SQL
        $sql = "INSERT INTO `article` 
                (`surname`,`email`,`message`)
                    VALUES 
                (?,?,?)";
        // préparation de la requête empêchant les injections
        $request = $db->prepare($sql);
        try{
            $request->execute([$surname,$email,$message]);
            return true;
        }catch(Exception $e){
            return $e->getMessage();
        }
}