<html>
<head>
<title>Forgot password</title>
<link rel="stylesheet" type="text/css" href="css\bootstrap.min.css">
<script type="text/javascript" src="css\bootstrap.min.js"></script>

</head>

<body>
<?php
error_reporting(0);
?>

<div class="jumbotron">
<h3 style="text-align:center">Forgot Password</h3>
</div>
<div class="row">
<div class="col-sm-12">
<div class="internal-box" style="text-align:center">
	<form method="post" action="forgotpassword.php">
	<h4>Find Your Account</h4>
	<p>Enter Your UserID : </p>
	<input type="text" name="userids" placeholder="Enter userID">
	<input type="submit" name="submit" value="search" >
	</form>
	
	
	<?php
	if(isset($_POST['submit']))
	{
		include('connection.php');
		$searchuserid=$_POST['userids'];
		$searched=mysqli_query($conn,"select userID from user");
		$countuser=0;
		while($row=mysqli_fetch_array($searched))
		{
			if($searchuserid==$row['userID'])
			{
				
				
				$countuser=1;
			}
		}
		if($countuser==1)
		{ ?>
			<p style="color:red"><strong>USER FOUND !</strong></p>
			<?php
			session_start();
			$_SESSION['userid']=$searchuserid;
			?>
			
			<table align=center>
				<form method="post" action="passkeyverify.php">
				<tr><th>Enter your Date of Birth : </th><td><input type="date" name="dob"><td></tr>
				<tr><th>Which is Your Favourite Country : </th><td><input type="text" name="country" placeholder="Enter country name"></tr>
				<tr><th>Who is Your Favourite Teacher : </th><td><input type="text" name="teacher" placeholder="Enter Teacher name"></tr>
				<tr><th><input type="submit" name="submitquestions"></th></tr>
				
				</form>
			</table>
			
			
	<?php		
		}
		else
		{
			echo("NO user Found!");
		}
	}
	
	?>
	
</div>
</div>
</div>



</body>
</html>