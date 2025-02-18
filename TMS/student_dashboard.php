<!DOCTYPE html>
<html>
<head>
	<title>Student Dashboard</title>
	<link rel="stylesheet" type="text/css" href="./css/foot.css" />
	<style>
		body{
			background-image:url(bck.png);
			background-size: cover;
			background-attachment: fixed;
		}
		#header{
			height: 10%;
			width: 100%;
			top: 2%;
			background-color: black;
			position: fixed;
			color: white;
		}
		#left_side{
			height: 75%;
			width: 15%;
			top: 13%;
			position: fixed;
		}
		#right_side{
			height: 70%;
			width: 80%;
			background-color: whitesmoke;
			position: fixed;
			left: 17%;
			top: 21%;
			color: red;
			border: solid 1px black;
		}
		#top_span{
			color:blue;
			top: 15%;
			width: 80%;
			left: 17%;
			position: fixed;
		}
		.select{
            width:65%;
            height:25px;
            margin-left:55px;
            margin-bottom:5px;
        }
	</style>
	<?php
		session_start();
		$con=mysqli_connect("localhost","root","","timetable");
		@session_start();
		if($_SESSION['name']==''){
			header("location:index.php");
		}
	?>
</head>
<body>
	<div id="header"><br>
		<center>Timetable Management System &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email: <?php echo $_SESSION['email'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name:<?php echo $_SESSION['name'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		<a href="logout.php?logout=true">Logout</a>
		</center>
	</div>
	<span id="top_span"><h3><marquee><strong>Welcome To The Timetable Management System</strong></marquee></h3></span>
	<div id="left_side">
		<br><br><br>
		<form action="" method="post">
		
			<table>
			<tr>
					<td>
						<input type="submit" class="select" name="show_detail" value="View Profile">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" class="select" name="edit_detail" value="Update Profile">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" class="select" name="view_table" value="View Timetable">
					</td>
				</tr>
			</table>
		</form>
	</div>
	<div id="right_side"><br><br>
		<div id="demo">
			<?php
				if(isset($_POST['view_table'])){
					header("location:view_table.php");		
				}
			?>
			<?php
			if(isset($_POST['show_detail']))
			{
				$con=mysqli_connect("localhost","root","","timetable");
				$query = "select * from student where email = '$_SESSION[email]'";
				$query_run = mysqli_query($con,$query);
				while ($row = mysqli_fetch_assoc($query_run)) 
				{
			?>
				<table>
					<tr>
						<td>
							<b>S_ID:</b>
						</td> 
						<td>
							<input type="text" value="<?php echo $row['s_id']?>" readonly>
						</td>
					</tr>
					<tr>
						<td>
							<b>Name:</b>
						</td> 
						<td>
							<input type="text" value="<?php echo $row['name']?>" readonly>
						</td>
					</tr>
					
					<tr>
						<td>
							<b>Course:</b>
						</td> 
						<td>
							<input type="text" value="<?php echo $row['course']?>" readonly>
						</td>
					</tr>
					<tr>
						<td>
							<b>Roll No:</b>
						</td> 
						<td>
							<input type="text" value="<?php echo $row['roll_no']?>" readonly>
						</td>
					</tr>
					<tr>
						<td>
							<b>Year:</b>
						</td> 
						<td>
							<input type="text" value="<?php echo $row['year']?>" readonly>
						</td>
					</tr>
					<tr>
						<td>
							<b>Email:</b>
						</td> 
						<td>
							<input type="text" value="<?php echo $row['email']?>" readonly>
						</td>
					</tr>
					<tr>
						<td>
							<b>Password:</b>
						</td> 
						<td>
							<input type="password" value="<?php echo $row['password']?>" readonly>
						</td>
				</tr>
				</table>
				<?php 
				}	
			}
			?>

			<?php
			if(isset($_POST['edit_detail']))
			{
				$query = "select * from student where email = '$_SESSION[email]'";
				$query_run = mysqli_query($con,$query);
				while ($row = mysqli_fetch_assoc($query_run)) 
				{
					?>
					<form action="edit_student.php" method="post">
						<table>
						<tr>
							<td>
								<b>Name:</b>
							</td> 
							<td>
								<input type="text" name="name" value="<?php echo $row['name']?>" readonly>
							</td>
						</tr>
						<tr>
						<td>
							<b>S_ID:</b>
						</td> 
						<td>
							<input type="text" name="s_id" value="<?php echo $row['s_id']?>" readonly>
						</td>
					</tr>
						<tr>
							<td>
								<b>Course:</b>
							</td> 
							<td>
								<input type="text" name="class" value="<?php echo $row['course']?>" readonly>
							</td>
						</tr>
						<tr>
							<td>
								<b>Year:</b>
							</td> 
							<td>
								<input type="text" name="mobile" value="<?php echo $row['year']?>" readonly>
							</td>
						</tr>
						<tr>
							<td>
								<b>Email:</b>
							</td> 
							<td>
								<input type="text" name="email" value="<?php echo $row['email']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Password:</b>
							</td> 
							<td>
								<input type="password" name="password" value="<?php echo $row['password']?>">
							</td>
						</tr>
						<br>
						<tr>
							<td></td>
							<td>
								<input type="submit" value="Save">
							</td>
						</tr>
					</table>
					</form>
					<?php
				}
			}
			?>
		</div>
	</div>
	<?php include "./components/footer.php" ?>
</body>
</html>