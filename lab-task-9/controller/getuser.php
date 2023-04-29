<?php

require_once("../model/model.php");

$q = $_REQUEST["q"];
$users = getAllUsers();

if (strlen($q) < 4) {
    echo "Username should be more then 4 charecter";
} else {
    foreach ($users as $user) {
        if ($users['username'] == $q) {
            echo "Username name is take";
        } else {
            echo "Username is avaiable";
        }
    }
}
