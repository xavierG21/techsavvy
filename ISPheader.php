<?php 
session_start();
include "include/config.php";
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Xavier ISP | Speeds at an Affordable Price</title>

<!-- Google fonts -->
<link href='http://fonts.googleapis.com/css?family=Raleway:300,500,800|Old+Standard+TT' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:300,500,800' rel='stylesheet' type='text/css'>

<!-- font awesome -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">



<!-- bootstrap -->
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />

<!-- uniform -->
<link type="text/css" rel="stylesheet" href="assets/uniform/css/uniform.default.min.css" />

<!-- animate.css -->
<link rel="stylesheet" href="assets/wow/animate.css" />


<!-- gallery -->
<link rel="stylesheet" href="assets/gallery/blueimp-gallery.min.css">


<!-- favicon -->
<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
<link rel="icon" href="images/favicon.png" type="image/x-icon">

<link rel="stylesheet" href="assets/style.css">
<!-- linking with the jquery ui to be able to use the jquery special widjets -->
<link rel="stylesheet" type="text/css" href="jquery-ui-1.12.1/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="jquery-ui-1.12.1/jquery-ui.structure.css">
<link rel="stylesheet" type="text/css" href="jquery-ui-1.12.1/jquery-ui.theme.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src='https://cdn.rawgit.com/admsev/jquery-play-sound/master/jquery.playSound.js'></script>
<style>
     @media all and (min-width: 480px) {
    .deskContent {display:block;}
    .phoneContent {display:none;}
}

@media all and (max-width: 479px) {
    .deskContent {display:none;}
    .phoneContent {display:block;}
}
</style>
</head>

<body id="home" style="background-color:#252423">
<!-- top 
  <form class="navbar-form navbar-left newsletter" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Enter Your Email Id Here">
        </div>
        <button type="submit" class="btn btn-inverse">Subscribe</button>
    </form>
 top -->

<!-- header -->
<nav class="navbar navbar-default" role="navigation" style="background-color: #252423; height: 100px">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display 
    <div class="navbar-header" align="center">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      -->
      <a class="phoneContent" href="index.php"><img src="images/Logo/newTechsavvyLogo.png" style="margin-left: 80px;"></a>
      <!--<div class="navbar-brand" id="FontBanner"><p>Techsavvy</p></div>-->
      <a class="deskContent" href="index.php"><img src="images/Logo/techSavvy-removebg-preview.png" 
      style="background-color: #252423;
      height: 330px;
      width: 700px;
      margin-top: -80px;
      margin-left: 220px;"></a> 
      </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-2" >
    <!--  
      <ul class="nav navbar-nav">        
        <li><a href="index.php">Home </a></li>
        <li><a href="ISPPage2.php">Page 2 Frames</a></li>        
        <li><a href="ISPPage3.php">Page 3 Frames</a></li>
        <li><a href="ISPCreateCustomerForm.php">Create Customer Form</a></li>
        <li><a href="admin/"><i class="fa fa-user"></i></a></li>
      </ul>
     --> 
    </div><!-- Wnavbar-collapse -->
  </div><!-- container-fluid -->
</nav>
<!-- header -->

