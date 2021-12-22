<?php

header($_SERVER['SERVER_PROTOCOL'] . '404 Not Fount');

$pageTitle = 'Ошибка 404';
$pageContent = template('errors/v_404');