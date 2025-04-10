<?php
	session_start();
	
	$sid=$_SESSION['s_sid'];
	
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
        <link rel="stylesheet" href="css/common.css">
		<link rel="stylesheet" href="css/change.css">
		<link rel="stylesheet" href="css/alert.css">
		<link rel="icon" href="img/iconlogo1.png" type="image/x-icon">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Tektur&display=swap" rel="stylesheet">	
        <title>Change password</title>
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
				<a href="8-1_profile_edit.php"><button class="log"><b>EXIT</b></button></a>  
			</nav>
		</header>	
		
		<?php
		
		include 'include/connect.php';
		
		if(isset($_POST['submit']))
		{
			$op=mysqli_real_escape_string($conn,$_POST['op']);
			$np=mysqli_real_escape_string($conn,$_POST['np']);
			$cp=mysqli_real_escape_string($conn,$_POST['cp']);
			
			$snp=password_hash($np,PASSWORD_BCRYPT);
			
			$cpt="SELECT pass FROM student WHERE sid='$sid'";
			$cquery=mysqli_query($conn,$cpt);
			
			$fetch=mysqli_fetch_assoc($cquery);
			$opfetch=$fetch['pass'];
			$verify=password_verify($op,$opfetch);
			
			if($verify)
			{
				if($np===$cp)
				{
					$upt="UPDATE student SET pass='$snp' WHERE sid='$sid'";
					$uquery=mysqli_query($conn,$upt);
					?>
						<div class="success">
							<p><span><ion-icon name="checkmark-done-circle"></ion-icon></span>
								SUCCESS!&nbsp Your&nbsp Password&nbsp has&nbsp been&nbsp Updated</p>
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
								WARNING!&nbsp New&nbsp Password&nbsp doesn't&nbsp Match</p>
						</div>
					<?php
				}
			}
			else
			{
				?>
					<div class="error">
							<p><span><ion-icon name="alert-circle"></ion-icon></span>
								WARNING!&nbsp Old&nbsp Password&nbsp is&nbsp Wrong</p>
					</div>
				<?php
			}	
		}
		
		?>
		
		<div class="logpg">
		<div class="forgot">
			<h2>CHANGE&nbsp PASSWORD</h2>
			
			<form method="POST">
				
				<div class="inlog">	   
					<span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
					<input type="password" minlength="8" maxlength="16" name="op" required>
					<label><b>OLD&nbsp PASSWORD</b></label>  		
				</div>
				
				<div class="inlog">	   
					<span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
					<input type="password" minlength="8" maxlength="16" name="np" required>
					<label><b>NEW&nbsp PASSWORD</b></label>  		
				</div>
				
				<div class="inlog">	   
					<span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
					<input type="password" minlength="8" maxlength="16" name="cp" required>
					<label><b>CONFIRM&nbsp PASSWORD</b></label>  		
				</div>
				
				<button type="submit" class="btn2" name="submit"><b>SUBMIT</b></button>
				
			</form>
		
		</div>
		</div>	

	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
	
	</body>
</html>	