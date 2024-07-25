<?php
			
		include 'connect.php';
		
		if(isset($_POST['submit']))
		{		
			$sname=mysqli_real_escape_string($conn,$_POST['sname']);
			$sid=mysqli_real_escape_string($conn,$_POST['sid']);
			$pass=mysqli_real_escape_string($conn,$_POST['pass']);
			$cpass=mysqli_real_escape_string($conn,$_POST['cpass']);	
			
			$pw=password_hash($pass,PASSWORD_BCRYPT);	
			
			$sidquery="SELECT * FROM student WHERE sid='$sid'";
			$query=mysqli_query($conn,$sidquery);
			$row=mysqli_num_rows($query);
			
			if($row==1)
			{
				?>
				<div class="error">
					<span style="left: 566px;"><ion-icon name="alert-circle"></ion-icon></span>
					<p>WARNING!&nbsp Already&nbsp Registered&nbsp Account&nbsp</p>
				</div>
				<?php
			}
			else
			{    
				if($pass===$cpass)
				{
					$insert="INSERT INTO student(sname,sid,pass) VALUES('$sname','$sid','$pw')";
					$iquery=mysqli_query($conn,$insert);
					
					if($iquery)
					{
						?>
						<div class="success">
							<span style="left:590px;"><ion-icon name="checkmark-done-circle"></ion-icon></span>
							<p>SUCCESS!&nbsp You&nbsp are&nbsp now&nbsp Signed&nbsp Up</p>
						</div>				
						<script>
							function redirect()
							{
								location.replace("4_home.php");									
							}
							setTimeout('redirect()',1000);
						</script>	
						<?php	
					}
					else
					{
						?>
						<div class="error">
							<span style="left:550px;"><ion-icon name="alert-circle"></ion-icon></span>
							<p>WARNING!&nbsp Your&nbsp Signup&nbsp isn't&nbsp Completed</p>
						</div>
						<?php
					}		
				}
				else
				{
					?>
					<div class="error">
						<span style="left:550px;"><ion-icon name="alert-circle"></ion-icon></span>
						<p>WARNING!&nbsp Password&nbsp Provided&nbsp is&nbsp Incorrect</p>
					</div>
					<?php
				}	
			}	
		}
		?>