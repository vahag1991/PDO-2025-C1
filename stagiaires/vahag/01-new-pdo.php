<?php

# PDO est une classe qui permet d'instancier (créer) un objet de type PDD

#$connectDB est un pointeur, un lien (drapeau, flag, etc..) vers l'instance (donc objet), et non pas une variable contenant la connesxion

// $connectDB = new PDO('mysql:host=localost;dbname=nom_de_la_base_de_donnees',
// 'nom_utilisateur',
// 'mot_de_passe'
// );

$myBDD= new PDO(
    #dsm ->paramètre de connecion à la  DB école
    'mysql:host=localhost;dbname=pdo_c1;port=3306;charset=utf8',
    #usernam -> login
    'root',
    #password
    '',
    #option (null ou tableau d'options)

);

$a = 5;
$b = $a;
$a++; echo '$a a son espace propre: '. "$a, et ". '$b egalement : ' .$b;

$myBDD2 = $myBDD;

var_dump($myBDD,$myBDD2);