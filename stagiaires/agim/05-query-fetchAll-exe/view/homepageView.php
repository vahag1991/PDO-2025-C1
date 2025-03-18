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
    // si pas d'erreurs
if (!isset($error)):
        # code...
    ?>
    <h2>Nombre d'articles : <?= $numreq ?></h2>
    <?php
    // tant que l'on a des articles
    foreach ($allUser as $title):
    ?>
        <h3><?= $title['thearticletitle']; ?></h3><br>
        <p><?= $title['thearticletext']; ?></p><br>
        <p><?= $title['thearticledate']; ?></p><br>
    <?php
    //fin de boucle
    endforeach;
    ?>
    <?php
    // sinon (on a des erreurs)
else:
    ?>
    <h3><?= $error ?></h3>
    <?php
    // fin du if/else
endif;
    ?>
</body>

</html>