<?php
	session_start();
	
	$adname=$_SESSION['s_adname'];
	
	if(!isset($_SESSION['s_sid']))
	{
		header('location:1_login.php');
	}		
?>

<!DOCTYPE html>
<html>
    <head>
   	    <meta charset="UTF-8">  
	    <meta name="viewport" content="width=device-width,initial-scale=1.0">  
        <link rel="stylesheet" href="css/home.css">
        <link rel="stylesheet" href="css/z_nav.css">
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
			<ul>
				<li><a href="#" class="na" style="color: gainsboro;"><b>HOME</b></a></li>
				<li><a href="#" class="na"><b onclick="open">STUDENT<ion-icon name="chevron-down-outline"></ion-icon></b></a>	
					<ul class="dropdown">
						<li><a href="">REGISTER <span class="icon"><ion-icon name="person-add"></ion-icon></span></a></li>
						<li><a href="">UPDATE <span class="icon"><ion-icon name="construct"></ion-icon></span></a></li>
						<li><a href="">VIEW <span class="icon"><ion-icon name="eye"></ion-icon></span></a></li>
					</ul>
				</li>	
				
				<li><a href="#" class="na"><b>TEACHER<ion-icon name="chevron-down-outline"></b></a></li>
				
				<li><a href="#" class="na"><b>PRINCIPAL<ion-icon name="chevron-down-outline"></b></a></li>
					
				<li><a href="#" class="na"><b>PROFILE</b></a></li>
				<li><a href="b2next.php"><button class="log"><b>EXIT</b></button></a></li>
			</ul>
		</nav>			
		</header> 
		
		<div class="admin">
			<h1><b>WELCOME&nbsp <?php echo $adname;?></b></h1>
		
		<div class="status">
			<a href="">
			<div class="box pending">
				<h2><b>PENDING</b></h2>
				<span class="icons"><ion-icon name="ellipsis-horizontal"></ion-icon></span>
				<h1><?php ?><h1>
			</div>
			</a>
			
			<a href="">
			<div class="box sent">
				<h2><b>SENT</b></h2>
				<span class="icons"><ion-icon name="send"></ion-icon></span>
				<h1><?php ?><h1>
			</div>
			</a>
			
			<a href="">
			<div class="box recieved">
				<h2><b>RECIEVED</b></h2>
				<span class="icons"><ion-icon name="download"></ion-icon></span>
				<h1><?php ?><h1>
			</div>
			</a>
			
		</div>
		</div>	
		
	</body>
	
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>	