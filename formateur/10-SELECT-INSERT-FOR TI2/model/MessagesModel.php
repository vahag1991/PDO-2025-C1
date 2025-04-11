<?php
# Modèle de la table messages

/**
 * Création d'une fonction qui va charger tous
 * nos messages par `created_at` DESC
 * Renvoie un tableau indexé avec les valeurs en tableau
 * associatif, le tableau sera vide si il n'y
 * a pas de message
 */

function getAllMessagesByDateDesc(PDO $con): array
{
    try {
        $query = $con->query(
            "SELECT * FROM messages 
                ORDER BY `created_at` DESC;"
        );
        return $query->fetchAll();

    }catch(Exception $e){
        die($e->getMessage());
    }
}

/**
 * Insertion dans la table messages si sécuriser.
 */
function addNewMessages(PDO $con, string $name, string $email, string $message): bool|string
{
    // si on a une ou des erreurs, on les mettra dans cette variable
    $error="";
    // traîtement des variables
    # name
    $nameInsert = strip_tags($name); # retire les balises
    $nameInsert = htmlspecialchars($nameInsert,ENT_QUOTES); # conversion des caractères en entités html
    $nameInsert = trim($nameInsert); # on retire les espaces avant et arrière

    # mail
    $emailInsert = filter_var($email,FILTER_VALIDATE_EMAIL); # garde l'email si juste, envoie false si non correcte

    #message
    $messageInsert = trim(htmlspecialchars(strip_tags($message),ENT_QUOTES));

    // vérification des champs
    #
    if(empty($nameInsert)) $error .="Nom incorrecte<br>";
    if(strlen($nameInsert)>100) $error .= "Nom trop long !<br>";
    if($emailInsert===false) $error .="Email non valide";
    if(empty($messageInsert)) $error .="Message incorrecte<br>";
    if(strlen($messageInsert)>600) $error .= "Message trop long !<br>";

    # si on a une erreur, on sort et on envoie les erreurs
    if(!empty($error)) return $error;

    # sinon, on prépare la requête
    $prepare = $con->prepare(
        "INSERT INTO `messages`
                (`name`,`email`,`message`)
                VALUES (?,?,?);"
    );
    # Exécution de la requête
    try{
        $prepare->execute([$nameInsert,$emailInsert,$messageInsert]);
        return true;
    }catch (Exception $e){
        die($e->getMessage());
    }


}