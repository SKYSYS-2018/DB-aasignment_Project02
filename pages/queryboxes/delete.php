<?php 

require_once('../../inc/config.php');

if(isset($_GET['student'])){
	$student=$_GET['student'];
	$deleq="DELETE FROM students WHERE stdID=$student";
	$delq=mysqli_query($connection, $deleq);
	header("location: ../students.php");
}

?>