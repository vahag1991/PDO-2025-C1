<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Exercice</title>
</head>
<body>
<h1>Exercice</h1>
<h2>Laissez-nous un message</h2>
<pre>
<?php
// si erreur lors de l'insertion
if(isset($error)):
    ?>
    <h3 class="error"><?=$error?></h3>
<?php
endif;
?>
<form action="" method="post">
    <label for="surname">surname</label>
    <input type="text" name="surname" id="surname" required>
    <label for="email">Email</label>
    <input type="email" name="email" id="email" required>
    <label for="message">Message</label>
    <textarea name="message" id="message" rows="10" required></textarea>
    <button type="submit">Envoyer</button>
</form>
 
<?php
// si le tableau est vide (pas d'articles)
if(empty($articles)):
?>
<div class="nomessages">
    <h2>Il n'y a pas encore de message</h2>
    <h3>Veuillez revenir plus tard</h3>
</div>
<?php
// le tableau n'est pas vide, on a au moins un message
else:
    // on prend le nombre de résultats
    $nbArticles = count($articles);
    // on crée un pluriel si jamais on a plus d'un résultat
    $pluriel = ($nbArticles>1)? "s" : "";
?>
<div class="messages">
    <h2>Il y a <?=$nbArticles?> message<?=$pluriel?></h2>
    <hr>
    <?php
    // tant qu'on a des messages
    foreach ($articles as $art):
    ?>
    <h3><?=$art['surname']?></h3>
    <p><?=$art['message']?></p>
    <p><?=$art['create_date']?></p>
    <hr>
    <?php
    // fin de la boucle
    endforeach;
    ?>
 
</div>
<?php
endif;
?>
<?php
var_dump($db,$articles,$_POST);
?>
</body>
</html>