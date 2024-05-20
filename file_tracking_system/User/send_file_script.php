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
      
    </ul>
  </div>
     
     
</div>
  
  
</nav>
<?php
include("connection.php");
$doc_id = $_GET["a"];
$ref_id = $_GET["b"];
$sub = $_GET["c"];
$file_name = $_GET["d"];
$branch_id = $_GET["e"];
//echo $branch;


//echo "$user_id";
//echo "$name";
//echo "$gender";
//echo "$email";
//echo "$mobile";
//echo "$branch";
//echo "$desg";
?>







	
	<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
    
    <form  id="b1" name="b1" method="post" action="">
	<br><br>
	<h2 align="center">Send File To</h2>
    <center><div id="message"></div></center>
      <table  border="0" align="center" width="500">
        <div class="form-group">
        <tr>
          <th>Document Id </th>
          <td >
          <?php   echo $doc_id; ?></td>
         </tr>
         
         </div>
         <div class="form-group">
        <tr>
          <th >Reference Id </th>
          <td >
          <?php echo $ref_id; ?></td>
          
        </tr>
         </div>
         
         <div class="form-group">
        <tr>
          <th>Subject </th>
          <td >
          <?php echo $sub; ?></td>
         </tr>
         </div>
         
         <div class="form-group">
        <tr>
          <th>File Name </th>
          <td >
          <?php echo $file_name; ?></td>
          
        </tr>
         </div>
         <div class="form-group">
         <tr>
          <th>Send File To </th>
          <td >
          <?php $sql=mysqli_query($con,"select userid,name,design_name from user,designation_table where user.design_id = designation_table.design_id");
echo "<select name='send[]' id='send' multiple='multiple' class='form-control' >";

      while($row=mysqli_fetch_row($sql))
{	
 echo "<option value=$row[0]>$row[1]($row[2])</option>";
}

echo "</select>";
	  ?>
      
           </td>
           
          
        </tr>
        </div>
        <div class="form-group">
        <tr><td></td>
           <td><span id="send_error" class="text-danger font-weight-bold"></span></td>
        </tr>
     </div>
       <div class="form-group">
        <tr>
          <td ><label></label></td>
          <td >
          <small ><div class="alert alert-info">
    
    <strong>
   Press Ctrl key for multiple select </strong></div></small></td>
          
        </tr>
         </div>
         
         <div class="form-group">
         <tr>
         
         <td>
          <input type="text" readonly="readonly" name="doc" value="<?php echo $doc_id; ?>" hidden/>
          </td>
          </tr>
          </div>
          <div class="form-group">
          <tr>
          <td>
           <input type="text" readonly="readonly" name="ref" value="<?php echo $ref_id; ?>" hidden/>
          </td>
          </tr>
          </div>
          <div class="form-group">
           <tr>
          <td>
           <input type="text" readonly="readonly" name="sub" value="<?php echo $sub; ?>" hidden/>
          </td>
          </tr>
          </div>
          <div class="form-group">
         <tr>
         
         <td>
          <input type="text" readonly="readonly" name="branch_id" value="<?php echo $branch_id; ?>" hidden/>
          </td>
          </tr>
          </div>
           
          <div class="form-group">
         <tr>
         
         <td>
          <input type="text" readonly="readonly" name="file_name" value="<?php echo $file_name; ?>" hidden/>
          </td>
          </tr>
          </div>
           
      </table>
      <center>
      <br />
      <input type="submit" name="submit" id="button" value="Send File" class="btn btn-success"/>
      
      </center>
 
      </form>
      
    </div>

    <center><div class="col-md-3"></center></div>
    </div>



</body>
<script type="text/javascript" language="javascript" >
$(document).ready(function() {
	$('#button').click(function(prevent){
	event.preventDefault();
	$("#send_error").hide();
	
	
	var error_send = false;

	
	
	$("#send").focusout(function(){
		check_receiver();
	});
	
	
	
	function check_receiver(){
		var receive = $("#send").val()
		if( receive !==''){
			$("#send_error").hide();
			$("#send").css("border-bottom-color","#00FF00");
		}
		else{
		$("#send_error").html("Select Receiver");
		$("#send_error").show();
		$("#send").css("border-bottom", "2px #F00");
		error_send = true;
		}
	}

	

	
	
	var error_send = false;
	
		check_receiver();
		
		
		if( error_send ===false ){
	 

	
	$.ajax({
		url:"send_insert.php",
		method:"POST",
		data: $('form').serialize(),
		dataType:"text",
		success: function(strMessage){
			$('#message').html(strMessage)
		}
	})
	
	}
	})
    
})



</script>

</html>

<?php
}
?>

