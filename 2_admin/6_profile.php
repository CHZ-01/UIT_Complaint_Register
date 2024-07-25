<?php
	session_start();
	
	$adid=$_SESSION['s_adid'];
	
	if(!isset($adid))
	{
		header('location:c3login_a.php');
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
		
		<style>
			.details
			{
				padding-left: 20px;
				padding-top: 30px;
			}
			.details .icon
			{
				right: 39%;
			}
			.profedit
			{
				width: 440px;
				height: 460px;
			}
		</style>
    </head>
    <body>
		<header>
			<img src="img/homelogo.png">
			<nav class="navi">
				<a href="2_home.php" class="na"><b>HOME</b></a>
				<a href="3_student.php" class="na"><b>STUDENT</b></a>
				<a href="4_teacher.php" class="na"><b>TEACHER</b></a>
				<a href="5_principal.php" class="na"><b>PRINCIPAL</b></a>
				<a href="" class="na" style="color: gainsboro;"><b>PROFILE</b></a>
				<a href="logout.php"><button class="log"><b>LOGOUT</b></button></a>
			</nav>
		</header>
		
		<?php
		
			include 'include/connect.php';
			
			$profile="SELECT * FROM admin WHERE adid='$adid'";
			$query=mysqli_query($conn,$profile);
			
			$details=mysqli_fetch_assoc($query);
			$fname=$details['adname'];
			$lname=$details['lname'];
			$phno=$details['phno'];
			$gender=$details['gender'];
			
			$_SESSION['s_adfname']=$fname;
			$_SESSION['s_adlname']=$lname;
			$_SESSION['s_adphno']=$phno;
			$_SESSION['s_adgender']=$gender;
			
		?>
		
		<!-- PROFILE PAGE -->
		<div class="profedit">  
				
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
					<p><b style="margin-left: 25px;">ADMIN&nbsp ID:</b></p>
					<p><b class="display"><?php echo $adid;?></b></p>
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
					<a href="6-1_profile_edit.php"><button class="btn2" name="submit"><b>EDIT</b></button></a>
				</div>
				
		</div>
		

		<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
		<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>	
	</body>
</html>	