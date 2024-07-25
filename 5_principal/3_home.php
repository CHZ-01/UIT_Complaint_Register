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
        <title>Home</title>
		
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
				<a href="3_home.php" class="na" style="color: gainsboro;"><b>HOME</b></a>
				<a href="4_students.php" class="na"><b>STUDENTS</b></a>
				<a href="5_teachers.php" class="na"><b>TEACHERS</b></a>
				<a href="6_my_solution.php?page=1" class="na"><b>MY&nbsp SOLUTIONS</b></a>
				<a href="7_profile.php" class="na"><b>PROFILE</b></a>
				<a href="logout.php"><button class="log"><b>LOGOUT</b></button></a>
			</nav>			
		</header> 
		
		<?php
			include 'include/connect.php';
		
			$show1="SELECT * FROM student";
			$qry=mysqli_query($conn,$show1);
			$row1=mysqli_num_rows($qry);
			
			$show2="SELECT * FROM teacher";
			$qry=mysqli_query($conn,$show2);
			$row2=mysqli_num_rows($qry);
		?>
		
		<div class="admin">
			<h1 align="center"><b>WELCOME&nbsp <?php echo $pname;?></b></h1>
		
		<div class="status">
			<a href="4_students.php">
			<div class="box pending">
				<h2><b>STUDENTS</b></h2>
				<span class="icons"><ion-icon name="accessibility"></ion-icon></span>
				<h1 align="center"><?php echo $row1;?><h1>
			</div>
			</a>
			
			<a href="5_teachers.php">
			<div class="box sent">
				<h2><b>TEACHERS</b></h2>
				<span class="icons"><ion-icon name="people"></ion-icon></span>
				<h1 align="center"><?php echo $row2;?><h1>
			</div>
			</a>
			
		</div>
		</div>
		
	</body>
	
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>	