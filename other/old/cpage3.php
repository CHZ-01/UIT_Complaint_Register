<?php

?>


<!DOCTYPE html>
<html>
    <head>
   	    <meta charset="UTF-8">  
	    <meta name="viewport" content="width=device-width,initial-scale=1">  
        <link rel="stylesheet" href="cpage3.css">
		<link rel="icon" href="img/iconlogo1.png" type="image/x-icon">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Tektur&display=swap" rel="stylesheet">		
        <title>Student's Page</title>
    </head>
    <body>
		
		<!-- NAVIGATION PAGE -->
		<header>
			<img src="homelogo.png">
			<nav class="navi">
				<a href="#" class="na"><b>HOME</b></a>
				<a href="#" class="na"><b>COMPLAIN</b></a>
				<a href="#" class="na"><b>SOLUTION</b></a>
				<a href="#" class="na"><b>PROFILE</b></a>
				<a href="C:\PRGM\html\project\bpage2.html"><button class="log"><b>GO BACK</b></button></a>
			</nav>
		</header>   
    
		<div class="logpg" style="margin-top: 110px;">
	
		<!--LOGIN PAGE-->
		<div class="logfrm">
			<h2 style="font-size:25px;">LOGIN</h2>
			<form action="#" method="POST">
			
				<div class="inlog">
					<span class="icon"><ion-icon name="id-card"></ion-icon></span>
					<input type="phone" pattern="[0-9]{11}" name="sid" required>
					<label><b>STUDENT ID</b></label><br>  		
				</div>
				
				<div class="inlog">	   
					<span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
					<input type="password" minlength="8" maxlength="16" name="pass" required>
					<label><b>PASSWORD</b></label>  		
				</div>
				
				<div class="remfor">
					<label><input type="checkbox">
					<b style="font-size: 16px;">REMEMBER ME</b></label>
					<a href="#"><b style="font-size: 16px;">FORGET PASSWORD?</b></a>  		
				</div>
				
				<button type="submit" class="btn" name="submit"><b>LOGIN</b></button>
				
				<div class="create">
					<p><b style="font-size:16px;">NO ACCOUNT? </b>
					<a href="#" class="signup" style="font-size:16px;">SIGN UP!</a></p>
				</div>
		
			</form>  
		</div> 
		
		<!--REGISTRATION PAGE-->
		<div class="logreg">
			<h2 style="font-size:25px;">SIGN UP</h2>
			<form onsubmit="return passcheck()" method="POST">
		
				<div class="inlog">
					<span class="icon"><ion-icon name="person-circle"></ion-icon></span>
					<input type="text" maxlength="15" name="name" required>
					<label><b>USER NAME</b></label><br>  		
				</div>
				
				<div class="inlog">
					<span class="icon"><ion-icon name="id-card"></ion-icon></span>
					<input type="phone" pattern="[0-9]{11}" name="sid" required>
					<label><b>STUDENT ID</b></label><br>  		
				</div>
				
				<div class="inlog">	   
					<span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
					<input type="password" minlength="8" maxlength="16" id="pass1" name="pass" required>
					<label><b>PASSWORD</b></label>  		
				</div>
				
				<div class="inlog">	   
					<span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
					<input type="password" minlength="8" maxlength="16" id="pass2" name="cpass" required>
					<label><b>CONFIRM PASSWORD</b></label> 
					<span id="message" style="display:flex;margin-top: 7px;margin-left: 15px;color: #ff8484;"></span>	
				</div>
				
				<button type="submit" class="btn" name="submit"><b>SIGNUP</b></button>
				
				<div class="create">
					<p>
					<b style="font-size:16px;">ALREADY A USER?  </b>
					<a href="#" class="login" style="font-size:16px;">LOG IN</a>
					</p>
				</div>
		
			</form>  	 
		</div>
		</div>
	
	<script src="cpage3.js"></script>  
	
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
      	
    </body>
</html>