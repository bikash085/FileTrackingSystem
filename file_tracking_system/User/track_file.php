<?php
error_reporting(0);
if(session_status()==PHP_SESSION_NONE){
	session_start();
}
if(!isset($_SESSION['uname']))
header("Refresh:0;user_login.php");
else
{
	$creator = $_SESSION['uname'];
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
<div class="col-sm-1"></div>
<div class="col-sm-10">
 <form name="b1" method="post" action="track_file.php">
  <br>
  <div class="form-group">
 <input type="text" name="file_name" id="fie_name" class="form-control" placeholder="search File By Document ID"/>
 <input type="submit" name="submit" value="search" class="btn btn-primary"/>
 </div>
  
 </form>
 <?php
 if(isset($_POST['submit']))
 {
	 include("connection.php");
	 
	 $file = $_POST['file_name'];
	 
	 echo $file;
	 
	 $query = "select doc_id,ref_id,subject,branch_table.branch_name,time,file,user.name from user,branch_table,audit_table where branch_table.branch_id=audit_table.branch and user.userid = audit_table.creator and doc_id = '$file'";
	 
	 $query2 = mysqli_query($con,$query);
	 
	 $query3 = mysqli_fetch_row($query2);
	 
	 echo $query3[0];
	 echo $query3[1];
	 echo $query3[2];
	 echo $query3[3];
	 echo $query3[4];
	 echo $query3[5];
	 echo $query3[6];
	
	 
 }
 ?>
 
 </div>
 <div class="col-sm-1"></div>
 </div>
</body>
</html>
<?php
}
?>
