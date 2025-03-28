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

//var_dump($pdo);
//var_dump($menu);
<?php
    foreach($article as $item):
        ?>
        <h1><a href="./?section=<?=$item['title_slug']?>"><?=$item['title']?></a></h1> 
        <p><?=$item['text']?></p>
        <p><?=$item['article_date_create']?></p>
    <?php
    endforeach;
    ?>
    <?php
var_dump($article)

?>
</body>
</html>
