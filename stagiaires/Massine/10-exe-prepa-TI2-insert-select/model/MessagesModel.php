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
        if ($recup->rowCount() === 0) return "Pas encore de message";

        // si on a au moins un résultat
        // on envoie un tableau indexé (array)
        return $recup->fetchAll();
    } catch (Exception $e) {
        die($e->getMessage());
    }
}


// on veut insérer le formulaire dans la db
function setArticle(PDO $pdo, string $name, string $message, string $date): bool
{
    $prepare = $pdo->prepare(
        "
INSERT INTO `article` (`surname`,`message`,`create_date`) 
VALUES (?,?,?);
"
    );
    try {
        $name = strip_tags($_POST['name']); // on retire les tags
        $name = htmlspecialchars($name, ENT_QUOTES); // on encode les caractères spéciaux
        $name = trim($name);
        $prepare->execute([$name, $message, $date]);
        return true; // efface les espaces avant et arrière
    } catch (Exception $e) {
        die($e->getMessage());
    }
}
