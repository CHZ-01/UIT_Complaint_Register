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
        <title>Student</title>
    </head>
    <body>
		<header>
			<img src="img/homelogo.png">
			<nav class="navi">
				<a href="e5home_a.php" class="na"><b>HOME</b></a>
				<a href="fa6_s.php" class="na" style="color: gainsboro;"><b>STUDENT</b></a>
				<a href="fa6_t.php" class="na"><b>TEACHER</b></a>
				<a href="fa6_p.php" class="na"><b>PRINCIPAL</b></a>
				<a href="f6display_a.php" class="na"><b>PROFILE</b></a>
				<a href="logout.php"><button class="log"><b>LOGOUT</b></button></a>
			</nav>			
		</header> 
		
		<?php 
			include 'include/connect.php';
		
			$get1="SELECT * FROM student";
			$qry=mysqli_query($conn,$get1);
			$row1=mysqli_num_rows($qry);
			
			$get2="SELECT * FROM student_dlt";
			$qry=mysqli_query($conn,$get2);
			$row2=mysqli_num_rows($qry);
			
		?>
		
		<div class="admin">
			<h1 align="center"><b>STUDENT&nbsp PAGE</b></h1>
		
		<div class="status">
			<a href="fa6_s_create.php">
			<div class="box pending">
				<h2><b>CREATE</b></h2>
				<span class="ic"><ion-icon name="person-add"></ion-icon></span>
			</div>
			</a>
			
			<a href="fa6_s_view.php?page=1">
			<div class="box recieved">
				<h2><b>VIEW (<?php echo $row1;?>)</b></h2>
				<span class="ic"><ion-icon name="eye"></ion-icon></span>	
			</div>
			</a>
			
			<a href="fa6_s_deleted.php?page=1">
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