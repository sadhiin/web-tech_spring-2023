<?php

require_once("../model/model.php");

$q = $_REQUEST["q"];
$users = getAllUsers();


foreach ($users as $user) {
    if ($users['email'] == $q) {
        echo "Email is user";
    } else {
        echo "Email OK!";
    }
}
