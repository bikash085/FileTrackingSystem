<?php



session_start();
include("connection.php");

$username = $_POST['uname'];
$password = md5($_POST['password']);


 $stmt = $con->prepare("SELECT * FROM user WHERE userid=? AND  password=?");
//$stmt = $mysqli->prepare"SELECT * from admin_login where 'id'=? and 'password'=?";

    $stmt->bind_param('ss',$username,$password);
    $stmt->execute();
    $stmt->bind_result($username,$password);
    $stmt->store_result();
    if($stmt->num_rows == 1)  //

 
//$stmt = $con->prepare($sql)
{
	
	$_SESSION['uname']=$username;
	//echo "User ".$username." logged in";
	//header('location://http//localhost/file_tracking_system/User/file_upload');
	echo "<script type='text/javascript' language='javascript'>
	alert (' successfully logged in');
	</script>";
	header("Refresh:0;dashboard.php");
	 
}
else
{
	echo "<script type='text/javascript' language='javascript'>
	alert (' Error ');
	</script>";
	header("Refresh:0;user_login.php");
	
}

$stmt->close();

$con->close();



?>