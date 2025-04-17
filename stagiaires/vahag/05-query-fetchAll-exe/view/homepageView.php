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
    <h1>Accueil | Derniers articles</h1>    <h2>Nombre d'articles : <?php echo $nbResponse ?> </h2>
    <?php 
        if (!isset ($Error)){
            foreach ($response as $article):
        
            ?>
        <h3><?php echo $article ["thearticletitle"] ?></h3>
    <p><?php echo $article ["thearticletext"] ?></p>
    <p><?php echo $article["thearticledate"] ?></p>
        
    
    <?php
    // fin du if/else
    endforeach;
} else { echo $Error;
}
    ?>
    <h3>Affichage de l'erreur</h3>
   
</body>
</html>