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
<title>Update Document</title>
<!-- Latest compiled and minified CSS -->


</head>

<body>
 <form  name="file_upload" id="file_upload" method="post" action="update.php" enctype="multipart/form-data">
<!-- Button trigger modal -->


<!-- Modal -->

     
      <?php
	  include("connection.php");
$doc_id = $_GET['a'];
$ref_id = $_GET['b'];
$subject = $_GET['c'];
$branch = $_GET['f'];
$file = $_GET['e'];
$creator = $_GET['g'];
$user = $_SESSION['uname'];

if($creator!=$user)
{
$readonly = 'readonly';

}
else
{
	$readonly = '';
	
}



		  ?><div class="row">
          
          <div class="col-sm-3"></div>
      <div class="col-sm-6">
               <table align="center" >
              <div class="form-group">
            
                <label >Document Id</label>
               <input type="text" name="d_id" id="d_id" value="<?php echo $doc_id ?>" readonly="readonly"class="form-control" />
               <span id="doc_error" class="text-danger font-weight-bold"></span>
              </div>
              <div class="form-group">
                <label >Reference Id</label>
                <input type="text" name="r_id" id="r_id" class="form-control" value="<?php echo $ref_id ?>" <?php echo $readonly;?>/>
                <span id="ref_error" class="text-danger font-weight-bold"></span>
              </div>
              <div class="form-group">
                <label >Subject of the document</label>
             <textarea name="subject" id="subject" cols="25" rows="3" class="form-control" <?php echo $readonly;?>><?php echo $subject ?></textarea>
             <span id="sub_error" class="text-danger font-weight-bold"></span>
               
              </div>
              <div class="form-group">
                <label >Branch</label>
                            <?php $sql=mysqli_query($con,"select * from branch_table");
echo "<select name='branch' id='branch' class='form-control' disabled='' >";

      while($row=mysqli_fetch_row($sql))
{
	
 if($branch==$row[0])
		{
			echo   "<option value='$row[0]' selected='selected'>$row[1]</option>"  ;
		}
		else
		{
			echo  "<option value='$row[0]'>$row[1]</option>" ;
		}
}

echo "</select>";
?>
<span id="branch_error" class="text-danger font-weight-bold"></span>
              </div>
              <div class="form-group">
                <label >Selected File</label>
                <img src="files/<?php echo $file; ?>" style="width:80px; height:60px;" />
              <input type="text" name="file_name" id="file_name" class="form-control" value="<?php echo $file ?>" <?php echo $readonly;?>/>
               <span id="error" class="text-danger font-weight-bold"></span>
              </div>
            
           <div class="form-group">
                <label >Change File</label>
              <input type="file" name="file" id="file" class="form-control" />
               <span id="file_error" class="text-danger font-weight-bold"></span>
              </div>
            
  

</table>
<div class="modal-footer">
        
        <input type="submit" name="submit"  class="btn btn-primary" value="Update Data" />
      </div>
	</div>
    <div class="col-sm-3">
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
