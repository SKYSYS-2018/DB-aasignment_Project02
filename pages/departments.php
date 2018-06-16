<?php

session_start();
require_once('../inc/config.php');

if(!isset($_SESSION['usertype'])){
	header("location: ./login.php");
}

// -----------------SELECT Quaries----------------------------//

$depquery="SELECT D.depID,D.depName,D.depPhone,P.profFName,P.proLName,L.locStreeNo,L.locStreet,L.locCity 
		FROM departments AS D LEFT OUTER JOIN location AS L ON D.locationID = L.locationID 
		LEFT OUTER JOIN professors AS P ON D.profID = P.profID;";

$depcon=mysqli_query($connection,$depquery);
?>

<!DOCTYPE html>
<html>

<head>
	<title>Departments Managing</title>
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/nav.css">
	<link rel="stylesheet" type="text/css" href="../css/subpage.css">
	<style type="text/css">
		.sub-page-table th,td {
			width: 16.5%;
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
				<div class="container sub-page-title text-center border-default"> DEPARTMENTS </div>
			</div>

			<div class="sub-page-box">
				<button class="sub-page-btn border-default"> Add a New Department </button>
			</div>

			<div class="sub-page-box">
				<table class="container sub-page-table text-center">
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Contact</th>
						<th>Head</th>
						<th>Location</th>
						<th>Actions</th>
					</tr>

					<!-- Show Department and Location Table Data -->
					<?php
						$row="";
						if(mysqli_num_rows($depcon)>0){
							while($department=mysqli_fetch_assoc($depcon)){
								$row=$row."<tr>
								<td>$department[depID]</td>
								<td>$department[depName]</td>
								<td>$department[depPhone]</td>
								<td>$department[profFName] $department[proLName]</td>
								<td>$department[locStreeNo] , $department[locStreet] , $department[locCity]</td>
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