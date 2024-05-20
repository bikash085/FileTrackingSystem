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
    <div class="col-sm-0"></div>
    <div class="col-sm-12">
  <form name="b1" method="post" action="">
  </br>
 <h2 align="center">Send File</h2>
 
 </br></br>
      <table width="auto" border="0" class="table table-sm table-striped">
        <thead>
          <th>Document Id</th>
          <th>Reference Id</th>
          <th>Date of Document</th>
          <th>Subject of Document</th>
          <th>Branch</th>
          <th>Action</th>
          <th>Details</th>
       </thead>
       
       <tbody>
       <?php
	   include("connection.php");
	   

		   
	  $sql="select doc_id,ref_id,time,subject,file,branch_name,branch from user,branch_table,audit_table where branch_table.branch_id=audit_table.branch and user.userid = audit_table.creator and audit_table.creator='$creator' and doc_id NOT IN (select send_file.doc_id from send_file )";
	  
	    $sql1="select receive_file.doc_id,ref_id,receive_file.time,subject,file,branch_name,branch from  user,branch_table,audit_table,receive_file where branch_table.branch_id=audit_table.branch and user.userid = receive_file.receiver and audit_table.doc_id=receive_file.doc_id and receive_file.receiver='$creator' and (receive_file.doc_id and send_file.sender) NOT IN (select send_file.doc_id,send_file.sender from send_file where send_file.sender = '$creator' ";
	   
	   $rs=mysqli_query($con,$sql);
	 $rs1 = mysqli_query($con,$sql1); 
	   
	   while(($row = mysqli_fetch_row($rs)) || ($row = mysqli_fetch_row($rs1)))
	   
	   {

         echo "<tr>";
		 echo "<td>$row[0]</td>";
	echo "<td>$row[1]</td>";
	echo "<td>$row[2]</td>";
	echo "<td>$row[3]</td>";
	echo "<td>$row[4]</td>";
	echo "<td>$row[5]</td>";
	
	 echo "<td><a href='send_file_script.php?a=$row[0] & b=$row[1] & c=$row[3] & d=$row[4] & e=$row[6]' class='btn btn-info'>Send File</a></td>";
	 		
       
	    echo "</tr> ";
	   }
	   
	 ?>
       </tbody>
       </table>
 </form>
      
    </div>
    <center><div class="col-sm-0"></center></div>
    </div>





</body>
</html>
<?php
}
?>
