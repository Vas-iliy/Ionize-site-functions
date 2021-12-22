<?php

function newSession(int $id_user, string $token) : bool {
    $sql = "INSERT sessions (id_user, token) VALUES (:id_user, :token)";
    $query = dbQuery($sql, ['id_user' => $id_user, 'token' => $token]);

    return true;
}

function sessionOne(string $token) {
    $sql = "SELECT * FROM sessions WHERE token=:token";
    $query = dbQuery($sql, ['token' => $token]);

    return $query->fetch();
}

function sessionOneId(int $id) {
    $sql = "SELECT * FROM sessions WHERE id_user=:id";
    $query = dbQuery($sql, ['id' => $id]);

    return $query->fetch();
}

function sessionDelete(int $id) : bool {
    $sql = "DELETE FROM sessions WHERE id_session=:id";
    $query = dbQuery($sql, ['id' => $id]);

    return true;
}