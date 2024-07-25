<?php
	session_start();
	
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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
			<a href="4_home.php" class="na"><b>HOME</b></a>
			<a href="5_complain.php" class="na"><b>COMPLAIN</b></a>
			<a href="6_my_complaints.php?page=1" class="na"><b>MY&nbsp COMPLAINTS</b></a>
			<a href="7_solutions.php?page=1" class="na"><b>SOLUTION</b></a>
			<a href="8_profile.php" class="na"><b>PROFILE</b></a>
			<a href="logout.php"><button class="log"><b>LOGOUT</b></button></a>  
			</nav>			
		</header> 
		
	<div class="container">	
	<div class="">
		<div class="guide welcome active">
			<h1><b>WELCOME&nbsp <?php echo $_SESSION['s_sname'];?></b></h1>
			<p>
				WELCOME TO THE<br>
			</p>
			<p>
				<b>STUDENT HOME PAGE</b>
			</p>
			<p>
				HERE WE WILL PROVIDE YOU<br>
			</p>
			<p>
				INFORMATIONS ON HOW<br>
			</p>
			<p>
				OUR WEBSITE WORKS<br>
			</p>
			<p>
				CLICK ON THE NEXT BUTTON<br>
			</p>
			<p>
				TO SEE MORE DETAILS
			</p>	
		</div>
		
		<div class="guide">
			<h2><b>HOW TO REGISTER</b></h2>
			<h3><b>YOUR COMPLAINT?</b></h3>	
				<br>
				<p>
					<span><ion-icon name="arrow-forward"></ion-icon></span>
					 GO TO <a href="5_complain.php">COMPLAIN PAGE.</a><br>
				</p>
				<br>
				<p>
					<span><ion-icon name="arrow-forward"></ion-icon></span>
					 WRITE YOUR SUBJECT<br> &nbsp &nbsp&nbsp ON SUBJECT BOX.<br>
				</p>
				<br>
				<p>
					<span><ion-icon name="arrow-forward"></ion-icon></span>
					 THEN YOUR COMPLAINT<br> &nbsp &nbsp&nbsp ON COMPLAIN BOX.<br>
				</p>
				<br>
				<p>
					<span><ion-icon name="arrow-forward"></ion-icon></span>
					 THEN CLICK ON SUBMIT<br> &nbsp &nbsp&nbsp BUTTON.<br>
				</p>
				<br>
				<p>
					<span><ion-icon name="arrow-forward"></ion-icon></span>
					 NOW YOUR COMPLAINT<br> &nbsp &nbsp&nbsp HAS BEEN SUBMITTED.<br>
				</p>	
		</div>
		
		<div class="guide g2">
			<h2><b class="top">HOW TO EDIT/DELETE</b></h2>
			<h3><b>YOUR COMPLAINT?</b></h3>	
				<br>
				<p>
					<span><ion-icon name="arrow-forward"></ion-icon></span>
					 GO TO <a href="6_my_complaints.php?page=1">MY COMPLAINTS PAGE.</a><br>
				</p>
				<br>
				<p>
					<span><ion-icon name="arrow-forward"></ion-icon></span>
					 CLICK ON EDIT BUTTON TO<br> &nbsp &nbsp&nbsp EDIT YOUR COMPLAINT.<br>
				</p>
				<br>
				<p>
					<span><ion-icon name="arrow-forward"></ion-icon></span>
					 THEN CLICK ON SUBMIT<br> &nbsp &nbsp&nbsp BUTTON.<br>
				</p>				
				<br>				
				<p>
					<span><ion-icon name="arrow-forward"></ion-icon></span>
					 CLICK ON DELETE BUTTON TO<br> &nbsp &nbsp&nbsp DELETE YOUR COMPLAINT.<br>
				</p>
				<br>
				<p>
					<span><ion-icon name="arrow-forward"></ion-icon></span>
					 YOU CAN RECIEVE SOLUTIONS<br> &nbsp &nbsp&nbsp ON <a href="7_solutions.php?page=1">SOLUTION PAGE</a>.<br>
				</p>
		</div>
		
		<div class="guide g3">
			<h2><b class="top">HOW TO EDIT YOUR</b></h2>
			<h3><b>PROFILE&nbsp &&nbsp PASSWORD?</b></h3>	
				<br>
				<p>
					<span><ion-icon name="arrow-forward"></ion-icon></span>
					 GO TO <a href="6_my_complaints.php?page=1">PROFILE PAGE.</a><br>
				</p>
				<br>
				<p>
					<span><ion-icon name="arrow-forward"></ion-icon></span>
					 HERE YOU CAN SEE YOUR<br> &nbsp &nbsp&nbsp PROFILE DETAILS.<br>
				</p>
				<br>
				<p>
					<span><ion-icon name="arrow-forward"></ion-icon></span>
					 CLICK ON EDIT BUTTON TO<br> &nbsp &nbsp&nbsp EDIT YOUR PROFILE.<br>
				</p>
				<br>
				<p>
					<span><ion-icon name="arrow-forward"></ion-icon></span>
					 THEN CLICK ON SUBMIT<br> &nbsp &nbsp&nbsp BUTTON AFTER UPDATION.<br>
				</p>				
				<br>				
				<p>
					<span><ion-icon name="arrow-forward"></ion-icon></span>
					 CLICK ON CHANGE PASSWORD<br> &nbsp &nbsp&nbsp TO CHANGE YOUR PASSWORD.<br>
				</p>			
		</div>
	</div>
	</div>	
		
		<div class="previous">
			<a onclick="previous()">
				<img class="prev" src="img/backwards.png">
			</a>
		</div>
		
		<div class="next">
			<a onclick="next()">
				<img class="nxt" src="img/forwards.png">
			</a>
		</div>
	
	<script>
		
	</script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	</body>
	
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>	