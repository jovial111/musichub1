<?php
session_start();
include('dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['ptmsaid']==0)) {
  header('location:logout.php');
  } else{
	  
if(isset($_POST['submit']))
  {
	  $img=$_FILES['coverimage']['name'];
	$target_dir = "coverimages/";
	 $target_file = $target_dir . basename($_FILES["coverimage"]["name"]);
	move_uploaded_file($_FILES['coverimage']['tmp_name'],$target_dir.$img);
	
	$song=$_FILES['songfile']['name'];
	$target_dir = "audio/";
	 $target_file = $target_dir . basename($_FILES["songfile"]["name"]);
	move_uploaded_file($_FILES['songfile']['tmp_name'],$target_dir.$song);
	  
	

    $songname=$_POST['songname'];
	$artist=$_POST['artist'];
	$composer=$_POST['composer'];
	$lyricist=$_POST['lyricist'];
	$director=$_POST['director'];
	$emotion=$_POST['emotion'];
	$lyrics=$_POST['lyrics'];
   
        $query=mysqli_query($con, "insert into  tblmusic(coverimage,songname,songfile,artist,composer,lyricist,director,emotion,lyrics) value('$img','$songname','$song','$artist','$composer','$lyricist','$director','$emotion','$lyrics')");
    if ($query) {
    
     echo '<script>alert("Music information has been added.")</script>';
  }
  else
    {
       echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }

  
}

  
  ?>
<!DOCTYPE html><html lang="en">

<head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width,initial-scale=1"><meta name="description" content="Listen App - Online Music Streaming App Template"><meta name="keywords" content="music template, music app, music web app, responsive music app, music, themeforest, html music app template, css3, html5"><title>Listen App - Online Music Streaming App</title><link href="images/logos/favicon.png" rel="icon"><link rel="apple-touch-icon" href="images/logos/touch-icon-iphone.png"><link rel="apple-touch-icon" sizes="152x152" href="images/logos/touch-icon-ipad.png"><link rel="apple-touch-icon" sizes="180x180" href="images/logos/touch-icon-iphone-retina.png"><link rel="apple-touch-icon" sizes="167x167" href="images/logos/touch-icon-ipad-retina.png"><link href="css/plugins.bundle.css" rel="stylesheet" type="text/css"><link href="css/styles.bundle.css" rel="stylesheet" type="text/css"><link rel="preconnect" href="https://fonts.googleapis.com/"><link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin><link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet"><link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet"><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]--></head><body><div id="line_loader"></div><div id="loader"><div class="loader"><div class="loader__eq mx-auto"><span></span> <span></span> <span></span> <span></span> <span></span> <span></span></div><span class="loader__text mt-2">Loading</span></div></div><div id="wrapper"><aside id="sidebar"><div class="sidebar-head d-flex align-items-center justify-content-between"><a href="index.html" class="brand external"><img src="images/logos/logo.svg" alt="Listen app"> </a><a href="javascript:void(0);" role="button" class="sidebar-toggler" aria-label="Sidebar toggler"><div class="d-none d-lg-block"><i class="ri-menu-3-line sidebar-menu-1"></i> <i class="ri-menu-line sidebar-menu-2"></i></div><i class="ri-menu-fold-line d-lg-none"></i></a></div><div class="sidebar-body" data-scroll="true">
	<nav class="navbar d-block p-0">
				<ul class="navbar-nav">
					<li class="nav-item"><a href="home.php" class="nav-link d-flex align-items-center " target="_self"><i class="ri-home-4-line fs-5"></i> <span class="ps-3">Home</span></a></li>
					<li class="nav-item"><a href="add-music.php" class="nav-link d-flex align-items-center active" target="_self"><i class="ri-disc-line fs-5"></i> <span class="ps-3">Add Music</span></a></li>
					<li class="nav-item"><a href="music.php" class="nav-link d-flex align-items-center" target="_self"><i class="ri-music-2-line fs-5"></i> <span class="ps-3">Music</span></a></li>	
				</ul>
				</nav>
	</div></aside>
	<header id="header">
	<div class="container">
	<div class="header-container"><div class="d-flex align-items-center"><a href="javascript:void(0);" role="button" class="header-text sidebar-toggler d-lg-none me-3" aria-label="Sidebar toggler"><i class="ri-menu-3-line"></i></a><form action="#" id="search_form" class="me-3"><label for="search_input"></label> <input type="text" placeholder="" id="search_input" class="form-control form-control-sm"></form>
	<?php $userid = $_SESSION['ptmsaid']; 
						$query = mysqli_query($con,"select * from tbluser where id='$userid'");
						$cnt=1;
						while ($row=mysqli_fetch_array($query)) {
						?>
						<div class="d-flex align-items-center">
							<div class="dropdown ms-3 ms-sm-4">
								<a href="javascript:void(0);" class="avatar header-text" role="button" id="user_menu" data-bs-toggle="dropdown" aria-expanded="false">
									<div class="avatar__image">
									<img src="images/users/user.png" alt="user">
									</div>
									<span class="ps-2 d-none d-sm-block"><?php  echo $row['email'];?></span>
								</a>
								<ul class="dropdown-menu dropdown-menu-md dropdown-menu-end" aria-labelledby="user_menu">
								
								
	
								<li><a class="dropdown-item d-flex align-items-center external text-danger" href="index.html"><i class="ri-logout-circle-line fs-5"></i> <span class="ps-2">Logout</span></a></li>
							</ul>
							</div>
						</div>
						<?php 
							$cnt=$cnt+1;
						}?>
	
	</div></div>
	</div>
	</header><main id="page_content"><div class="hero" style="background-image: url(images/banner/song.jpg);"></div><div class="under-hero container"><div class="section"><div class="row"><div class="col-xl-7 col-md-10 mx-auto"><div class="card"><div class="card-header pb-0"><div class="mat-tabs"><ul class="nav nav-tabs" id="add_music" role="tablist"><li class="nav-item" role="presentation"><button class="nav-link active" id="music" data-bs-toggle="tab" data-bs-target="#music_pane" type="button" role="tab" aria-controls="music_pane" aria-selected="true">Add Music</button></li>
	<!--<li class="nav-item" role="presentation"><button class="nav-link" id="album" data-bs-toggle="tab" data-bs-target="#album_pane" type="button" role="tab" aria-controls="album_pane" aria-selected="false">Add Album</button></li>-->
	</ul></div></div><div class="card-body"><div class="tab-content" id="add_music_content"><div class="tab-pane fade show active" id="music_pane" role="tabpanel" aria-labelledby="music" tabindex="0">
	<form action="#" method="post" class="row" enctype="multipart/form-data">
		<div class="col-12 mb-4">
		<!--<div class="dropzone text-center" name="coverimage" id="coverimage">
			<div class="dz-message" >
				<i class="ri-upload-cloud-2-line fs-2 text-dark"></i> <span class="d-block fs-6 mt-2">Drag & Drop or click to Upload</span> <span class="d-block form-text mb-4">320x320 (Max: 120KB)</span> 
				<button type="button" class="btn btn-light-primary">Upload cover image</button>
			</div>
		</div>-->
		<div class="col-12 mb-4">
			<label for="song_file_1" class="form-label">Cover Image</label> 
			<input type="file" id="coverimage" name="coverimage" class="form-control">
		</div>
		</div>
		<div class="col-12 mb-4">
			<input type="text" class="form-control" id="songname" name="songname" placeholder="Song name">
		</div>
		<div class="col-12 mb-4">
			<label for="song_file_1" class="form-label">Song file</label> 
			<input type="file" id="songfile" name="songfile" class="form-control">
		</div>
		<div class="col-sm-6 mb-4">
			<input type="text" class="form-control" id="artist" name="artist" placeholder="Artist">
		</div>
		<div class="col-sm-6 mb-4">
			<input type="text" class="form-control" id="composer" name="composer" placeholder="Composer">
		</div>
		<div class="col-sm-6 mb-4">
			<input type="text" class="form-control" id="lyricist" name="lyricist" placeholder="Lyricist">
		</div>
		<div class="col-sm-6 mb-4">
			<input type="text" class="form-control" id="director" name="director" placeholder="Music director">
		</div>
	<div class="col-12 mb-4">
	<select class="form-select" id="emotion" name="emotion" aria-label="Select category">
	<option selected="selected" disabled="disabled" hidden>Select Emotion</option>
	<option value="joy">Joy</option>
	<option value="fear">Fear</option>
	<option value="anger">Anger</option>
	<option value="sadness">Sadness</option>
	<option value="disgust">Disgust</option>
	<option value="shame">Shame</option>
	<option value="guilt">Guilt</option>
	</select>
	</div>
	<div class="col-12 mb-4">
		<textarea name="lyrics" id="lyrics" name="lyrics" cols="30" rows="4" class="form-control" placeholder="Lyrics"></textarea>
	</div>
	<div class="col-12 mb-4">
		<input type="submit" class="btn btn-primary" style="min-width: 140px;" id="submit" name="submit" value="Add Music">
		<input type="reset" class="btn btn-primary" style="min-width: 140px;" value="Reset">
	</div>
	</form>
	</div>
	
	</div>
	</div>
	</div></div></div></div></div><footer id="footer"><div class="container"><div class="text-center mb-4"><a href="" class="display-5 email">info@listenapp.com</a></div><div class="app-btn-group pt-2"><a href="#" class="btn btn-lg btn-primary"><div class="btn__wrap"><i class="ri-google-play-fill"></i> <span class="ms-2">Google Play</span></div></a><a href="#" class="btn btn-lg btn-primary"><div class="btn__wrap"><i class="ri-app-store-fill"></i> <span class="ms-2">App Store</span></div></a></div></div></footer></main></div>
	
	<div id="backdrop"></div><script src="js/plugins.bundle.js"></script><script src="js/scripts.bundle.js"></script></body>

</html>
<?php }  ?>