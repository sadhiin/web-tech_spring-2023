<?php

session_start();

$name = "Mr. X";
$age = 45;

$_SESSION['name']= $name;
$_SESSION['age']= $age;

echo "Session Started<br>";
  ?>
  <a href="viewSession.php">Check</a>