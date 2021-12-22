<?php
$pageTitle= 'Ionize';

unset($_SESSION['category']);

$articles = statesAll();
$articles = statesImages($articles);
$articles = statesComments($articles);
$categories = categoriesAll();

$states = template('states/v_states', [
    'articles' => $articles,
    'userAuth' => $userAuth
]);
$categoryMenu = template('categories/v_categories_left', [
    'categories' => $categories,
    'userAuth' => $userAuth
]);

$pageContent = template('base/v_man2col', [
    'states' => $states,
    'categoryMenu' => $categoryMenu
]);

