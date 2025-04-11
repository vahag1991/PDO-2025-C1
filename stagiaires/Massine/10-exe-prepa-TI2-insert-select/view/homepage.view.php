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
    Le formulaire se trouve ici
</pre>
    <hr>
    <form action="" method="POST">
        <label for="name">Nom :</label>
        <input type="text" name="name" id="name" required>

        <label for="text">Texte :</label>
        <textarea name="text" id="text" rows="5" required></textarea>

        <label for="date">Date :</label>
        <input type="date" name="date" id="date" required>

        <button type="submit">Envoyer</button>
    </form>
    <hr>
    <div>
        Nos messages par date DESC

        NOM
        TEXTE
        DATE
    </div>
    <?php
    var_dump($db, $messages);
    ?>
    <hr>
</body>

</html>