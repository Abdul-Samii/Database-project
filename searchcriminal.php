

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
.jumbotron{margin-left:400px;background-color:white;}
.notifications{margin-left:400px;width:900px;}
.card-header{margin-left:500px;}
.img-responsive{width:900px;height:400px;border:2px solid black;border-radius:5px 5px 5px 5px;}
.table{max-width:100%;}
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
.jumbotron{background-color:white;margin-top:100px;}
}
@media screen and (max-width:700px) and (min-width:501px)
{
.img-responsive{width:570px;height:270px;border:2px solid black;border-radius:5px 5px 5px 5px;}
.jumbotron{background-color:white;}
}
@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
  

  .img-responsive{width:100px;height:100px;border:2px solid black;border-radius:5px 5px 5px 5px;}
  
  
}
		td ,th{border:1px solid black;border-collapse:collapse;text-align:center;width:100%;heigth:100%}
		table{width:100%;}
		</style>
	</head>
	
	
	<body>
	
	
	<?php
		include('connection.php');
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
							  <a class="active" href="search.php"><i class="fas fa-search"></i>Search Criminal Records</a>
							  <a  href="addnewuserform.php"><i class="fas fa-user-plus" ></i>Add New User</a>
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
								<a  href="userhome.php"><i class="fas fa-home" ></i>Home</a>
								<a  href="addcriminal.php"><i class="fas fa-user-plus" ></i>Add New Criminal Record</a>
								<a class="active" href="search.php"><i class="fas fa-search"></i>Search Criminal Records</a>
								
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
						<a class="active" href="search.php"><i class="fas fa-search"></i>Search Criminal Records</a>
						<a href="logout.php"><i class="fas fa-outdent"></i>Logout</a>
						</div>
								
								</div><!--1col-->
						<?php } ?>
				
								
								
								
										
										
										
										
										</div>
				
				
				<div class="row">
									<div class="col-med-12">
										<div class="jumbotron" style="padding-left:350px;">
											<h2>RECORD FOUND</h2>
										</div>
									</div>
								</div>
				
				<div class="row">
					<div class="col-med-12">
					
					
					<?php
include('connection.php');
session_start();

$searchID=$_POST['searchID'];
if(isset($_POST['data']))
{
	$searchID=$_POST['data'];
}
	$search_result=mysqli_query($conn," select distinct manages.userID,criminal.crminial_ID,name,age,cnic,phone,address,commit.crimeLOC,crime.crime_ID,crime.crimetype,punishment.punishment_type,prison.prison_ID,prison.prison_type from criminal inner join manages on manages.criminalID=criminal.crminial_ID inner join commit on criminal.crminial_ID=commit.crminial_ID inner join crime on commit.crimeID=crime.crime_ID inner join punishment on crime.crime_ID=punishment.crime_ID inner join arekept on criminal.crminial_ID=arekept.crminial_ID inner join prison on arekept.prisonID=prison.prison_ID where criminal.crminial_ID='$searchID'");
	while($row=mysqli_fetch_array($search_result))
	{
		$criminalid= $row['crminial_ID'];
		$manages=$row['userID'];
		$name= $row['name'];
		$age= $row['age'];
		$cnic= $row['cnic'];
		$phone= $row['phone'];
		$address= $row['address'];
		$crimeloc= $row['crimeLOC'];
		$crimeid= $row['crime_ID'];
		$crimetype= $row['crimetype'];
		$punishmenttype= $row['punishment_type'];
		$prisonid= $row['prison_ID'];
		$prisontype= $row['prison_type'];

	}?>
	<?php if(!isset($criminalid))
	{
		header('location:search.php?msg=Record Not Found');
		die('Record Not Found');
	}
	?>
	
	<div class="jumbotron" >
	

	
	Criminal ID :<b><?php echo $criminalid ?></b>
	<br>
	Name : <b><?php echo $name ?></b>
	<br>
	Age :<b><?php echo $age ?></b>
	<br>
	Cnic : <b><?php echo $cnic ?></b>
	
	
	
	<br>
	Record Entered BY : <b><?php echo $manages ?></b>
	
	
	<br>
	Phone : <b><?php echo $phone ?></b>
	<br>
	Address : <b><?php echo $address ?></b>
	<br>
	Crime Location : <b><?php echo $crimeloc ?></b>
	<br>
	Crime ID : <b><?php echo $crimeid ?></b>
	<br>
	Crime Type : <b><?php echo $crimetype ?></b>
	<br>
	Punishment Type : <b><?php echo $punishmenttype ?></b>
	<br>
	Prison Type : <b><?php echo $prisontype ?></b>
	<br>
	Prison ID : <b><?php echo $prisonid ?></b>
	

		</div>	
	
	
	
					
						</div>
					
				
				
				</div><!--Row-->
		</div>
		

		
		
		
	</body>
</html>






































<?php
include('connection.php');
session_start();
$searchID=$_POST['searchID'];
	$search_result=mysqli_query($conn," select distinct criminal.crminial_ID,name,age,cnic,phone,address,commit.crimeLOC,crime.crime_ID,crime.crimetype,punishment.punishment_type,prison.prison_ID,prison.prison_type from criminal inner join commit on criminal.crminial_ID=commit.crminial_ID inner join crime on commit.crimeID=crime.crime_ID inner join punishment on crime.crime_ID=punishment.crime_ID inner join arekept on criminal.crminial_ID=arekept.crminial_ID inner join prison on arekept.prisonID=prison.prison_ID where criminal.crminial_ID='$searchID'");
	while($row=mysqli_fetch_array($search_result))
	{
		$criminalid= $row['crminial_ID'];
		$name= $row['name'];
		$age= $row['age'];
		$cnic= $row['cnic'];
		$phone= $row['phone'];
		$address= $row['address'];
		$crimeloc= $row['crimeLOC'];
		$crimeid= $row['crime_ID'];
		$crimetype= $row['crimetype'];
		$punishmenttype= $row['punishment_type'];
		$prisontype= $row['prison_ID'];
		$prisontype= $row['prison_type'];

	}

?>