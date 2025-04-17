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
    <form action="" method="POST">
        <label for="name">Nom :</label>
        <input type="text" name="name" id="name" required>

        <label for="text">Texte :</label>
        <textarea name="text" id="text" rows="5" required></textarea>

        <label for="email">Email :</label>
        <input name="email" id="email" type="email">

        <label for="date">Date :</label>
        <input type="date" name="date" id="date" required>

        <button type="submit">Envoyer</button>
    </form>
    <?php
    // si le tableau est vide (pas d'articles)
    if (empty($messages)):
    ?>
        <div class="nomessages">
            <h2>Il n'y a pas encore de message</h2>
            <h3>Veuillez revenir plus tard</h3>
        </div>
    <?php
    // le tableau n'est pas vide, on a au moins un message
    else:
        // on prend le nombre de résultats
        $nbArticles = count($messages);
        // on crée un pluriel si jamais on a plus d'un résultat
        $pluriel = ($nbArticles > 1) ? "s" : "";
    ?>
        <div class="messages">
            <h2>Il y a <?= $nbArticles ?> message<?= $pluriel ?></h2>
            <hr>
            <?php
            // tant qu'on a des messages
            foreach ($messages as $message):
            ?>
                <h3><?= $message['surname'] ?></h3>
                <p><?= $message['message'] ?></p>
                <p><?= $message['create_date'] ?></p>
                <hr>
            <?php
            // fin de la boucle
            endforeach;
            ?>

        </div>
    <?php
    endif;
    ?>

</body>

</html>