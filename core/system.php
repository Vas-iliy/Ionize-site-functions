<?php

function checkUri(string $uri) : bool {
    return !!preg_match('/\/{2,}/',$uri);
}

function trimUri(string $uri) : string {
    $arr = explode('/', $uri);
    $num = count($arr);

    if ($arr[$num-1] === '' && $num > 3) {
        unset($arr[$num-1]);
        $uri = implode('/', $arr);
    }

    return $uri;
}

function template(string $path, array $vars = []) : string {
    $systemTemplateInfoFullPath = "views/$path.php";
    extract($vars);

    ob_start();
    include ($systemTemplateInfoFullPath);

    return ob_get_clean();
}

function parseUrlRouting(string $url, array $routes) : array {
    $res = [
        'controller' => 'errors/e404',
        'params' => []
    ];

    foreach ($routes as $route) {
        $maches = [];

        if (preg_match($route['test'], $url, $maches)) {
            $res['controller'] = $route['controller'];

            if ($route['params']) {
                foreach ($route['params'] as $name => $num) {
                    $res['params'][$name] = $maches[$num];
                }
            }

            break;
        }
    }

    return $res;

}

function extractFields(array $target, array $fields) : array {
    $res = [];

    foreach ($fields as $field) {
        $res[$field] = trim($target[$field]);
    }

    return $res;
}