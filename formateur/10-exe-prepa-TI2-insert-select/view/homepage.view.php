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
<?php
// si inséré
if(isset($great)):
?>
<h3 class="thanks"><?=$great?></h3>
<script>
    // redirection de base, à éviter
    function redirect() {
        document.location.href="./";
    }
    setTimeout(redirect, 1500);
</script>
<?php
elseif(isset($error)):
?>
<h3 class="error"><?=$error?></h3>
<?php
endif;
?>
<form action="" method="post">
    <label for="name">Nom</label>
    <input type="text" name="thename" id="name" required>
    <label for="email">Email</label>
    <input type="email" name="theemail" id="email" required>
    <label for="message">Message</label>
    <textarea name="themessage" id="message" rows="6" required></textarea>
    <button type="submit">Envoyer</button>
</form>
<hr>
<?php
// si on a pas d'articles ($nbArticles === 0)
if(empty($nbArticles)):
?>
<h3 class="nomessage">Pas encore de message</h3>
<?php
// sinon il y a au moins 1 message
else:
    // on va créer une variable pour ajouter le "s"
    // si on a plus d'un article avec une ternaire
    $pluriel = $nbArticles>1? "s" : "";
?>
    <div class="message">
    <h3>Il y a <?=$nbArticles?> message<?=$pluriel?></h3>
        <?php
        foreach ($articles as $article):
        ?>
        <h4><?=$article['surname']?></h4>
        <p><?=$article['message']?></p>
        <h5><?=$article['create_date']?></h5><hr>
        <?php
        endforeach;
        ?>
    </div>
<?php
endif;

var_dump($connectPDO,$_POST,$articles,$nbArticles,$insert);
?>
<hr>
</body>
</html>
