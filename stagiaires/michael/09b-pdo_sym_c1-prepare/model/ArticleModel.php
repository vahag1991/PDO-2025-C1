<?php
# MODEL
# modèle qui gère les articles

/**
 * On récupère les 10 derniers articles pour l'accueil
 * qui sont publiés (published = 1)
 * @param PDO $myDB
 * @return array|string
 */
function getTenLastArticles(PDO $myDB): array|string
{
    try {
        $result = $myDB->query('
        SELECT title , title_slug, `text`, article_date_create 
        FROM article
        WHERE published = 1
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

// on compte le nombre total d'articles
// publiés dans la table article
function countArticlesPublished(PDO $pdo)
{
    $query = $pdo->query(
        "
-- on renomme COUNT( en nb
SELECT COUNT(*) as nb 
        FROM article
        WHERE published = 1;"
    );
    $nb = $query->fetch();
    return $nb;
}

