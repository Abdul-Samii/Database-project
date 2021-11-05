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
.form-box{margin-left:-300px;margin-top:250px;}
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
		$dept=mysqli_query($conn,"select*from departement");
		
		
		
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
							  
							  <a  class="active" href="addnewuserform.php"><i class="fas fa-user-plus" ></i>Add New User</a>
								<a href="updateform.php"><i class="fas fa-eye"></i>Update Criminal Record</a>
							  <a href="uploadmostwanted.php"><i class="fas fa-skull"></i>Most Wanted Criminals Files</a>
							  <a href="deletecriminalform.php"><i class="fas fa-trash-alt"></i>Delete Criminal Record</a>
							  <a href="viewallform.php"><i class="fas fa-eye"></i>Veiw all Criminal Record</a>
							  <a href="addcrimesForm.php"><i class="fas fa-plus-square"></i>Add New Crime</a>
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
											<h2 style="background-color:red;color:white;border:10px solid red;border-radius:6px 6px 6px 6px;">Enter User Data</h2>
										</div>
									</div>
								</div>
								
								
								<div class="row">
								<div class="col-med-4">
								<div class="form-box">
									<form method="post" action="" onsubmit="return uservalidation()" name="userform">
									<table>
									<tr>
									<th>Name : </th>
									<td><input type="text" name="uname" placeholder="Enter user name" required><td>
									</tr>
									<tr>
									<th>UserID :</th><td><input type="text" name="uuid" placeholder="Enter UserID" required><td>
									</tr>
									<tr>
									<th>Password : </th><td><input type="password" name="ukey" placeholder="Enter user's password" required><td>
									</tr>
									<tr>
									<th>Cnic : </th><td><input type="text" name="ucnic" placeholder="1234567890xxx" required><td>
									</tr>
									<tr>
									<th>Date of Birth : </th> <td><input type="date" name="udate" placeholder="Enter user DOB" required><td>
									</tr>
									<tr>
									<th>Cell : </th><td><input type="text" name="ucell" placeholder="Enter user cell" required><td>
									</tr>
									<tr>
									<th>Position : </th><td><input  type="text" name="uposition" placeholder="Enter user position" required><td>
									</tr>
									<tr>
									<th>Age : </th><td><input  type="Number" name="uage" placeholder="Enter user Age" required><td>
									</tr>
									<tr>
										<th>Departement ID</th><td><select name="dept" required>
									<?php while($user_row=mysqli_fetch_array($dept))
									{?>
										<option value="<?php echo $user_row['dept_id']?>"><?php echo $user_row['name']?></option>
									<?php } ?></td>
									</tr>
									
									<tr>
										<th>Which is your favourite country : </th><td><input type="text" name="country" placeholder="Enter country name" required></td>
									
									</tr>
									<tr>
										<th>What is your favourite teacher name : </th><td><input type="text" name="teacher" placeholder="Enter teacher name" required></td>
									
									</tr>
									</table>
									
									<input type="submit" name="submitu" value="SAVE">
									
									
									<div class="msg" style="color:red">
									<?php 
									if(isset($_REQUEST['msg']))
									{
									echo $_REQUEST['msg'];
									}
									?>
									</div>
									</form>
									
									<script>
									function uservalidation()
{
	if(document.userform.ukey.value.length<8)
	{
		alert("Password size must be atleast 8 ");
		document.userform.ukey.focus();
		return false;
	}
	if(document.userform.uage.value<18)
	{
		alert("Minimum Age should be atleast 18");
		document.userform.uage.focus();
		return false;
	}
	if(document.userform.ucnic.value.length!=13)
	{
		alert("Cnic must be of length 13");
		document.userform.ucnic.focus();
		return false;
	}
	if(document.userform.ucell.value.length!=13)
	{
		alert("Cell must be of length 13");
		document.userform.ucell.focus();
		return false;
	}
	
}

									
									</script>
									
								</div>
								</div>
								</div>
										
										
										
										
										
				
				
				
				
				
				
		</div>
		</div>



<?php

	if(isset($_POST['submitu']))
	{
		
		$name=$_POST['uname'];
		$userid=$_POST['uuid'];
		$password=$_POST['ukey'];
		$cnic=$_POST['ucnic'];
		$dob=$_POST['udate'];
		$cell=$_POST['ucell'];
		$position=$_POST['uposition'];
		$age=$_POST['uage'];
		$did=$_POST['dept'];
		$country=$_POST['country'];
		$teacher=$_POST['teacher'];
		mysqli_query($conn,"insert into user(userID,name,password,cnic,dob,phonenum,position,age,DID,key_security,key_security2) values('$userid','$name','$password','$cnic','$dob','$cell','$position','$age','$did','$country','$teacher')");
	}


?>




		
	</body>
</html>