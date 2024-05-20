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
<?php
include("count_create.php");
include("receive_notification.php");
?>
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
        <a class="nav-link" href="track_file.php">Track File <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
     
    <ul class="nav navbar-nav navbar-right">    
       <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            Setting
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="view_profile.php">View Profile</a>
            <a class="dropdown-item" href="#">Change Password</a>
            <a class="dropdown-item" href="#">Sign Out</a>
          </div>
   		</li>
    </ul>  
</div>
  
  
</nav>


<div class="row" style="padding:20px"></div>

<div class="container">
<div class="row">    
    <div class="col-sm-4" >
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">Add New Document</h5>
            
            <a href="file_upload.php" class="btn btn-primary">Click Here</a>
          </div>
        </div>
    </div>
    <div class="col-sm-4" >
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">View Document</h5>
            
            <a href="view_files.php" class="btn btn-primary">Click Here</a>
          </div>
        </div>
    </div>
    <div class="col-sm-4" >
        <div class="card" style="width: 18rem;">
          <div class="card-body">
          <?php if($query3>0) {?>
            <h5 class="card-title" style="color:red">PENDING FILES TO SEND</h5>
          <div class="alert alert-danger">  <p class="card-text">You have <?php echo $query3 ?> pending files to send.</p>
            <a href="send_file.php" class="btn btn-light">Click Here</a>
            <?php
		  }
		  else{
			?>
             <h5 class="card-title" style="color:green">PENDING FILES TO SEND</h5>
          <div class="alert alert-success">  <p class="card-text">You have <?php echo $query3 ?> pending files to send.</p>
            <a href="send_file.php" class="btn btn-light">Click Here</a>
            <?php
		  }
		  ?>
          </div>
          </div>
        </div>
    </div>
</div>
</div>
</div>


<div class="row" style="padding:20px"></div>
<div class="container">
<div class="row">    
    <div class="col-sm-4" >
	
        <div class="card" style="width: 18rem; color:blue;">
		
          <div class="card-body">
		  
            <h5 class="card-title">Send Document</h5>
            
            <a href="send_file.php" class="btn btn-primary">Click Here</a>
			</div>
      
		  
        </div>
    </div>
    <div class="col-sm-4" >
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">Receive Document</h5>
           
            <a href="receive_view.php" class="btn btn-primary">Click Here</a>
          </div>
        </div>
    </div>
    <div class="col-sm-4" >
        <div class="card" style="width: 18rem;">
          <div class="card-body">
             <?php if($query13>0) {?>
            <h5 class="card-title" style="color:red">PENDING FILES TO RECEIVE</h5>
          <div class="alert alert-danger">  <p class="card-text">You have <?php echo $query13 ?> pending files to receive.</p>
            <a href="receive_view.php" class="btn btn-light">Click Here</a>
            <?php
		  }
		  else{
			?>
             <h5 class="card-title" style="color:green">PENDING FILES TO RECEIVE</h5>
          <div class="alert alert-success">  <p class="card-text">You have <?php echo $query13 ?> pending files to receive.</p>
            <a href="receive_view.php" class="btn btn-light">Click Here</a>
            <?php
		  }
		  ?>
          </div>
        </div>
    </div>
</div>
</div>



</div>
</div>

</body>
</html>