<?php
# MODEL
# modèle qui gère les articles

function getTenLastArticles(PDO $myDB): array|string
{
    try {
        $result = $myDB->query('
        SELECT title , title_slug, `text`, article_date_create 
        FROM article
        ORDER BY article_date_create DESC
        LIMIT 10
        ');
        // pas de résultat
        if($result->rowCount() === 0) return "Pas encore d'articles"; // (string)
        // on a des résultats (array)
        return $result->fetchAll();
    }catch (Exception $e){
        return $e->getMessage(); // (string)
    }
}