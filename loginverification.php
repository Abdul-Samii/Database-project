<?php
	include('connection.php');
	$userid=$_POST['userid'];
	$password=$_POST['pass'];
	
	$verified="";
	$search_ref=mysqli_query($conn,"select*from user where userID='$userid' && password='$password' ");
	
	while($valid_row=mysqli_fetch_array($search_ref))
	{
		$valid_row['userID'];
		
		if($userid==$valid_row['userID'] && $password==$valid_row['password'])
		{
			
			$verified=1;
		}
	}
	if($verified==1)
	{
		$search_ref=mysqli_query($conn,"select*from user where userID='$userid' && password='$password'");
		$validrow=mysqli_fetch_array($search_ref);
		$searchdept=mysqli_query($conn,"select departement.name from user inner join departement on dept_id=DID where userID='$userid' && password='$password'");
		$deptvalidrow=mysqli_fetch_array($searchdept);
		$dept=$deptvalidrow['name'];
		session_start();
		
		$_SESSION["name"]=$validrow['name'];
		$_SESSION["userid"]=$validrow['userID'];
 		$_SESSION['verify']=1;
		if(strcmp($dept,"Administration")==0)
		{
			$_SESSION["admin"]=1;
		}
		else if(strcmp($dept,"Police Departement")==0)
		{
			$_SESSION["police"]=1;
		}
		else{
			$_SESSION["others"]=1;
		}
		
		header('location:userhome.php');
		
	}
	else
	{
		header('location:login.php?msg=invalid username or password');
	}
?>