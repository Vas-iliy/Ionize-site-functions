<?php

function role (int $idUser) : string {
    $sql = "SELECT role FROM roles JOIN users USING (id_role) WHERE id_user=:id_user";
    $query = dbQuery($sql, ['id_user' => $idUser]);
    $role = $query->fetch();

    return  $role['role'];
}