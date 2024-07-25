<?php
	session_start();
	
	$sid=$_SESSION['s_sid'];
	$sname=$_SESSION['s_sname'];
	
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
        <link rel="stylesheet" href="css/box.css">
		<link rel="stylesheet" href="css/alert.css">
		<link rel="icon" href="img/iconlogo1.png" type="image/x-icon">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Tektur&display=swap" rel="stylesheet">	
        <title>Complain page</title>
    </head>
    <body>
		<header>
			<img src="img/homelogo.png">
			<nav class="navi">
				<a href="4_home.php" class="na"><b>HOME</b></a>
				<a href="" class="na" style="color: gainsboro;"><b>COMPLAIN</b></a>
				<a href="6_my_complaints.php?page=1" class="na"><b>MY&nbsp COMPLAINTS</b></a>
				<a href="7_solutions.php?page=1" class="na"><b>SOLUTION</b></a>
				<a href="8_profile.php" class="na"><b>PROFILE</b></a>
				<a href="logout.php"><button class="log"><b>LOGOUT</b></button></a>  
			</nav>
		</header> 
		
	<?php
	
		include 'include/connect.php';
	
		if(isset($_POST['submit']))
		{
			$subject=mysqli_real_escape_string($conn,$_POST['subject']);
			$content=mysqli_real_escape_string($conn,$_POST['content']);
					
			$change="INSERT INTO student_complaint(sid,sname,sub,cmp) VALUES('$sid','$sname','$subject','$content')";
			$query=mysqli_query($conn,$change);
			
			$ins="INSERT INTO admin_pending(sid,sub,cmp) VALUES('$sid','$subject','$content')";
			$query=mysqli_query($conn,$ins);
			
			$search="SELECT * FROM student_complaint WHERE sid='$sid'";
			$qry=mysqli_query($conn,$search);
			$rows_num=mysqli_num_rows($qry);
					
			if($query)
			{
				?>
					<div class="success">
						<p><span><ion-icon name="checkmark-done-circle"></ion-icon></span>
							SUCCESS!&nbsp Your&nbsp Complaint&nbsp has&nbsp been&nbsp Registered</p>
					</div>				
					<script>
						function redirect()
						{
							location.replace("6_my_complaints.php?page=<?php echo $rows_num;?>");	
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
						WARNING!&nbsp Registration&nbsp Unsuccessful</p>
				</div>
				<?php	
			}				
		}
	
	?>
		
		<div class="complainbox">
			<h2 style="margin-top:30px; font-size:25px;">COMPLAIN</h2>
			
			<form method="POST">
			<div class="complain">
				
				<div class="subject">				
					<h3>SUBJECT</h3>
					<textarea class="mytext" name="subject" id="t1" rows="2" minlength="10" maxlength="50" placeholder="Your&nbsp Subject...." required></textarea>
					<p class="count1" id="result1"></p>
				</div>
								
				<div class="content">
					<h3>CONTENT</h3>
					<textarea class="mytext" name="content" id="t2" rows="7" minlength="15" maxlength="250" placeholder="Your&nbsp Complaint...." required></textarea>
					<p class="count2" id="result2"></p>
				</div>
				
				<div>
					<button type="submit" class="btn" name="submit"><b>SUBMIT</b></button>
				</div>
				
			</div>
			</form>
		</div>
	<script src="js/g7.js"></script>

	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>	
	</body>
</html>	