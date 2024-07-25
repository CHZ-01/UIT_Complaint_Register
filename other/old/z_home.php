<?php
	session_start();
	
	// if(!isset($_SESSION['s_sid']))
	// {
		// header('location:1_login.php');
	// }		
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
        <title>Home</title>
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
			<a href="zlogin.php"><button class="log"><b>LOGOUT</b></button></a>  
			</nav>			
		</header> 
		
		<div class="content">
			<h1>
				<b style="font-size:40px; text-transform:uppercase;">
					WELCOME&nbsp <?php echo $_SESSION['s_sname'];?>
				</b>
			</h1>
		</div>
		
	</body>
</html>	