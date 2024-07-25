<?php
	session_start();
	
	$adid=$_SESSION['s_adid'];
	$pid=$_SESSION['s_pid'];
	$s_fname=$_SESSION['s_pfname'];
	$s_lname=$_SESSION['s_plname'];	
	$pg=$_SESSION['s_pg'];
	
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
        <title>Profile Edit</title>
    </head>
    <body>
		<header>
			<img src="img/homelogo.png">
			<nav class="navi">
			<a href="" class="na"><b>HOME</b></a>
			<a href="" class="na"><b>STUDENT</b></a>
			<a href="" class="na"><b>TEACHER</b></a>
			<a href="" class="na" style="color: gainsboro;"><b>PRINCIPAL</b></a>
			<a href="" class="na"><b>PROFILE</b></a>
			<a href="5-2_principal_view.php?page=<?php echo $pg;?>"><button class="log"><b>EXIT</b></button></a>
			</nav>
		</header> 
		
		<?php
		
			include 'include/connect.php';
			
			if(isset($_POST['submit']))
			{	
				$fname=mysqli_real_escape_string($conn,$_POST['fname']);
				$lname=mysqli_real_escape_string($conn,$_POST['lname']);
				$pidc=mysqli_real_escape_string($conn,$_POST['pid']);
				$gender=mysqli_real_escape_string($conn,$_POST['gender']);
				
				$change="UPDATE principal SET pname='$fname',lname='$lname',gender='$gender',pid='$pidc' WHERE pid='$pid'";
				$query=mysqli_query($conn,$change);
				
				if($query)
				{
					?>
						<div class="success">
							<p><span><ion-icon name="checkmark-done-circle"></ion-icon></span>
								SUCCESS!&nbsp Your&nbsp Data&nbsp has&nbsp been&nbsp Updated</p>
						</div>				
						<script>
							function redirect()
							{	
								location.replace("5-2_principal_view.php?page=<?php echo $pg;?>");
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
		?>
				
		<!-- PROFILE EDIT PAGE -->
		<div class="profedit" style="height:475px;">  
				
				<div class="head" style="margin-top:30px;">
				<h2 style="font-size: 25px;">PROFILE&nbsp EDIT</h2>
				</div>
			
			<form method="POST">	
			<div class="data">	
				<div class="details" style="margin-top:50px;">
					<span class="icon"><ion-icon name="person"></ion-icon></span>
					<input type="text" maxlength="15" name="fname" 
					 value="<?php echo $s_fname;?>" required>
					<label><b>FIRST&nbsp NAME</b></label>  		
				</div>
				
				<div class="details">
					<span class="icon"><ion-icon name="people"></ion-icon></span>
					<input type="text" maxlength="15" name="lname" 
					 value="<?php echo $s_lname;?>"required>
					<label><b>LAST&nbsp NAME</b></label>  		
				</div>
				
				<div class="details">
					<span class="icon"><ion-icon name="id-card"></ion-icon></span>
					<input type="phone" pattern="[0-9]{11}" maxlength="11" name="pid" 
					 value="<?php echo $pid;?>"required>
					<label><b>PRINCIPAL&nbsp ID</b></label>  		
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