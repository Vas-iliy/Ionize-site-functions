<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);

    if($_POST['remember']) {
        $remember = $_POST['remember'];
    } else { $remember = ''; }

    if ($login !== '' && $password !== '') {
        $user = userByLogin($login);

        if (isset($user) && password_verify($password, $user['password'])) {
            login($user, $remember);
            header('Location:' . BASE_URL);

            exit();
        }
    }
    $error = 'Введите все поля';
}
else {
    $error = '';
}

$pageTitle = 'Login';
$pageContent = template('auth/v_login', [
    'error' => $error
]);