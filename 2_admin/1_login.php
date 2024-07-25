<?php
session_start();
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
		
        <title>Admin's login</title>
    </head>
    <body>
	
		<header>
		<img src="img/homelogo.png">
		<nav class="navi">
			<a href="" class="na"><b>HOME</b></a>
			<a href="" class="na"><b>STUDENT</b></a>
			<a href="" class="na"><b>TEACHER</b></a>
			<a href="" class="na"><b>PRINCIPAL</b></a>
			<a href="" class="na"><b>PROFILE</b></a>
			<a href="../1_home/3_admin_principal.php"><button class="log"><b>EXIT</b></button></a>
		</nav>
		</header>   
		
		<?php

		include 'include/connect.php';
		
		if(isset($_POST['submit']))
		{
		$adid=mysqli_real_escape_string($conn,$_POST['adid']);
		$pass=mysqli_real_escape_string($conn,$_POST['password']);
		
		$id_search="SELECT * FROM admin WHERE adid='$adid'";	
		$query=mysqli_query($conn,$id_search);
		$id_count=mysqli_num_rows($query);
		
		if($id_count)
		{
			$id_pass=mysqli_fetch_assoc($query);
			$user_pass=$id_pass['pass'];
			$_SESSION['s_adname']=$id_pass['adname'];
			
			$verify=password_verify($pass,$user_pass);
			
			if($verify)
			{
				$_SESSION['s_adid']=$adid;
				?>
				<div class="success">
					<p><span><ion-icon name="checkmark-done-circle"></ion-icon></span>
						SUCCESS!&nbsp You&nbsp are&nbsp Logged&nbsp In</p>
				</div>				
				<script>
					function redirect()
					{
						location.replace("2_home.php");									
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
						WARNING!&nbsp Password&nbsp Provided&nbsp is&nbsp Incorrect</p>
				</div>
				<?php	

			}		
		}
		else
		{
			?>
			<div class="error">
				<p><span><ion-icon name="alert-circle"></ion-icon></span>
					WARNING!&nbsp Enter&nbsp a&nbsp Valid&nbsp Account</p>
			</div>
			<?php
		}	
		}
		?>
		
		<div class="logpg" style="margin-top: 70px;">
	
		<!--LOGIN PAGE-->
		<div class="logfrm">
			<h2 class="h2a">LOGIN</h2>
			<form method="POST">
			
				<div class="inlog">
					<span class="icon"><ion-icon name="id-card"></ion-icon></span>
					<input type="phone" pattern="[0-9]{11}" maxlength="11" name="adid" required>
					<label><b>ADMIN&nbsp ID</b></label><br>  		
				</div>
				
				<div class="inlog">	   
					<span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
					<input type="password" minlength="8" maxlength="16" name="password"  required>
					<label><b>PASSWORD</b></label>  		
				</div>
				
				<button type="submit" class="btn bta" name="submit"><b>LOGIN</b></button>
				
			</form>  
		</div> 
		</div>
		 
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
      	
    </body>
</html>