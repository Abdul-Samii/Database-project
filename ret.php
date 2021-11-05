<?php
include('connection.php');
?>

<html>
<head>
<title>File Retrieve With PHP and MySql</title>
</head>
<body>
<div>
<label>File Retrieve With PHP and MySql</label>
</div>
<div>
 <table width="80%" border="1">
    <tr>
    <th colspan="4">your uploads...<label><a href="index.php">upload new files...</a></label></th>
    </tr>
    <tr>
    <td>File Name</td>
    <td>File Type</td>
    
    <td>View</td>
    </tr>
    <?php
$result = mysqli_query($conn,"SELECT * FROM uploads");
  ?>
  <?php

while($row = mysqli_fetch_array($result)) {

?>
  
        <tr>
        <td><?php echo $row["filenumber"]; ?></td>
        <td><?php echo $row["filename"]; ?></td>

        <td><a href="<?php echo $row['file'] ?>" target="_blank">view file</a></td>
        </tr>
       <?php

}
?> 
    </table>
    
</div>
</body>
</html>