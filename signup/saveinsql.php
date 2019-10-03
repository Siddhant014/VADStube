<html>
<head>
<?php
    $conn = mysqli_connect("localhost","root","qwerty","dbwproject");
    if(!$conn)
	   die("Conection failed".mysql_error);
    $fname=$_POST["fname"];
    $lname=$_POST["lname"];
    $uid=$_POST["uid"];
    $password=$_POST["password"];
    $cpassword=$_POST["cpassword"];
    $dob=$_POST["dob"];
	$gender=$_POST["gender"];
	$email=$_POST["email"];
	if(isset($_POST["premium"]))
		$premium="yes";
	else
		$premium="no";
	$sql1="select * from users where userid='$uid' or email='$email'";
	if($check1 = mysqli_query($conn,$sql1));
	{
		$rowuid=mysqli_num_rows($check1);
		if($rowuid>0)
		{
			echo "
			<script type=text/javascript> 
			{
				alert('Details already exists');
				location.assign('http://localhost/projectdbnw/signup/signup.html');
			}
			</script>";
		}
	}
	$sql2="Insert into users values('$fname','$lname','$uid','$email','$password','$cpassword','$dob','$gender','$premium','no')";
	$check2 = mysqli_query($conn,$sql2);
	if(!$check2)
		die("Insertion Failed").mysqli_error();
?>
</head>
<body onload="load()">
<?php
echo "
<script type=text/javascript> 
function load()
{
	location.assign('http://localhost/projectdbnw/Login%20Page/login.html');
}
</script>"
?>
</body>
</html>

