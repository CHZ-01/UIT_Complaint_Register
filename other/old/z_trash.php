<div>
		
		<?php
			
			include 'include/connect.php';
		
			$profile="SELECT sid,sname,sub1,cmp1,sub2,cmp2,sub3,cmp3,sub4,cmp4,sub5,cmp5 FROM student_complaint";
			$query=mysqli_query($conn,$profile);
			$details=mysqli_fetch_array($query);
			
			while(!empty($details))
			{
		?>
		
		<div class="complainbox">
		<h2 style="margin-top:30px; font-size:25px;">MY&nbsp COMPLAIN</h2>
		
		<div class="complain">
			
			<div class="subject">				
				<h3>SUBJECT</h3>
				<textarea class="mytext" name="subject" id="t1" rows="2" minlength="10" maxlength="50" readonly><?php echo $details['sub1'];?></textarea>				
			</div>
							
			<div class="content">
				<h3>CONTENT</h3>
				<textarea class="mytext" name="content" id="t2" rows="8" minlength="15" maxlength="250" readonly><?php echo $details['cmp1'];?></textarea>				
			</div>
			
			<div>
				<button type="submit" class="btn" name="submit"><b>SOLUTION</b></button>
			</div>
		
		</div>
		<?php
			}
		?>
	</div>
	
	
	<table align="center" border="1px">
			<tr>
				<th>sid</th>
				<th>sname</th>
				<th>sub1</th>
				<th>cmp1</th>
				<th>sub2</th>
				<th>cmp2</th>
				<th>sub3</th>
				<th>cmp3</th>
				<th>sub4</th>
				<th>cmp4</th>
				<th>sub5</th>
				<th>cmp5</th>
			</tr>
			
		<?php
			while($details=mysqli_fetch_array($query))
			{
				?>
				<tr>
					<th><?php echo $details['sid'];?></th>
					<th><?php echo $details['sname'];?></th>
					<th><?php echo $details['sub1'];?></th>
					<th><?php echo $details['cmp1'];?></th>
					<th><?php echo $details['sub2'];?></th>
					<th><?php echo $details['cmp2'];?></th>
					<th><?php echo $details['sub3'];?></th>
					<th><?php echo $details['cmp3'];?></th>
					<th><?php echo $details['sub4'];?></th>
					<th><?php echo $details['cmp4'];?></th>
					<th><?php echo $details['sub5'];?></th>
					<th><?php echo $details['cmp5'];?></th>
				</tr>
				<?php
			}	
		?>	
		</table>