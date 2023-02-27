<?php

setcookie('autologin', null, -1, "/");
setcookie('status', null, -1, "/");
unset($_SESSION['status']);

header('location: public_home.php');