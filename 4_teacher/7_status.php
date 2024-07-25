<?php
	session_start();
	
	$tid=$_SESSION['s_tid'];
	$tname=$_SESSION['s_tname'];
	
	if(!isset($tid))
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
        <title>Status</title>
		
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
				<a href="4_home.php" class="na"><b>HOME</b></a>
				<a href="5_complaints.php?page=1" class="na"><b>COMPLAINTS</b></a>
				<a href="6_my_solutions.php?page=1" class="na"><b>MY&nbsp SOLUTIONS</b></a>
				<a href="" class="na" style="color: gainsboro;"><b>STATUS</b></a>
				<a href="8_profile.php" class="na"><b>PROFILE</b></a>
				<a href="logout.php"><button class="log"><b>LOGOUT</b></button></a>  
			</nav>
		</header>

		<?php
			include 'include/connect.php';
		
			$show1="SELECT * FROM principal_approved WHERE tid='$tid'";
			$qry=mysqli_query($conn,$show1);
			$row1=mysqli_num_rows($qry);
			
			$show2="SELECT * FROM principal_rejected WHERE tid='$tid'";
			$qry=mysqli_query($conn,$show2);
			$row2=mysqli_num_rows($qry);
		?>
		
		<div class="admin">
			<h1><b style="left: 31%;">STATUS&nbsp PAGE</b></h1>
		
		<div class="status">
			<a href="7-1_approved.php?page=1">
			<div class="box cmp">
				<h2><b>APPROVED</b></h2>
				<span class="icons"><ion-icon name="thumbs-up"></ion-icon></span>
				<h1 align="center"><?php echo $row1;?><h1>
			</div>
			</a>
			
			<a href="7-2_rejected.php?page=1">
			<div class="box mysol">
				<h2><b>REJECTED</b></h2>
				<span class="icons"><ion-icon name="thumbs-down"></ion-icon></span>
				<h1 align="center"><?php echo $row2;?><h1>
			</div>
			</a>
			
		</div>
		</div>
		
	</body>
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>	