<?php
	session_start();
	
	$tid=$_SESSION['s_tid'];
	$sid=$_SESSION['s_sid'];
	$sub=$_SESSION['s_sub'];
	$sname=$_SESSION['s_name'];
	$sol=$_SESSION['s_sol'];
	$pg=$_SESSION['s_pg'];
	
	if(!isset($tid))
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
		<link rel="stylesheet" href="css/paginate.css">
		<link rel="stylesheet" href="css/edit.css">
		<link rel="stylesheet" href="css/alert.css">
		<link rel="icon" href="img/iconlogo1.png" type="image/x-icon">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Tektur&display=swap" rel="stylesheet">	
        <title>Edit Solutions</title>
    </head>
    <body>
		<header>
			<img src="img/homelogo.png">
			<nav class="navi">
				<a href="4_home.php" class="na"><b>HOME</b></a>
				<a href="5_complaints.php?page=1" class="na"><b>COMPLAINTS</b></a>
				<a href="" class="na" style="color: gainsboro;"><b>MY&nbsp SOLUTIONS</b></a>
				<a href="7_status.php" class="na"><b>STATUS</b></a>
				<a href="8_profile.php" class="na"><b>PROFILE</b></a>
				<a href="6_my_solutions.php?page=<?php echo $pg;?>"><button class="log"><b>EXIT</b></button></a> 
			</nav>
		</header>

		<?php 
		
		include 'include/connect.php';
		
		if(isset($_POST['submit']))	
		{
			$solution=mysqli_real_escape_string($conn,$_POST['solution']);
			
			$change="UPDATE teacher_sol SET sol='$solution' WHERE sub='$sub' AND sid='$sid'";
			$query=mysqli_query($conn,$change);
			
			$change2="UPDATE principal_pending_t SET sol='$solution' WHERE sub='$sub' AND sid='$sid'";
			$query=mysqli_query($conn,$change2);
			
			if($change)
			{
				?>
					<div class="success">
						<p><span><ion-icon name="checkmark-done-circle"></ion-icon></span>
							SUCCESS!&nbsp Your&nbsp Solution&nbsp has&nbsp been&nbsp Updated</p>
					</div>				
					<script>
						function redirect()
						{
							location.replace("6_my_solutions.php?page=<?php echo $pg;?>");	
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

		<!-- complain-->	
		<div class="complainbox">
			<h2 class="head">EDIT&nbsp SOLUTION&nbsp <?php echo "TO&nbsp ".$sname;?></h2>
			
			<form method="POST">
			<div class="complain">
				
				<div class="subject">				
					<h3>SUBJECT</h3>
						<textarea class="mytext" name="subject" id="t1" rows="2" minlength="10" maxlength="50" readonly><?php echo $sub;?></textarea>
						<p class="count1" id="result1" style="margin-left:145%;"></p>	
				</div>
								
				<div class="content">
					<h3>SOLUTION</h3>
					<textarea class="mytext" name="solution" id="t2" rows="7" minlength="15" maxlength="250" placeholder="Your&nbsp Solution...."><?php echo $sol;?></textarea>		
					<p class="count2" id="result2" style="margin-left:140%;"></p>	
				</div>
				
				<div>
				<a href="#">
				<button type="submit" class="btn b2" name="submit"><b>SUBMIT</b></button>
				</a>
			</div>
			
			</div>
			</form>
		</div>
			
			
	<script src="js/g7.js"></script>
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>		
	</body>
</html>	