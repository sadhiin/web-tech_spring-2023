<?php
    session_start();
    $islogedin = false;
    
    if (isset($_SESSION['logedin'])){
        $islogedin = true;
    }
    $pageTitle = "Home page";
    include "./include/header.php";
    echo "<hr>";


    echo "<h1>Welcome to the Homepage</h1>";


    require_once("./include/footer.php")
?>

