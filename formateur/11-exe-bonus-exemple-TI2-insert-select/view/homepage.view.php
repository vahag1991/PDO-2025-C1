<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Accueil | laissez-nous un message</title>
</head>
<body>
<h1>Accueil</h1>
<h2>Laissez-nous un message</h2>
<?php
// si on a bien envoyé un message
if(isset($thanks)):
?>
    <h4 class="thanks"><?=$thanks?></h4>
<?php
endif;


// si on a une erreur lors de l'insertion
if(isset($error)):
?>
<h4 class="error"><?=$error?></h4>
<?php
    endif; ?>
<form action="" method="post">
    <label for="name">Nom</label>
    <input type="text" name="name" id="name" required>
    <label for="email">Email</label>
    <input type="email" name="email" id="email" required>
    <label for="message">Message</label>
    <textarea name="message" id="message" rows="10" required></textarea>
    <button type="submit">Envoyer</button>
</form>

<?php
// si on a pas de message (tableau vide)
?>

<div class="nomessage">
    <h2>Pas de message</h2>
    <p>Veuillez consulter cette page plus tard</p>
</div>
<?php
// le tableau n'est pas vide

    // on va ajouter une variable pour le 's' de message
    // si nécessaire pour le h2 suivant
$pluriel = ($nbArticle>1)? "s":"";
?>

<div class="messages">
    <h2>Il y a <?=$nbArticle?> message<?=$pluriel?></h2>
    <?php
    echo $pagination."<hr>";
    // ici affichage de la pagination
    var_dump($messages);

    ?>
    <h4>surname</h4>
    <p>message</p>
    <p>create_date</p>
    <hr>
    <?php


    ?>

</div>
<?php
// fin du if

// ici affichage de la pagination
echo $pagination;

var_dump($_POST,$_GET,$db,$nbArticle,$pagination,$messages);
?>
</body>
</html>
