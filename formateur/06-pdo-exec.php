<?php
# Chargement des constantes de connexion
require_once "config_pdo_c1.php";

# Instanciation de PDO avec gestion des erreurs

try{
    // instanciation avec PDO
    $db = new PDO(
        DB_CONNECT_TYPE.":host=".DB_CONNECT_HOST.";dbname=".DB_CONNECT_NAME.";port=".DB_CONNECT_PORT.";charset=".DB_CONNECT_CHARSET,
        DB_CONNECT_USER,
        DB_CONNECT_PWD,
    );
    // on va attribuer à la connexion la manière de gérer les données par PHP
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
// si erreur, instanciation de 'Exception' avec $e comme pointeur
}catch(Exception $e){
    // arrêt du script avec die(), et affichage de la méthode se trouvant dans l'instance de 'Exception' via $e
    die($e->getMessage());
}

// création de valeurs aléatoires pour l'insertion
$caracteres = '0123456789 abcdefghijkl mnopqrstuv wxyzABCDEFGHI JKLMNOPQR STUVWXYZ';
$nbCaracteres = strlen($caracteres); // nombres de caractères
$thearticletitle = '';

// on va créer un titre d'article aléatoire de 25 caractères
for($i=0; $i<25; $i++){
    $thearticletitle .= $caracteres[rand(0, $nbCaracteres-1)];
}
$thearticletext = '';

// on va créer un texte d'article aléatoire de 300 caractères
for($i=0; $i<300; $i++){
    $thearticletext .= $caracteres[rand(0, $nbCaracteres-1)];
}


// on ajoute un article à la date du jour avec des valeurs au hasard et l'auteur 1
$insertTheArticle = $db->exec("INSERT INTO `thearticle`  (`thearticletitle`, `thearticletext`, `theuser_idtheuser`) VALUES ('$thearticletitle','$thearticletext', 1)");

// on récupère l'id de la dernière ligne insérée et on le met en integer
$lastId = (int) $db->lastInsertId();

// on modifie la date des articles dont l'id est entre 400 et 410 pour la date du jour
$updateTheArticle = $db->exec("UPDATE `thearticle` SET `thearticledate` = NOW() WHERE `idthearticle` BETWEEN 400 AND 410");

// on peut charger le dernier article inséré grâce à la méthode 'query' de PDO
// et $lastId
$lastArticleQuery = $db->query("SELECT * FROM `thearticle` WHERE `idthearticle` = $lastId");
// on va chercher la première ligne de l'article
$lastArticle = $lastArticleQuery->fetch();

$lastArticleQuery->closeCursor(); // on ferme le curseur de la requête

// on peut charger les derniers articles  grâce à la méthode 'query' de PDO
// et $lastId
$articleQuery30 = $db->query("SELECT * FROM `thearticle` ORDER BY `thearticledate` DESC LIMIT 30");
// on va chercher la 30 derniers articles, donc fetchAll
$articles30 = $articleQuery30->fetchAll();
$articleQuery30->closeCursor(); // on ferme le curseur de la requête

// fermeture de la connexion
$db = null;


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDO::exec</title>
</head>
<body>
<h1>PDO::exec</h1>
<p>PDO::exec — Prépare et Exécute une requête SQL sans marque substitutive (non préparée), est généralement utilisée pour les "INSERT, DELETE ou UPDATE" sans entrée d'utilisateur</p>
<p>PDO::exec — Exécute une requête SQL et retourne le nombre de lignes affectées par la requête</p>
<p>$lastId = $db->lastInsertId(); permet de récupérer la dernière insertion (avec la connexion qui est celle de l'utilisateur courant)</p>
<h2>Nombre de ligne insérée: <?=$insertTheArticle?>, ID de cette dernière ligne : <?=$lastId?></h2>
<h3>Nombre de lignes modifiées par l'update: <?=$updateTheArticle?></h3>
<h3>Dernier article inséré:</h3>
<h4><?=$lastArticle['idthearticle']?> | <?=$lastArticle['thearticletitle']?></h4>
<p><?=$lastArticle['thearticletext']?></p>
<p> le <?=$lastArticle['thearticledate']?></p>
<hr>
<h3>Les 30 derniers articles :</h3>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Titre</th>
        <th>Texte</th>
        <th>Date</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($articles30 as $article): ?>
        <tr>
            <td><?=$article['idthearticle']?></td>
            <td><?=$article['thearticletitle']?></td>
            <td><?=$article['thearticletext']?></td>
            <td><?=$article['thearticledate']?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>