<?php

function dbConnection() : PDO {
    static $db;
    if ($db === null) {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_TABLE . ';charset=utf8',
            DB_USER, DB_PASSWORD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }

    return $db;
}

function dbLastId() {
    $db = dbConnection();

    return $db->lastInsertId();
}

function dbQuery(string $sql, array $params = []) : PDOStatement {
    $db = dbConnection();
    $query = $db->prepare($sql);

    $query->execute($params);

    dbCheckErrors($query);

    return $query;
}

function dbCheckErrors(PDOStatement $query) : bool {
    $err = $query->errorInfo();
    if ($err[0] !== PDO::ERR_NONE) {
        exit($err[2]);
    }

    return true;
}