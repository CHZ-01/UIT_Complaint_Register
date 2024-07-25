<?php
	session_start();
	
	$pid=$_SESSION['s_pid'];
	$sub=$_SESSION['s_sub'];
	$sid=$_SESSION['s_sid'];
	$sname=$_SESSION['s_sname'];
	
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
        <link rel="stylesheet" href="css/box.css">				
		<link rel="stylesheet" href="css/alert.css">
		<link rel="icon" href="img/iconlogo1.png" type="image/x-icon">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Tektur&display=swap" rel="stylesheet">	
        <title>Solution page</title>
    </head>
    <body>
		<header>
			<img src="img/homelogo.png">
			<nav class="navi">
				<a href="#" class="na"><b>HOME</b></a>
				<a href="#" class="na" style="color: gainsboro;"><b>STUDENTS</b></a>
				<a href="#" class="na"><b>TEACHERS</b></a>
				<a href="#" class="na"><b>MY&nbsp SOLUTIONS</b></a>
				<a href="#" class="na"><b>PROFILE</b></a>
				<a href="4_students.php"><button class="log"><b>EXIT</b></button></a> 
			</nav>
		</header> 
		
		<?php
			
			include 'include/connect.php';
			
			if(isset($_POST['submit']))
			{
				$content=mysqli_real_escape_string($conn,$_POST['content']);
				
				$change="INSERT INTO principal_sol(sid,sname,sub,sol,pid) VALUES('$sid','$sname','$sub','$content','$pid')";
				$query=mysqli_query($conn,$change);

				$search="SELECT * FROM principal_sol";
				$qry=mysqli_query($conn,$search);
				$rows_num=mysqli_num_rows($qry);
				
				if($query)
				{
									
					$change2="INSERT INTO admin_recieved(sid,sub,sol,pid) VALUES('$sid','$sub','$content','$pid')";
					$query=mysqli_query($conn,$change2);
				
					$dlt="DELETE FROM principal_pending_s WHERE sid='$sid' AND sub='$sub'";
					$qry=mysqli_query($conn,$dlt);
				
					?>
					<div class="success">
						<p><span><ion-icon name="checkmark-done-circle"></ion-icon></span>
							SUCCESS!&nbsp Your&nbsp Solution&nbsp has&nbsp been&nbsp Sent</p>
					</div>				
					<script>
						function redirect()
						{
							location.replace("6_my_solution.php?page=<?php echo $rows_num;?>");	
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
							WARNING!&nbsp Your&nbsp Solution&nbsp was&nbsp Unable&nbsp to&nbsp Send</p>
					</div>
					<?php
				}	
				
			}
		?>
		
		<div class="complainbox">
			<h2 class="head">SOLUTION&nbsp <?php echo "TO&nbsp ".$sname;?></h2>
			
			<form method="POST">
			<div class="complain">
				
				<div class="subject">				
					<h3>SUBJECT</h3>
					<textarea class="mytext" name="subject" id="t1" rows="2" minlength="10" maxlength="50" placeholder="Select&nbsp From&nbsp Complaints...." readonly><?php echo $sub;?></textarea>
					<p class="count1" id="result1"></p>
				</div>	
				
				<div class="content">
					<h3>SOLUTION</h3>
					<textarea class="mytext" name="content" id="t2" rows="7" minlength="15" maxlength="250" placeholder="Your&nbsp Solution...." required></textarea>
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