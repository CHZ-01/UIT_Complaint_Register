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
		<link rel="stylesheet" href="css/h8_s.css">
		<link rel="stylesheet" href="css/alert.css">
		<link rel="icon" href="img/iconlogo1.png" type="image/x-icon">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Tektur&display=swap" rel="stylesheet">	
        <title>Your Complaints</title>
    </head>
    <body>
		<header>
			<img src="img/homelogo.png">
			<nav class="navi">
				<a href="4_home.php" class="na"><b>HOME</b></a>
				<a href="5_complain.php" class="na"><b>COMPLAIN</b></a>
				<a href="6_my_complaints.php?page=1" class="na"><b>MY&nbsp COMPLAINTS</b></a>
				<a href="7_solutions.php" class="na"><b>SOLUTION</b></a>
				<a href="8_profile.php" class="na"><b>PROFILE</b></a>
				<a href="logout.php"><button class="log"><b>LOGOUT</b></button></a>
			</nav>
		</header>

	<?php 
		
		include 'include/connect.php';
		
		$profile="SELECT * FROM student_complaint WHERE sid='$sid'";
		$query=mysqli_query($conn,$profile);
		$details=mysqli_fetch_assoc($query);
				
		$sub=$details['sub'];
		$cmp=$details['cmp'];
		$time=$details['time'];
		$_SESSION['s_sub']=$sub;
		$_SESSION['s_cmp']=$cmp;
		$_SESSION['s_time']=$time;
				
		// while($details=mysqli_fetch_array($query))
		// {
		if(!empty($sub))
		{	
	
	?>
	<!-- complain-->	
	<div class="complainbox">
		<h2 style="margin-top:30px; font-size:25px;">MY&nbsp COMPLAIN</h2>
		
		<form method="POST">
		<div class="complain">
			
			<div class="subject">				
				<h3>SUBJECT</h3>
					<textarea class="mytext" name="subject" id="t1" rows="2" minlength="10" maxlength="50" readonly><?php echo $details['sub'];?></textarea>		
			</div>
							
			<div class="content">
				<h3>CONTENT</h3>
				<textarea class="mytext" name="content" id="t2" rows="8" minlength="15" maxlength="250" readonly><?php echo $details['cmp'];?></textarea>			
			</div>
		
		</div>
		</form>
		
		<?php
			if(isset($_POST['delete']))
			{
				$del="DELETE FROM student_complaint WHERE time='$time'";
				$qry=mysqli_query($conn,$del);	
			}
		?>
		
		<div class="bt">
			<a href="6-1_edit_complaints.php">
				<button class="btn b1" name="edit"><b>EDIT</b></button>
			</a>
			
			<form method="POST">
			<button class="btn b2" name="delete">
				<b>DELETE</b>
			</button>
			</form>
		</div>
	
	</div>
	<?php
		}
		
		else		
		// if(empty($sub))
		{	
	?>
		<div class="error">
			<span style="left: 460px;"><ion-icon name="alert-circle"></ion-icon></span>
			<p>WARNING!&nbsp There&nbsp is&nbsp No&nbsp Registered&nbsp Complaint,&nbsp Please&nbsp Register</p>
		</div>
		
		<div class="null">
			<img src="img/book-and-pencil.png">
		</div>
	<?php
		}
	?>
	
	
	
	</body>
	
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>	
</html>	