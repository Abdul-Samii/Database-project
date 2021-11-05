<?php
include('connection.php');
$deleteid=$_POST['deleteID'];

$find=mysqli_query($conn,"select*from criminal where crminial_ID='$deleteid'");
if(!isset($find))
{
	header('location:deletecriminalform.php?msg=Record Not Found');
}
else
{
mysqli_query($conn,"delete from criminal where crminial_ID='$deleteid'");
header('location:deletecriminalform.php?msg=Record Deleted Successfully');
}
?>