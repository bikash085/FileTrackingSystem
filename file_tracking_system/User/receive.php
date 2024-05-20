<?php

if(session_status()==PHP_SESSION_NONE){
	session_start();
}
if(!isset($_SESSION['uname']))
header("Refresh:0;user_login.php");
else
{
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
<?php
include("connection.php");

$doc_id = $_GET['a'];
$ref_id = $_GET['b'];
$subject = $_GET['c'];
$date = $_GET['d'];

$branch = $_GET['e'];

$sender =$_GET['f'];
$file = $_GET['g'];



$sql = "select design_name from designation_table,user where designation_table.design_id = user.design_id and name = '$sender'";

$rs = mysqli_query($con,$sql);

$desg = mysqli_fetch_row($rs);

$sql1 = "select userid from user where name = '$sender'";
$rs1 = mysqli_query($con,$sql1);

$name = mysqli_fetch_row($rs1);


?>







	
	<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
	<br>
	<h2 align="center">Receive File Details</h2>
	<br>
    <center><div id="message"></div></center>
    <form  id="b1" name="b1" method="post" action="download.php" >
    
      <table border="0" align="center" width="500">
      <div class="form-group">
        <tr>
          <th>Document Id </th>
          <td >
          <?php   echo $doc_id; ?></td>
         </tr>
         </div>
         
         <div class="form-group">
        <tr>
          <th>Reference Id </th>
          <td >
          <?php echo $ref_id; ?></td>
          
        </tr>
         </div>
         
         <div class="form-group">
        <tr>
          <th>Subject </th>
          <td >
          <?php echo $subject ?></td>
         </tr>
         </div>
         
         <div class="form-group">
        <tr>
          <th>Date & Time </th>
          <td >
          <?php echo $date; ?></td>
          
        </tr>
         </div>
         <div class="form-group"
        <tr>
          <th>Branch </th>
          <td >
          <?php echo $branch ?></td>
         </tr>
         </div>
         
         <div class="form-group">
        <tr>
          <th>Sender </th>
          <td >
          <?php echo $sender."(".$desg[0].")"; ?></td>
          
        </tr>
         </div>
        
       
          <div class="form-group">
        <tr>
          <th>File </th>
          <td >
          <?php echo $file; ?></td>
          
        </tr>
         </div>
        
         
         
        
         <div class="form-group">
        <tr>
         
          <td ><input type="text" id="file" name="file" value="<?php echo $file; ?>" hidden />
          </td>
          
        </tr>
         </div>
         <div class="form-group">
        <tr>
         
          <td ><input type="text" id="sender" name="sender" value="<?php echo $name['0']; ?>" hidden />
          </td>
          
        </tr>
         </div>
           
            <div class="form-group">
        <tr>
         
          <td ><input type="text" id="doc_id" name="doc_id" value="<?php echo $doc_id; ?>" hidden />
          </td>
          
        </tr>
         </div>
      </table>
      <center>
      <br />
      <input type="submit" name="submit" id="button" value="Receive File" class="btn btn-success"/>
      
      </center>
 
      </form>
      
    </div>

    <center><div class="col-md-2"></center></div>
    </div>



</body>

</html>

<?php
}
?>

