<?php
//if ( isset( $_POST['Submit1'] ) ) { }
if(session_status()==PHP_SESSION_NONE){
	session_start();
}
if(!isset($_SESSION['uname']))
header("Refresh:0;user_login.php");
else
{
include("connection.php");
$filename=$_POST['file'];
$doc_id = $_POST['doc_id'];
$sender = $_POST['sender'];
$receiver = $_SESSION['uname'];


$sql = "insert into receive_file(sender,receiver,doc_id) values ('$sender','$receiver','$doc_id')";
$rs = mysqli_query($con,$sql);

$receive_update = "update receive_notification set value='0' where doc_id='$doc_id' and receiver='$receiver'";
$receive_update2 = mysqli_query($con,$receive_update);


if (!$filename) {
// if variable $filename is NULL or false display the message
echo $err;
} else {
// define the path to your download folder plus assign the file name
$path = 'files/'.$filename;
// check that file exists and is readable
if (file_exists($path) && is_readable($path)) {
// get the file size and send the http headers
$size = filesize($path);
header('Content-Type: application/octet-stream');
header('Content-Length: '.$size);
header('Content-Disposition: attachment; filename='.$filename);
header('Content-Transfer-Encoding: binary');
// open the file in binary read-only mode
// display the error messages if the file can´t be opened
$file = @ fopen($path, 'rb');
if ($file) {
// stream the file and exit the script when complete
fpassthru($file);
exit;
} else {
echo "file cannot open";
}
} else {
echo "file not found";

}
}




}
?>