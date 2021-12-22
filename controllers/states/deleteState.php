<?php

$id = (int)URL_PARAMS['id'];
$state = stateOne($id);

if ($state['id_user'] !== $userAuth['id_user']) {
    header('Location:' . BASE_URL);
    exit();
}

$imagesTable = imageState($id);
$deleteImages = searchImages($imagesTable, null);
deleteImages($deleteImages, $id);

foreach ($deleteImages as $image) {
    unlinkFile($image, 'states');
}

deleteState($id);

header('Location:' . BASE_URL);