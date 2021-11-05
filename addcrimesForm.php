<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css\bootstrap.min.css">
		<script type="text/javascript" src="css\bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<style>
				body {
  margin: 0;
  font-family: "Lato", sans-serif;
}

.sidebar {
  margin: 0;
  padding: 0;
  width: 250px;
  background-color: #f1f1f1;
  position:fixed;
  height: 100%;
  overflow: auto;
  float:left;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}

.sidebar a i{
margin-right:10px;
}
 
.sidebar a.active {
  background-color: #4CAF50;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

@media screen and (min-width: 700px) and (max-width:2000px) {
.slideshow-container{margin-left:400px;}
.jumbotron{margin-left:480px;background-color:white;margin-top:-40px;}
.form-box{margin-left:-250px;margin-top:250px;}
.card-header{margin-left:500px;}
.img-responsive{width:900px;height:400px;border:2px solid black;border-radius:5px 5px 5px 5px;}
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
  
}
@media screen and (max-width:500px) 
{
.img-responsive{width:480px;height:200px;border:2px solid black;border-radius:5px 5px 5px 5px;}
.jumbotron{background-color:white;margin-left:100px;}
.form-box{margin-left:100px;margin-top:-60px}
}
@media screen and (max-width:700px) and (min-width:501px)
{
.img-responsive{width:570px;height:270px;border:2px solid black;border-radius:5px 5px 5px 5px;}
.jumbotron{background-color:white;margin-left:100px;}
.form-box{margin-left:100px;margin-top:-60px}
}
@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
  

  .img-responsive{width:100px;height:100px;border:2px solid black;border-radius:5px 5px 5px 5px;}
  
  
}
		
		</style>
		
	</head>
	
	
	<body>
	
	<?php
		include('connection.php');
		$crime=mysqli_query($conn,"select*from crime");
		
		$prison=mysqli_query($conn,"select*from prison");
		
		error_reporting(0);
		session_start();
		$username=$_SESSION['name'];
		$userid=$_SESSION['userid'];
		
		if($_SESSION['verify']!=1)
		{
			header('Location: login.php');
		}
	?>
		<div class="container-fluid">
				<div class="row">
								<?php if($_SESSION["admin"]==1)
						{?>
								<div class="col-med-4">
								<div class="sidebar">
								<a  href="userhome.php"><i class="fas fa-home" ></i>Home</a>
							  <a  href="addcriminal.php"><i class="fas fa-user-plus" ></i>Add New Criminal Record</a>
							  <a href="search.php"><i class="fas fa-search"></i>Search Criminal Records</a>
							  <a  href="addnewuserform.php"><i class="fas fa-user-plus" ></i>Add New User</a>
								<a href="updateform.php"><i class="fas fa-eye"></i>Update Criminal Record</a>
							  <a href="uploadmostwanted.php"><i class="fas fa-skull"></i>Most Wanted Criminals Files</a>
							  <a href="deletecriminalform.php"><i class="fas fa-trash-alt"></i>Delete Criminal Record</a>
							  <a href="viewallform.php"><i class="fas fa-eye"></i>Veiw all Criminal Record</a>
							  <a class="active" href="addcrimesForm.php"><i class="fas fa-plus-square"></i>Add New Crime</a>
							  <a href="addprisonform.php"><i class="fas fa-plus-square"></i>Add New Prison</a>
							  <a href="logout.php"><i class="fas fa-outdent"></i>Logout</a>
								</div>
								
								</div><!--1col-->
						<?php }
						if($_SESSION["police"]==1)
						{?>
							
							
							<div class="col-med-4">
								<div class="sidebar">
								<a class="active" href="userhome.php"><i class="fas fa-home" ></i>Home</a>
								<a  href="addcriminal.php"><i class="fas fa-user-plus" ></i>Add New Criminal Record</a>
								<a href="search.php"><i class="fas fa-search"></i>Search Criminal Records</a>
								
								<a href="updateform.php"><i class="fas fa-eye"></i>Update Criminal Record</a>
								<a href="uploadmostwanted.php"><i class="fas fa-skull"></i>Most Wanted Criminals Files</a>
								<a href="deletecriminalform.php"><i class="fas fa-trash-alt"></i>Delete Criminal Record</a>
								<a href="viewallform.php"><i class="fas fa-eye"></i>Veiw all Criminal Record</a>
								<a href="logout.php"><i class="fas fa-outdent"></i>Logout</a>
							</div>
								
								</div><!--1col-->
						<?php } 
						if($_SESSION["others"]==1)
						{
						?>
						<div class="col-med-4">
								<div class="sidebar">
						<a href="search.php"><i class="fas fa-search"></i>Search Criminal Records</a>
						<a href="logout.php"><i class="fas fa-outdent"></i>Logout</a>
						</div>
								
								</div><!--1col-->
						<?php } ?>
								<div class="row">
									<div class="col-med-12">
										<div class="jumbotron">
											<h2 style="background-color:red;color:white;border:10px solid red;border-radius:6px 6px 6px 6px;">ADD NEW CRIME</h2>
										</div>
									</div>
								</div>
								
								
								<div class="row">
								<div class="col-med-4">
								<div class="form-box">
								
									<form method="post" action="">
									<table>
									<tr>
									<th>Crime ID : </th>
									<td><input type="text" name="cid" placeholder="Enter Criminal name" required><td>
									</tr>
									<tr>
									<th>Crime Name :</th><td><input type="text" name="cname" placeholder="Entercrime name" required><td>
									</tr>
									<tr>
									<th>Crime Punishment :</th><td><input type="text" name="ptype" placeholder="Enter punishment name" required><td>
									</tr>
									</table>
									
									<input type="submit" name="submitc" value="SAVE">
									
									
									<div class="msg" style="color:red">
									<?php 
									if(isset($_REQUEST['msg']))
									{
									echo $_REQUEST['msg'];
									}
									?>
									</div>
									</form>
									
									<?php
										if(isset($_POST['submitc']))
										{
											
											$crimeID=$_POST['cid'];
											$crimename=$_POST['cname'];
											$ptype=$_POST['ptype'];
											
											$insertcrime=mysqli_query($conn,"insert into crime(crime_ID,crimetype) values('$crimeID','$crimename')");
											$insertpunish=mysqli_query($conn,"insert into punishment(punishment_type,crime_ID) values('$ptype','$crimeID')");
											if($insertcrime && $insertpunish)
											{
												echo("Record inserted");
											}
										
										}
									
									
									?>
								</div>
								</div>
								</div>
										
										
										
										
										
				
				
				
				
				
				
		</div>
		</div>

		
	</body>
</html>