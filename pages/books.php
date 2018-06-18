<?php

if (isset($_POST['addBook'])) {
	
	require_once('../inc/config.php');

	$bookID=$_POST['bookID'];
    $bookISBN=$_POST['bookISBN'];
    $bookYear=$_POST['bookYear'];
    $bookTitle=$_POST['bookTitle'];
    $bookPublisher=$_POST['bookPublisher'];
    $profID=$_POST['profID'];
    
    $query="INSERT INTO book VALUES('$bookID','$bookISBN','$bookYear','$bookTitle','$bookPublisher','$profID')";

    $userquery=mysqli_query($connection,$query);
    // echo "hello";
    if($userquery){
        echo "<script>alert('Book added successfully!')</script>";
        header("location: books.php");
    }else{
        echo "<script>alert('Try again')</script>";
    }
}

?>
<!DOCTYPE html>
<html>

<head>
	<title>Books Managing</title>
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/nav.css">
	<link rel="stylesheet" type="text/css" href="../css/subpage.css">
    <link rel="stylesheet" type="text/css" href="../css/addform.css">
    <script src="../js/add_form.js"></script>
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
				<div class="container sub-page-title text-center border-default"> BOOKS </div>
			</div>

			<div class="sub-page-box">
				<button name="add_new_book" class="sub-page-btn border-default" onclick="show_add_book()"> Add a New Book </button>
			</div>

			<div class="sub-page-box">
				<table class="container sub-page-table text-center">
					<tr>
                        <th>Book ID</th>
						<th>Book ISBN</th>
						<th>Book Year</th>
                        <th>Book Title</th>
						<th>Book Publisher</th>
						<th>Book Co-Authoring Proffessor ID</th>
					</tr>
					
                        <?php
                            require_once('../inc/config.php');
                            $query="SELECT * FROM book";
                        $userquery=mysqli_query($connection,$query);
                        if(mysqli_num_rows($userquery)>0){
                            while($row=mysqli_fetch_assoc($userquery)){
                                    echo "<tr><td>".$row['bookID']."</td>";
                                    echo "<td>".$row['bookISBN']."</td>";
                                    echo "<td>".$row['bookYear']."</td>";
                                    echo "<td>".$row['bookTitle']."</td>";
                                    echo "<td>".$row['bookPublisher']."</td>";
                                    echo "<td>".$row['profID']."</td></tr>";
                                }                            
                            }
                        ?>
					
				</table>
			</div>

		</div>

        <!-- Add Book Form -->
        <div id="add_book" style="display:none;" class="container sub-page border-default">
            <form action="books.php" autocomplete="on" method="POST">
                <!-- Input for Book ID -->
                <input type="text" name="bookID" class="container inputs border-default" placeholder="Book ID" required/>
                
                <!-- Input for Book ISBN -->
                <input type="text" name="bookISBN" class="container inputs border-default" placeholder="Book ISBN" required/>

                <!-- Input for Book Year -->
                <input type="text" name="bookYear" class="container inputs border-default" placeholder="Book Year" required/>

                <!-- Input for Book Title -->
                <input type="text" name="bookTitle" class="container inputs border-default" placeholder="Book Title" required/>

                <!-- Input for Book Publisher -->
                <input type="text" name="bookPublisher" class="container inputs border-default" placeholder="Book Publisher" required/>

                <!-- Input for Book Co-Author Proffessor ID -->
                <input type="text" name="profID" class="container inputs border-default" placeholder="Book Co-Author Proffessor ID" required/>

                <!-- Login Button -->
                <div class="btn-group">
                    <button name="cancelBook" class="btn left" onclick="hide_add_book()"> Cancel </button>
                    <button name="addBook" class="btn right"> Add Book </button>
                </div>
		  </form>
        </div>

	</div>

</body>

</html>