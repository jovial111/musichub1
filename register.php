<?php
session_start();
include('dbconnection.php');
error_reporting(0);

if(isset($_POST['submit']))
  {
    $email=$_POST['email'];
    $pwd=md5($_POST['pwd']);
    $cpwd=$_POST['cpwd'];
  
    
   
        $query=mysqli_query($con, "insert into  tbluser(email,pwd,cpwd) value('$email','$pwd','$cpwd')");
    if ($query) {
    
     echo '<script>alert("User Registered Successfully.")</script>';
  }
  else
    {
       echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }

  
}

  
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="Listen App - Online Music Streaming App">
	<meta name="keywords" content="Music web app">
	<title>Listen App - Online Music Streaming App</title>
	<link href="images/logos/favicon.png" rel="icon">
	<link rel="apple-touch-icon" href="images/logos/touch-icon-iphone.png">
	<link rel="apple-touch-icon" sizes="152x152" href="images/logos/touch-icon-ipad.png">
	<link rel="apple-touch-icon" sizes="180x180" href="images/logos/touch-icon-iphone-retina.png">
	<link rel="apple-touch-icon" sizes="167x167" href="images/logos/touch-icon-ipad-retina.png">
	<link href="css/plugins.bundle.css" rel="stylesheet" type="text/css">
	<link href="css/styles.bundle.css" rel="stylesheet" type="text/css">
	<link rel="preconnect" href="https://fonts.googleapis.com/">
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
	<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<div id="line_loader">
	</div>
	<div id="loader">
		<div class="loader">
			<div class="loader__eq mx-auto">
				<span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
			</div>
			<span class="loader__text mt-2">Loading</span>
		</div>
	</div>
	<div id="wrapper">
		<div class="auth py-5">
			<div class="container">
				<div class="row">
					<div class="col-xl-5 col-lg-7 col-md-9 col-sm-11 mx-auto">
						<div class="card">
							<div class="card-body p-sm-5">
								<h4>Register with <span class="text-primary">Listen</span></h4>
								<p class="fs-6">It's time to join with Listen and gain full awesome music experience.</p>
								
								<form method="post" action="" class="mt-5" name="">
	<!--<div class="mb-5"><a href="javascript:void(0);" class="btn btn-default w-100"><div class="btn__wrap"><i class="ri-google-fill"></i> <span class="ms-2">Register with Google</span></div></a></div>
	<div class="mb-4"><div class="auth__or mx-auto fw-medium"></div></div>-->
	
									<div class="mb-3">
										<label for="email" class="form-label fw-medium">Email</label> 
										<input type="text" id="email" name="email" class="form-control" required>
									</div>
									<div class="mb-2">
										<label for="password" class="form-label fw-medium">Password</label> 
										<input type="password" id="pwd" name="pwd" class="form-control" required>
									</div>
									<div class="mb-3">
										<label for="c_password" class="form-label fw-medium">Confirm Password</label> 
										<input type="password" id="cpwd" name="cpwd" class="form-control" required>
									</div>
									 <span id='message'></span>
								
									<div class="mb-5">
										<input type="submit" class="btn btn-primary w-100" id="submit" name="submit" value="Register">
									</div>
									<p>Do you have an Account?<br><a href="login.php" class="fw-medium external">Login</a></p>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="js/plugins.bundle.js"></script>
	<script src="js/scripts.bundle.js"></script>
	<script>
	$('#pwd, #cpwd').on('keyup', function () {
  if ($('#pwd').val() == $('#cpwd').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else 
    $('#message').html('Not Matching').css('color', 'red');
});
</script>
</body>
</html>
