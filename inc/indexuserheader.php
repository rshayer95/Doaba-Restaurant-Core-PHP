<?php
     require 'inc/connect.php';
     $name="";
     $path="";
     $s=$_SESSION['username'];
     $result = $conn -> query("SELECT * FROM userinfo WHERE uname = '$s' OR umail = '$s' ");
     
         if ($result ->num_rows ==1) {
              $row = $result -> fetch_assoc();
              
                   $name= $row["ufullname"];
                   
                   if(empty($row["profilepic"]))
                   {
                        $path= 'img/user.png';
                   }
                   else
                   {
                         $path = $row["profilepic"];
                   }
         }
         if(isset($_POST["logout"]))
         {
            session_destroy();
            session_unset();
            header("refresh:0");
         }
 
?>
<!DOCTYPE html>
<html>
      <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width , initial-scale=1.0" />
            <title>Doaba Restaurant </title>
            <link rel="stylesheet" type="text/css" href="styles/index.css" />
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css" />       
      </head>
<body>
      <form method="POST">
       <header class="wrapper">
       <nav>
         <a href="index.php"><img src="img/logo.jpg" /></a>
         <div class="log-grp">
            <a  href="app/profile.php"><img src='<?php echo $path; ?>' /> </a>
            <a href="app/profile.php"><?php echo $name; ?></a>
            <button id="login" style="font-weight:bolder;" type="submit" name="logout" >Logout </button>
         </div>   
         </nav>
       </header>
    