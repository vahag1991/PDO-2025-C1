<?php
# fonctions en lien avec la table article
function getAllMessagesByDateDesc(PDO $connectDB): array
{
    try {
        $recup = $connectDB->query("
        SELECT * 
        FROM `article` 
        ORDER BY `create_date` DESC
");
        // pas de résultats, on envoie un (string)
        // if ($recup->rowCount() === 0) return "Pas encore de message";

        // si on a au moins un résultat
        // on envoie un tableau indexé (array)
        return $recup->fetchAll();
    } catch (Exception $e) {
        die($e->getMessage());
    }
}


// on veut insérer le formulaire dans la db
function setArticle(PDO $pdo, string $name,string $email,string $text, string $date): bool
{

    $error="";

    $nameInsert = strip_tags($name); // on retire les tags
    $nameInsert = htmlspecialchars($name, ENT_QUOTES); // on encode les caractères spéciaux
    $nameInsert = trim($name);


    $emailInsert = filter_var($email,FILTER_VALIDATE_EMAIL);

    $textInsert = trim(htmlspecialchars(strip_tags($text),ENT_QUOTES));

    if(empty($nameInsert)) $error .="Nom incorrecte<br>";
    if(strlen($nameInsert)>100) $error .= "Nom trop long !<br>";
    if($emailInsert===false) $error .="Email non valide";
    if(empty($textInsert)) $error .="Message incorrecte<br>";
    if(strlen($textInsert)>600) $error .= "Message trop long !<br>";

    # si on a une erreur, on sort et on envoie les erreurs
    if(!empty($error)) return $error;


        $prepare = $pdo->prepare(
            "
    INSERT INTO `article` (`surname`,`email`,`message`,`create_date`) 
    VALUES (?,?,?,?);
    "
        );

    try{
        $prepare->execute([$nameInsert,$emailInsert,$textInsert,$date]);
        return true; // efface les espaces avant et arrière
    } catch (Exception $e) {
        die($e->getMessage());
    }
}
