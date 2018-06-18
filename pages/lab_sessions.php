<?php

if (isset($_POST['add_lab_session'])) {
	
	require_once('../inc/config.php');

	$courseID=$_POST['courseID'];
    $secSem=$_POST['secSem'];
    $secYear=$_POST['secYear'];
    $secNo=$_POST['secNo'];
    $labSessionNo=$_POST['labSessionNo'];
    $labTopic=$_POST['labTopic'];
    $labTime=$_POST['labTime'];
    $location=$_POST['location'];
    $stdID=$_POST['stdID'];
    
    $query="INSERT INTO labsession VALUES('$courseID','$secSem','$secYear','$secNo','$labSessionNo','$labTopic','$labTime','$location','$stdID')";

    $userquery=mysqli_query($connection,$query);
    
    if($userquery){
        echo "<script>alert('Lab session added successfully!')</script>";
        header("location: lab_sessions.php");
    }else{
        echo "<script>alert('Try again')</script>";
    }
}

?>
<!DOCTYPE html>
<html>

<head>
	<title>Lab Sessions Managing</title>
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/nav.css">
	<link rel="stylesheet" type="text/css" href="../css/subpage.css">
    <link rel="stylesheet" type="text/css" href="../css/input.css">
    <script src="../js/show_div.js"></script>
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
				<div class="container sub-page-title text-center border-default"> LAB SESSIONS </div>
			</div>

			<div class="sub-page-box">
				<button class="sub-page-btn border-default" name="add_lab_session" onclick="show_div()"> Add a New Lab Session </button>
			</div>

			<div class="sub-page-box">
				<table class="container sub-page-table text-center">                    
					<tr>
                        <th>Course ID</th>
						<th>Section Semester</th>
						<th>Section Year</th>
                        <th>Section Number</th>
						<th>Lab Session Number</th>
						<th>Lab Topic</th>
                        <th>Lab Time</th>
                        <th>Location</th>
                        <th>Student ID</th>
					</tr>
					
                        <?php
                            require_once('../inc/config.php');
                            $query="SELECT * FROM labsession";
                        $userquery=mysqli_query($connection,$query);
                        if(mysqli_num_rows($userquery)>0){
                            while($row=mysqli_fetch_assoc($userquery)){
                                    echo "<tr><td>".$row['courseID']."</td>";
                                    echo "<td>".$row['secSem']."</td>";
                                    echo "<td>".$row['secYear']."</td>";
                                    echo "<td>".$row['secNo']."</td>";
                                    echo "<td>".$row['labSessionNo']."</td>";
                                    echo "<td>".$row['labTopic']."</td>";
                                    echo "<td>".$row['labTime']."</td>";
                                    echo "<td>".$row['location']."</td>";
                                    echo "<td>".$row['stdID']."</td></tr>";
                                }                            
                            }
                        ?>
				</table>
			</div>

		</div>
        <div id="hidden_div" style="display:none" class="container sub-page border-default">
            <form action="lab_sessions.php" autocomplete="on" method="POST">
                <!-- Input for Course ID -->
                <input type="text" name="courseID" class="container inputs border-default" placeholder="Course ID" required/>
                
                <!-- Input for Section Semester -->
                <input type="text" name="secSem" class="container inputs border-default" placeholder="Section Semester" required/>

                <!-- Input for Section Year -->
                <input type="text" name="secYear" class="container inputs border-default" placeholder="Section Year" required/>

                <!-- Input for Section Number -->
                <input type="text" name="secNo" class="container inputs border-default" placeholder="Section Number" required/>

                <!-- Input for Lab Session Number -->
                <input type="text" name="labSessionNo" class="container inputs border-default" placeholder="Lab Session Number" required/>

                <!-- Input for Lab Topic -->
                <input type="text" name="labTopic" class="container inputs border-default" placeholder="Lab Topic" required/>
                
                <!-- Input for Lab Time -->
                <input type="text" name="labTime" class="container inputs border-default" placeholder="Lab Time" required/>

                <!-- Input for Location -->
                <input type="text" name="location" class="container inputs border-default" placeholder="Location" required/>
                
                <!-- Input for Student ID -->
                <input type="text" name="stdID" class="container inputs border-default" placeholder="Student ID" required/>
                
                <!-- submit Button -->
                <button name="add_lab_session" class="container btn">Add Lab Session</button>
                <!-- cancel Button -->
                <button name="add_lab_session" onclick="hide_div()" class="container btn">Cancel</button>
		  </form>
        </div>

	</div>

</body>

</html>