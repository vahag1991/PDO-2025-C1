<?php
# Création des constantes de connexion MariaDB
# il faut dupliquer le fichier sous le nom config-prod.php
# et modifier les constantes de connexion

const DB_CONNECT_TYPE = "mysql"; // MySQL mais aussi MariaDB
const DB_CONNECT_HOST = "localhost";
const DB_CONNECT_PORT = 3307;
const DB_CONNECT_NAME = "pdo_sym_c1";
const DB_CONNECT_CHARSET = "utf8";
const DB_CONNECT_USER = "root";
const DB_CONNECT_PWD = "";