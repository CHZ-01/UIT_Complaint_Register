<?php
	session_start();
	
	$adid=$_SESSION['s_adid'];
	
	if(!isset($adid))
	{
		header('location:c3login_a.php');
	}
?>

<!DOCTYPE html>
<html>
    <head>
   	    <meta charset="UTF-8">  
	    <meta name="viewport" content="width=device-width,initial-scale=1.0">  
        <link rel="stylesheet" href="css/create.css">
		<link rel="stylesheet" href="css/alert.css">
		<link rel="icon" href="img/iconlogo1.png" type="image/x-icon">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Tektur&display=swap" rel="stylesheet">	
        <title>Create Teacher</title>
    </head>
    <body>
		<header>
			<img src="img/homelogo.png">
			<nav class="navi">
				<a href="2_home.php" class="na"><b>HOME</b></a>
				<a href="3_student.php" class="na"><b>STUDENT</b></a>
				<a href="" class="na" style="color: gainsboro;"><b>TEACHER</b></a>
				<a href="5_principal.php" class="na"><b>PRINCIPAL</b></a>
				<a href="6_profile.php" class="na"><b>PROFILE</b></a>
				<a href="4_teacher.php"><button class="log"><b>EXIT</b></button></a>  
			</nav>
		</header> 
		
		<?php
		
			include 'include/connect.php';
			
			if(isset($_POST['submit']))
			{	
				$fname=mysqli_real_escape_string($conn,$_POST['fname']);
				$lname=mysqli_real_escape_string($conn,$_POST['lname']);
				$tid=mysqli_real_escape_string($conn,$_POST['tid']);
				$gender=mysqli_real_escape_string($conn,$_POST['gender']);
				$course=mysqli_real_escape_string($conn,$_POST['course']);
				
				$search="SELECT * FROM teacher WHERE tid='$tid'";
				$qry=mysqli_query($conn,$search);
				$row=mysqli_num_rows($qry);
				
				if($row==0)
				{	
				$change="INSERT INTO teacher(tname,lname,tid,gender,course) VALUES('$fname','$lname','$tid','$gender','$course')";
				$query=mysqli_query($conn,$change);
				
				if($change)
				{
					?>
						<div class="success">
							<p><span><ion-icon name="checkmark-done-circle"></ion-icon></span>
								SUCCESS!&nbsp Account&nbsp has&nbsp been&nbsp Created</p>
						</div>				
						<script>
							function redirect()
							{
								location.replace("4_teacher.php");					
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
								WARNING!&nbsp Updation&nbsp Unsuccessful</p>
						</div>
					<?php
				}
				}
				else
				{
					?>
						<div class="error">
							<p><span><ion-icon name="alert-circle"></ion-icon></span>
								WARNING!&nbsp Already&nbsp Created&nbsp Account</p>
						</div>
					<?php
				}		
			}
		?>
				
		<!-- PROFILE CREATE PAGE -->
		<div class="profedit" style="height: 485px;">  
				
				<div class="head">
				<h2 style="font-size: 25px;margin-top: 15px;">CREATE&nbsp PROFILE</h2>
				</div>
			
			<form method="POST">	
			<div class="data">	
				<div class="details">
					<span class="icon"><ion-icon name="person"></ion-icon></span>
					<input type="text" maxlength="15" name="fname" required>
					<label><b>FIRST&nbsp NAME</b></label>  		
				</div>
				
				<div class="details">
					<span class="icon"><ion-icon name="people"></ion-icon></span>
					<input type="text" maxlength="15" name="lname" required>
					<label><b>LAST&nbsp NAME</b></label>  		
				</div>
				
				<div class="details">
					<span class="icon"><ion-icon name="id-card"></ion-icon></span>
					<input type="phone" pattern="[0-9]{11}" maxlength="11" name="tid" required>
					<label><b>TEACHER&nbsp ID</b></label>  		
				</div>
				
				<div class="gender">
					<label><b>GENDER:</b></label>
						<label class="gen">
							<input type="radio" name="gender" value="male" required>
							<b>MALE</b>
						</label>
						<label class="gen">
							<input type="radio" name="gender" value="female" required>
							<b>FEMALE</b>
						</label>
				</div>
				
				<div class="gender">
					<label><b>COURSE:</b></label>
						<label class="gen">
							<input type="radio" name="course" value="bca" required>
							<b>BCA</b>
						</label>
						<label class="gen" style="margin-left: 14px;">
							<input type="radio" name="course" value="bcom" required>
							<b>BCOM</b>
						</label>
				</div>
				
				<div class="submit">
					<button class="btn" name="submit"><b>SUBMIT</b></button>
				</div>
			</div>	
			</form>
		</div>

		<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
		<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>	
	</body>
</html>	