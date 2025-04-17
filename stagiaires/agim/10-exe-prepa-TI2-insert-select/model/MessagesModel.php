<?php
# fonctions en lien avec la table article
# chargement des articles classés par `create_date` DESC
function getArticles(PDO $pdo): array
{
    $query = $pdo->query('
        SELECT * FROM article ORDER BY create_date DESC
    ');

    return $query->fetchAll();
}

function createArticles(PDO $pdo, string $surname, string $email, string $message): bool
{
    $prepare = $pdo->prepare('
        INSERT INTO article (surname, email, message) VALUES (?, ?, ?)
    ');

    $insertSurnom = trim(htmlspecialchars(strip_tags($surname)));
    $insertEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
    $insertMessage = trim(htmlspecialchars(strip_tags($message)));
   if(
        strlen($insertSurnom)>60 ||
        empty($insertSurnom) ||
        $insertEmail===false ||
        strlen($insertEmail)>120 ||
        empty($insertMessage) ||
        strlen($insertMessage)> 500
    ) return false;
    
    $allInsert = [$insertSurnom, $insertEmail, $insertMessage];
    try {
        $prepare->execute($allInsert);
        return true;
    }catch (Exception $e){
        return false;
    }


}
