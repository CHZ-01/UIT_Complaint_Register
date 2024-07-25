<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
   	    <meta charset="UTF-8">  
	    <meta name="viewport" content="width=device-width,initial-scale=1.0">  
        <link rel="stylesheet" href="css/signup.css">
		<link rel="stylesheet" href="css/alert.css">
		<link rel="icon" href="img/iconlogo1.png" type="image/x-icon">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Tektur&display=swap" rel="stylesheet">
        <title>Teacher's signup</title>
    </head>
    <body>
	
		<header>
		<img src="img/homelogo.png">
		<nav class="navi">
			<a href="" class="na"><b>HOME</b></a>
			<a href="" class="na"><b>COMPLAINTS</b></a>
			<a href="" class="na"><b>MY&nbsp SOLUTIONS</b></a>
			<a href="" class="na"><b>STATUS</b></a>
			<a href="" class="na"><b>PROFILE</b></a>
			<a href="../1_home/2_student_teacher.php"><button class="log"><b>EXIT</b></button></a>
		</nav>
		</header>   
		
		<?php
	
		include 'include/connect.php';

		if(isset($_POST['submit']))
		{	
			$tid=mysqli_real_escape_string($conn,$_POST['tid']);
			$pass=mysqli_real_escape_string($conn,$_POST['pass']);
			$cpass=mysqli_real_escape_string($conn,$_POST['cpass']);	
			
			$pw=password_hash($pass,PASSWORD_BCRYPT);
			
			$tidquery="SELECT * FROM teacher WHERE tid='$tid'";
			$query=mysqli_query($conn,$tidquery);
			$rows=mysqli_num_rows($query);
			
			if($rows==0)
			{
				?>
				<div class="error">
					<p><span><ion-icon name="alert-circle"></ion-icon></span>
						WARNING!&nbsp Your&nbsp ID&nbsp is&nbsp Invalid</p>
				</div>
				<?php
			}
			else
			{    
				$details=mysqli_fetch_assoc($query);
				$_SESSION['s_tid']=$details['tid'];
				$_SESSION['s_tname']=$details['tname'];
				$_SESSION['s_lname']=$details['lname'];
				$_SESSION['s_gender']=$details['gender'];
				$_SESSION['s_course']=$details['course'];
				$passchk=$details['pass'];
				
				if(empty($passchk))
				{
					if($pass===$cpass)
					{
						$add="UPDATE teacher SET pass='$pw' WHERE tid='$tid'";
						$iquery=mysqli_query($conn,$add);
	
						if($iquery)
						{			
							?>
							<div class="success">
								<p><span><ion-icon name="checkmark-done-circle"></ion-icon></span>
									SUCCESS!&nbsp You&nbsp are&nbsp now&nbsp Signed&nbsp Up</p>
							</div>				
							<script>
								function redirect()
								{
									location.replace("4_home.php");									
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
									WARNING!&nbsp Your&nbsp Signup&nbsp isn't&nbsp Completed</p>
							</div>
							<?php
						}		
					}
					else
					{
						?>
						<div class="error">
							<p><span><ion-icon name="alert-circle"></ion-icon></span>
								WARNING!&nbsp Password&nbsp Provided&nbsp doesn't&nbsp Match</p>
						</div>
						<?php
					}
				}		
				else
				{
					?>
					<div class="error">
						<p><span><ion-icon name="alert-circle"></ion-icon></span>
							WARNING!&nbsp Already&nbsp Registered&nbsp Account&nbsp</p>
					</div>
					<?php
				}				
			}	
		}
		
		?>
		
		<div class="logpg" style="position:absolute;top:150px;">
				
		<!--REGISTRATION PAGE-->
		<div class="logfrm">
			<h2 style="font-size:25px;">SIGN UP</h2>
			<form method="POST" > 
				
				<div class="inlog">
					<span class="icon"><ion-icon name="id-card"></ion-icon></span>
					<input type="phone" pattern="[0-9]{11}" maxlength="11" name="tid" required>
					<label><b>TEACHER&nbsp ID</b></label><br>  		
				</div>
				
				<div class="inlog">	   
					<span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
					<input type="password" minlength="8" maxlength="16" name="pass" required>
					<label><b>PASSWORD</b></label>  		
				</div>
				
				<div class="inlog">	   
					<span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
					<input type="password" minlength="8" maxlength="16" name="cpass" required>
					<label><b>CONFIRM&nbsp PASSWORD</b></label> 
					<span id="message" style="display:flex;margin-top: 7px;margin-left: 15px;color: #ff8484;"></span>
				</div>
						
				<button type="submit" class="btn" name="submit"><b>SIGNUP</b></button>
				
				<div class="create">
					<p><b style="font-size:16px;">ALREADY A USER?&nbsp </b>
					<a href="1_login.php" class="login" style="font-size:16px;">LOG IN</a></p>
				</div>
				
			</form>  
			</div>	 
		</div>
		
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
      	
    </body>
</html>