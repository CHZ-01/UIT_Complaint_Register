<?php
	session_start();
	
	$adid=$_SESSION['s_adid'];
	
	if(!isset($adid))
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
				<a href="3_student.php" class="na"><b>STUDENT</b></a>
				<a href="4_teacher.php" class="na"><b>TEACHER</b></a>
				<a href="5_principal.php" class="na"><b>PRINCIPAL</b></a>
				<a href="6_profile.php" class="na"><b>PROFILE</b></a>
				<a href="logout.php"><button class="log"><b>LOGOUT</b></button></a>
			</nav>			
		</header> 
		
		<?php
			include 'include/connect.php';
			
			$read="SELECT * FROM admin";
			$qry=mysqli_query($conn,$read);
			$details=mysqli_fetch_assoc($qry);
			$adname=$details['adname'];
		
			$read="SELECT * FROM admin_pending";
			$qry=mysqli_query($conn,$read);
			$rows1=mysqli_num_rows($qry);
			
			$read="SELECT * FROM admin_send";
			$qry=mysqli_query($conn,$read);
			$rows2=mysqli_num_rows($qry);
			
			$read="SELECT * FROM admin_recieved";
			$qry=mysqli_query($conn,$read);
			$rows3=mysqli_num_rows($qry);
		?>
		
		<div class="admin">
			<h1 align="center"><b>WELCOME&nbsp <?php echo $adname;?></b></h1>
		
		<div class="status">
			<a href="2-1_pending.php?page=1">
			<div class="box pending">
				<h2><b>PENDING</b></h2>
				<span class="icons"><ion-icon name="ellipsis-horizontal"></ion-icon></span>
				<h1 class="hd" align="center"><?php echo $rows1;?></h1>
			</div>
			</a>
			
			<a href="2-2_sent.php?page=1">
			<div class="box sent">
				<h2><b>SENT</b></h2>
				<span class="icons"><ion-icon name="paper-plane"></ion-icon></span>
				<h1 class="hd" align="center"><?php echo $rows2;?></h1>
			</div>
			</a>
			
			<a href="2-3_received.php?page=1">
			<div class="box recieved">
				<h2><b>RECIEVED</b></h2>
				<span class="icons"><ion-icon name="download"></ion-icon></span>
				<h1 class="hd" align="center"><?php echo $rows3;?></h1>
			</div>
			</a>
			
		</div>
		</div>
		
	</body>
	
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>	