<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nos 30 derniers articles</title>
</head>

<body>
    <?php
    include "inc/menu.inc.view.php";
    ?>
    <h1>Nos 30 derniers articles</h1>
    <p>Par date desc</p>
    <?php
    if (!isset($error)):
        foreach ($allArticles as $article):
    ?>
            <h2><?= $article["title"] . "<br>"; ?></h2>
            <p><?= $article["text"] . "<br>"; ?></p>

        <?php endforeach;
    else:
        ?>

        <h3><?= $error ?></h3>

    <?php endif; ?>



</body>

</html>