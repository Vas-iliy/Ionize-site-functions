<?php

$id = (int) URL_PARAMS['id'];

$state = stateOne($id);
$images = imageState($state['id_state']);
$comments = commentsIsState($state['id_state']);

$pageTitle = 'State';
$pageContent = template('states/v_state', [
    'state' => $state,
    'images' => $images,
    'comments' => $comments,
    'user' => $userAuth
]);