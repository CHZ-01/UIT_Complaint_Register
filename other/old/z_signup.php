<?php
	session_start();
	error_reporting(E_ERROR | E_PARSE);
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
        <title>Student's signup</title>
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
			$sname=mysqli_real_escape_string($conn,$_POST['sname']);
			$sid=mysqli_real_escape_string($conn,$_POST['sid']);
			$pass=mysqli_real_escape_string($conn,$_POST['pass']);
			$cpass=mysqli_real_escape_string($conn,$_POST['cpass']);	
			
			$pw=password_hash($pass,PASSWORD_BCRYPT);	
			
			$sidquery="SELECT * FROM student WHERE sid='$sid'";
			$query=mysqli_query($conn,$sidquery);
			$fetch=mysqli_fetch_array($query);
			$ssid=$fetch['sid'];
			$spw=$fetch['pass'];
			
			if(!empty($spw))
			{
				?>
				<div class="error">
					<span style="left: 566px;"><ion-icon name="alert-circle"></ion-icon></span>
					<p>WARNING!&nbsp Already&nbsp Registered&nbsp Account&nbsp</p>
				</div>
				<?php
			}
			   
			if($ssid===$sid)   
			{   
				if($pass===$cpass)
				{
					$insert="UPDATE student SET pass='$pw' WHERE sid='$sid'";
					$iquery=mysqli_query($conn,$insert);
					
					// $insert2="INSERT INTO student_profile(sid,fname) VALUES('$sid','$sname')";
					// $iquery2=mysqli_query($conn,$insert2);
										
					if($iquery)
					{			
						$_SESSION['s_sname']=$sname;
						$_SESSION['s_sid']=$sid;
						?>
						<div class="success">
							<span style="left:590px;"><ion-icon name="checkmark-done-circle"></ion-icon></span>
							<p>SUCCESS!&nbsp You&nbsp are&nbsp now&nbsp Signed&nbsp Up</p>
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
							<p>WARNING!&nbsp Your&nbsp Signup&nbsp isn't&nbsp Completed</p>
						</div>
						<?php
					}		
				}
				else
				{
					?>
					<div class="error">
						<span style="left:535px;"><ion-icon name="alert-circle"></ion-icon></span>
						<p>WARNING!&nbsp Password&nbsp Provided&nbsp doesn't&nbsp Match</p>
					</div>
					<?php
				}	
			}
			else
			{
				?>
					<div class="error">
						<span style="left:575px;"><ion-icon name="alert-circle"></ion-icon></span>
						<p>WARNING!&nbsp Please&nbsp Provide&nbsp a&nbsp Valid&nbsp ID</p>
					</div>
					<?php
			}		
		}
		?>
		
		<div class="logpg" style="position:absolute;top:150px;">
				
		<!--REGISTRATION PAGE-->
		<div class="logfrm">
			<h2 style="font-size:25px;">SIGN UP</h2>
			<form method="POST">
			
				<div class="inlog">
					<span class="icon"><ion-icon name="person-circle"></ion-icon></span>
					<input type="text" maxlength="15" name="sname" required>
					<label><b>USER&nbsp NAME</b></label><br>  		
				</div>
				
					<div class="inlog">
					<span class="icon"><ion-icon name="id-card"></ion-icon></span>
					<input type="phone" pattern="[0-9]{11}" maxlength="11" name="sid" required>
					<label><b>STUDENT&nbsp ID</b></label><br>  		
				</div>
				
				<div class="inlog">	   
					<span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
					<input type="password" minlength="8" maxlength="16" id="pass1" name="pass" required>
					<label><b>PASSWORD</b></label>  		
				</div>
				
				<div class="inlog">	   
					<span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
					<input type="password" minlength="8" maxlength="16" id="pass2" name="cpass" required>
					<label><b>CONFIRM&nbsp PASSWORD</b></label> 
					<span id="message" style="display:flex;margin-top: 7px;margin-left: 15px;color: #ff8484;"></span>
				</div>
						
				<button type="submit" class="btn" name="submit"><b>SIGNUP</b></button>
				
				<div class="create">
					<p><b style="font-size:16px;">ALREADY A USER?&nbsp </b>
					<a href="zlogin.php" class="login" style="font-size:16px;">LOG IN</a></p>
				</div>
				
			</form>  
			</div>	 
		</div>
		
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
      	
    </body>
</html>