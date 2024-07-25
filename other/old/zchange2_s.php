<?php
	session_start();
	
	if(!isset($_SESSION['s_sid']))
	{
		header('location:a1welcome.php');
	}	
?>

<!DOCTYPE html>
<html>
    <head>
   	    <meta charset="UTF-8">  
	    <meta name="viewport" content="width=device-width,initial-scale=1.0">  
        <link rel="stylesheet" href="css/zc2.css">
		<link rel="stylesheet" href="css/alert.css">
		<link rel="icon" href="img/iconlogo1.png" type="image/x-icon">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Tektur&display=swap" rel="stylesheet">	
        <title>Student's Signup</title>
    </head>
    <body>
		<header>
			<img src="img/homelogo.png">
			<nav class="navi">
			<a href="#" class="na"><b>HOME</b></a>
			<a href="#" class="na"><b>COMPLAINT</b></a>
			<a href="#" class="na"><b>MY&nbsp COMPLAINTS</b></a>
			<a href="#" class="na"><b>SOLUTION</b></a>
			<a href="#" class="na"><b>PROFILE</b></a>
			<a href="8_profile.php"><button class="log"><b>EXIT</b></button></a>  
			</nav>
		</header> 
				
		<!-- NEW SIGNUP PAGE -->
		<div class="profedit">  
				
				<div class="head">
				<h2 style="font-size: 25px;">SIGN&nbsp UP</h2>
				</div>
			
			<form action="include/ps_insert" method="POST">	
			<div class="data">	
				<div class="details">
					<span class="icon"><ion-icon name="person"></ion-icon></span>
					<input type="text" maxlength="15" name="fname" required>
					<label><b>USER&nbsp NAME</b></label>  		
				</div>
				
				<div class="details">
					<span class="icon"><ion-icon name="id-card"></ion-icon></span>
					<input type="phone" pattern="[0-9]{11}" maxlength="11" name="sid" required>
					<label><b>STUDENT&nbsp ID</b></label>  		
				</div>
				
				<div class="details">	   
					<span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
					<input type="password" minlength="8" maxlength="16" id="pass1" name="pass" required>
					<label><b>PASSWORD</b></label>  		
				</div>
				
				<div class="details">	   
					<span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
					<input type="password" minlength="8" maxlength="16" id="pass2" name="cpass" required>
					<label><b>CONFIRM&nbsp PASSWORD</b></label> 
					<span id="message" style="display:flex;margin-top: 7px;margin-left: 15px;color: #ff8484;"></span>
				</div>	
				
				<div class="gender">
					<label><b>GENDER:</b></label>
						<label class="gen">
							<input type="radio" name="gender" value="m" required>
							<b>MALE</b>
						</label>
						<label class="gen">
							<input type="radio" name="gender" value="f" required>
							<b>FEMALE</b>
						</label>
				</div>
				
				<div class="dob">
					<label><b>DOB:</b></label>
					<input type="date" name="dob" required>	
				</div>
				
				<div class="course">	   
				<label><b>DEPARTMENT:</b></label>
					<select class="crs" name="dep" required>
						<option selected hidden value=""></option>
						<option value="BCA"><b>BCA</b></option>
						<option value="BCOM"><b>BCOM</b></option>
					</select>
				</div>
				
				<div class="submit">
					<button class="btn" name="submit"><b>SIGNUP</b></button>
				</div>
				
				<div class="create">
					<p><b style="font-size:16px;">ALREADY A USER?&nbsp </b>
					<a href="1_login.php" class="login" style="font-size:16px;">LOG IN</a></p>
				</div>
			</div>	
			</form>
		</div>

		<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
		<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>	
	</body>
</html>	