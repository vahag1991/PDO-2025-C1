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
<?php
foreach ($article as $articles):
?>
<h1><?=$articles['title']?></h1>
<p><?=$articles['article_date_create']?></p>
<?php
endforeach;
?>
</body>
</html>