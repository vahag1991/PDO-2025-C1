<?php
# MODEL
# modèle qui gère les sections

/**
 * Fonction qui récupère toutes les sections
 * uniquement les champs id, section_title et section_slug
 * @param PDO $db
 * @return array|string
 */

function getAllArticle(PDO $connectDB): array|string
{
    // var_dump($pdo);
    try {
        $request = $connectDB->query(' SELECT
        article.title,
        article.title_slug,
        article.article_date_create,
        article.`text`
    FROM
        article
         ORDER BY
        article.article_date_create DESC
    LIMIT 10;');
    if($request->rowCount() === 0) return "Pas encore de section";
        // pas de résultat, on envoie l'erreur
        return $request->fetchAll();
    } catch (Exception $e) {
        return $e->getMessage();
    }
}
