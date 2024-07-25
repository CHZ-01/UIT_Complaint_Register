<?php
	session_start();
	
	$adname=$_SESSION['s_adname'];
	
	if(!isset($_SESSION['s_adid']))
	{
		header('location:c3login_a.php');
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
        <title>Teacher</title>
    </head>
    <body>
		<header>
			<img src="img/homelogo.png">
			<nav class="navi">
				<a href="2_home.php" class="na"><b>HOME</b></a>
				<a href="3_student.php" class="na"><b>STUDENT</b></a>
				<a href="" class="na" style="color: gainsboro;"><b>TEACHER</b></a>
				<a href="5_principal.php" class="na"><b>PRINCIPAL</b></a>
				<a href="6_profile.php" class="na"><b>PROFILE</b></a>
				<a href="logout.php"><button class="log"><b>LOGOUT</b></button></a>
			</nav>			
		</header> 
		
		<?php 
			include 'include/connect.php';
		
			$get1="SELECT * FROM teacher";
			$qry=mysqli_query($conn,$get1);
			$row1=mysqli_num_rows($qry);
			
			$get2="SELECT * FROM teacher_dlt";
			$qry=mysqli_query($conn,$get2);
			$row2=mysqli_num_rows($qry);
			
		?>
		
		<div class="admin">
			<h1 align="center"><b>TEACHER&nbsp PAGE</b></h1>
		
		<div class="status">
			<a href="4-1_teacher_create.php">
			<div class="box pending">
				<h2><b>CREATE</b></h2>
				<span class="ic"><ion-icon name="person-add"></ion-icon></span>
			</div>
			</a>
			
			<a href="4-2_teacher_view.php?page=1">
			<div class="box recieved">
				<h2><b>VIEW (<?php echo $row1;?>)</b></h2>
				<span class="ic"><ion-icon name="eye"></ion-icon></span>
				
			</div>
			</a>
			
			<a href="4-3_teacher_deleted.php?page=1">
			<div class="box sent">
				<h2><b>DELETED (<?php echo $row2;?>)</b></h2>
				<span class="ic"><ion-icon name="trash"></ion-icon></span>
			</div>
			</a>
		</div>
		</div>
		
	</body>
	
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>	