<?php
	session_start();
	
	$pid=$_SESSION['s_pid'];
	
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
		<link rel="stylesheet" href="css/decision.css">
		<link rel="stylesheet" href="css/alert.css">
		<link rel="icon" href="img/iconlogo1.png" type="image/x-icon">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Tektur&display=swap" rel="stylesheet">	
        <title>Rejected page</title>
    </head>
	
    <body>
		<header>
			<img src="img/homelogo.png">
			<nav class="navi">
				<a href="3_home.php" class="na"><b>HOME</b></a>
				<a href="4_students.php" class="na"><b>STUDENTS</b></a>
				<a href="5-3_teachers_rejected.php?page=1" class="na"  style="color: gainsboro;"><b>TEACHERS</b></a>
				<a href="6_my_solution.php?page=1" class="na"><b>MY&nbsp SOLUTIONS</b></a>
				<a href="7_profile.php" class="na"><b>PROFILE</b></a>
				<a href="5_teachers.php"><button class="log"><b>EXIT</b></button></a> 
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
			
			$complain="SELECT * FROM principal_rejected limit $start_from,$page_num";
			$query=mysqli_query($conn,$complain);
			
			while($details=mysqli_fetch_array($query))
			{
				$sid=$details['sid'];
				$tid=$details['tid'];
				$sub=$details['sub'];
				$sol=$details['sol'];

				$_SESSION['s_sid']=$sid;
				$_SESSION['s_sub']=$sub;
				$_SESSION['s_sol']=$sol;
				
				$display="SELECT * FROM teacher WHERE tid='$tid'";
				$query=mysqli_query($conn,$display);
			
				$display=mysqli_fetch_array($query);
				$tid=$display['tid'];
				$tname=$display['tname'];
				$lname=$display['lname'];
				$gender=$display['gender'];
				$course=$display['course'];

		?>
		
		<div class="complainbox" style="margin-top:70px;">
		<h2 class="head">SOLUTION&nbsp FROM&nbsp <?php echo $tname;?></h2>
		
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
		
		</div>
		
			<div class="info" style="position:relative;top:-80px;">
				<h2 align="center">STUDENT</h2>
				<h2><b class="icoinfo"><ion-icon name="person-circle"></ion-icon></b>:&nbsp <b><?php echo $tname;?> <?php echo $lname;?></b></h2>
				<h2><b class="icoinfo"><ion-icon name="id-card"></ion-icon></b>:&nbsp <b><?php echo $tid;?></b></h2>
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
			$paginate="SELECT * FROM principal_rejected";
			$query2=mysqli_query($conn,$paginate);
			$total_record=mysqli_num_rows($query2);
			$total_page=ceil($total_record/$page_num);
			
			$page=$_GET['page'];

			if ($page > 2)
			{
				?>
				<a href="?page=1"><b>1</b></a>
				<?php
				if($page != 3)
				{	
				echo "...";
				}
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
				if($page!=$total_page-2)
				{
				echo "...";
				}
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
			<p>THERE&nbsp IS&nbsp NO&nbsp REJECTED&nbsp SOLUTIONS<br>
				<a href="5_teachers.php" style="margin-left:200px;">GO&nbsp BACK</a></p>
			</div>	
		<?php
			}
		?>
			
	</body>
	
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>	