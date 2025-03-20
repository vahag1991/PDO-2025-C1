<?php

const DB_CONNECT_TYPE = "mysql";
const DB_CONNECT_HOST = "localhost";
const DB_CONNECT_PORT = 3306;
const DB_CONNECT_NAME = "pdo_c1";
const DB_CONNECT_CHARSET = "utf8";
const DB_CONNECT_USER = "root";
const DB_CONNECT_PWD = "";



try {
    $db = new PDO(
        dsn: DB_CONNECT_TYPE . ":host=" . DB_CONNECT_HOST . ";" . "dbname=" . DB_CONNECT_NAME . ";" . "port=" . DB_CONNECT_PORT . "charset=" . DB_CONNECT_CHARSET . ";",
        username: DB_CONNECT_USER,
        password: DB_CONNECT_PWD,
    );

} catch (Exception $e) {
    die($e->getMessage());
}
