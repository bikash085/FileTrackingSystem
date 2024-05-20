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
      <li class="nav-item active">
        <a class="nav-link" href="view_files.php">View Files <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
     
     
</div>
  
  
</nav>
 <form  name="file_upload" id="file_upload" method="post" action="upload.php" enctype="multipart/form-data">
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="new_document" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new Document</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
      <?php
$con = mysqli_connect("localhost","root","","file_tracking_system");

$sql= "select * from audit_table";
$rs99=mysqli_query($con,$sql);
$cm=mysqli_num_rows($rs99);
if($cm>0)
{
	$idi=$cm+1;
}
else
{
	$idi=1;
}

		  $d=date("d");
		  $m=date("m");
		  $y=date("y");
		  ?>
      <div class="modal-body">
             
              <div class="form-group">
                <label >Document Id</label>
               <input type="text" name="d_id" id="d_id" value="<?php echo "doc/".$y."/".$m."/".$d."/".$idi ?>" readonly="readonly"class="form-control" />
               <span id="doc_error" class="text-danger font-weight-bold">
              </div>
              <div class="form-group">
                <label >Reference Id</label>
                <input type="text" name="r_id" id="r_id" class="form-control" />
                <span id="ref_error" class="text-danger font-weight-bold">
              </div>
              <div class="form-group">
                <label >Subject of the document</label>
             <textarea name="subject" id="subject" cols="25" rows="3" class="form-control"></textarea>
             <span id="sub_error" class="text-danger font-weight-bold">
               
              </div>
              <div class="form-group">
                <label >Branch</label>
                            <?php $sql=mysqli_query($con,"select * from branch_table");
echo "<select name='branch' id='branch' class='form-control'>";

      while($row=mysqli_fetch_row($sql))
{
	
 echo "<option value=$row[0]>$row[1]</option>";
}

echo "</select>";
?>
<span id="branch_error" class="text-danger font-weight-bold">
              </div>
              <div class="form-group">
                <label >Select File</label>
              <input type="file" name="file" id="file" class="form-control"/>
               <span id="file_error" class="text-danger font-weight-bold">
              </div>
            
           
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="submit"  class="btn btn-primary" value="Save Data" />
      </div>
      
    </div>
  </div>
</div>


	<div class="container">
    	<div class="jumbotorn">
        	<div class="card">
            <h2>Add New Document</h2>
            </div>
            <div class="card">
            	<div class="card-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new_document">New Document
  
</button>
                </div>
            
            </div>
        </div>
	</div>
     </form>
</body>

<script src="../jquerylibrary/jquery-3.3.1.js"></script>
<script type="text/javascript" language="javascript">



$(function(){


	$("#ref_error").hide();
	$("#sub_error").hide();
	$("#branch_error").hide();
	$("#file_error").hide();
	

	var error_ref = false;
	var error_sub = false;
	var error_branch = false;
	var error_file = false;
	
	
//	var did = $("#d_id").val()
//	$("#d_id").css("border-bottom-color","#00FF00");
	
	
	$("#r_id").focusout(function(){
		check_rid();
	});
	
	
	$("#subject").focusout(function(){
		check_subject();
	});
	
	
	$("#branch").focusout(function(){
		check_branch();
	});
	
	
	$("#file").focusout(function(){
		check_file();
	});
	
	
	function check_rid(){
		var rcode = $("#r_id").val()
		if( rcode !==''){
			$("#ref_error").hide();
			$("#user_code").css("border-bottom-color","#00FF00");
		}
		else{
		$("#ref_error").html("Required this field");
		$("#ref_error").show();
		$("#r_id").css("border-bottom", "2px #F00");
		error_ref = true;
		}
	}
	
	
	function check_subject(){
		var subcode = $("#subject").val()
		if( subcode !==''){
			$("#sub_error").hide();
			$("#subject").css("border-bottom-color","#00FF00");
		}
		else{
		$("#sub_error").html("Required this field");
		$("#sub_error").show();
		$("#subject").css("border-bottom", "2px #F00");
		error_sub = true;
		}
	}
	
	
	function check_branch(){
		var bcode = $("#branch").val()
		if( bcode !==''){
			$("#branch_error").hide();
			$("#branch").css("border-bottom-color","#00FF00");
		}
		else{
		$("#branch_error").html("Required this field");
		$("#branch_error").show();
		$("#branch").css("border-bottom", "2px #F00");
		error_branch = true;
		}
	}
	
	
	function check_file(){
		var bcode = $("#file").val();
		if( bcode !==''){
			$("#file_error").hide();
			$("#file").css("border-bottom-color","#00FF00");
		}
		else{
		$("#file_error").html("Please select a file");
		$("#file_error").show();
		$("#file").css("border-bottom", "2px #F00");
		error_file = true;
		}
	}
	
	$("#file_upload").submit(function(){
	
	 error_ref = false;
	 error_sub = false;
	 error_branch = false;
	 error_file = false;
	
	
	check_rid();
	check_subject();
	check_branch();
	check_file();
	
	
if( error_ref === false && error_sub === false && error_branch === false && error_file === false )
{
	return true;
}
else
{
	return false;
}
	
	});
});

</script>

</html>
<?php
}
?>
