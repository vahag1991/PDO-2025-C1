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


// on veut insérer le formulaire dans la db
function setArticle(PDO $pdo, string $name, string $message, string $date): bool
{
    $prepare = $pdo->prepare(
        "
INSERT INTO `messages` (`surname`,`message`,`created_date`) 
VALUES (?,?,?);
"
    );
    try {
        $prepare->execute([$name, $message, $date]);
        return true;
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

if (isset($_POST['name'], $_POST['text'], $_POST['date'])) {

    // création de variables locales
    $name = strip_tags($_POST['name']); // on retire les tags
    $name = htmlspecialchars($name, ENT_QUOTES); // on encode les caractères spéciaux
    $name = trim($name); // efface les espaces avant et arrière

    // $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL); // faut false si mail pas valide
    $message = $_POST['text'];
    $date = $_POST['date'];

    // on est ici

    setArticle($db, $name, $message, $date);
}
