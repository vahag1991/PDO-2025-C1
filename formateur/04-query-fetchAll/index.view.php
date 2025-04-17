<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil</title>
</head>
<body>
<h1>Accueil</h1>
<h2>Affichage des utilisateurs de notre site</h2>
<h3>Voici nos <?= $nbResponse ?> utilisateurs</h3>
<?php
// tant qu'on a des résultats
foreach ($response as $user):
?>
    <h4><?=$user['theusername']?></h4>
        <p>dont l'id est <?=$user['idtheuser']?> et le login est <?=$user['theuserlogin']?></p>
<?php
endforeach;
?>
</body>
</html>
