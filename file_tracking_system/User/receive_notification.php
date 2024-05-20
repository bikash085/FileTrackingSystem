<?php
if(session_status()==PHP_SESSION_NONE){
	session_start();
}
if(!isset($_SESSION['uname']))
header("Refresh:0;user_login.php");
else
{
	$creator1 = $_SESSION['uname'];
	include("connection.php");
	
	$query11 = "Select * from receive_notification where value='1' and receiver='$creator1'";
	$query12 = mysqli_query($con,$query11);
	$query13 = mysqli_num_rows($query12);
	//echo $query3;
}

?>