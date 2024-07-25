<?php
	session_start();
	
	$adid=$_SESSION['s_adid'];
	$adname=$_SESSION['s_adname'];
	
	if(!isset($adid))
	{
		header('location:1_login.php');
	}		
?>

<!DOCTYPE html>
<html>
    <head>
   	    <meta charset="UTF-8">  
	    <meta name="viewport" content="width=device-width,initial-scale=1.0">        
		<link rel="stylesheet" href="css/list.css">
		<link rel="stylesheet" href="css/alert.css">
		<link rel="icon" href="img/iconlogo1.png" type="image/x-icon">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Tektur&display=swap" rel="stylesheet">	
        <title>Pending Complaints page</title>
		
		<style>
			.btn
			{
				bottom: 10px;
				left: -60px;
				margin-top: 0px;
				width:165px;
			}
			.bt
			{
			    position: relative;
				top: -55px;
				left: 155px;
			}				
		</style>
    </head>
	
    <body>
		<header>
			<img src="img/homelogo.png">
			<nav class="navi">
				<a href="" class="na" style="color: gainsboro;"><b>HOME</b></a>
				<a href="3_student.php" class="na"><b>STUDENT</b></a>
				<a href="4_teacher.php" class="na"><b>TEACHER</b></a>
				<a href="5_principal.php" class="na"><b>PRINCIPAL</b></a>
				<a href="6_profile.php" class="na"><b>PROFILE</b></a>
				<a href="2_home.php"><button class="log"><b>EXIT</b></button></a>
			</nav>
		</header>
		
		<?php
			include 'include/connect.php';
	
			$page_num=1;	
			
			if(isset($_GET["page"]))
			{
				$page=$_GET["page"];
			}	
			else
			{
				$page=1;
			}	
			
			$start_from=($page-1)*1;
			$complain="SELECT * FROM admin_pending limit $start_from,$page_num";
			$query=mysqli_query($conn,$complain);
			
			while($details=mysqli_fetch_array($query))
			{
				$sid=$details['sid'];
				$sub=$details['sub'];
				$cmp=$details['cmp'];
				
				$_SESSION['s_sid']=$sid;
				$_SESSION['s_sub']=$sub;
				$_SESSION['s_cmp']=$cmp;
				
				$display="SELECT * FROM student WHERE sid='$sid'";
				$qry=mysqli_query($conn,$display);
			
				$display=mysqli_fetch_array($qry);
				$sid=$display['sid'];
				$sname=$display['sname'];
				$lname=$display['lname'];
				$gender=$display['gender'];
				$course=$display['course'];

				if(isset($_POST['submit']))
				{
					$snd=$_POST['snd'];
					$send="INSERT INTO admin_send(sname,sid,sub,cmp,send) VALUES('$sname','$sid','$sub','$cmp','$snd')";
					$qry=mysqli_query($conn,$send);
					
					if($snd=="principal")
					{
						$snd1="INSERT INTO principal_pending_s(sname,sid,sub,cmp) VALUES('$sname','$sid','$sub','$cmp')";
						$qry=mysqli_query($conn,$snd1);
					}
					
					$dlt="DELETE FROM admin_pending WHERE sid='$sid' AND cmp='$cmp'";
					$qry=mysqli_query($conn,$dlt);
					
					if($qry)
					{
						?>
							<div class="success">
								<p><span><ion-icon name="checkmark-done-circle"></ion-icon></span>
									SUCCESS!&nbsp This&nbsp Complaint&nbsp has&nbsp been&nbsp Sent</p>
							</div>				
							<script>
								function redirect()
								{
									location.replace("2_home.php");	
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
								WARNING!&nbsp This&nbsp Complaint&nbsp was&nbsp unable&nbsp to&nbsp Sent</p>
						</div>
					<?php
					}		
				}	                                   
					
		?>
		
		<div class="complainbox" style="margin-top:70px;">
		<h2 class="head">COMPLAINT&nbsp BY&nbsp <?php echo $sname;?></h2>
		
		<div class="complain">
			
			<div class="subject">				
				<h3>SUBJECT</h3>
				<textarea class="mytext" name="subject" id="t1" rows="2" minlength="10" maxlength="50" readonly><?php echo $sub;?></textarea>				
			</div>
							
			<div class="content">
				<h3>COMPLAINT</h3>
				<textarea class="mytext" name="content" id="t2" rows="7" minlength="15" maxlength="250" readonly><?php echo $cmp;?></textarea>				
			</div>
			
			
			
			<form method="POST">
			<div class="bta">
				<select class="btn" name="snd" required>				
					<option value="" class="btn" selected disabled><b>SENT TO:</b></option>
					
					<option value="bca" class="btn" required><b>BCA TEACHERS</b></option>
					
					<option value="bcom" class="btn" required><b>BCOM TEACHERS</b></option>
					
					<option value="principal" class="btn" required><b>PRINCIPAL</b></option>
				</select>
				
				<button type="submit" class="btn bt" name="submit"><b>SEND<ion-icon name="paper-plane" class="ico"></ion-icon></b></button>
			</div>
			</form>
		</div>
		
		</div>
		
			<div class="info" style="position:relative;top:-80px;">
				<h2 align="center">STUDENT</h2>
				<h2><b class="icoinfo"><ion-icon name="person-circle"></ion-icon></b>:&nbsp <b><?php echo $sname;?> <?php echo $lname;?></b></h2>
				<h2><b class="icoinfo"><ion-icon name="id-card"></ion-icon></b>:&nbsp <b><?php echo $sid;?></b></h2>
				<h2><b class="icoinfo"><ion-icon name="male-female"></ion-icon></b>:&nbsp <b><?php echo $gender;?></b></h2>
				<h2><b class="icoinfo"><ion-icon name="school"></ion-icon></b>:&nbsp <b><?php echo $course;?></b></h2>
			
		<?php
			}
		?>
		
			
		</div>

		<?php
			if(!empty($sub))
			{	
		?>
		<div class="paginate" style="top:220px;">
		<?php
			$paginate="SELECT * FROM admin_pending";
			$query2=mysqli_query($conn,$paginate);
			$total_record=mysqli_num_rows($query2);
			$total_page=ceil($total_record/$page_num);
			
			$page=$_GET['page'];

			if ($page > 2)
			{
				?>
				<a href="?page=1"><b>1</b></a>
				<?php
				echo "...";
			}
			
			if ($page-1 > 0)
			{	
				?>
				<a href="?page=<?php echo $page-1;?>"><b><?php echo $page-1;?></b></a>
				<?php
			}
			
			?>
			<a href="?page=<?php echo $page;?>" class="cp"><b><?php echo $page;?></b></a>
			<?php
			
			if ($page+1 < $total_page+1)
			{	
				?>
				<a href="?page=<?php echo $page+1;?>"><b><?php echo $page+1;?></b></a>
				<?php
			}
			
			if ($page < $total_page-2 || $page < $total_page-1)
			{
				echo "...";
				?>
				<a href="?page=<?php echo $total_page;?>"><b><?php echo $total_page;?></b></a>
				<?php
			}		
		?>		
		</div>
		
		<div class="previous">
		<?php
			if(!empty($_GET['page'] && $_GET['page']>1))
			{
				?>
				<a href="?page=<?php echo $_GET['page']-1?>">
					<img class="prev" src="img/backwards.png">
				</a>
				<?php
			}	
		?>
		</div>
		
		<div class="next">
		<?php
			if(!isset($_GET["page"]))
			{
				?>
				<a href="?page=2">
					<img class="nxt" src="img/forwards.png">
				</a>
				<?php
			}
			else
			{
				if($_GET["page"]>=$total_page)
				{
				?>
					<!--<img class="nxt" src="img/forwards.png">-->
				<?php				
				}
				else
				{
				?>
					<a href="?page=<?php echo $_GET['page']+1?>">
						<img class="nxt" src="img/forwards.png">
					</a>
				<?php
				}		
			}					
		?>
		</div>
		
		<?php
			}
			else
			{	
		?>
			<div class="null">
				<img src="img/iconlogo1.png">
			</div>	
			
			<div class="redo">
			<span style="left: 538px;"></span>
			<p>PLEASE&nbsp WAIT&nbsp FOR&nbsp YOUR&nbsp STUDENTS&nbsp TO&nbsp REGISTER&nbsp<br>
				<a href="2_home.php" style="margin-left:256px;">A&nbsp COMPLAINT</a></p>
			</div>	
		<?php
			}
		?>
			
	</body>
	
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>	