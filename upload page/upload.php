<html>
<head>
<?php

if(isset($_POST['submit']))
{
	$genre=$_POST['genre'];
	$name= $_FILES['file']['name'];
	$temp= $_FILES['file']['tmp_name'];
	$dst = "Uploads/".$name;
	if(isset($_POST['premium']))
		$premium = "yes";
	else 
		$premium = "no";
	$conn = mysqli_connect("localhost","root","qwerty","dbwproject");
    if(!$conn)
	   die("Conection failed".mysql_error);
	$sql1= 'select userid from users where active = "yes"';
	$check1 = mysqli_query($conn,$sql1);
	if(!$check1)
		die("No user active").mysqli_error();
	while($result=mysqli_fetch_array($check1))
	{
		$userid=$result['userid'];
	}
	move_uploaded_file($temp,"Uploads/".$name);
	if($genre=='Sports')
	{
		$sql2= "Insert into sports values('$userid','$name','$dst',0,'$premium')";
		$check2 = mysqli_query($conn,$sql2);
		if(!$check2)
		die("Error uploading media! Please try again later.").mysqli_error();
	}
	else if($genre=='Movies')
	{
		$sql2= "Insert into movies values('$userid','$name','$dst',0,'$premium')";
		$check2 = mysqli_query($conn,$sql2);
		if(!$check2)
		die("Error uploading movies! Please try again later.").mysqli_error();
	}
	else if($genre=='Music')
	{
		$sql2= "Insert into music values('$userid','$name','$dst',0,'$premium')";
		$check2 = mysqli_query($conn,$sql2);
		if(!$check2)
		die("Error uploading media! Please try again later.").mysqli_error();
	}
	else if($genre=='Academics')
	{
		$sql2= "Insert into acdemic values('$userid','$name','$dst',0,'$premium')";
		$check2 = mysqli_query($conn,$sql2);
		if(!$check2)
		die("Error uploading media! Please try again later.").mysqli_error();
	}
	else if($genre=='Others')
	{
		$sql2= "Insert into others values('$userid','$name','$dst',0,'$premium')";
		$check2 = mysqli_query($conn,$sql2);
		if(!$check2)
		die("Error uploading media! Please try again later.").mysqli_error();
	}
}
?>
</head>
<body onload="load()">
<?php
echo "
<script type=text/javascript> 
function load()
{
	location.assign('http://localhost/projectdbnw/Cover%20Page/coveerpage.html');
}
</script>"
?>
</body>
</html>