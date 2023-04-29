<?php
session_start();
include "model/model.php";
$target_dir = "uploads/";
if (strpos($_FILES['file_to_upload']['type'], 'image/') !== false) {
    $ext = substr($_FILES['file_to_upload']['name'], strlen($_FILES['file_to_upload']['name']) - 4, 4);
    if (strtolower($ext) == 'jpeg') {
        $ext = substr($_FILES['file_to_upload']['name'], strlen($_FILES['file_to_upload']['name']) - 5, 5);
    }
    $moving_path = $target_dir . time() . $ext;
    if (move_uploaded_file($_FILES["file_to_upload"]["tmp_name"], $moving_path)) {
        // if ($_SESSION['data']['img_path'] != 'uploads/profile.png') {
        //     unlink($_SESSION['data']['img_path']);
        // } else {
            if (updateImage($_SESSION['username'], $moving_path)) {
                $_SESSION['data']['img_path'] = $moving_path;
                header('Location: viewprofile.php');
            }
        // }
    } else {
        echo 'failed to upload file';
    }
} else {
    echo 'uploaded file not a image';
}
