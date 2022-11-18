<?php

function sqlConnect() {
    // Read the credentials
    $filename = "../sqlCredentials/sqlCredentials.json";
    $file = file_get_contents($filename, true);
    $credentials = json_decode($file, true);

    // Connect to the database and return the dbh
    $dsn = "mysql:host=" . $credentials["hostname"] . ";dbname=" . $credentials["database"] . ";port=" . $credentials["port"];
    return new PDO(
        $dsn,
        $credentials["username"],
        $credentials["password"],
        array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::MYSQL_ATTR_SSL_CAPATH => '/public_html',
            PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => 0
        )
    );
}
