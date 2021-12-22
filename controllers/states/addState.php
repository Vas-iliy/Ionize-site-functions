<?php

if (!isset($userAuth)) {
    header('Location:' . BASE_URL);
}

$categories = categoriesAll();
$articleErrors = [];
$fields = ['title_state' => '', 'text_state' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fields = extractFields($_POST, ['title_state', 'text_state', 'id_category']);
    $stateErrors = stateValidations($fields);

    if (empty($articleErrors)) {
        $images = validationFile($_FILES, 'states', $userAuth['login']);

        if (!empty($images['errors'])) {
            $articleErrors = array_merge($articleErrors, $images['errors']);
            goto articleErrors;
        }
        addState($fields, $userAuth['id_user']);
        $lastId = dbLastId();

        addImages($lastId, $userAuth['id_user'], $images['images']);

        header('Location:' . BASE_URL . "state/$lastId");
    }
    articleErrors:
}

$pageTitle = 'New State';
$pageContent = template('states/v_addState', [
    'articleErrors' => $articleErrors,
    'categories' => $categories,
    'fields' => $fields
]);