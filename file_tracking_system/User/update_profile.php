<?php
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


<title>Update Branch</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
include("connection.php");

$user_id=$_SESSION['uname'];
$user_name=$_POST["user_name"];
$gender = $_POST["RadioGroup1"];
$email = $_POST["user_email"];
$mobile = $_POST["mobile_no"];
$branch = $_POST["branch"];
$desg = $_POST["designation"];





$sql="UPDATE user SET name='$user_name', gender='$gender', email='$email', mobile='$mobile', branch_id='$branch', design_id='$desg' where userid='$user_id'";

//echo "$sql";
$sql1=mysqli_query($con,$sql);

if($sql1==1)

{
	?>
		<div class="alert alert-success alert-dismissible">
    
    <strong>Success!</strong></br>
     <?php echo "User ID:   ". $user_id."     User Name: ". $user_name ?>  updated successfully.
  </div>
  <?php
}
else
{?>
   <div class="alert alert-danger alert-dismissible">
   
    <strong>Error!</strong> Could not Update.
  </div>
  <?php
}
}
?>