<?php
include('connection.php');
error_reporting(0);

session_start();
		$username=$_SESSION['name'];
		 $userid=$_SESSION['userid'];
		
if(isset($con))
{
	echo("connected");
}

	$allowedextensions=array();

 $file_name=$_FILES['Filename']['name']."<br>";
 $file_tmp=$_FILES['Filename']['tmp_name']."<br>";
 $file_size=$_FILES['Filename']['size']."<br>";
 $file_type=$_FILES['Filename']['type']."<br>";
 $Description=$_POST['Description'];
$fileExt=explode('.',$file_name);
  $fileextension=strtolower(end($fileExt));
  $allowedextensions=array('pdf','jpg','jpeg','doc','docx');
  for($i=0;$i<5;$i++)
  {
	  
	 if( strcmp($fileextension,$allowedextensions[$i])==4)
	 {
		 $counter=1;
	 }
  }
  if($counter==1)
  {
	 
	  if($file_size<4000000)
	  {
		  
		  
		  
		  
		  
		  
		 $dir="uploads/";
$pic=$dir.basename($_FILES['Filename']['name']);




//Writes the information to the database
mysqli_query($conn,"INSERT INTO uploads (filename,file,userID) VALUES ( '$Description','$pic','$userid')") ;

//Writes the Filename to the server
if(move_uploaded_file($_FILES['Filename']['tmp_name'],$pic)) {
    //Tells you if its all ok
   
	header('location:uploadmostwanted.php?msg="The file '.$pic. ' has been uploaded"');
} else {
    //Gives and error if its not
		header('location:uploadmostwanted.php?msg="Sorry, there was a problem uploading your file."');
    
}
		  
		  
	  }
	  else
	  {
		  header('location:uploadmostwanted.php?msg="doce Too Large"');
		  
	  }
  }
  else
  {
	  header('location:uploadmostwanted.php?msg="Invalid Formate"');
	  
  }
 

?>