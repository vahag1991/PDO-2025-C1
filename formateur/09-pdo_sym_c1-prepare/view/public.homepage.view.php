<?php
# VIEW
?>
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
<?php
// appel du menu
include 'inc/public.menu.inc.view.php';
?>
<h1>Hello world</h1>

<?php
var_dump($menu);
var_dump($pdo);
?>
</body>
</html>
