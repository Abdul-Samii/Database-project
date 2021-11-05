<html>
	<head>
<
		<style>

		</style>
		<script type="text/javascript" src="loginvalidation.js"></script>
		<link type="text/css" rel="stylesheet" href="loginstyle.css">
		<link rel="stylesheet" type="text/css" href="css\bootstrap.min.css">
		<script type="text/javascript" src="css\bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	</head>

	<body >
	
	
	
		<div class="container-fluid">
			<div class="row d-flex justify-content-center">
				<div class="card" style="background-color:#00000090;margin-top:150px;">
					<div class="card-header" >
					<h3 style="color:white;">Sign In<h3>
					</div>
					<div class="card-body">
					<form  name="myform"  action="loginverification.php" method="post" >
									<div class="input-group form-group" >
									<div class="input-group-prepend" >
									<span class="input-group-text"  style="background-color:yellow;"><i class="fa fa-user" style="color:black;"></i><span>

										</div>
											<input type="text" name="userid" class="form-control"  placeholder="UserID">



									</div>


									<div class="input-group form-group">
										<div class="input-group-prepend">
											<span class="input-group-text" style="background-color:yellow;"><i class="fa fa-key" style="color:black;"></i><span>
										</div>
										<input type="password" class="form-control" name="pass" placeholder="Password">

									</div>
									<div class="row align-items-center remember" style="margin-left:5px;color:white;">
										<input type="checkbox" name="rememberme">Remember Me
									</div>
									<div class="form-group " style="margin-bottom:50px;">
										<input type="submit" value="Login" class="btn float-right login_btn" style="background-color:yellow; width:100px;">
									</div>
									</form>
								<div class="card-footer">
									<div class="d-flex justify-content-center">
									<a href="forgotpassword.php">Forgot Password</a>
									
									
									</div>
									<div class="invalid" style="color:red;">
									<?php
										if(isset($_REQUEST['msg']))
										{
										echo $_REQUEST['msg'];
										}
									
									?>
									</div><!--invalid-->
								</div>


					</div>
				</div>
			</div>
		</div>
	</body>
</html>
