<?php

$session = sessionOneId($userAuth['id_user']);

if ($session) {
    sessionDelete($session['id_session']);
    unset($_SESSION['token']);
    setcookie('token', '', time() - 10, BASE_URL);
}

header('Location:' . BASE_URL);