<?php
# fonctions en lien avec la table article
function getAllArticleByDateDesc(PDO $connectDB): string|array
{
    try {
        $recup = $connectDB->query("
        SELECT * 
        FROM `article` 
        ORDER BY `create_date` DESC
");
        return $recup->fetchAll();

    }catch(Exception $e){
        die($e->getMessage());
    }
}

function addNewarticle(PDO $con, string $name, string $email, string $message): bool|string
{
    // si on a une ou des erreurs, on les mettra dans cette variable
    $error="";
    // traîtement des variables
    # name
    // $nameInsert = strip_tags($name); # retire les balises
    // $nameInsert = htmlspecialchars($nameInsert,ENT_QUOTES); # conversion des caractères en entités html
    // $nameInsert = trim($nameInsert); # on retire les espaces avant et arrière
    $nameInsert = trim(htmlspecialchars(strip_tags($name),ENT_QUOTES));
    # mail
    $emailInsert = filter_var($email,FILTER_VALIDATE_EMAIL); # garde l'email si juste, envoie false si non correcte

    #message
    $messageInsert = trim(htmlspecialchars(strip_tags($message),ENT_QUOTES));

    // vérification des champs
    #
    if(empty($nameInsert)) $error .="Nom incorrecte<br>";
    if(strlen($nameInsert)>60) $error .= "Nom trop long !<br>";
    if($emailInsert===false) $error .="Email non valide";
    if(empty($messageInsert)) $error .="Message incorrecte<br>";
    if(strlen($messageInsert)>500) $error .= "Message trop long !<br>";

    # si on a une erreur, on sort et on envoie les erreurs
    if(!empty($error)) return $error;
    try{
    # sinon, on prépare la requête
    $prepare = $con->prepare(
        "INSERT INTO `article`
                (`surname`,`email`,`message`)
                VALUES (?,?,?);"
    );
    # Exécution de la requête
   
        $prepare->execute([$nameInsert,$emailInsert,$messageInsert]);
        return true;
    }catch (Exception $e){
        die($e->getMessage());
    }


}