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
        <title>Complaints page</title>
		
		<style>
			.paginate
			{	
				position: fixed;
				top: 620px;
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
			$complain="SELECT * FROM admin_recieved limit $start_from,$page_num";
			$query=mysqli_query($conn,$complain);
			
			while($details=mysqli_fetch_array($query))
			{
				$sid=$details['sid'];
				$tid=$details['tid'];
				$pid=$details['pid'];		
				$sub=$details['sub'];
				$sol=$details['sol'];
				
				$_SESSION['s_sid']=$sid;
				$_SESSION['s_sub']=$sub;
				$_SESSION['s_sol']=$sol;


				$get1="SELECT * FROM student WHERE sid='$sid'";
				$qry=mysqli_query($conn,$get1);
				$gets=mysqli_fetch_assoc($qry);
				$sname=$gets['sname'];
				$lname=$gets['lname'];
				$gender=$gets['gender'];
				$course=$gets['course'];
				
				if(empty($tid))
				{	
					$get2="SELECT * FROM principal WHERE pid='$pid'";
					$qry=mysqli_query($conn,$get2);
					$getp=mysqli_fetch_assoc($qry);
					$dis="principal";
					$pname=$getp['pname'];
					$lname=$getp['lname'];
					$gender=$getp['gender'];
				}
				else
				{	
					$get3="SELECT * FROM teacher WHERE tid='$tid'";
					$qry=mysqli_query($conn,$get3);
					$gett=mysqli_fetch_assoc($qry);
					$dis="teacher";
					$tname=$gett['tname'];
					$lname=$gett['lname'];
					$gender=$gett['gender'];
					$course=$gett['course'];
				}	
		?>
		
		<div class="complainbox" style="height:440px;margin-top:60px;">
		<h2 class="head">SOLUTION&nbsp TO&nbsp <?php echo $sname;?></h2>
		
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
		
		<?php
			if(!empty($tid))
			{	
		?>

		<div class="info" style="position:relative;top:-95px;bottom: 95px;">
			<h2><b style="display: flex;justify-content: center;">FROM <?php echo $dis;?></b></h2>
			<h2><b class="icoinfo"><ion-icon name="person-circle"></ion-icon></b>:&nbsp <b><?php echo $tname;?> <?php echo $lname;?></b></h2>
			<h2><b class="icoinfo"><ion-icon name="id-card"></ion-icon></b>:&nbsp <b><?php echo $tid;?></b></h2>
			<h2><b class="icoinfo"><ion-icon name="male-female"></ion-icon></b>:&nbsp <b><?php echo $gender;?></b></h2>
			<h2><b class="icoinfo"><ion-icon name="school"></ion-icon></b>:&nbsp <b><?php echo $course;?></b></h2>
		</div>
		<?php
			}
			else
			{
		?>

		<div class="info" style="position:relative;top:-110px;bottom: 95px;">
			<h2><b style="display: flex;justify-content: center;">FROM <?php echo $dis;?></b></h2>
			<h2><b class="icoinfo"><ion-icon name="person-circle"></ion-icon></b>:&nbsp <b><?php echo $pname;?> <?php echo $lname;?></b></h2>
			<h2><b class="icoinfo"><ion-icon name="id-card"></ion-icon></b>:&nbsp <b><?php echo $pid;?></b></h2>
			<h2><b class="icoinfo"><ion-icon name="male-female"></ion-icon></b>:&nbsp <b><?php echo $gender;?></b></h2>
		
		<?php		
			}		
		}
		?>
		</div>


	<!--PAGINATE-->

		<?php
			if(!empty($sub))
			{	
		?>
		<div class="paginate">
		<?php
			$paginate="SELECT * FROM admin_recieved";
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
			<p>PLEASE&nbsp WAIT&nbsp FOR&nbsp THE&nbsp PRICIPAL&nbsp TO&nbsp RESPOND&nbsp TO&nbsp A<br>
				<a href="2_home.php" style="margin-left:275px;">A&nbsp COMPLAINT</a></p>
			</div>	
		<?php
			}
		?>
			
	</body>
	
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>	