<?php
    $page_title = "Dashboard";
    if(isset($_SESSION['username'])){
        include "./includes/header_login.php";
    }else{
        header("Location: login.php");
    }
?>

    <h1>
        Welcome to dashboard...
    </h1>



<?php
    include "./includes/footer.php";
?>