<?php

if (!isset($userAuth)) {
    header('Location:' . BASE_URL);
}

$categoryErrors = [];
$fields = ['title_cat' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titleCat = htmlspecialchars(trim($_POST['title_cat']));
    addCategory($titleCat);

    header('Location:' . BASE_URL);
}

$pageTitle = 'New Category';
$pageContent = template('categories/v_addCategory');