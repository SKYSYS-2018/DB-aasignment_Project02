<?php 

session_start();
if(!isset($_SESSION['usertype'])){
	header("location: ./login.php");
}elseif($_SESSION['usertype']!=1){
	header("location: ../index.php");
}

require_once('layout/header.php'); 
?>

		<!-- Sub Page -->
		<div class="container sub-page border-default">

			<div class="sub-page-box">
				<div class="container sub-page-title text-center border-default"> COURSES </div>
			</div>
			<?php
				if($_SESSION['usertype']==1){
					echo "
					<div class='sub-page-box'>
						<button class='sub-page-btn border-default'> Add a New Course </button>
					</div>";
				}
			?>

			<div class="sub-page-box">
				<table class="container sub-page-table text-center">
					<tr>
						<th>Course ID</th>
						<th>Department</th>
						<th>Course Name</th>
						<th>Course Credit</th>
						<th>Course Hours</th>
						<?php
							if($_SESSION['usertype']==1){
								echo "
								<th>Action</th>";
							}
						?>
						
					</tr>
					<tr>
						<td>data 1</td>
						<td>data 2</td>
						<td>data 3</td>
						<td>data 4</td>
						<td>data 4</td>
						<?php
							if($_SESSION['usertype']==1){
								echo "
								<td>
									<button class='table-btn'>EDIT</button>
									<button class='table-btn'>DELETE</button>
								</td>";
							}
						?>
						
					</tr>
				</table>
			</div>

		</div>

	</div>

</body>

</html>