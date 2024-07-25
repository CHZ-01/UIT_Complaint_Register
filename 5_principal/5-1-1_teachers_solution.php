<?php
	session_start();
	
	$pid=$_SESSION['s_pid'];
	$sid=$_SESSION['s_sid'];
	$tid=$_SESSION['s_tid'];
	
	if(!isset($pid))
	{
		header('location:1_login.php');
	}	
?>

<!DOCTYPE html>
<html>
    <head>
   	    <meta charset="UTF-8">  
	    <meta name="viewport" content="width=device-width,initial-scale=1.0">  
		<link rel="stylesheet" href="css/paginate.css">
		<link rel="stylesheet" href="css/alert.css">
		<link rel="icon" href="img/iconlogo1.png" type="image/x-icon">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Tektur&display=swap" rel="stylesheet">	
        <title>My Solutions</title>
    </head>
	
    <body>
		<header>
			<img src="img/homelogo.png">
			<nav class="navi">
				<a href="" class="na"><b>HOME</b></a>
				<a href="" class="na"><b>STUDENTS</b></a>
				<a href="" class="na"  style="color: gainsboro;"><b>TEACHERS</b></a>
				<a href="" class="na"><b>MY&nbsp SOLUTIONS</b></a>
				<a href="" class="na"><b>PROFILE</b></a>
				<a href="5-1_teachers_pending.php?page=1"><button class="log"><b>EXIT</b></button></a>  
			</nav>
		</header>
		
		
		<?php 
		
		include 'include/connect.php';	
		
		$complain="SELECT * FROM principal_pending_t WHERE sid='$sid'";
		$query=mysqli_query($conn,$complain);
							
		while($details=mysqli_fetch_array($query))
		{	
			$sid=$details['sid'];		
			$sub=$details['sub'];
			$sol=$details['sol'];
			
			$display="SELECT * FROM teacher WHERE tid='$tid'";
			$query=mysqli_query($conn,$display);
			
			$display=mysqli_fetch_array($query);
			$tid=$display['tid'];
			$tname=$display['tname'];
			$lname=$display['lname'];
			$gender=$display['gender'];
			$course=$display['course'];
			

			if(isset($_POST['approve']))
			{
				$ins="INSERT INTO principal_approved(sid,sub,tid,sol,pid) VALUES('$sid','$sub','$tid','$sol','$pid')";
				$qry=mysqli_query($conn,$ins);
				
				$ins="INSERT INTO admin_recieved(sid,sub,tid,sol,pid) VALUES('$sid','$sub','$tid','$sol','$pid')";
				$qry=mysqli_query($conn,$ins);
				
				$del="DELETE FROM principal_pending_t WHERE sub='$sub' AND sid='$sid'";
				$qry=mysqli_query($conn,$del);
				
				if($qry)
				{	
			?>
				<div class="success">
					<p><span><ion-icon name="checkmark-done-circle"></ion-icon></span>
						SUCCESS!&nbsp Complaint&nbsp is&nbsp been&nbsp Approved</p>
				</div>				
				<script>
					function redirect()
					{
						location.replace("5_teachers.php");									
					}
					setTimeout('redirect()',1000);
				</script>
			<?php	
				}
			}
			
			if(isset($_POST['reject']))
			{
				$ins="INSERT INTO principal_rejected(sid,sub,tid,sol,pid) VALUES('$sid','$sub','$tid','$sol','$pid')";
				$qry=mysqli_query($conn,$ins);
				
				$del="DELETE FROM principal_pending_t WHERE sub='$sub' AND sid='$sid'";
				$qry=mysqli_query($conn,$del);
				
				if($qry)
				{
			?>
				<div class="error">
					<p><span><ion-icon name="alert-circle"></ion-icon></span>
						WARNING!&nbsp Complaint&nbsp is&nbsp been&nbsp Rejected</p>
				</div>				
				<script>
					function redirect()
					{
						location.replace("5_teachers.php");									
					}
					setTimeout('redirect()',1000);
				</script>
			<?php	
				}
			}

	?>
		<!-- complain-->	
		<div class="complainbox">
			<h2 class="head">SOLUTION&nbsp <?php echo "FROM&nbsp ".$tname;?></h2>
			
			<div class="complain">
				
				<div class="subject">				
					<h3>SUBJECT</h3>
						<textarea class="mytext" name="subject" id="t1" rows="2" minlength="10" maxlength="50" readonly><?php echo $sub;?></textarea>		
				</div>
								
				<div class="content">
					<h3>SOLUTION</h3>
					<textarea class="mytext" name="content" id="t2" rows="7" minlength="15" maxlength="250" readonly><?php echo $sol;?></textarea>			
				</div>
			
			</div>

			<div class="bt">
				<form method="POST">
					<button class="btn b1" name="approve">
						<b>APPROVE</b>
					</button>
								
					<button class="btn b2" name="reject">
						<b>REJECT</b>
					</button>
				</form>
			</div>
		
		</div>
		
		<div class="info" style="position:relative;top:-110px;">
			<h2><b class="icoinfo"><ion-icon name="person-circle"></ion-icon></b>:&nbsp <b><?php echo $tname;?> <?php echo $lname;?></b></h2>
			<h2><b class="icoinfo"><ion-icon name="id-card"></ion-icon></b>:&nbsp <b><?php echo $tid;?></b></h2>
			<h2><b class="icoinfo"><ion-icon name="male-female"></ion-icon></b>:&nbsp <b><?php echo $gender;?></b></h2>
			<h2><b class="icoinfo"><ion-icon name="school"></ion-icon></b>:&nbsp <b><?php echo $course;?></b></h2>
		
		
		<?php
			}
		?>
		</div>
				
	</body>
	
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>	