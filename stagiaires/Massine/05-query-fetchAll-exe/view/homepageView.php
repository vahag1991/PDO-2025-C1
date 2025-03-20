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
    if (!isset($error)) {
        ?>
            <h2>Nombre d'articles : <?= $nbResult ?></h2>
            <?php
            // tant que l'on a des articles
            foreach ($tab as $article):
    ?>
            <h3><?= $article['thearticletitle'] ?></h3>
            <p><?= $article['thearticletext'] ?></p>
            <p>Ecrit le <?= $article['thearticledate'] ?></p>
        <?php
    endforeach;
        ?>
        <?php
        // fin de boucle
    } else {
        // sinon (on a des erreurs)
        ?>
    <h3><?=$error?></h3>
    <?php
    }
    // fin du if/else
    ?>
</body>

</html>