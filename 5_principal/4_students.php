<?php
	session_start();
	$pid=$_SESSION['s_pid'];
	$pname=$_SESSION['s_pname'];
	
	if(!isset($pid))
	{
		header('location:1_login.php');
	}		
?>

<!DOCTYPE html>
<html>
    <head>
   	    <meta charset="UTF-8">  
	    <meta name="viewport" content="width=device-width,initial-scale=1.0">  
        <link rel="stylesheet" href="css/home.css">
		<link rel="icon" href="img/iconlogo1.png" type="image/x-icon">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Tektur&display=swap" rel="stylesheet">	
        <title>Students's Page</title>
		
		<style>
			.box h1
			{
				position: relative;
				font-size: 50px;
				bottom: 70px;
			}
		</style>
    </head>
    <body>
		<header>
			<img src="img/homelogo.png">
			<nav class="navi">
				<a href="3_home.php" class="na"><b>HOME</b></a>
				<a href="4_students.php" class="na" style="color: gainsboro;"><b>STUDENTS</b></a>
				<a href="5_teachers.php" class="na"><b>TEACHERS</b></a>
				<a href="6_my_solution.php?page=1" class="na"><b>MY&nbsp SOLUTIONS</b></a>
				<a href="7_profile.php" class="na"><b>PROFILE</b></a>
				<a href="logout.php"><button class="log"><b>LOGOUT</b></button></a>
			</nav>			
		</header> 
		
		<?php
			include 'include/connect.php';
		
			$show1="SELECT * FROM principal_pending_s";
			$qry=mysqli_query($conn,$show1);
			$row1=mysqli_num_rows($qry);
			
			$show2="SELECT * FROM principal_sol";
			$qry=mysqli_query($conn,$show2);
			$row2=mysqli_num_rows($qry);
	
		?>
		
		<div class="admin">
			<h1 align="center"><b>STUDENT PAGE</b></h1>
		
		<div class="status">
			<a href="4-1_students_pending.php?page=1">
			<div class="box pending">
				<h2><b>PENDING</b></h2>
				<span class="icons"><ion-icon name="ellipsis-horizontal"></ion-icon></span>
				<h1 align="center"><?php echo $row1;?><h1>
			</div>
			</a>
			
			<a href="6_my_solution.php?page=1">
			<div class="box recieved">
				<h2><b>SOLUTIONS</b></h2>
				<span class="icons"><ion-icon name="checkmark-circle"></ion-icon></span>
				<h1 align="center"><?php echo $row2;?><h1>
			</div>
			</a>
			
		</div>
		</div>
		
	</body>
	
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>	