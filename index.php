<?php
	
session_start();
require_once('inc/config.php');

if(!isset($_SESSION['usertype'])) {
	header("location: ./pages/login.php");
}

?>

<!DOCTYPE html>
<html>

<head>
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="./css/main.css">
	<link rel="stylesheet" type="text/css" href="./css/home.css">
</head>

<body>

	<div class="container page border-default">

		<!-- Title Box -->
		<div class="container title-box border-default">
			<a href="./index.php"><div class="title left">UNIVERSITY SYSTEM</div></a>
			<div class="logview-box right">
				<!-- Logged user view and logout button -->
				<?php
				echo "<div class='logview-label text-center'> LOGGED AS ";
				if($_SESSION["usertype"]==1){
					echo "ADMIN"; 
				} elseif ($_SESSION["usertype"]==2) {
					echo "STUDENT";
				} else{
					echo "LIBRARIAN";
				}
				echo" </div>";
				echo "<a href='./pages/logout.php'><div class='logview-btn text-center'> LOG OUT </div></a>";
				?>				
			</div>
		</div>

		<!-- Link Panel -->
		<div class="container link-panel border-default">
			<a href="./pages/departments.php" class="link-box blue left text-center"> Departments </a>
			<a href="./pages/students.php" class="link-box green right text-center"> Students </a>
			<a href="./pages/courses.php" class="link-box green left text-center"> Courses </a>
			<a href="./pages/professors.php" class="link-box blue right text-center"> Professors </a>
			<a href="./pages/company_sessions.php" class="link-box blue left text-center"> Company Sessions </a>
			<a href="./pages/books.php" class="link-box green right text-center"> Books </a>
			<a href="./pages/lab_sessions.php" class="link-box green left text-center"> Lab Sessions </a>
			<a href="#" class="link-box blue right" style="cursor: auto;"></a>
		</div>
	</div>

</body>
</html>