<?php
	$uid=$_POST["uid"];
	$email=$_POST["email"];
	$conn=mysqli_connect("localhost","root","qwerty","dbwproject");
	if(!$conn)
		die("Connection Failed! Please retry".mysqli_errno());
	$sql1= "Select userid,email,password from users where userid='$uid'";
	$check=mysqli_query($conn,$sql1);
	if($check)
	{	
		$rowuid=mysqli_num_rows($check);
		if($rowuid==0)
		{
			echo "
			<script type=text/javascript> 
			{
				alert('UserId does not exists');
				location.assign('http://localhost/projectdbnw/forget%20password/forgetpassword.html');
			}
			</script>";
		}
		else
		{
			while($result=mysqli_fetch_array($check))
			{
				if($result["email"]!=$email)
				{
					echo "
					<script type=text/javascript> 
					{
						alert('Email ID does not match with the given UserId');
						location.assign('http://localhost/projectdbnw/forget%20password/forgetpassword.html');
					}
					</script>";
				}
				else
				{
					$a=$result['password'];
					echo "
					<script type=text/javascript> 
						{
							alert('Your Password is: $a');
							location.assign('http://localhost/projectdbnw/Login%20Page/login.html');							
						}
						</script>";
				}
			}
		}
	}
	else
	{
		echo "
		<script type=text/javascript> 
		{
			alert('Error Fetching Data');
			location.assign('http://localhost/projectdbnw/forget%20password/forgetpassword.html');
		}
		</script>";
	}
?>