<?php
error_reporting(0);
if(session_status()==PHP_SESSION_NONE){
	session_start();
}
if(!isset($_SESSION['uname']))
header("Refresh:0;user_login.php");
else
{
	$receiver = $_SESSION['uname'];
?>
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
<h2 align="center">Receive File<h2>
 
 </br></br>
      <table width="auto" border="0" class="table table-sm table-striped">
        <thead>
          <th>Document Id</th>
          <th>Reference Id</th>
          <th>Subject of Document</th>
          <th>Date of Document</th>
          <th>Branch</th>
          <th>Sender</th>
          
       </thead>
       
       <tbody>
       <?php
	   include("connection.php");
	   

		   
	  $sql="select audit_table.doc_id,ref_id,subject,send_file.time,branch_table.branch_name,user.name,file from audit_table,branch_table,send_file,user where audit_table.branch = branch_table.branch_id and audit_table.doc_id = send_file.doc_id and user.userid=send_file.sender  and send_file.receiver = '$receiver' and send_file.doc_id NOT IN (select receive_file.doc_id from receive_file where receive_file.receiver = '$receiver') " ; 
	  
	  
	//   
	   $rs=mysqli_query($con,$sql);
	  
	   
	   while($row = mysqli_fetch_row($rs))
	   
	   {

         echo "<tr>";
		 echo "<td>$row[0]</td>";
	echo "<td>$row[1]</td>";
	echo "<td>$row[2]</td>";
	echo "<td>$row[3]</td>";
	echo "<td>$row[4]</td>";
	
	
	 echo "<td><a href='receive.php?a=$row[0] & b=$row[1] & c=$row[2] & d=$row[3]  & e=$row[4] & f=$row[5] & g=$row[6]'>View File Details</a></td>";
	 		
       
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
