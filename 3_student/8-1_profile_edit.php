<?php
	session_start();
	
	$sid=$_SESSION['s_sid'];
	$s_fname=$_SESSION['s_sfname'];
	$s_lname=$_SESSION['s_slname'];
	$s_phno=$_SESSION['s_sphno'];	
	
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
        <link rel="stylesheet" href="css/create.css">
		<link rel="stylesheet" href="css/alert.css">
		<link rel="icon" href="img/iconlogo1.png" type="image/x-icon">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Tektur&display=swap" rel="stylesheet">	
        <title>Profile Edit</title>
		
		<style>
			.details
			{
				margin-top: 30px;
			}
		</style>
    </head>
    <body>
		<header>
			<img src="img/homelogo.png">
			<nav class="navi">
			<a href="4_home.php" class="na"><b>HOME</b></a>
			<a href="5_complain.php" class="na"><b>COMPLAIN</b></a>
			<a href="6_my_complaints.php?page=1" class="na"><b>MY&nbsp COMPLAINTS</b></a>
			<a href="7_solutions.php?page=1" class="na"><b>SOLUTION</b></a>
			<a href="" class="na" style="color: gainsboro;"><b>PROFILE</b></a>
			<a href="8_profile.php"><button class="log"><b>EXIT</b></button></a>  
			</nav>
		</header> 
		
		<?php
		
			include 'include/connect.php';
			
			if(isset($_POST['submit']))
			{	
				$fname=mysqli_real_escape_string($conn,$_POST['fname']);
				$lname=mysqli_real_escape_string($conn,$_POST['lname']);
				$phno=mysqli_real_escape_string($conn,$_POST['phno']);
				
				$change="UPDATE student SET sname='$fname',lname='$lname',phno='$phno' WHERE sid='$sid'";
				$query=mysqli_query($conn,$change);
				
				if($change)
				{
					?>
						<div class="success">
							<p><span><ion-icon name="checkmark-done-circle"></ion-icon></span>
								SUCCESS!&nbsp Your&nbsp Data&nbsp has&nbsp been&nbsp Updated</p>
						</div>				
						<script>
							function redirect()
							{
								location.replace("8_profile.php");							
							}
							setTimeout('redirect()',1000);
						</script>
					<?php
				}
				else
				{
					?>
						<div class="error">
							<p><span><ion-icon name="alert-circle"></ion-icon></span>
								WARNING!&nbsp Updation&nbsp Unsuccessful</p>
						</div>
					<?php
				}	
			}
		?>
				
		<!-- PROFILE EDIT PAGE -->
		<div class="profedit profst">  
				
				<div class="head" style="margin-top: 20px;">
				<h2 style="font-size: 25px;">PROFILE&nbsp EDIT</h2>
				</div>
			
			<form method="POST">	
			<div class="data">	
				<div class="details" style="margin-top: 50px;">
					<span class="icon"><ion-icon name="person"></ion-icon></span>
					<input type="text" maxlength="15" name="fname" 
					 value="<?php echo $s_fname;?>" required>
					<label><b>FIRST&nbsp NAME</b></label>  		
				</div>
				
				<div class="details">
					<span class="icon"><ion-icon name="people"></ion-icon></span>
					<input type="text" maxlength="15" name="lname" 
					 value="<?php echo $s_lname;?>"required>
					<label><b>LAST&nbsp NAME</b></label>  		
				</div>
				
				<div class="details">
					<span class="icon"><ion-icon name="call"></ion-icon></span>
					<input type="phone" pattern="[0-9]{10}" maxlength="10" name="phno" 
					 value="<?php echo $s_phno;?>"required>
					<label><b>PHONE&nbsp NO</b></label>  		
				</div>
				
				<div class="cp cpst">
					<a href="8-1-1_password_change.php" style="text-decoration:none;">
						<p><span class="icon2"><ion-icon name="key"></ion-icon></span>
						<b>&nbsp CHANGE&nbsp PASSWORD</b>
						</p>
					</a>
				</div>
				
				<div class="submit">
					<button class="btn btnst" name="submit"><b>SUBMIT</b></button>
				</div>
			</div>	
			</form>
		</div>

		<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
		<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>	
	</body>
</html>	