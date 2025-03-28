<?php
# CONTROLLER
/*
 * Contrôleur frontal
 */

# chargement des variables indispensables
require_once '../config-dev.php';

# connexion à la base de donnée MariaDB pdo_sym_c1


// on va chercher le contrôleur public, celui utilisé pour les non-connectés
include "../controller/publicController.php";

// bonne pratique (fermeture de la connexion)
