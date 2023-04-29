<?php
function db_connection()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "labtasks";

    try {
        $conn = new PDO('mysql:host=' . $servername . ';dbname=' . $dbname . ';charset=utf8', $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        // var_dump($conn) ;
    } catch (PDOException $e) {
        echo $e->getMessage();
        die('Error in connecting DB');
    }
    return $conn;
}
