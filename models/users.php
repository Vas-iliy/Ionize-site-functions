<?php

function userByLogin(string $login) :?array {
    $sql = "SELECT id_user, password FROM users WHERE login=:login";
    $query = dbQuery($sql, ['login' => $login]);

    return $query->fetch();
};

function userById(int $id) :?array {
    $sql = "SELECT id_user, login, email, role, dt_add FROM users JOIN roles USING (id_role) WHERE id_user=:id";
    $query = dbQuery($sql, ['id' => $id]);

    return $query->fetch();
};