<?php

$id = (int)URL_PARAMS['id'];
$category = categoryOne($id);
$_SESSION['category'] = $category['title_cat'];

$articles = statesCategory($id);
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

$pageTitle= $category['title_cat'];
$pageContent = template('base/v_man2col', [
    'states' => $states,
    'categoryMenu' => $categoryMenu
]);