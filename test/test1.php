<?php
if(isset($_POST['submit']))
{
	$name= $_FILES['file']['name'];
	$temp= $_FILES['file']['tmp_name'];
	
	move_uploaded_file($temp,"Uploads/".$name);
}
?>