<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../public/style.css">
    <title>Nos 30 derniers articles</title>
</head>

<body>
    <?php
    include "inc/menu.inc.view.php";
    ?>
    <h1>Toutes les champs de toutes les rubriques</h1>
    <?php if (!isset($error)): ?>
        <?php foreach ($allUser as $key => $article): ?>
            <p style="font-size: 1.5rem;"><?= $key+1 ?>) <?= $article['text']; ?><br></p>
            
        <?php endforeach; ?>
    <?php else: ?>
        <p><?= $error; ?></p>
    <?php endif; ?>
</body>
</html>
