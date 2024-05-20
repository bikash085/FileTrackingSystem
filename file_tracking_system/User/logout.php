<?php
error_reporting(0);
session_start();
session_destroy();
{
echo "<script type='text/javascript' language='javascript'>
	alert (' successfully logged out');
	</script>";
	header("Refresh:0;user_login.php");
}
	 
?>