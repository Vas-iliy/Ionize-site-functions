<?php

include_once 'core/db.php';

function checkImageName(string $name) : bool {
    return preg_match('/.*\.jpg$/', $name);
}

function copyFile (string $file, string $dir, string $user) : string {
    $newName = $user . md5(microtime() . rand(999, 9999));
    copy($file, 'assets/images/'  . $dir . '/' .  $newName . '.jpg');

    return $newName;
}

function validationFile($oldFile, string $dir, string $user) : array {
    $errors = [];
    if (!empty($oldFile['images']['name'][0])) {
        $file = $oldFile['images'];

        foreach ($file['name'] as $name) {
            if (!checkImageName($name)) {
                $errors[] = 'Только jpg';
            }
        }

        foreach ($file['size'] as $size) {
            if ($size === 0) {
                $errors[] = 'Слишком большой файл';
            }
        }

        if (empty($errors)) {
            $name = [];

            foreach ($file['tmp_name'] as $tmp) {
                $name[] = copyFile($tmp, $dir, $user);
            }
        }
    }
    elseif (!empty($_SESSION['edit'])) {
        $name = [];
    }
    else {
        $name = [];
        $errors[] = 'Добавьте изображение!';
    }

    $res = [
        'images' => $name,
        'errors' => $errors
    ];

    return $res;
}

function unlinkFile(string $file, string $dir) : bool {
    unlink("assets/images/$dir/$file.jpg");

    return true;
}