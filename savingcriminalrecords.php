<?php
include('connection.php');

$criminal_name="";
$criminal_age="";
$criminal_cnic="";
$criminal_cell="";
$criminal_address="";
$criminal_crime="";
$criminal_prison="";
$criminal_id="";
$criminal_loc="";
if(isset($_POST))
{
	session_start();
	$userid=$_SESSION['userid'];
	$criminal_name=$_POST['cname'];
$criminal_age=$_POST['cage'];
$criminal_cnic=$_POST['ccnic'];
$criminal_cell=$_POST['cphone'];
$criminal_address=$_POST['caddress'];
$criminal_crime=$_POST['ccrime'];
$criminal_prison=$_POST['cprison'];
$criminal_id=$_POST['cid'];
$criminal_loc=$_POST['clocation'];
mysqli_query($conn,"insert into criminal(crminial_ID,name,age,cnic,phone,address) values('$criminal_id','$criminal_name','$criminal_age','$criminal_cnic','$criminal_cell','$criminal_address')");
mysqli_query($conn,"insert into arekept(crminial_ID,prisonID) values('$criminal_id','$criminal_prison')");
mysqli_query($conn,"insert into manages(criminalID,userID) values('$criminal_id','$userid')");
mysqli_query($conn,"insert into commit(crminial_ID,crimeID,crimeLOC) values('$criminal_id','$criminal_crime','$criminal_loc')");
}
$_SESSION['index']=0;
header('location:addcriminal.php?msg=Data Saved successfully');
?>