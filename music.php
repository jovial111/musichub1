<?php
session_start();
include('dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['ptmsaid']==0)) {
  header('location:logout.php');
  } else{
	  
if(isset($_POST['submit']))
  {
	$searchtext=$_POST['search_input'];
        $query=mysqli_query($con, "insert into  tblsearch(searchtext) value('$searchtext')");
    if ($query) {
    
     //python code
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
<meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width,initial-scale=1"><meta name="description" content="Listen App - Online Music Streaming App Template"><meta name="keywords" content="music template, music app, music web app, responsive music app, music, themeforest, html music app template, css3, html5"><title>Listen App - Online Music Streaming App</title><link href="images/logos/favicon.png" rel="icon"><link rel="apple-touch-icon" href="images/logos/touch-icon-iphone.png"><link rel="apple-touch-icon" sizes="152x152" href="images/logos/touch-icon-ipad.png"><link rel="apple-touch-icon" sizes="180x180" href="images/logos/touch-icon-iphone-retina.png"><link rel="apple-touch-icon" sizes="167x167" href="images/logos/touch-icon-ipad-retina.png"><link href="css/plugins.bundle.css" rel="stylesheet" type="text/css"><link href="css/styles.bundle.css" rel="stylesheet" type="text/css"><link rel="preconnect" href="https://fonts.googleapis.com/"><link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin><link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet"><link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet"><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<div id="line_loader"></div>
	<div id="loader">
	<div class="loader">
	<div class="loader__eq mx-auto">
	<span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
	</div>
	<span class="loader__text mt-2">Loading</span>
	</div></div>
	<div id="wrapper">
		<aside id="sidebar">
			<div class="sidebar-head d-flex align-items-center justify-content-between">
			<a href="index.html" class="brand external">
				<img src="images/logos/logo.svg" alt="Listen app"> 
			</a>
			<a href="javascript:void(0);" role="button" class="sidebar-toggler" aria-label="Sidebar toggler">
				<div class="d-none d-lg-block">
					<i class="ri-menu-3-line sidebar-menu-1"></i> 
					<i class="ri-menu-line sidebar-menu-2"></i>
				</div>
				<i class="ri-menu-fold-line d-lg-none"></i>
			</a>
			</div>
			<div class="sidebar-body" data-scroll="true">
				<nav class="navbar d-block p-0">
				<ul class="navbar-nav">
					<li class="nav-item"><a href="home.php" class="nav-link d-flex align-items-center " target="_self"><i class="ri-home-4-line fs-5"></i> <span class="ps-3">Home</span></a></li>
					<li class="nav-item"><a href="add-music.php" class="nav-link d-flex align-items-center" target="_self"><i class="ri-disc-line fs-5"></i> <span class="ps-3">Add Music</span></a></li>
					<li class="nav-item"><a href="music.php" class="nav-link d-flex align-items-center active" target="_self"><i class="ri-music-2-line fs-5"></i> <span class="ps-3">Music</span></a></li>
					
	
				</ul>
				</nav>
			</div>
	
			<div class="sidebar-foot">
				<a href="add-music.php" class="btn btn-primary d-flex" target="_blank"><div class="btn__wrap"><i class="ri-music-fill"></i> <span>Add Music</span></div></a>
			</div>
		</aside>
		<header id="header">
			<div class="container">
				<div class="header-container">
					<div class="d-flex align-items-center">
						<a href="javascript:void(0);" role="button" class="header-text sidebar-toggler d-lg-none me-3" aria-label="Sidebar toggler"><i class="ri-menu-3-line"></i></a>
						<form action="#"  method="post" id="search_form" class="me-3">
						
							<label for="search_input"><i class="ri-search-2-line"></i></label> 
							<div class="row">
							<div class="col-10">
							<input type="text" placeholder="Type anything to get result and hit enter..." id="search_input" name="search_input" class="form-control form-control-sm">
							</div>
							<div class="col-2">
		<input type="submit" class="btn btn-primary" style="min-width: 140px;" id="submit" name="submit" value="">
		
		
		</div>
	</div>
						</form>
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
					</div>
				</div>
			</div>
		</header>
	
		<main id="page_content">
			<div class="hero" style="background-image: url(images/banner/home.jpg);"></div>
			<div class="under-hero container">
			
				<div class="section">
					<div class="section__head align-items-center">
						<span class="d-block pe-3 fs-6 fw-semi-bold">Songs in the list</span>
					</div>
						
					<div class="list">
					
						<div class="row">
						
							<div class="col-xl-6">
								<?php 
						$query = mysqli_query($con,"select * from tblmusic");
						$cnt=1;
						while ($row=mysqli_fetch_array($query)) {
						?>
								<div class="list__item" data-song-id="<?php  echo $row['id'];?>" data-song-name="<?php  echo $row['songname'];?>" data-song-artist="<?php  echo $row['artist'];?>" data-song-album="<?php  echo $row['album'];?>" data-song-url="audio/<?php  echo $row['songfile'];?>" data-song-cover="coverimages/<?php  echo $row['coverimage'];?>">
								<div class="list__cover">
									<img src="coverimages/<?php  echo $row['coverimage'];?>" alt="<?php  echo $row['songname'];?>"> <a href="javascript:void(0);" class="btn btn-play btn-sm btn-default btn-icon rounded-pill" data-play-id="<?php  echo $row['id'];?>" aria-label="Play pause"><i class="ri-play-fill icon-play"></i> <i class="ri-pause-fill icon-pause"></i></a>
								</div>
								<div class="list__content">
									<a href="song-details.html" class="list__title text-truncate"><?php  echo $row['songname'];?></a><p class="list__subtitle text-truncate"><a href="artist-details.html"><?php  echo $row['artist'];?></a></p>
								</div>
								
								<ul class="list__option">
									
									<li class="dropstart d-inline-flex"><a class="dropdown-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-label="Cover options" aria-expanded="false"><i class="ri-more-fill"></i></a><ul class="dropdown-menu dropdown-menu-sm"><li><a class="dropdown-item" href="javascript:void(0);" role="button" data-play-id="1">Play</a></li></ul></li>
									</ul>
								</div>
						<?php } ?>
									</div></div></div></div>
			</div>
			
			<footer id="footer"><div class="container"><div class="text-center mb-4"><a href="" class="display-5 email">info@listenapp.com</a></div><div class="app-btn-group pt-2"><a href="#" class="btn btn-lg btn-primary"><div class="btn__wrap"><i class="ri-google-play-fill"></i> <span class="ms-2">Google Play</span></div></a><a href="#" class="btn btn-lg btn-primary"><div class="btn__wrap"><i class="ri-app-store-fill"></i> <span class="ms-2">App Store</span></div></a></div></div></footer></main></div><div id="player"><div class="container"><div class="player-container"><div class="player-progress"><progress class="amplitude-buffered-progress player-progress__bar" value="0"></progress><progress class="amplitude-song-played-progress player-progress__bar"></progress><input type="range" class="amplitude-song-slider player-progress__slider" aria-label="Progress slider"></div><div class="cover d-flex align-items-center"><div class="cover__image"><img data-amplitude-song-info="cover_art_url" src="images/cover/small/1.jpg" alt=""></div><div class="cover__content ps-3 d-none d-sm-block"><a href="song-details.html" class="cover__title text-truncate" data-amplitude-song-info="name"></a> <a href="artist-details.html" class="cover__subtitle text-truncate" data-amplitude-song-info="artist"></a></div></div>
	<div class="player-control">
	 <button type="button" class="amplitude-prev btn btn-icon" aria-label="Backward"><i class="ri-skip-back-mini-fill"></i></button> <button type="button" class="amplitude-play-pause btn btn-icon btn-default rounded-pill" aria-label="Play pause"><i class="ri-play-fill icon-play"></i> <i class="ri-pause-fill icon-pause"></i></button> <button type="button" class="amplitude-next btn btn-icon" aria-label="Forward"><i class="ri-skip-forward-mini-fill"></i></button> 

	</div><div class="player-info"><div class="me-4 d-none d-xl-block"><span class="amplitude-current-minutes"></span>:<span class="amplitude-current-seconds"></span> / <span class="amplitude-duration-minutes"></span>:<span class="amplitude-duration-seconds"></span></div><div class="player-volume dropdown d-none d-md-block"><button class="btn btn-icon" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-label="Volume" aria-expanded="false"><i class="ri-volume-mute-fill fs-5 d-none"></i> <i class="ri-volume-down-fill fs-5"></i> <i class="ri-volume-up-fill fs-5 d-none"></i></button><div class="dropdown-menu prevent-click"><input type="range" class="amplitude-volume-slider" value="50" min="0" max="100" aria-label="Volume slider"></div></div>

	</div>
	
	</div></div></div></div><div id="backdrop"></div><script src="js/plugins.bundle.js"></script><script src="js/scripts.bundle.js"></script></body>

</html>
<?php }  ?>