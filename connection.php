<?php
	$server="localhost";
	$username="75829";
	$password="samiDB";
	$database="75829";
	$conn=mysqli_connect($server,$username,$password,$database);
	if(!isset($conn))
	{
		die("Connection Error".mysqli_connect_error);
	}
	$crime=mysqli_query($conn,"select*from crime");
	
	//echo("connected");
?>