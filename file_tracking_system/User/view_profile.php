<?php
if(session_status()==PHP_SESSION_NONE){
	session_start();
}
if(!isset($_SESSION['uname']))
header("Refresh:0;user_login.php");
else
{
	include("connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark"">
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
     
    <ul class="nav navbar-nav navbar-right">    
       <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            Setting
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">View Profile</a>
            <a class="dropdown-item" href="#">Change Password</a>
            <a class="dropdown-item" href="#">Sign Out</a>
          </div>
   		</li>
    </ul>  
</div>
  
  
</nav>


<?php
$user = $_SESSION['uname'];

$sql = "select userid,name,gender,email,mobile,branch_table.branch_name,designation_table.design_name,user.branch_id,user.design_id from user,branch_table,designation_table where user.branch_id = branch_table.branch_id and user.design_id = designation_table.design_id and user.userid='$user'";

$sql1 = mysqli_query($con,$sql);

$rs = mysqli_fetch_row($sql1);

$branch = $rs[7];

$desig = $rs[8];

$gender = $rs[2];




?>
	<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
    <br>
    <br>
    <h2 align="center">Update Profile</h2>
    <br>
     <center><div id="message"></div></center>
    <form onsubmit="return validate()" id="b1" name="b1" method="post" action="">
      <table  border="0" align="center" width="500">
        <tr>
          <th>User ID</th>
          <td >
          <input type="text" name="user_code" id="user_code" class="form-control" value="<?php echo $rs[0]; ?>"/></td>
          </tr><tr><td></td>
         <td><span id="user_code_error" class="text-danger font-weight-bold"></span></td>
        </tr>
        <tr>
          <th>User Name</>
          <td >
          <input type="text" name="user_name" id="user_name" class="form-control" value="<?php echo $rs[1]; ?>"/></td>
          </tr><tr><td></td>
           <td><span id="user_name_error" class="text-danger font-weight-bold"></span></td>
        </tr>
        <tr>
          <th>Gender</th>
          <td><p>
          <?php
		  if($gender=="Male")
		  {
			  ?>
               <input type="radio" name="RadioGroup1" value="Male" id="RadioGroup1_1" checked="checked"/>
                Male
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="RadioGroup1" value="Female" id="RadioGroup_2" />
				Female
		<?php
		  }
		  else
		  {
			  ?>
			<input type="radio" name="RadioGroup1" value="Male" id="RadioGroup1_1" />
                Male
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="RadioGroup1" value="Female" id="RadioGroup_2" checked="checked"/>
				Female
          <?php
		  }
		  ?>
              </p></td>
          </tr> 
        <tr>
          <th>Email ID</th>
          <td >
          <input type="text" name="user_email" id="user_email" class="form-control" value="<?php echo $rs[3]; ?>"/></td>
          </tr><tr><td></td>
           <td><span id="user_email_error" class="text-danger font-weight-bold"></span></td>
        </tr>
         <tr>
          <th>Mobile Number</th>
          <td >
          <input type="text" name="mobile_no" id="mobile_no" class="form-control" value="<?php echo $rs[4]; ?>"/></td>
          </tr><tr><td></td>
           <td><span id="user_mobile_error" class="text-danger font-weight-bold"></span></td>
        </tr>
         <tr>
           <th>Branch Name</th>
           <td ><?php $sql=mysqli_query($con,"select * from branch_table");
echo "<select name='branch' id='branch' class='form-control'>";

      while($row=mysqli_fetch_row($sql))
	{
		if($branch==$row[0])
		{
			echo "<option value='$row[0]' selected='selected'>$row[1]</option>";
		}
		else
		{
			echo "<option value='$row[0]'>$row[1]</option>";
		}
	
	}

echo "</select>";
	  ?></td>
         </tr>
         <tr><td></td>
           <td><span id="branch_error" class="text-danger font-weight-bold"></span></td></tr>
         <tr>
           <th>Designation</th>
           <td ><?php $sql=mysqli_query($con,"select * from designation_table");
echo "<select name='designation' id='designation' class='form-control'>";

      while($row=mysqli_fetch_row($sql))
{
	if($desig==$row[0])
		{
			echo "<option value='$row[0]' selected='selected'>$row[1]</option>";
		}
		else
		{
			echo "<option value='$row[0]'>$row[1]</option>";
		}
	
 
}

echo "</select>";
	  ?></td>
      <tr><td></td>
           <td><span id="desg_error" class="text-danger font-weight-bold"></span></td>
         
         </tr>
         </tr>
         
        
      </table>
      <center>
      <br />
      <input type="submit" name="submit" id="button" value="Update Profile" class="btn btn-success"/>
       <br>
      <br />
     
      </center>
 
      </form>
     
    </div>

    <center><div class="col-md-2"></center></div>
    </div>


<script type="text/javascript" src="../jquerylibrary/jquery-3.3.1.js"></script>
<script type="text/javascript" language="javascript" >
$(document).ready(function() {
	$('#button').click(function(prevent){
	event.preventDefault();
	$("#user_code_error").hide();
	$("#user_name_error").hide();
	$("#user_email_error").hide();
	$("#user_mobile_error").hide();
	$("#branch_error").hide();
	$("#desg_error").hide();
	
	
	var error_ucode = false;
	var error_uname = false;
	var error_email = false;
	var error_mobile = false;
	var error_branch = false;
	var error_desg = false;
	
	
	
	$("#user_code").focusout(function(){
		check_ucode();
	});
	
	$("#user_name").focusout(function(){
		check_uname();
	});
	
	$("#user_email").focusout(function(){
		check_email();
	});
	
	$("#mobile_no").focusout(function(){
		check_mobile();
	});
	
	$("#branch").focusout(function(){
		check_branch();
	});
	
	$("#designation").focusout(function(){
		check_desg();
	});
	

	
	
	function check_ucode(){
		var ucode = $("#user_code").val()
		if( ucode !==''){
			$("#user_code_error").hide();
			$("#user_code").css("border-bottom-color","#00FF00");
		}
		else{
		$("#user_code_error").html("Required this field");
		$("#user_code_error").show();
		$("#user_code").css("border-bottom", "#F00");
		error_ucode = true;
		}
	}

	function check_uname(){
		var pattern = /^[a-zA-Z ]+$/;
		var uname = $("#user_name").val();
		if( pattern.test(uname) && uname !=='')
		{
			$("#user_name_error").hide();
			$("#user_name").css("border-bottom","#00FF00");
		}
		else
		{
			$("#user_name_error").html("Should contain only charecters");
		$("#user_name_error").show();
		$("#user_name").css("border-bottom", "#F00");
		error_uname = true;
		}
	}
	
	function check_email()
	{
		var pattern = /^([a-z 0-9\.-]+)@([a-z0-9-]+).([a-z]{2,8})(.[a-z]{2,8})?$/;
		var email = $("#user_email").val();
		if( pattern.test(email) && email !=='')
		{
			$("#user_email_error").hide();
			$("#user_email").css("border-bottom-color","#00FF00");
		}
		else
		{
			$("#user_email_error").html("Invalid Email");
			$("#user_email_error").show();
			$("#user_email").css("border-bottom-color","2px #FF0000");
			error_email = true;
			}
	}
	
	function check_mobile(){
		var pattern = /^[7-9]\d{9}$/;
		var mobile = $("#mobile_no").val();
		if( pattern.test(mobile) && mobile !=='')
		{
			$("#user_mobile_error").hide();
			$("#mobile_no").css("border-bottom-color","#00FF00");
		}
		else{
			$("#user_mobile_error").html("Invalid Mobile Number");
			$("#user_mobile_error").show();
			$("#mobile_no").css("border-bottom-color","#FF0000");
			error_mobile = true;
			}
	}
	
	function check_branch(){
		var ucode = $("#branch").val();
		if( ucode !==''){
			$("#branch_error").hide();
			$("#branch").css("border-bottom-color","#00FF00");
		}
		else{
		$("#branch_error").html("Please select branch");
		$("#branch_error").show();
		$("#branch").css("border-bottom", "#F00");
		error_branch = true;
		}
	}
	
	function check_desg(){
		var ucode = $("#designation").val();
		if( ucode !==''){
			$("#desg_error").hide();
			$("#designation").css("border-bottom-color","#00FF00");
		}
		else{
		$("#desg_error").html("Please select branch");
		$("#desg_error").show();
		$("#designation").css("border-bottom", "#F00");
		error_desg = true;
		}
	}
	
	
	
	
	
	
	var error_ucode = false;
	var error_uname = false;
	var error_email = false;
	var error_mobile = false;
	var error_branch = false;
	var error_desg = false;
	
		
		check_ucode();
		check_uname();
		check_email();
		check_mobile();
		check_branch();
		check_desg();
		
		
		if( error_ucode ===false && error_uname === false && error_email ===false && error_mobile === false && error_branch === false && error_desg === false ){
	 

	
	$.ajax({
		url:"update_profile.php",
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

</body>
</html>
<?php
}
?>
