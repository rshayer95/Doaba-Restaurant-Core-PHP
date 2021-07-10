<?php
require '../inc/connect.php';
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
<title>Doaba Restaurant Admin</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" type="text/css" href="css/template.css" />
<link rel="stylesheet" type="text/css" href="css/header.css" />
<link rel="stylesheet" type="text/css" href="../font-awesome/web-fonts-with-css/css/fontawesome-all.css" />
<script src="scripts/template.js"></script> 
 
</head>

<body>
<div class="wrapper">
<button type="button" id="toggle" onclick="openit(menu)">
  <span></span>
<span></span>
<span></span>
  </button>
 <center>  <a href="../index.php"><img src="../img/logo.jpg" /></a>
    </center>
    <div ></div>
<div id="menu" data-opened="no" class="menu">
 
<ul>

<li><a href="dashboard.php"><i class="fas fa-chart-line"></i>Dashboard </a> </li>
 <li><a href="addcategory.php" ><i class="fas fa-plus"></i>Add Category </a> </li>
 <li><a href="addmenu.php" ><i class="fas fa-clipboard"></i>Add Menu  </a> </li>
 <li><a href="addblogs.php" ><i class="fas fa-edit"></i>Add Blogs  </a> </li>
 <li><a href="addvideo.php" ><i class="fas fa-play"></i>Add Vidoes  </a> </li>
 <li><a href="blog-manager.php"><i class="fab fa-blogger"></i>Blogs</a> </li>
 <li><a href="video-manager.php"><i class="fas fa-play"></i>Videos</a> </li>
 <li><a href="menu-manager.php"><i class="fas fa-clipboard"></i>Menu</a> </li>
 <li><a href="category-manager.php"><i class="fas fa-list"></i>Categories</a> </li>
 <li><a href="orders-manager.php" ><i class="fas fa-bicycle"></i>Orders </a> </li>
 <li><a href="jobs-manager.php" ><i class="fas fa-briefcase"></i>Job Requests  </a> </li>
 <li><a href="training-manager.php"><i class="fas fa-graduation-cap"></i>Training Applications</a> </li>
 <li><a href="user-manager.php"><i class="fas fa-user"></i>Users</a> </li>
 <li><a href="messages.php" ><i class="fas fa-envelope"></i>Messages</a> </li>
 
 <li><form method="post"><button type="submit" name="logout"><i class="fas fa-external-link-alt"></i>Logout </button></form></li>
</ul>
 
</div>
 </div>	 
 
 <div class="main-content" id="maincontent">