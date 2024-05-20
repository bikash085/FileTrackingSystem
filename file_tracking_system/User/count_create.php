<?php
if(session_status()==PHP_SESSION_NONE){
	session_start();
}
if(!isset($_SESSION['uname']))
header("Refresh:0;user_login.php");
else
{
	$creator = $_SESSION['uname'];
	include("connection.php");
	
	$query = "Select * from create_notification where value='1' and creator='$creator'";
	$query2 = mysqli_query($con,$query);
	$query3 = mysqli_num_rows($query2);
	//echo $query3;
}

?>