<?php
$role = $userAuth['id_user'];
if (!isset($userAuth) && role($role !== 'admin')) {
    header('Location:' . BASE_URL);
}
$statesIsModerate = statesIsModerate(0);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idState = (int)$_POST['id_state'];
    moderate($idState, 1);

    header('Location:' . BASE_URL);
}

$pageTitle = 'Moderation';
$pageContent = template('v_moderation', [
    'statesIsModerate' => $statesIsModerate
]);