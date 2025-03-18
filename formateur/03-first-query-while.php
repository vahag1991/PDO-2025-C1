<?php
# Chargement de notre configuration
require_once "config_pdo_c1.php";

# Instanciation de PDO avec gestion des erreurs

// essais
try{
    // instanciation avec PDO
    $db = new PDO(
        dsn:DB_CONNECT_TYPE.":host=".DB_CONNECT_HOST.";dbname=".DB_CONNECT_NAME.";port=".DB_CONNECT_PORT.";charset=".DB_CONNECT_CHARSET,
        username:DB_CONNECT_USER,
        password:DB_CONNECT_PWD,
    );

// si erreur, instanciation de Exception avec $e comme pointeur    
}catch(Exception $e){
    // arrêt du script avec die(), et affichage de la méthode se trouvant dans l'instance de Exception via $e
    die("Code erreur : {$e->getCode()} | Message : {$e->getMessage()}");
}

$requestUser = $db->query("SELECT * FROM `theuser`");



// fermeture de la connexion (bonne pratique)
$db = null;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>first query</title>
</head>
<body>
<?php
var_dump($db,$requestUser);
?>
<h1>PDO::query avec fetch et while</h1>
<h3>Nous avons <?=$requestUser->rowCount()?> résultats</h3>
<p>Par défault, PDO utilise PDO::FETCH_DEFAULT ()</p>
<?php
// concaténation OO {}
echo "<h3>Nous avons {$requestUser->rowCount()} résultats</h3>";
// Ancienne méthode, toujours fonctionnelle, mais qu'on évitera pour la séparation MVC
while ($item = $requestUser->fetch()) {

    echo "$item[0] $item[1] $item[2]<br>";
    echo "$item[idtheuser] $item[theuserlogin] $item[theusername]<br>";
    echo $item['idtheuser']." ".$item['theuserlogin'] ." ".$item['theusername']."<br>";
    echo "{$item['idtheuser']} {$item['theuserlogin']} {$item['theusername']}<hr>";
}
// bonne pratique (ne sert à rien pour MySQL et MariaDB)
$requestUser->closeCursor();
?>
</body>
</html>
