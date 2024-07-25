<?php
	session_start();
	
	$tname=$_SESSION['s_tname'];
	
	if(!isset($_SESSION['s_tid']))
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
			<a href="" class="na" style="color: gainsboro;"><b>HOME</b></a>
			<a href="5_complaints.php?page=1" class="na"><b>COMPLAINTS</b></a>
			<a href="6_my_solutions.php?page=1" class="na"><b>MY&nbsp SOLUTIONS</b></a>
			<a href="7_status.php" class="na"><b>STATUS</b></a>
			<a href="8_profile.php" class="na"><b>PROFILE</b></a>
			<a href="logout.php"><button class="log"><b>LOGOUT</b></button></a>  
			</nav>
		</header>

		<?php
			include 'include/connect.php';
		
			$show="SELECT * FROM teacher";
			$qry=mysqli_query($conn,$show);
			$display=mysqli_fetch_assoc($qry);
			$crs=$display['course'];
		
			$show1="SELECT * FROM admin_send WHERE send='$crs'";
			$qry=mysqli_query($conn,$show1);
			$row1=mysqli_num_rows($qry);
			
			$show2="SELECT * FROM teacher_sol";
			$qry=mysqli_query($conn,$show2);
			$row2=mysqli_num_rows($qry);
			
			$show3="SELECT * FROM principal_approved";
			$qry=mysqli_query($conn,$show3);
			$row3=mysqli_num_rows($qry);
			
			$show4="SELECT * FROM principal_rejected";
			$qry=mysqli_query($conn,$show4);
			$row4=mysqli_num_rows($qry);
			
			$row5=$row3+$row4;
		?>
		
		<div class="admin">
			<h1 align="center"><b>WELCOME&nbsp <?php echo $tname;?></b></h1>
		
		<div class="status">
			<a href="5_complaints.php?page=1">
			<div class="box cmp">
				<h2><b>COMPLAINTS</b></h2>
				<span class="icons"><ion-icon name="chatbubble-ellipses"></ion-icon></span>
				<h1 align="center"><?php echo $row1;?><h1>
			</div>
			</a>
			
			<a href="6_my_solutions.php?page=1">
			<div class="box mysol">
				<h2><b>SOLUTIONS</b></h2>
				<span class="icons"><ion-icon name="document-text"></ion-icon></span>
				<h1 align="center"><?php echo $row2;?><h1>
			</div>
			</a>
			
			<a href="7_status.php">
			<div class="box mysol">
				<h2><b>STATUS</b></h2>
				<span class="icons"><ion-icon name="thumbs-up"></ion-icon>&nbsp <ion-icon name="thumbs-down"></ion-icon></span>
				<h1 align="center"><?php echo $row5;?><h1>
			</div>
			</a>
			
		</div>
		</div>
		
	</body>
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>	