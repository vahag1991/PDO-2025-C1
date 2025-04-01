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

<h1>Sym | Accueil</h1>
<h2>Bienvenue sur notre site</h2>
<h3>Nos 10 derniers articles</h3>
<p>Affichage des 10 derniers articles</p>
<?php
// pas de résultats ou erreur (donc en string)
if(is_string($articles)):
?>
<h2><?=$articles?></h2>
<?php
// on a des résultats
else:
    // on les affiche lignes par lignes
    foreach ($articles as $article):
?>
<h4><a href="?article=<?=$article['title_slug']?>"><?=$article['title']?></a></h4>
<h5>Ecrit par ... le <?=$article['article_date_create']?></h5>
<p><?=$article['text']?></p>
<hr>
<?php
    endforeach;
endif;
//var_dump($pdo);
//var_dump($menu);
//var_dump($articles);
?>
</body>
</html>
