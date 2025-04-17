<?php
function getAllArticles(PDO $connectDB): array|string
{
    // var_dump($pdo);
    try {
        $request = $connectDB->query("
SELECT title , title_slug, text, article_date_create
FROM article 
ORDER BY article_date_create DESC 
LIMIT 10;");
        // pas de résultat, on envoie l'erreur
        if ($request->rowCount() === 0) return "Pas encore de article";
        // sinon (non visible, car return ligne précédente)
        return $request->fetchAll();
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

function getOneArticleBySlug(PDO $connectDB, string $slug): array|string
{
    try {
        $request = $connectDB->prepare("
SELECT title , title_slug, text, article_date_create
FROM article 
WHERE title_slug = :slug;");
        $request->bindValue(':slug', $slug, PDO::PARAM_STR);
        $request->execute();
        // pas de résultat, on envoie l'erreur
        if ($request->rowCount() === 0) return "Pas encore de article";
        // sinon (non visible, car return ligne précédente)
        return $request->fetchAll();
    } catch (Exception $e) {
        return $e->getMessage();
    }
}
