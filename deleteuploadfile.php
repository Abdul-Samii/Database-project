<?php
include('connection.php');
$path=$_POST['formdata'];
$deleteresult=mysqli_query($conn,"delete from uploads where file='$path'");
if($deleteresult)
{
	
	unlink($path);
	header('location:uploadmostwanted.php');
}
else
{
	header('location:uploadmostwanted.php?msg="Error Deleting File"');

}
?>