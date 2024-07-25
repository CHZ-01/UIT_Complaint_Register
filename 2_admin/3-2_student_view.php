<?php
	session_start();
	
	$adname=$_SESSION['s_adname'];
	
	if(!isset($_SESSION['s_adid']))
	{
		header('location:c3login_a.php');
	}		
?>

<!DOCTYPE html>
<html>
    <head>
   	    <meta charset="UTF-8">  
	    <meta name="viewport" content="width=device-width,initial-scale=1.0">  
        <link rel="stylesheet" href="css/common.css">
		<link rel="stylesheet" href="css/paginate.css">
		<link rel="stylesheet" href="css/profile.css">
		<link rel="stylesheet" href="css/alert.css">
		<link rel="icon" href="img/iconlogo1.png" type="image/x-icon">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Tektur&display=swap" rel="stylesheet">	
        <title>View Students</title>
    </head>
	
    <body>
		<header>
			<img src="img/homelogo.png">
			<nav class="navi">
				<a href="2_home.php" class="na"><b>HOME</b></a>
				<a href="" class="na" style="color: gainsboro;"><b>STUDENT</b></a>
				<a href="4_teacher.php" class="na"><b>TEACHER</b></a>
				<a href="5_principal.php" class="na"><b>PRINCIPAL</b></a>
				<a href="6_profile.php" class="na"><b>PROFILE</b></a>
				<a href="3_student.php"><button class="log"><b>EXIT</b></button></a>
			</nav>
		</header>

	<?php 
		
		include 'include/connect.php';
		
		$start_from=0;
		$page_num=1;
		$record_num=mysqli_query($conn,"SELECT * FROM student");
		$rows_num=mysqli_num_rows($record_num);
		$pages=ceil($rows_num/$page_num);
		
		if(isset($_GET['page']))
		{
			$page=$_GET['page']-1;
			$start_from=$page * $page_num;
		}		
		
		$complain="SELECT * FROM student limit $start_from,$page_num";
		$query=mysqli_query($conn,$complain);
							
		while($details=mysqli_fetch_array($query))
		{			
			$sid=$details['sid'];
			$fname=$details['sname'];
			$lname=$details['lname'];
			$phno=$details['phno'];
			$gender=$details['gender'];
			$course=$details['course'];
			
			$_SESSION['s_sid']=$sid;
			$_SESSION['s_sfname']=$fname;
			$_SESSION['s_slname']=$lname;
			$_SESSION['s_sphno']=$phno;
			
			$pg=$_GET['page'];
			$_SESSION['s_pg']=$pg;
			
	?>
		<!-- PROFILE PAGE -->
		<div class="profedit" style="height:450px;">  
				
				<div class="head">
				<h2 style="font-size: 25px;">PROFILE</h2>
				</div>
				
				<div class="details">
					<span class="icon"><ion-icon name="person"></ion-icon></span>
					<p><b style="margin-left:34px;">STUDENT:</b></p>		
					<p><b class="display"><?php echo $fname;?>&nbsp <?php echo $lname;?></b></p>
					<hr>						
				</div>			
				
				<div class="details">
					<span class="icon"><ion-icon name="id-card"></ion-icon></span>
					<p><b style="margin-left: 6px;">STUDENT&nbsp ID:</b></p>
					<p><b class="display"><?php echo $sid;?></b></p>
					<hr>
				</div>	

				<div class="details">
					<span class="icon"><ion-icon name="male-female"></ion-icon></span>
					<p><b style="margin-left: 45px;">GENDER:</b></p>
					<p ><b class="display"><?php echo $gender;?></b></p>
					<hr>
				</div>	

				<div class="details">
					<span class="icon"><ion-icon name="school"></ion-icon></span>
					<p><b style="margin-left: 45px;">COURSE:</b></p>
					<p ><b class="display"><?php echo $course;?></b></p>
					<hr>
				</div>	
			
			<?php
				if(isset($_POST['delete']))
				{
					$ins="INSERT INTO student_dlt(sname,lname,sid,gender,course) VALUES('$fname','$lname','$sid','$gender','$course')";
					$qry=mysqli_query($conn,$ins);                                           
					$del="DELETE FROM student WHERE sid='$sid'";                             
					$qry=mysqli_query($conn,$del);   
						

					?>
						<div class="error" style="left:0;">
							<p><span><ion-icon name="alert-circle"></ion-icon></span>
								WARNING!&nbsp Data&nbsp has&nbsp been&nbsp Deleted</p>
						</div>				
						<script>
							function redirect()
							{
								location.replace("3_student.php");							
							}
							setTimeout('redirect()',1000);
						</script>
					<?php
	
				}
			?>
			
			<div class="bt" style="position:relative;top:30px;right:60px;">
				<a href="3-2-1_student_edit.php">
					<button class="btn b1" name="edit" style="right: 0px;"><b>EDIT</b></button>
				</a>
				
				<form method="POST">
				<button class="btn b2" name="delete" style="left:175px;">
					<b>DELETE</b>
				</button>
				</form>
			</div>
		
		<?php
			}
		?>
		</div>
		
		<?php
			if(!empty($sid))
			{	
		?>
		
		
	<!--pagination-->	
		<div class="paginate" style="position: relative;top: 30px;margin-top:0px;">
		<?php
			$paginate="SELECT * FROM student";
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
			<p>PLEASE&nbsp CREATE&nbsp A&nbsp STUDENT&nbsp ACCOUNT&nbsp ON<br>
				<a href="3_student.php">CREATE&nbsp PAGE</a></p>
			</div>

		<?php
			}
		?>
	
	
		<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
	</body>	
</html>	