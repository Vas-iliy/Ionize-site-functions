<?php

function commentsIsState(int $id) : ?array {
    $sql = "SELECT comment, comments.dt_add ,id_user, login, email, image_user FROM comments JOIN users USING (id_user) WHERE id_state=:id";
    $query = dbQuery($sql, ['id' => $id]);

    return $query->fetchAll();
}
