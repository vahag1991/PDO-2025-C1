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

<form action="" method="POST">
    <label for="name2">Nom</label>
    <input type="text" name="name" id="name2" required>
    <label for="email">Email</label>
    <input type="email" name="email" id="email" required>
    <label for="message">Message</label>
    <textarea name="message" id="message" rows="10" required></textarea>
    <button type="submit">Envoyer</button>
</form>
<?php
// si on a pas de message
if(is_string($messages)):
?>
<h2><?=$messages?></h2>
<div class="nomessages">

    <h3><?=$messages?>, veuillez revenir plus tard</h3>

</div>
<?php
// sinon (on au moins un message)
else:
    // on compte le nombre de message
    $countMessage = count($messages);
    // on ajoute un s à message si on a plus d'un message
    $pluriel = ($countMessage>1)? "s":"";
?>
<h2>Il y a <?=$countMessage?> message<?=$pluriel?></h2>
<div class="messages">
    <?php
    foreach ($messages as $message):
    ?>
    <h3><?=$message['name']?></h3>
    <p><?=$message['message']?></p>
    <p><?=$message['created_at']?></p>
    <hr>
    <?php
    endforeach;
    ?>

</div>
<?php
endif;
?>
<?php
var_dump($_POST);
?>
</body>
</html>
