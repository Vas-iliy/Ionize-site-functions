<?php

function statesAll() : array {
    $sql = "SELECT * FROM states JOIN categories USING (id_category) ORDER BY states.dt_add DESC";
    $query = dbQuery($sql);

    return $query->fetchAll();
}

function statesImages(array $states) : array {
    $imagesState = array_map(function ($state) {
        $images = imageState($state['id_state']);

        if (isset($images)) {
            $state['name_image'] = $images;
        }

        return $state;
    }, $states);

    return $imagesState;
}

function statesComments(array $states) : array {
    $commentsState = array_map(function ($state) {
        $comments = commentsIsState($state['id_state']);

        if (isset($comments)) {
            $state['comments'] = $comments;
        }

        return $state;
    }, $states);

    return $commentsState;
}

function stateOne(int $id) : ?array {
    $sql = "SELECT id_state, title_state, text_state, validate, id_category, title_cat, id_user, login, email, image_user 
            FROM states JOIN categories USING (id_category) JOIN users USING (id_user) WHERE id_state=:id_state";
    $query = dbQuery($sql, ['id_state' => $id]);

    return $query->fetch();
}

function statesCategory(int $idCategory) {
    $sql = "SELECT * FROM states JOIN categories USING (id_category) WHERE id_category=:id_category ORDER BY states.dt_add DESC ";
    $query = dbQuery($sql, ['id_category' => $idCategory]);

    return $query->fetchAll();
}

function stateValidations(array &$fields) : array {
    $errors = [];
    $textLength = mb_strlen($fields['text_state'], 'UTF-8');
    if ($fields['title_state'] === '' || $fields['text_state'] === '') {
        $errors[] = 'Введите все поля';
    }
    if ($textLength < 150 || $textLength > 100000) {
        $errors[] = 'Текст от 150 до 100000 символов';
    }

    $fields = array_map(function ($field) {
        return htmlspecialchars($field);
    }, $fields);

    return $errors;
}

function addState(array $fields, int $idUser) : bool {
    $fields['id_user'] = $idUser;
    $sql = "INSERT states (title_state, text_state, id_category, id_user) VALUES 
            (:title_state, :text_state, :id_category, :id_user)";
    dbQuery($sql, $fields);

    return true;
}

function editState(array $fields, int $idState) : bool {
    $fields['id_state'] = $idState;
    $fields['validate'] = 0;
    $sql = "UPDATE states SET validate=:validate, title_state=:title_state, text_state=:text_state, id_category=:id_category WHERE id_state=:id_state";
    $query = dbQuery($sql, $fields);

    return true;
}

function deleteState(int $idState) : bool {
    $sql = "DELETE FROM states WHERE id_state=:id_state";
    dbQuery($sql, ['id_state' => $idState]);

    return true;
}

function statesIsModerate(int $validate) : ?array {
    $sql = "SELECT * FROM states JOIN categories USING (id_category) WHERE validate=:validate ORDER BY states.dt_add DESC";
    $query = dbQuery($sql, ['validate' => $validate]);

    return $query->fetchAll();
}

function moderate(int $idState, int $validate) : bool {
    $sql = "UPDATE states SET validate=:validate WHERE id_state=:id_state";
    dbQuery($sql, ['validate' => $validate, 'id_state' => $idState]);

    return true;
}