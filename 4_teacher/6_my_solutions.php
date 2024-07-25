<?php
	session_start();
	
	$tid=$_SESSION['s_tid'];
	
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
			<a href="4_home.php" class="na"><b>HOME</b></a>
			<a href="5_complaints.php?page=1" class="na"><b>COMPLAINTS</b></a>
			<a href="" class="na" style="color: gainsboro;"><b>MY&nbsp SOLUTIONS</b></a>
			<a href="7_status.php" class="na"><b>STATUS</b></a>
			<a href="8_profile.php" class="na"><b>PROFILE</b></a>
			<a href="logout.php"><button class="log"><b>LOGOUT</b></button></a>  
			</nav>
		</header>
		
		
		<?php 
		
		include 'include/connect.php';
		
		$start_from=0;
		$page_num=1;
		$record_num=mysqli_query($conn,"SELECT * FROM teacher_sol WHERE tid='$tid'");
		$rows_num=mysqli_num_rows($record_num);
		$pages=ceil($rows_num/$page_num);
		
		if(isset($_GET['page']))
		{
			$page=$_GET['page']-1;
			$start_from=$page * $page_num;
		}		
		
		$complain="SELECT * FROM teacher_sol WHERE tid='$tid' limit $start_from,$page_num";
		$query=mysqli_query($conn,$complain);
							
		while($details=mysqli_fetch_array($query))
		{	
			$sid=$details['sid'];
			$sname=$details['sname'];		
			$sub=$details['sub'];
			$sol=$details['sol'];
			
			$_SESSION['s_name']=$sname;
			$_SESSION['s_sub']=$sub;
			$_SESSION['s_sol']=$sol;
			
			$gets="SELECT * FROM student WHERE sid='$sid'";
			$qry=mysqli_query($conn,$gets);
			$get=mysqli_fetch_assoc($qry);
			$sid=$get['sid'];
			$sname=$get['sname'];
			$lname=$get['lname'];
			$gender=$get['gender'];
			$course=$get['course'];
			
			$_SESSION['s_sid']=$sid;
			$_SESSION['s_name']=$sname;
			
			$pg=$_GET['page'];
			$_SESSION['s_pg']=$pg;
			
	?>
		<!-- complain-->	
		<div class="complainbox" style="margin-top:70px;">
			<h2 class="head">MY&nbsp SOLUTION&nbsp <?php echo "TO&nbsp ".$sname;?></h2>
			
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
			
			<?php
				if(isset($_POST['delete']))
				{
					$del="DELETE FROM teacher_sol WHERE sol='$sol' AND sid='$sid'";
					$qry=mysqli_query($conn,$del);
					
					$del2="DELETE FROM principal_pending_t WHERE sol='$sol' AND sid='$sid'";
					$qry=mysqli_query($conn,$del2);
					
					$pg=$_GET['page'];
					$pgno=$_GET['page']-1;

					if($qry)
					{	
						if($pg=1)
						{
							header("location:6_my_solutions.php?page=$pg");
						}
						
						if($pgno>0)
						{	
							header("location:6_my_solutions.php?page=$pgno");
						}
					}

				}
			?>
			
			<div class="bt">
				<a href="6-1_edit_solutions.php">
					<button class="btn b1" name="edit"><b>EDIT</b></button>
				</a>
				
				<form method="POST">
				<button class="btn b2" name="delete">
					<b>DELETE</b>
				</button>
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
			if(!empty($sol))
			{	
		?>
		
	<!--pagination-->	
		<div class="paginate" style="top:220px;">
		<?php
			$paginate="SELECT * FROM teacher_sol WHERE tid='$tid'";
			$query2=mysqli_query($conn,$paginate);
			$total_record=mysqli_num_rows($query2);
			$total_page=ceil($total_record/$page_num);
			
			$page=$_GET['page'];

			if ($page > 2)
			{
				?>
				<a href="6_my_solutions.php?page=1"><b>1</b></a>
				<?php
				if($page != 3)
				{	
				echo "...";
				}
			}
			
			if ($page-1 > 0)
			{	
				?>
				<a href="6_my_solutions.php?page=<?php echo $page-1;?>"><b><?php echo $page-1;?></b></a>
				<?php
			}
			
			?>
			<a href="6_my_solutions.php?page=<?php echo $page;?>" class="cp"><b><?php echo $page;?></b></a>
			<?php
			
			if ($page+1 < $total_page+1)
			{	
				?>
				<a href="6_my_solutions.php?page=<?php echo $page+1;?>"><b><?php echo $page+1;?></b></a>
				<?php
			}
			
			if ($page < $total_page-2 || $page < $total_page-1)
			{
				if($page!=$total_page-2)
				{
				echo "...";
				}
				?>
				<a href="6_my_solutions.php?page=<?php echo $total_page;?>"><b><?php echo $total_page;?></b></a>
				<?php
			}	
	
		?>		
		</div>
		
		<div class="previous">
		<?php
			if(!empty($_GET["page"] && $_GET["page"]>1))
			{
				?>
				<a href="?page=<?php echo $_GET["page"]-1?>">
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
				if($_GET["page"]>=$pages)
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
			<p>PLEASE&nbsp GIVE&nbsp YOUR&nbsp FIRST&nbsp SOLUTION&nbsp ON<br>
				<a href="5_complaints.php?page=1" style="margin-left: 174px;">COMPLAINTS&nbsp PAGE</a></p>
			</div>
			
		<?php
			}
		?>
				
	</body>
	
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>	