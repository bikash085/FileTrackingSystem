<?php

include("connection.php");

if(session_status()==PHP_SESSION_NONE){
	session_start();
}
if(!isset($_SESSION['uname']))
header("Refresh:0;user_login.php");
else
{
	?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../boot4/bootstrap.css" rel="stylesheet" type="text/css" />
<script src="../boot4/jquery.min.js"></script>
<script src="../boot4/poper.min.js"></script>
<script src="../boot4/bootstrap.min.js"></script>
<title>File Upload</title>
<!-- Latest compiled and minified CSS -->

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>

<body class="bg-light">

	<?php
if(isset($_POST["send"]))
{
$docid = $_POST["doc"];

$ref = $_POST["ref"];

$sub = $_POST["sub"];

$branch = $_POST["branch_id"];

$file_name = $_POST["file_name"];

$sender = $_SESSION["uname"];


$receiver = $_POST["send"];

$update_create = "update create_notification set value='0' where doc_id='$docid' and creator='$sender'";

$update_create2 = mysqli_query($con,$update_create);


if($receiver)
{
	foreach ($receiver as $c){
		$sql = mysqli_query($con,"INSERT INTO send_file(receiver,sender,doc_id) VALUES('$c','$sender','$docid')");
		$receive_message = mysqli_query($con,"insert into receive_notification(doc_id,sender,receiver,value) values('$docid','$sender','$c','1')");
		$send_audit = mysqli_query($con,"INSERT INTO audit_final(doc_id,ref_id,subject,branch,file_name,sender,receiver) VALUES('$docid','$ref','$sub','$branch','$file_name','$sender','$c')");
	}
}
if($sql==1)
{
	
	?>
	<div class="alert alert-success alert-dismissible">
    
    <strong>Success!</strong></br>
     File sent successfully.
  </div>
	
<?php
}
else
{
	?>
   <div class="alert alert-danger alert-dismissible">
   
    <strong>Error!</strong> Some Error occur.
  </div>
  <?php	
}
}
else
{
	?>
      <div class="alert alert-warning alert-dismissible">
    
    <strong>Warning!
    </strong><br />
    Send File To Field cannot be Empty!!
  </div>
	
<?php
	
	header("Refresh:0;send_file_script.php");
}
}
?>
</body>
</html>