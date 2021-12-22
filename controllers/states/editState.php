<?php

$id = (int)URL_PARAMS['id'];
$state = stateOne($id);

if ($state['id_user'] !== $userAuth['id_user']) {
    header('Location:' . BASE_URL);
    exit();
}

$_SESSION['edit'] = 'edit';

$categories = categoriesAll();
$imagesTable = imageState($id);

$articleErrors = [];
$fields = ['title_state' => '', 'text_state' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fields = extractFields($_POST, ['title_state', 'text_state', 'id_category']);

    $oldImages = $_POST['images'];

    $articleErrors = stateValidations($fields);

    if (empty($articleErrors)) {
        $images = validationFile($_FILES, 'states', $userAuth['login']);

        if (!empty($images['errors'])) {
            $articleErrors = array_merge($articleErrors, $images['errors']);
            goto articleErrors;
        }
        if (!$oldImages && !$images['images']) {
            $articleErrors[] = 'Добавьте изображение!';
            goto articleErrors;
        }

        editState($fields, $id);

        $deleteImages = searchImages($imagesTable, $oldImages);

        deleteImages($deleteImages, $id);

        foreach ($deleteImages as $image) {
            unlinkFile($image, 'states');
        }

        if (!empty($images['images'])) {
            addImages($id, $userAuth['id_user'], $images['images']);
        }

        header('Location:' . BASE_URL . "state/$id");
    }
    articleErrors:
}
else {
    $fields = extractFields($state, ['title_state', 'text_state']);
}

$pageTitle = $state['title_state'];
$pageContent = template('states/v_addState', [
    'categories' => $categories,
    'fields' => $fields,
    'articleErrors' => $articleErrors,
    'images' => $imagesTable
]);