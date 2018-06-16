<?php

session_start();
require_once('../inc/config.php');

if(!isset($_SESSION['usertype'])){
	header("location: ./login.php");
}

// -----------------SELECT Quaries----------------------------//

$stdquery="SELECT S.stdID,S.stdFName,S.stdLName,S.stdStreetNo,S.stdStreet,S.stdCity,U.stdID AS UGR,G.stdID AS GR
		   FROM students AS S LEFT OUTER JOIN undergraduate AS U ON S.stdID = U.stdID 
		   LEFT OUTER JOIN graduate AS G ON S.stdID = G.stdID;";

$stdcon=mysqli_query($connection,$stdquery);

?>

<!DOCTYPE html>
<html>

<head>
	<title>Students Managing</title>
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/nav.css">
	<link rel="stylesheet" type="text/css" href="../css/subpage.css">
	<style type="text/css">
		.sub-page-table th,td {
			width: 20%;
		}
	</style>
</head>

<body>

	<div class="container page border-default">

		<!-- Title Box -->
		<div class="container title-box border-default">
			<a href="../index.php"><div class="title left">UNIVERSITY SYSTEM</div></a>
			<div class="logview-box right">
				<div class="logview-label text-center"> LOGGED AS ADMIN </div>
				<div class="logview-btn text-center"> LOG OUT </div>
			</div>
		</div>

		<!-- Navigation Panel -->
		<div class="container nav-panel border-default">
			<a href="./departments.php" class="nav-item-leftmost text-center"> DEPARTMENTS </a>
			<a href="./students.php" class="nav-item text-center"> STUDENTS </a>
			<a href="./courses.php" class="nav-item text-center"> COURSES </a>
			<a href="./professors.php" class="nav-item text-center"> PROFESSORS </a>
			<a href="./company_sessions.php" class="nav-item text-center" > COMPANY SESSIONS </a>
			<a href="./books.php" class="nav-item text-center"> BOOKS </a>
			<a href="./lab_sessions.php" class="nav-item-rightmost text-center"> LAB SESSIONS </a>
		</div>

		<!-- Sub Page -->
		<div class="container sub-page border-default">

			<div class="sub-page-box">
				<div class="container sub-page-title text-center border-default"> STUDENTS </div>
			</div>

			<div class="sub-page-box">
				<button class="sub-page-btn border-default"> Add a New Student </button>
			</div>

			<div class="sub-page-box">
				<table class="container sub-page-table text-center">
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Address</th>
						<th>Student State</th>
						<th>Actions</th>
					</tr>

					<!-- Show Student Table Data -->
					<?php
						$row="";
						if(mysqli_num_rows($stdcon)>0){
							while($student=mysqli_fetch_assoc($stdcon)){
								$state="";
								if($student['UGR']!="" && $student['GR']==""){
									$state="Undergraduate";
								} elseif ($student['UGR']=="" && $student['GR']!="") {
									$state="Graduate";
								} else {
									$state="Not Mentioned";
								}
								$row=$row."<tr>
								<td>$student[stdID]</td>
								<td>$student[stdFName] $student[stdLName]</td>
								<td>$student[stdStreetNo] , $student[stdStreet] , $student[stdCity]</td>
								<td>$state</td>
								<td>
									<button class='table-btn'>EDIT</button>
									<button class='table-btn'>DELETE</button>
								</td>
								</tr>";
							}
							echo $row;
						}
					?>
				</table>
			</div>

		</div>

	</div>

</body>

</html>