<?php
	session_start();
	
	$pid=$_SESSION['s_pid'];
	
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
        <link rel="stylesheet" href="css/common.css">
		<link rel="stylesheet" href="css/profile.css">
		<link rel="icon" href="img/iconlogo1.png" type="image/x-icon">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Tektur&display=swap" rel="stylesheet">	
        <title>Profile page</title>
    </head>
    <body>
		<header>
			<img src="img/homelogo.png">
			<nav class="navi">
				<a href="3_home.php" class="na"><b>HOME</b></a>
				<a href="4_students.php" class="na"><b>STUDENTS</b></a>
				<a href="5_teachers.php" class="na"><b>TEACHERS</b></a>
				<a href="6_my_solution.php?page=1" class="na"><b>MY&nbsp SOLUTIONS</b></a>
				<a href="7_profile.php" class="na" style="color: gainsboro;"><b>PROFILE</b></a>
				<a href="logout.php"><button class="log"><b>LOGOUT</b></button></a>
			</nav>
		</header>
		
		<?php
		
			include 'include/connect.php';
			
			$profile="SELECT * FROM principal WHERE pid='$pid'";
			$query=mysqli_query($conn,$profile);
			
			$details=mysqli_fetch_assoc($query);
			$fname=$details['pname'];
			$lname=$details['lname'];
			$phno=$details['phno'];
			$gender=$details['gender'];
			
			$_SESSION['s_pfname']=$fname;
			$_SESSION['s_plname']=$lname;
			$_SESSION['s_pphno']=$phno;
			$_SESSION['s_pgender']=$gender;
			
		?>
		
		<!-- PROFILE PAGE -->
		<div class="profedit" style="height: 460px;">  
				
				<div class="head">
				<h2 style="font-size: 25px;">PROFILE</h2>
				</div>
				
				<div class="details">
					<span class="icon"><ion-icon name="person"></ion-icon></span>
					<p><b style="margin-left: 8.5px;">USER&nbsp NAME:</b></p>		
					<p><b class="display"><?php echo $fname;?>&nbsp <?php echo $lname;?></b></p>
					<hr>						
				</div>			
				
				<div class="details">
					<span class="icon"><ion-icon name="id-card"></ion-icon></span>
					<p><b style="margin-left: -10px;">PRINCIPAL&nbsp ID:</b></p>
					<p><b class="display"><?php echo $pid;?></b></p>
					<hr>
				</div>	
				
				<div class="details">
					<span class="icon"><ion-icon name="call"></ion-icon></span>
					<p><b style="margin-left: 20px;">PHONE&nbsp NO:</b></p>
					<p><b class="display"><?php echo $phno;?></b></p>
					<hr>
				</div>

				<div class="details">
					<span class="icon"><ion-icon name="male-female"></ion-icon></span>
					<p><b style="margin-left: 45px;">GENDER:</b></p>
					<p ><b class="display"><?php echo $gender;?></b></p>
					<hr>
				</div>	
				
				<div class="submit">
					<a href="7-1_profile_edit.php"><button class="btn2" name="submit"><b>EDIT</b></button></a>
				</div>
				
		</div>
		

		<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
		<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>	
	</body>
</html>	