<?php

function getAllarticleByDateDesc(PDO $con): array
{
    try {
      return  $con->query("SELECT * FROM article ORDER BY `create_date` DESC;")->fetchAll();
    }catch(Exception $e){
        die("Code erreur : {$e->getCode()} | Message : {$e->getMessage()}");
    }
}

function addNewarticle(PDO $con, string $name, string $email, string $message): bool|string
{
    $error="";
    $nameInsert = trim(htmlspecialchars(strip_tags($name),ENT_QUOTES));
    $emailInsert = filter_var($email,FILTER_VALIDATE_EMAIL); # garde l'email si juste, envoie false si non correcte
    $messageInsert = trim(htmlspecialchars(strip_tags($message),ENT_QUOTES));

    // vérification des champs
    if(empty($nameInsert)) $error .="Nom incorrecte<br>";
    if(strlen($nameInsert)>60) $error .= "Nom trop long !<br>";
    if($emailInsert===false) $error .="Email non valide";
    if(empty($messageInsert)) $error .="Message incorrecte<br>";
    if(strlen($messageInsert)>500) $error .= "Message trop long !<br>";

    # si on a une erreur, on sort et on envoie les erreurs
    if(!empty($error)) return $error;

     try{
           
   $con->prepare("INSERT INTO `article`(`surname`,`email`,`message`)VALUES (?,?,?);")->execute([$nameInsert,$emailInsert,$messageInsert]);
      
        return true;
    }catch (Exception $e){
        die($e->getMessage());
    }


}