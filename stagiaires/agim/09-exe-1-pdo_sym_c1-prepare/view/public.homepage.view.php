<?php
# VIEW
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sym |Accueil</title>
</head>
<body>
<?php include "inc/public.menu.inc.view.php" ?>
<h1>Sym | Accueil</h1>
<h2>Bienvenue sur notre site</h2>
<h3>Nos 10 derniers articles</h3>
<p>Affichage des 10 derniers articles</p>
<?php
foreach ($art as $key => $article) {

    ?><h3>Posté Le <?= $article['article_date_create'];?><br></h3><?= $key+1?>) <a href="?page=<?=$article['title_slug']?>"><?= $article['title'] . "<br>"; ?></a><?php
    if (isset($_GET['text'])) {
        echo "<p>" . $article['text']. "</p>";
    }
}
?>
</body>
</html>
