<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil de notre site</title>
</head>
<body>
<?php
include "inc/menu.inc.view.php";
?>
<h1>Accueil de notre site</h1>
<p>Bienvenue sur notre site !</p>
<p>un nouvel article a été inséré: dont l'id est <?=$lastId?></p>
<p>Les 3 autres pages vont afficher du contenu d'une base de donnée, chacune affectant une table</p>
<p>Faites un css perso et changez-moi cette photo</p>
<img src="img/php2.webp" alt="mikhawa" title="mikhawa"/>
</body>
</html>