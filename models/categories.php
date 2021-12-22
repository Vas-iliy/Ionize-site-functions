<?php

function categoriesAll() {
    $sql = "SELECT * FROM categories";
    $query = dbQuery($sql);

    return $query->fetchAll();
}

function categoryOne(int $id) : ?array {
    $sql = "SELECT *FROM categories WHERE id_category=:id";
    $query = dbQuery($sql, ['id' => $id]);

    return $query->fetch();
}

function addCategory(string $title) : bool {
    $sql = "INSERT categories (title_cat) VALUE (:title_cat)";
    dbQuery($sql, ['title_cat' => $title]);

    return true;
}