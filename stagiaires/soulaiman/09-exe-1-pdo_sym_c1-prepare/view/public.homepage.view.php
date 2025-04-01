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

<nav>
<a href="./">Accueil</a> |
    <?php
    foreach($menu as $item):
    ?>
    <a href="?section=<?=$item['section_slug']?>"><?=$item['section_title']?></a> |
    <?php
    endforeach;
    ?>
</nav>

<h1>Sym | Accueil</h1>
<h2>Bienvenue sur notre site</h2>
<h3>Nos 10 derniers articles</h3>
<p>Affichage des 10 derniers articles</p>
<?php
//var_dump($pdo);
//var_dump($menu);
?>

<?php
    foreach($article as $value):
    ?>
        <p> <?= $value['title'] ?> </p> <br>
        <p> <?= $value['title_slug'] ?> </p> <br>
        <p> <?= $value['article_date_create'] ?> </p> <br>
        <p> <?= $value['text'] ?> </p> <br>
    <?php
    endforeach;
    ?>
</body>
</html>
