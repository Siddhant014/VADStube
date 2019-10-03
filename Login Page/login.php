<?php
	$uid=$_POST["id"];
	$password=$_POST["password"];
	$conn=mysqli_connect("localhost","root","qwerty","dbwproject");
	if(!$conn)
		die("Connection Failed! Please retry".mysqli_errno());
	$sql1= "Select userid,password from users where userid='$uid'";
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
				location.assign('http://localhost/projectdbnw/Login%20Page/login.html');
			}
			</script>";
		}
		else
		{
			while($result=mysqli_fetch_array($check))
			{
				if($result["password"]!=$password)
				{
					echo "
					<script type=text/javascript> 
					{
						alert('Invalid Password');
						location.assign('http://localhost/projectdbnw/Login%20Page/login.html');
					}
					</script>";
				}
				else
				{
					$sql="Update users set active = 'yes' where userid='$uid'";
					$check==mysqli_query($conn,$sql);
					if(!$check)
					{
						die("Error".mysqli_error);
					}
					echo "
					<script type=text/javascript> 
						{
							alert('$uid Welcome to VADStube');
							location.assign('http://localhost/projectdbnw/Cover%20Page/coveerpage.html');							
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
			location.assign('http://localhost/projectdbnw/Login%20Page/login.html');
		}
		</script>";
	}
?>