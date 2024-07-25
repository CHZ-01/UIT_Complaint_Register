<?php

	include 'include/connect.php'

	if(isset($_POST['submit']))
	{	
		$fname=mysqli_real_escape_string($conn,$_POST['fname']);
		$lname=mysqli_real_escape_string($conn,$_POST['lname']);
		$sid=mysqli_real_escape_string($conn,$_POST['sid']);
		$phno=mysqli_real_escape_string($conn,$_POST['phno']);
		$gender=mysqli_real_escape_string($conn,$_POST['gender']);
		$dob=mysqli_real_escape_string($conn,$_POST['dob']);
		$dep=mysqli_real_escape_string($conn,$_POST['dep']);
		
		$student="SELECT * FROM student WHERE sid='$sid'";
		$query=mysqli_query($conn,$student);
		$row=mysqli_num_rows($query);
		
			
	}
	
?>