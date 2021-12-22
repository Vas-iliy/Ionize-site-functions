<?php

session_start();

include_once 'init.php';

addLog();

$userAuth = getUser();

$uri = $_SERVER['REQUEST_URI'];

if (strpos($uri,BASE_URL . 'index.php') === 0 || checkUri($uri) || $uri !== trimUri($uri)) {
    $cname = 'errors/e404';
}
else {
    $routes = include_once 'routes.php';
    $url = $_GET['querysystemurl'] ?? '';
    $routerRes = parseUrlRouting($url, $routes);

    $cname = $routerRes['controller'];
    define('URL_PARAMS', $routerRes['params']);
}

$path = "controllers/$cname.php";

$pageTitle = $pageContent = '';

if (file_exists($path)) {
    include_once($path);
}
else {
    exit('Programmer LOX');
}



$html = template('base/v_main', [
    'pageTitle' => $pageTitle,
    'pageContent' => $pageContent,
]);
echo $html;