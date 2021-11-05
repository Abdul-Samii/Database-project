<html>
<head>
	<style>
		table{width:100%;border-collapse:collapse;}
		th,td{border:1px solid black;text-align:center;}
		th{font-size:20px;}
		tr:nth-child(odd)
		{
			background-color:pink;
		}
		a{text-decoration:none;}
		a:hover{border:1px bottom;}
	
	</style>
</head>
<body>

<?php
session_start();
if($_SESSION['verify']!=1)
		{
			header('Location: login.php');
		}
	include('connection.php');
	$result_viewall=mysqli_query($conn,"select criminal.crminial_ID,name,age,phone,cnic,crimetype,punishment_type from criminal left join commit on criminal.crminial_ID=commit.crminial_ID left join crime on commit.crimeID=crime.crime_ID inner join punishment on crime.crime_ID=punishment.crime_ID");
	?>
	<table>
		<tr>
			<th>Criminal ID</th>
			<th>Name</th>
			<th>Age</th>
			<th>Phone</th>
			<th>CNIC</th>
			<th>Crime Type</th>
			<th>Punishment</th>
			<th>  </th>
			
		</tr>
		<?php 
		$counter=0;
		$data=0;
		
		while($row=mysqli_fetch_array($result_viewall))
	{?>

		<tr>
		<td><?php echo $row['crminial_ID'] ?></td>
		<td><?php echo $row['name'] ?></td>
		<td><?php echo $row['age'] ?></td>
		<td><?php echo $row['phone'] ?></td>
		<td><?php echo $row['cnic'] ?></td>
		<td><?php echo $row['crimetype'] ?></td>
		<td><?php echo $row['punishment_type'] ?></td>
			<?php $counter++;
			$id['$counter']=$row['crminial_ID']
			?>
			<form name="formsmall" action="searchcriminal.php" method="post">
		<td ><input type="hidden" value="<?php echo $row['crminial_ID'] ?>" name="data"><input type="submit" value="Veiw"></td>
		</form>
	<?php } 
	$_SESSION['KLAM']=$counter;
	?>
	</table>

</body>
</html>