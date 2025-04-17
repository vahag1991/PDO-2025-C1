<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil | Derniers articles</title>
</head>

<body>
    <h1>Accueil | Derniers articles</h1>
    <?php
    if (!isset($error)):
        ?>
        <h2>Nombre d'articles : <?= $nbResponse ?></h2>

        <?php
        foreach ($articles as $article):
            ?>
            <h3><?= $article["thearticletitle"] ?></h3>
            <p><?= $article["thearticletext"] ?></p>
            <p><?= $article["thearticledate"] ?></p>
            <?php
        endforeach;
else:
        echo $error;
        ?>
        <?php
    endif;
    ?>
</body>

</html>