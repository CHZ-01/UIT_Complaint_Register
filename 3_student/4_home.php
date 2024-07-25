<?php
	session_start();
	
	$sid=$_SESSION['s_sid'];
	$sname=$_SESSION['s_sname'];
	
	if(!isset($sid))
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
    </head>
    <body>
		<header>
			<img src="img/homelogo.png">
			<nav class="navi">
			<a href="" class="na" style="color: gainsboro;"><b>HOME</b></a>
			<a href="5_complain.php" class="na"><b>COMPLAIN</b></a>
			<a href="6_my_complaints.php?page=1" class="na"><b>MY&nbsp COMPLAINTS</b></a>
			<a href="7_solutions.php?page=1" class="na"><b>SOLUTION</b></a>
			<a href="8_profile.php" class="na"><b>PROFILE</b></a>
			<a href="logout.php"><button class="log"><b>LOGOUT</b></button></a>  
			</nav>	

			<style>				
				.box h1
				{
					position: relative;
					font-size: 50px;
					bottom: 70px;
				}
			</style>	
		</header> 
		
		<?php
			include 'include/connect.php';
		
			$show1="SELECT * FROM student_complaint WHERE sid='$sid'";
			$qry=mysqli_query($conn,$show1);
			$row1=mysqli_num_rows($qry);
			
			$show2="SELECT * FROM admin_recieved WHERE sid='$sid'";
			$qry=mysqli_query($conn,$show2);
			$row2=mysqli_num_rows($qry);
		?>
		
		<div class="admin">
			<h1 align="center"><b>WELCOME&nbsp <?php echo $sname;?></b></h1>
		
		<div class="status">
			<a href="6_my_complaints.php?page=1">
			<div class="box mycmp">
				<h2><b>COMPLAINTS</b></h2>
				<span class="icons"><ion-icon name="accessibility"></ion-icon></span>
				<h1 align="center"><?php echo $row1;?><h1>
			</div>
			</a>
			
			<a href="7_solutions.php?page=1">
			<div class="box sol">
				<h2><b>SOLUTIONS</b></h2>
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