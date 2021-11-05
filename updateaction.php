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
.jumbotron{margin-left:400px;background-color:white;margin-top:150px;}
.notifications{margin-left:400px;width:900px;}
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
		
		
		$criminalID=$_POST['searchID'];
		
		
		
		if(isset($_POST['submitup']))
{
	echo $oldcriminalID=$_POST['ocid'];
	$criminal_name=$_POST['cname'];
$criminal_age=$_POST['cage'];
$criminal_cnic=$_POST['ccnic'];
$criminal_cell=$_POST['cphone'];
$criminal_address=$_POST['caddress'];
$criminal_crime=$_POST['ccrime'];
$criminal_prison=$_POST['cprison'];
$criminal_id=$_POST['cid'];
$criminal_loc=$_POST['clocation'];
$up1=mysqli_query($conn,"update criminal set crminial_ID='$criminal_id',name='$criminal_name',age='$criminal_age',cnic='$criminal_cnic',phone='$criminal_cell',address='$criminal_address' where crminial_ID='$oldcriminalID'");
$up2=mysqli_query($conn,"update arekept set prisonID='$criminal_prison' where crminial_ID='$oldcriminalID' ");
$up3=mysqli_query($conn,"update commit set crimeID='$criminal_crime',crimeLOC='$criminal_loc' where crminial_ID='$oldcriminalID' ");
if($up1&&$up2&&$up3)
{
	header('Location:updateform.php?msg=One Record Updated');
}
else
{
	header('Location:updateform.php?msg=Error Updating Record');
}
}
		
		
		
		
		
		
		
		
		
		
		
		
		
	?>
		<div class="container-fluid">
				<div class="row">
								<?php if($_SESSION["admin"]==1)
						{?>
								<div class="col-med-4">
								<div class="sidebar">
								<a class="active" href="userhome.php"><i class="fas fa-home" ></i>Home</a>
							  <a  href="addcriminal.php"><i class="fas fa-user-plus" ></i>Add New Criminal Record</a>
							  <a href="search.php"><i class="fas fa-search"></i>Search Criminal Records</a>
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
				
								
								
								
										
										
										
										
										</div>
				
				
				
				
				<div class="row">
					<div class="col-med-4">
					<div class="jumbotron">
					
						
						
					
					<?php
					
			
					
					$result=mysqli_query($conn,"select distinct criminal.crminial_ID,name,age,cnic,phone,address,commit.crimeLOC,crime.crime_ID,crime.crimetype,punishment.punishment_type,prison.prison_ID,prison.prison_type from criminal inner join commit on criminal.crminial_ID=commit.crminial_ID inner join crime on commit.crimeID=crime.crime_ID inner join punishment on crime.crime_ID=punishment.crime_ID inner join arekept on criminal.crminial_ID=arekept.crminial_ID inner join prison on arekept.prisonID=prison.prison_ID where criminal.crminial_ID='$criminalID'");
					$crime=mysqli_query($conn,"select*from crime");
		
		$prison=mysqli_query($conn,"select*from prison");
					while($row=mysqli_fetch_array($result))
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
						$prisonid= $row['prison_ID'];
						$prisontype= $row['prison_type'];
						?>
						<form method="post" action="">
						<table>
									<tr>
									<th>Name : </th>
									<td><input type="text" name="cname" placeholder="Enter Criminal name" value="<?php echo $name ?>" required><td>
									</tr>
									<tr>
									<th>Age :</th><td><input type="number" name="cage" value="<?php echo $age?>" required><td>
									</tr>
									<tr>
									<th>CNIC : </th><td><input type="text" name="ccnic" placeholder="3201293746583" value="<?php echo $cnic ?>"required><td>
									</tr>
									<tr>
									<th>Cell number : </th><td><input type="text" name="cphone" placeholder="+92340xxxxxxx" value="<?php echo $phone ?>" required><td>
									</tr>
									<tr>
									<th>Crime Location : </th> <td><input type="text" name="clocation" placeholder="Enter location of crime" value="<?php echo $crimeloc ?>" required><td>
									</tr>
									<tr>
									<th>Criminal ID : </th><td><input type="text" name="cid" placeholder="enter criminal id" value="<?php echo $criminalid ?>" required><td>
									</tr>
									<tr>
									<th>Old Criminal ID : </th><td><input type="text" name="ocid" value="<?php echo $criminalid ?>" required><td>
									</tr>
									<tr>
									<th>Address : </th><td><input  type="text" name="caddress" placeholder="Enter Criminal Address"  value="<?php echo $address ?>" required><td>
									</tr>
									<tr>
									<th>Crime :</th><td><select name="ccrime"  required>
									<?php while($crime_row=mysqli_fetch_array($crime))
									{?>
										<option value="<?php echo $crime_row['crime_ID']?>"><?php echo $crime_row['crimetype']?></option>
									<?php } ?></td>
									
									</tr>
									<tr>
									<th>Prison :</th><td><select name="cprison"  required>
										<?php while($prison_row=mysqli_fetch_array($prison))
									{?>
										<option value="<?php echo $prison_row['prison_ID']?>"><?php echo $prison_row['prison_type']?></option>
									<?php } ?><td>
									</tr>
									
									</select>
									</table>
									<input type="submit" name="submitup" value="SAVE">
							</form>
					
					
					
					
					
					
					<?php }
					
					
					
					
					
					
					
					?>
					
						</div>
					
				</div>
				
				</div><!--Row-->
		</div>
		

		
		
		
	</body>
</html>