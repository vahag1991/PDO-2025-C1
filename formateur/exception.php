<?php
// âge au hasard entre 16 et 77 ans.
$age = rand(16, 19);
// on divise de 0 à 5.
$diviseAge = rand(0, 5);
try {
    if ($diviseAge === 0) {
        // création erreur perso
        throw new Exception("Age n'est pas divisible par 0", 10001);
    } elseif ($age < 18) {
        // création autre erreur perso
        throw new Exception("Trop jeune", 10002);
    } else {
        echo '$age / $diviseAge = ' . "$age / $diviseAge =" . ($age / $diviseAge);
    }
} catch (Exception $e) {
    die("Code :" . $e->getCode() . "<br>"
        . 'Message($e->getMessage()) :' . " {$e->getMessage()} <br>")
    ;
}

