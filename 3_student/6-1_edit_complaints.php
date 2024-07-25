<?php
	session_start();
	
	$sid=$_SESSION['s_sid'];
	$sub=$_SESSION['s_sub'];
	$cmp=$_SESSION['s_cmp'];
	$pg=$_SESSION['s_pg'];
		
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
		<link rel="stylesheet" href="css/paginate.css">
		<link rel="stylesheet" href="css/edit.css">
		<link rel="stylesheet" href="css/alert.css">
		<link rel="icon" href="img/iconlogo1.png" type="image/x-icon">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Tektur&display=swap" rel="stylesheet">	
        <title>Edit Complaints</title>
    </head>
    <body>
		<header>
			<img src="img/homelogo.png">
			<nav class="navi">
				<a href="4_home.php" class="na"><b>HOME</b></a>
				<a href="5_complain.php" class="na"><b>COMPLAIN</b></a>
				<a href="" class="na" style="color: gainsboro;"><b>MY&nbsp COMPLAINTS</b></a>
				<a href="7_solutions.php?page=1" class="na"><b>SOLUTION</b></a>
				<a href="8_profile.php" class="na"><b>PROFILE</b></a>
				<a href="6_my_complaints.php?page=<?php echo $pg;?>"><button class="log"><b>EXIT</b></button></a>
			</nav>
		</header>

	<?php 
		
		include 'include/connect.php';
		
		if(isset($_POST['submit']))	
		{
			$subject=mysqli_real_escape_string($conn,$_POST['subject']);
			$content=mysqli_real_escape_string($conn,$_POST['content']);
			
			$change="UPDATE student_complaint SET sub='$subject',cmp='$content' WHERE sid='$sid' AND cmp='$cmp'";
			$query=mysqli_query($conn,$change);
			
			$change="UPDATE admin_pending SET sub='$subject',cmp='$content' WHERE sid='$sid' AND cmp='$cmp'";
			$query=mysqli_query($conn,$change);
			
			$change="UPDATE admin_send SET sub='$subject',cmp='$content' WHERE sid='$sid' AND cmp='$cmp'";
			$query=mysqli_query($conn,$change);
			
			if($change)
			{
				?>
					<div class="success">
						<p><span><ion-icon name="checkmark-done-circle"></ion-icon></span>
							SUCCESS!&nbsp Your&nbsp Complaint&nbsp has&nbsp been&nbsp Updated</p>
					</div>				
					<script>
						function redirect()
						{
							location.replace("6_my_complaints.php?page=<?php echo $pg;?>");		
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
	
	<?php
	if(!empty($cmp))
	{
	?>		
	<div class="complainbox">
		<h2 class="head">EDIT&nbsp COMPLAINT&nbsp <?php echo $pg;?></h2>
		
		<form method="POST">
		<div class="complain">
			
			<div class="subject">				
				<h3>SUBJECT</h3>
				<textarea class="mytext" name="subject" id="t1" rows="2" minlength="10" maxlength="50" required><?php echo $sub;?></textarea>
				<p class="count1" id="result1" style="margin-left:145%;"></p>	
			</div>
							
			<div class="content">
				<h3>CONTENT</h3>
				<textarea class="mytext" name="content" id="t2" rows="7" minlength="15" maxlength="250" required><?php echo $cmp;?></textarea>	
				<p class="count2" id="result2" style="margin-left:140%;"></p>	
			</div>
						
			<div>
				<button type="submit" class="btn b2" name="submit"><b>SUBMIT</b></button>
			</div>
			
		</div>
		</form>
	</div>
	<?php
	}
	else
	{ 
	?>
		<div class="error">
			<span style="left: 540px;"><ion-icon name="alert-circle"></ion-icon></span>
			<p>WARNING!&nbsp No&nbsp Complain&nbsp has&nbsp been&nbsp Registered</p>
		</div>
		<script>
			function redirect()
			{
				location.replace("5_complain.php");				
			}
			setTimeout('redirect()',1000);
		</script>
	<?php
	}	
	?>
	
	
	<script src="js/g7.js"></script>
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>	
	
	</body>
</html>	