<html>
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script type="text/javascript" src="css/bootstrap.min.js"></script>
</head>

<body>

<?php
error_reporting(0);
include('connection.php');
			if(isset($_POST['submitquestions']))
			{
				$keycounter=0;
				session_start();
				$userid= $_SESSION['userid'];
				
				$dob=$_POST['dob'];
				$countrykey=$_POST['country'];
				$teacherkey=$_POST['teacher'];
				$searchuserkey=mysqli_query($conn,"select* from user where userID='$userid'");
				while($rowkey=mysqli_fetch_array($searchuserkey))
				{
					if($dob==$rowkey['dob'] && $countrykey==$rowkey['key_security'] && $teacherkey==$rowkey['key_security2'])
					{
						$keycounter=90;
						
					}
					else{
						echo("No Match Found");
					}
			
				}
				if($keycounter==90)
				{
					?>
					<div class="jumbotron" style="text-align:center">
					<h1>Account Successfully Verified</h1>
					</div>
					<div class="boxmin" style="text-align:center">
					<form name="newkeyentry" onsubmit="return keyverify()" method="post" action="">
						<table align=center>
							<tr><th>Plz Enter New Password : </th><td><input type="password" name="newkey" placeholder="Enter Password" required></td></tr>
							<tr><th>Plz Re-Enter your Password : </th><td><input type="password" name="newkey_r"  placeholder="Re-Enter Password" required></td></tr>
							<tr><th><input type="submit" name="submit" value="save"></th></tr>
						</table>
							</form>
						</div>
							<script>
								function keyverify()
								{
									if(document.newkeyentry.newkey.value!=document.newkeyentry.newkey_r.value)
									{
										
										alert("Password not Match");
										return false;
									}
									
								}
							</script>
					<?php
				}
					
			}
			else{
				echo("The Page you are requesting is no longer Available");
			}
			
		
		
		
		
		if(isset($_POST['submit']))
		{
			include('connection.php');
			session_start();
				$userid= $_SESSION['userid'];
			$newpassword=$_POST['newkey'];
			$updatekey=mysqli_query($conn,"update user set password='$newpassword' where userID='$userid'");
			if(isset($updatekey))
			{?>
				<div class="jumbotron" style="text-align:center">
					<h1>Account Successfully Verified</h1>
					</div>	
					<div class="boxmin" style="text-align:center">
						<h4>Password Successfully Changed ! </h4>
					</div>
			<?php }
			session_unset();
		}
		
		
		?>
		
	</body>