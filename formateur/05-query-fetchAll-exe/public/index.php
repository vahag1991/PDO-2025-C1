<?php
# Appel du fichier de configuration nommé config.php
// config.dev.php doit rester dans le dossier


# Connexion PDO


// Première requête SQL envoyée et récupérée
/*
 * Sélectionnez les champs `thearticle`.`thearticletitle`,
 * `thearticle`.`thearticletext`,
 *  et `thearticle`.`thearticledate` des
 *  20 derniers `thearticle` classé par `thearticle`.`thearticledate`descendant.
 */

// nombre de résultats

// si le nombre de résultats est plus grand que 0

    // transformation de la requête en format
    // lisible par PHP en utilisant fetchAll
    // Pour PHP, choisissez tableau associatif

// sinon

    // création d'un message contenant la chaine "Pas encore de message"


# Bonnes pratiques

// fermeture de la requête (pour l'exécuter à nouveau)

// fermeture de connexion

// chargement de notre vue
include "../view/homepageView.php";
// débogage





