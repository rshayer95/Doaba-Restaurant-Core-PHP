<?php
require 'connect.php';
include 'user.php';
if(isset($_POST['logout']))
{
	session_unset();
	session_destroy();
	header("refresh: 0");
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Doaba Restaurant </title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" type="text/css" href="../styles/template.css" />
<link rel="stylesheet" type="text/css" href="../styles/header.css" />
<link rel="stylesheet" type="text/css" href=".https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css" />

<script src="../scripts/template.js"></script> 

</head>

<body>
<form method="POST">
<div class="wrapper">
<button type="button" id="toggle" value="" onclick="openit(menu)">
  <span></span>
<span></span>
<span></span>
  </button>
 <center>  <a href="../index.php"><img src="../img/logo.jpg" /></a>
    </center>
    <div ></div>
<div id="menu" data-opened="no" class="menu">
 
<ul>
<li><a href="profile.php"><img src="<?php echo "../".$path; ?>" /><?php echo $name; ?></a></li>
  <hr />
<li><a href="menu.php"><i class="fas fa-clipboard"></i>Menu </a> </li>
 <li><a href="videos.php" ><i class="fas fa-play"></i>Vidoes  </a></li>
 <li><a href="gallery.php" ><i class="fas fa-images"></i>Gallery  </a> </li>
 <li><a href="blogs.php" ><i class="fas fa-edit"></i>Blogs  </a> </li>
 <li><a href="delivery.php" ><i class="fas fa-bicycle"></i>Delivery  </a> </li>
 <li><a href="jobs.php" ><i class="fas fa-briefcase"></i>Jobs  </a> </li>
 <li><a href="training.php"><i class="fas fa-graduation-cap"></i>Training </a> </li>
 <li><a href="contactus.php" ><i class="fas fa-envelope"></i>Contact Us </a> </li>
 <li><a href="orders.php" ><i class="fas fa-cart-plus "></i>Your Orders </a> </li>
 <li><a href="bill.php" > <i class="fas fa-rupee-sign"></i>Your Bill </a> </li>
 <li><button type="submit" name="logout"><i class="fas fa-external-link-alt"></i>Logout </button></li>
</ul>
 
</div>
 </div>	 
 <div class="main-content" id="maincontent">
   