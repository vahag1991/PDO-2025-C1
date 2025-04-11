<?php
# fonctions en lien avec la table article
function getAllMessagesByDateDesc(PDO $connectDB): string|array
{
    try {
        $recup = $connectDB->query("
        SELECT * 
        FROM `article` 
        ORDER BY `create_date` DESC
");
        // pas de résultats, on envoie un (string)
        if($recup->rowCount()===0) return "Pas encore de message";

        // si on a au moins un résultat
        // on envoie un tableau indexé (array)
        return $recup->fetchAll();

    }catch(Exception $e){
        die($e->getMessage());
    }
}

# chargement des articles classés par `create_date` DESC

# insertion d'un article après vérification
function setArticle(PDO $pdo, string $name, string $email, string $message): bool
{
    $prepare = $pdo->prepare(
        "
INSERT INTO `article` (`surname`,`email`,`message`) 
VALUES (?,?,?);
"
    );
    try {
        $prepare->execute([$surname,$email,$message]);
        return true;
    }catch (Exception $e){
        die($e->getMessage());
    }
}