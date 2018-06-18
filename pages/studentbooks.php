<?php

session_start();

if(isset($_SESSION['usertype'])){
    $usertype=$_SESSION['usertype'];
    $userid=$_SESSION['userid'];
    if($usertype==2){
        $query="SELECT * FROM stud_book_borrow WHERE stdID=$userid";
    }else{
        $query="SELECT * FROM stud_book_borrow ORDER BY issuedDate ASC";
    }
}

 require_once('layout/header.php'); 

?>

		<!-- Sub Page -->
		<div class="container sub-page border-default">

			<div class="sub-page-box">
				<div class="container sub-page-title text-center border-default"> STUDENT BOOKS </div>
			</div>

			<div class="sub-page-box">
				<button name="add_new_book" class="sub-page-btn border-default" onclick="show_div()"> Add a New Book </button>
			</div>

			<div class="sub-page-box">
				<table class="container sub-page-table text-center">
					
					
                        <?php
                            require_once('../inc/config.php');
                            $userquery=mysqli_query($connection,$query);
                            if($usertype==2){
                                echo "
                                    <tr>
                                        <th>Book ID</th>
                                        <th>Book Name</th>
                                        <th>Issue Date</th>
                                        <th>Return Date</th>
                                    </tr>
                                ";

                                if(mysqli_num_rows($userquery)>0){
                                    while($row=mysqli_fetch_assoc($userquery)){
                                        // Get Book Info
                                        $bookid=$row['bookID'];
                                        $bookquery="SELECT * FROM book WHERE bookID=$bookid LIMIT 1";
                                        $bookinfo=mysqli_query($connection, $bookquery);
                                        // echo $bookquery;
                                        $book=mysqli_fetch_assoc($bookinfo);

                                            echo "<tr><td>".$row['bookID']."</td>";
                                            echo "<td>".$book['bookTitle']."</td>";
                                            echo "<td>".$row['issuedDate']."</td>";
                                            echo "<td>".$row['returnedDate']."</td>";
                                    }                            
                                }
                            }else{
                                echo "
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Book ID</th>
                                        <th>Book Name</th>
                                        <th>Issue Date</th>
                                        <th>Return Date</th>
                                    </tr>
                                ";

                                if(mysqli_num_rows($userquery)>0){
                                    while($row=mysqli_fetch_assoc($userquery)){
                                        // Get Book Info
                                        $bookid=$row['bookID'];
                                        $bookquery="SELECT * FROM book WHERE bookID=$bookid LIMIT 1";
                                        $bookinfo=mysqli_query($connection, $bookquery);
                                        // echo $bookquery;
                                        $book=mysqli_fetch_assoc($bookinfo);

                                            echo "<tr><td>".$row['stdID']."</td>";
                                            echo "<td>".$row['bookID']."</td>";
                                            echo "<td>".$book['bookTitle']."</td>";
                                            echo "<td>".$row['issuedDate']."</td>";
                                            echo "<td>".$row['returnedDate']."</td>";
                                    }                            
                                }
                            }
                        ?>
				</table>
			</div>
		</div>
        </div>

	</div>

</body>

</html>