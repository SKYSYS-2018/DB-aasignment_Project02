<?php

session_start();
require_once('../inc/config.php');

if(!isset($_SESSION['usertype'])){
	header("location: ./login.php");
}elseif($_SESSION['usertype']!=1){
	header("location: ../index.php");
}


// -----------------SELECT Quaries----------------------------//

$stdquery="SELECT S.stdID,S.stdFName,S.stdLName,S.stdStreetNo,S.stdStreet,S.stdCity,U.stdID AS UGR,G.stdID AS GR
		   FROM students AS S LEFT OUTER JOIN undergraduate AS U ON S.stdID = U.stdID 
		   LEFT OUTER JOIN graduate AS G ON S.stdID = G.stdID;";

$stdcon=mysqli_query($connection,$stdquery);

require_once('layout/header.php'); 

?>

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