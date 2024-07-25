<?php
	session_start();

	$csid=$_SESSION['s_csid'];

	include 'include/connect.php';		

	$cpt="SELECT * FROM student WHERE sid='$csid'";
	$cquery=mysqli_query($conn,$cpt);
	$row=mysqli_num_rows($cquery);

	if(empty($row))
	{
		header('location:1_login.php');
	}
	
	if(!isset($csid))
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
        <title>Forgot password</title>
    </head>
    <body>
		<header>
			<img src="img/homelogo.png">
			<nav class="navi">
				<a href="" class="na"><b>HOME</b></a>
				<a href="" class="na"><b>COMPLAIN</b></a>
				<a href="" class="na"><b>MY&nbsp COMPLAINTS</b></a>
				<a href="" class="na"><b>SOLUTION</b></a>
				<a href="" class="na"><b>PROFILE</b></a>
				<a href="1_login.php"><button class="log"><b>EXIT</b></button></a>  
			</nav>
		</header>	
		
		<?php
		
		if(isset($_POST['submit']))
		{
			$np=mysqli_real_escape_string($conn,$_POST['np']);
			$cp=mysqli_real_escape_string($conn,$_POST['cp']);
			
			$snp=password_hash($np,PASSWORD_BCRYPT);
			
			$cpt="SELECT * FROM student WHERE sid='$csid'";
			$cquery=mysqli_query($conn,$cpt);
			$row=mysqli_num_rows($cquery);
			
			if($row==1)
			{
				if($np===$cp)
				{
					$upt="UPDATE student SET pass='$snp' WHERE sid='$csid'";
					$uquery=mysqli_query($conn,$upt);
					?>	
						<div class="success">							
							<p><span><ion-icon name="checkmark-done-circle"></ion-icon></span>
								SUCCESS!&nbsp Password&nbsp has&nbsp been&nbsp Changed</p>
						</div>
						<script>
							function redirect()
							{
								location.replace("1_login.php");								
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
								WARNING!&nbsp Password&nbsp doesn't&nbsp match</p>
						</div>
					<?php
				}
			}	
		}
		
		?>
		
		<div class="logpg">
		<div class="forgot">
			<h2>FORGOT&nbsp PASSWORD</h2>
			<form method="POST">
				
				<div class="inlog">
					<span class="icon"><ion-icon name="id-card"></ion-icon></span>
					<p><b style="margin-left: 6px;">STUDENT&nbsp ID:</b></p>
					<span style="margin-left:5px;"><b><?php echo $csid?></b></span>
					<hr style="height:2.8px;background-color:black;">
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