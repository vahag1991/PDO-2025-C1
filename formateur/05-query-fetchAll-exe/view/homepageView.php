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
    // si il y a des articles (c'est un tableau)
    if(is_array($articles)):
    ?>
    <h2>Nombre d'articles : <?=$nbArticles?></h2>
    <?php
    // tant que l'on a des articles
    foreach($articles as $article):
    ?>
    <h3><?php echo $article['thearticletitle']?></h3>
    <p><?=$article['thearticletext']?></p>
    <p>Ecrit le <?=$article['thearticledate']?></p>
    <?php
    //fin de boucle
    endforeach;
    // sinon (pas d'articles), donc n'est pas is_array
    // c'est un is_string
    else:
    ?>
    <h3><?=$articles?></h3>
    <?php
    // fin du if/else
    endif;
    ?>
</body>
</html>