<?php
session_start();
    $page_title = "Home Page";
    if (!isset($_SESSION['username'])) {
        include "./includes/header.php";
    } else {
        include "./includes/header_login.php";
    }
?>

<h1>
    Welcome to Company Home.
</h1>


<?php
    include "./includes/footer.php";
?>