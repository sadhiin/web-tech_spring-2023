<?php  
include '../Controller/DataController.php' ;

$name = $_GET['name'];

$student = studentInfo($name);

	echo $student['name'];
	echo "<br>";
	echo $student['e-mail'];
	echo "<br>";
	echo $student['username'];
	echo "<br>";
	echo $student['gender'];
	echo "<br>";
	echo $student['dob'];
	echo "<br>";

?>