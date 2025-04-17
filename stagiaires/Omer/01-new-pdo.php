<?php
$myBDD = new PDO(
    'mysql:host=localhost;dbname=pdo_c1;port=3306;charset=utf8',
    'root',
    '',
);

var_dump($myBDD);
echo "hi";