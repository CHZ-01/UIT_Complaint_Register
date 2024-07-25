<?php
	session_start();
	error_reporting(E_ERROR | E_PARSE);
	
	if(!isset($_SESSION['s_tid']))
	{
		header('location:1_login.php');
	}	
?>

<!DOCTYPE html>
<html>
    <head>
   	    <meta charset="UTF-8">  
	    <meta name="viewport" content="width=device-width,initial-scale=1.0">  
        <link rel="stylesheet" href="css/home.css">
		 <link rel="stylesheet" href="css/h8_t.css">
		<link rel="icon" href="img/iconlogo1.png" type="image/x-icon">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Tektur&display=swap" rel="stylesheet">	
        <title>Complaints page</title>
    </head>
	
	<?php
		if(isset($_GET["page"]))
		{
			$id=$_GET["page"];
		}	
		else
		{
			$id=1;
		}	
	?>
	
    <body id="<?php echo $id;?>">
		<header>
			<img src="img/homelogo.png">
			<nav class="navi">
			<a href="4_home.php" class="na"><b>HOME</b></a>
			<a href="h8scomplaints_t.php" class="na"><b>COMPLAINTS</b></a>
			<a href="5-1_solution.php" class="na"><b>SOLUTION</b></a>
			<a href="i9mysolution_t.php" class="na"><b>MY&nbsp SOLUTIONS</b></a>
			<a href="8_profile.php" class="na"><b>PROFILE</b></a>
			<a href="logout.php"><button class="log"><b>LOGOUT</b></button></a>  
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
			$complain="SELECT * FROM student_complaint limit $start_from,$page_num";
			$query=mysqli_query($conn,$complain);
			
			while($details=mysqli_fetch_array($query))
			{
				$sid=$details['sid'];
				$sname=$details['sname'];
				$sub=$details['sub'];
				$cmp=$details['cmp'];
				$time=$details['time'];
				$_SESSION['s_sub']=$sub;
				$_SESSION['s_cmp']=$cmp;
				$_SESSION['s_time']=$time;
		?>
		
		<div class="complainbox">
		<h2 class="head">COMPLAIN&nbsp BY&nbsp <?php echo $sname;?></h2>
		
		<div class="complain">
			
			<div class="subject">				
				<h3>SUBJECT</h3>
				<textarea class="mytext" name="subject" id="t1" rows="2" minlength="10" maxlength="50" readonly><?php echo $sub;?></textarea>				
			</div>
							
			<div class="content">
				<h3>COMPLAINT</h3>
				<textarea class="mytext" name="content" id="t2" rows="8" minlength="15" maxlength="250" readonly><?php echo $cmp;?></textarea>				
			</div>
			
			<div class="bta">
				<a href="5-1_solution.php">
				<button type="submit" class="btn" name="submit"><b>SOLUTION</b></button>
				</a>
			</div>
		
		</div>
		
		
		<?php
			}
		?>
		</div>

		<div class="paginate">
		<?php
			$paginate="SELECT * FROM student_complaint";
			$query2=mysqli_query($conn,$paginate);
			$total_record=mysqli_num_rows($query2);
			$total_page=ceil($total_record/$page_num);
			
			$num_page=$_GET['page'];
			$start=1;
			$end=$total_page;
			
			if($end!=1)
			{
			if($num_page>1)
			{
				$prev=$num_page-1;
				echo "<a href='h8scomplaints_t.php?page=".$prev."'>".$prev."</a>";	
						
				for($i=$num_page-1;$i<$num_page;$i++)
				{
					if($i>0)
					{
						echo "<a href='h8scomplaints_t.php?page=".$i."'>".$i."</a>";
					}
				}
			}
			
			echo "<a href='h8scomplaints_t.php?page=".$num_page."'>".$num_page."</a>";
			
			for($i=$num_page+1;$i<$end;$i++)
			{
				echo "<a href='h8scomplaints_t.php?page=".$i."'>".$i."</a>";
				if($i>=$num_page+1)
				{
					break;
				}
			}
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
			if(empty($sub))
			{	
		?>
			<div class="error">
			<span style="left: 460px;"><ion-icon name="alert-circle"></ion-icon></span>
			<p>WARNING!&nbsp There&nbsp is&nbsp No&nbsp Registered&nbsp Complaint</p>
			</div>
			
			<div class="null">
				<img src="img/book-and-pencil.png">
			</div>	
		<?php
			}
		?>
		
		<script>
			let links=document.querySelectorAll('.paginate > a');
			let bodyid=parseInt(document.body.id)-1;
			links[bodyid].classList.add("active");
		</script>
			
	</body>
</html>	