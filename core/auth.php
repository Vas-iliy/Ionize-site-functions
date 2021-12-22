<?php

function login(array $user, $remember) : bool {
    $token = substr(bin2hex(random_bytes(256)), 0, 256);
    newSession($user['id_user'], $token);
    $_SESSION['token'] = $token;

    if ($remember) {
        setcookie('token', $token, time() + 3600*24*30, BASE_URL);
    }

    return true;
}

function getUser() {
    $user = null;
    $token = $_SESSION['token'] ?? $_COOKIE['token'] ?? '';

    if (isset($token)) {
        $session = sessionOne($token);

        if ($session) {
            $user = userById($session['id_user']);
        }

        if (!$user) {
            unset($_SESSION['token']);
            setcookie('token', '', time() - 1);
        }
    }

    return $user;
}