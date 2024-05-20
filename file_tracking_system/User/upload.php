<?php

if(session_status()==PHP_SESSION_NONE){
	session_start();
}
if(!isset($_SESSION['uname']))
header("Refresh:0;user_login.php");
else
{
if(isset($_POST['submit']))
{


include("connection.php");

$doc_id = $_POST['d_id'];
$ref_id = $_POST['r_id'];
$sub = $_POST['subject'];
$branch = $_POST['branch'];
$file =$_FILES['file']['name'];
$username = $_SESSION['uname'];




$sql1 ="insert into audit_table(doc_id, ref_id,subject,branch,file,creator)   values('$doc_id','$ref_id','$sub','$branch','$file','$username')";

$sql2 ="select branch_name from branch_table where branch_id = '$branch'";
$branch_name = mysqli_query($con,$sql2);

$row = mysqli_fetch_row($branch_name);

$row2 = $row[0];
//$rs = mysqli_query($con,$sql);

$rs1 = mysqli_query($con,$sql1);

$audit = "insert into audit_final(doc_id,ref_id,subject,branch,file_name,creator) values('$doc_id','$ref_id','$sub','$branch','$file','$username')";

$audit2 = mysqli_query($con,$audit);



$message = "insert into create_notification(doc_id,ref_id,creator,value) values('$doc_id','$ref_id','$username','1')";

$message2 = mysqli_query($con,$message);


$upload = move_uploaded_file($_FILES['file']['tmp_name'],"files/".$_FILES['file']['name']);



?>

	


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<title>Branch Entry</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
  
</head>

<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container">
  <a class="navbar-brand" href="dashboard1.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Track File <span class="sr-only">(current)</span></a>
      </li>
       <li class="nav-item active">
        <a class="nav-link" href="view_files.php">View Files <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
     
     
</div>
  
  
</nav>


<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">
<br />
<br />
<br />
<?php
if($upload == 1 && $rs1 ==1)
{
?>
<div align="center">
<div class="alert alert-success alert-dismissible">
    
    <strong>Success!</strong></br>
     
  
<table border="0" align="center">

<tr><th><h4>Document Id</h4></th>
<td><h4><?php echo $doc_id ?></h4></td></tr>
<tr><th><h4>Reference Id</h4></th>
<td><h4><?php echo $ref_id ?></h4></td></tr>
<tr><th><h4>Subject</h4></th>
<td><h4> <?php echo $sub ?></h4></td></tr>
<tr><th><h4>Branch</h4></th>
<td><h4><?php echo $row2 ?></h4></td></tr>
<tr><th><h4>File</h4></th>
<td><h4><?php echo $file ?></h4></td></tr>
<tr<th></th><td><h4 align="center">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?php  echo "is successfully created.";?></h4></td></tr>
</table>

</div>
</div>
 




<center>
<p><a href="file_upload.php" class="btn-group-sm">Add New Document</a></p></center>




<?php
}
else 
{

?>	

<div align="center">
   <div class="alert alert-danger alert-dismissible">
   
    <strong>Danger!</strong> Some Error occur,file  not created.
  

</div>
</div>
<center><p><a href="file_upload.php?" class="btn-group-sm">Add New Document</a></p></center>

<div class="col-md-2"></div>
</div>

</body>

</html>
<?php

}

	

}
}
?>