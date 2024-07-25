<?php
	session_start();
	
	$tid=$_SESSION['s_tid'];
	
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
				<a href="4_home.php" class="na"><b>HOME</b></a>
				<a href="5_complaints.php?page=1" class="na"><b>COMPLAINTS</b></a>
				<a href="6_my_solutions.php?page=1" class="na"><b>MY&nbsp SOLUTIONS</b></a>
				<a href="7_status.php" class="na"><b>STATUS</b></a>
				<a href="" class="na" style="color: gainsboro;"><b>PROFILE</b></a>
				<a href="logout.php"><button class="log"><b>LOGOUT</b></button></a>  
			</nav>
		</header>
		
		<?php
		
			include 'include/connect.php';
			
			$profile="SELECT * FROM teacher WHERE tid='$tid'";
			$query=mysqli_query($conn,$profile);
			
			$details=mysqli_fetch_assoc($query);
			$fname=$details['tname'];
			$lname=$details['lname'];
			$phno=$details['phno'];
			$gender=$details['gender'];
			$course=$details['course'];
			
			$_SESSION['s_tfname']=$fname;
			$_SESSION['s_tlname']=$lname;
			$_SESSION['s_tphno']=$phno;
			$_SESSION['s_tgender']=$gender;
			$_SESSION['s_tcourse']=$course;			
			
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
					<p><b style="margin-left: 6px;">TEACHER&nbsp ID:</b></p>
					<p><b class="display"><?php echo $tid;?></b></p>
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
					<p><b class="display"><?php echo $gender;?></b></p>
					<hr>
				</div>	
			
				<div class="details">
					<span class="icon"><ion-icon name="school"></ion-icon></span>
					<p><b style="margin-left: 45px;">COURSE:</b></p>
					<p><b class="display"><?php echo $course;?></b></p>
					<hr>
				</div>	
				
				<div class="submit">
					<a href="8-1_profile_edit.php"><button class="btn2" name="submit"><b>EDIT</b></button>
				</div>
				
		</div>
		

		<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
		<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>	
	</body>
</html>	