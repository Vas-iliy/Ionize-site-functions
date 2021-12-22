<?php

function imageState(int $id) : ?array {
    $sql = "SELECT * FROM images WHERE id_state=:id_state";
    $query = dbQuery($sql, ['id_state' => $id]);

    return $query->fetchAll();
}

function addImages(int $idState, int $idUser, array $images) : bool {
    $sql = "INSERT images (name_image, id_state, id_user) VALUES (:image, :idState, :idUser)";

    foreach ($images as $image) {
        dbQuery($sql, ['image' => $image, 'idState' => $idState, 'idUser' => $idUser]);
    }

    return true;
}

function searchImages(array $imagesTable, ?array $newImages) : array {
    $deleteImages = [];
    foreach ($imagesTable as $image) {
        if (!empty($newImages)) {
            foreach ($newImages as $im) {
                if ($image['name_image'] !== $im) {
                    $name = false;
                }
                else {
                    $name = true;
                }
                if ($name) break;
            }
            if (!$name) {
                $deleteImages[] = $image['name_image'];
            }
        }
        else {
            $deleteImages[] = $image['name_image'];
        }

    }

    return $deleteImages;
}

function deleteImages(array $images, int $idState) : bool {
    if (!empty($images)) {
        $sql = "DELETE FROM images WHERE name_image=:image AND id_state=:idState ";
        foreach ($images as $image) {
            dbQuery($sql, ['image' => $image, 'idState' => $idState]);
        }
    }

    return true;
}