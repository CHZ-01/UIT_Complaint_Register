<?php
	session_start();
	error_reporting(E_ERROR | E_PARSE);
?>


<!DOCTYPE html>
<html>
    <head>
   	    <meta charset="UTF-8">  
	    <meta name="viewport" content="width=device-width,initial-scale=1.0">  
        <link rel="stylesheet" href="css/login.css">
		<link rel="stylesheet" href="css/alert.css">
		<link rel="icon" href="img/iconlogo1.png" type="image/x-icon">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Tektur&display=swap" rel="stylesheet">
		
        <title>Student's login</title>
    </head>
    <body>
	
		<header>
		<img src="img/homelogo.png">
		<nav class="navi">
			<a href="#" class="na"><b>HOME</b></a>
			<a href="#" class="na"><b>COMPLAIN</b></a>
			<a href="#" class="na"><b>MY&nbsp COMPLAINTS</b></a>
			<a href="#" class="na"><b>SOLUTION</b></a>
			<a href="#" class="na"><b>PROFILE</b></a>
			<a href="#"><button class="log"><b>EXIT</b></button></a>
		</nav>
		</header>   
		
		<?php

		$server="localhost";
		$user="root";
		$pass="";
		$database="testingphp";
		$conn=mysqli_connect($server,$user,$pass,$database);
		
		if(isset($_POST['submit']))
		{
		$sid=mysqli_real_escape_string($conn,$_POST['sid']);
		$pass=mysqli_real_escape_string($conn,$_POST['password']);

		$_SESSION['s_csid']=$sid;	
		
		$id_search="SELECT * FROM student WHERE sid='$sid'";	
		$query=mysqli_query($conn,$id_search);
		
		if($query)
		{
			$id_pass=mysqli_fetch_assoc($query);
			$user_pass=$id_pass['pass'];
			$_SESSION['s_sname']=$id_pass['sname'];
			$pass_check=password_verify($pass,$user_pass);
			
			if($pass_check)
			{
				$_SESSION['s_sid']=$sid;
				?>
				<div class="success">
					<span style="left:612px;"><ion-icon name="checkmark-done-circle"></ion-icon></span>
					<p>SUCCESS!&nbsp You&nbsp are&nbsp Logged&nbsp In</p>
				</div>				
				<script>
					function redirect()
					{
						location.replace("z_home.php");									
					}
					setTimeout('redirect()',1000);
				</script>
				<?php
			}
			else
			{
				?>
				<div class="error">
					<span style="left:550px;"><ion-icon name="alert-circle"></ion-icon></span>
					<p>WARNING!&nbsp Password&nbsp Provided&nbsp is&nbsp Incorrect</p>
				</div>
				<?php	

			}		
		}
		else
		{
			?>
			<div class="error">
				<span style="left:585px;"><ion-icon name="alert-circle"></ion-icon></span>
				<p>WARNING!&nbsp Enter&nbsp a&nbsp Valid&nbsp Account</p>
			</div>
			<?php
		}	
		}
		?>
		
		<div class="logpg" style="margin-top: 70px;">
	
		<!--LOGIN PAGE-->
		<div class="logfrm">
			<h2 style="font-size:25px;">LOGIN</h2>
			<form method="POST">
			
				<div class="inlog">
					<span class="icon"><ion-icon name="id-card"></ion-icon></span>
					<input type="phone" pattern="[0-9]{11}" maxlength="11" name="sid" required>
					<label><b>STUDENT&nbsp ID</b></label><br>  		
				</div>
				
				<div class="inlog">	   
					<span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
					<input type="password" minlength="8" maxlength="16" name="password"  required>
					<label><b>PASSWORD</b></label>  		
				</div>
				
				<div class="remfor">
					<label><input type="checkbox">
					<b style="font-size: 16px; margin-left: -5px;">REMEMBER ME</b></label>
					<a href="#"><b style="font-size: 16px;">FORGET PASSWORD?</b></a>
				</div>
				
				<button type="submit" class="btn" name="submit"><b>LOGIN</b></button>
				
				<div class="create">
					<p><b style="font-size:16px;">NO ACCOUNT?&nbsp </b>
					<a href="z_signup.php" class="signup" style="font-size:16px;">SIGN UP!</a></p>
				</div>
				
			</form>  
		</div> 
		</div>
		 
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
      	
    </body>
</html>