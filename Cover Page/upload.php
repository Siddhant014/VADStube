<html>
<head>
<?php
if(isset($_POST['submit']))
{
	$genre=$_POST['genre'];
	$name= $_FILES['file']['name'];
	$temp= $_FILES['file']['tmp_name'];
	$dst = "Uploads/".$name;
	if(isset($_POST['premium'])
		$premium = "yes";
	else 
		$premium = "no";
	$conn = mysqli_connect("localhost","root","qwerty","dbwproject");
    if(!$conn)
	   die("Conection failed".mysql_error);
	$sqql1= 'select userid from users where active = "yes"';
	$check1 = mysqli_query($conn,$sql1);
	if(!$check1)
		die("No user active").mysqli_error();
	while($result=mysqli_fetch_array($check1))
	{
		$userid=$result['userid'];
	}
	if($genre=='sports')
	{
		$sql2= 'Insert into sports values('$userid','$name','$dst',0,'$premium')';
		$check2 = mysqli_query($conn,$sql2);
		if(!$check2)
		die("Error uploading media! Please try again later.").mysqli_error();
	}
	else if($genre=='movies')
	{
		$sql2= 'Insert into movies values('$userid','$name','$dst',0,'$premium')';
		$check2 = mysqli_query($conn,$sql2);
		if(!$check2)
		die("Error uploading media! Please try again later.").mysqli_error();
	}
	else if($genre=='music')
	{
		$sql2= 'Insert into music values('$userid','$name','$dst',0,'$premium')';
		$check2 = mysqli_query($conn,$sql2);
		if(!$check2)
		die("Error uploading media! Please try again later.").mysqli_error();
	}
	else if($genre=='academic')
	{
		$sql2= 'Insert into academic values('$userid','$name','$dst',0,'$premium')';
		$check2 = mysqli_query($conn,$sql2);
		if(!$check2)
		die("Error uploading media! Please try again later.").mysqli_error();
	}
	else
	{
		$sql2= 'Insert into others values('$userid','$name','$dst',0,'$premium')';
		$check2 = mysqli_query($conn,$sql2);
		if(!$check2)
		die("Error uploading media! Please try again later.").mysqli_error();
	}
	move_uploaded_file($temp,"Uploads/".$name);
}
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