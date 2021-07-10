<?php

   require 'connect.php';
   $username_error=$password_error=$fail="";
   //Return Username Value
   function username()
   {
             $user = trim($_POST['username']);
             return $user;
   }
   //Return Password Value
   function password()
   {
          $pass = trim($_POST['password']);
          return $pass;
   }
   //Return Error Related to Username
   function username_error()
   {
        return "Please Enter your Username";
   }
   //Return Error Related to Password
   function password_error()
   {
        return "Please Enter Your Password";
   }
   //Return Error To Wrong Credentials
   function invalidpassword()
   {
       return 'Invalid Username/Password';
   }
   //Login Process
   if(isset($_POST['login']))
   {
       
        if(empty($_POST['username']))
        {
            $username_error = username_error();
            ?>
            <div id="fail" class="fail">
             <h6 id="user_error"><?php echo $username_error; ?></h6>
             <button type="button" id="close_error" onclick="close_fail()"><i class="fas fa-times-circle"></i></button>
            </div>
            <?php
        }   
        else
        {
            $username = username();
        }
        if(empty($_POST['password']))
        {
            $password_error = password_error();
            ?>
            <div id="fail" class="fail">
            <h6 id="pass_error"><?php echo $password_error; ?> </h6>
            <button type="button" id="close_error" onclick="close_fail()"><i class="fas fa-times-circle"></i></button>
            </div>
            <?php
        }
        else
        {
            $password = password();
        }
        

        if(!empty($username) && !empty($password))
        {
            if(filter_var($_POST['username'],FILTER_VALIDATE_EMAIL))
            {
             $check = "SELECT umail,upass FROM userinfo WHERE umail = '$username' AND upass = '$password'";
            }
             else
             {
               $check = "SELECT uname,upass FROM userinfo WHERE uname = '$username' AND upass = '$password'";  
             }
             
             if ($stmt = $conn->prepare($check)) {
                
                $stmt->execute(); 
                $stmt->store_result();
                $stmt->bind_result($username,$password);
                $stmt->fetch();
         
                if ($stmt->num_rows == 1) {
                     $_SESSION['username'] =$username;
                     header("refresh: 0");
                   
                }
                 else
                 {
                       
                     $fail= invalidpassword();
                     ?>
                      <div id="fail" class ="fail">
              <h6><?php echo $fail; ?> </h6>
              <button type="button" onclick="close_fail()" id="close-error"><i class="fas fa-times-circle"></i></button>      
    </div>
   <?php
                 }
             }
                   else
                   {
                       $fail="Something Went Wrong";
                   }
                    
            }
            else if(empty($username) && empty($password)) 
            {
                $fail = "Please Enter Username and Password";
            ?>
            <div id="fail" class="fail">
             <h6 id="user_error"><?php echo $fail; ?></h6>
             <button type="button" id="close_error" onclick="close_fail()" ><i class="fas fa-times-circle"></i>
             </button>
            </div>
            <?php
        }   
   }
?>
<!DOCTYPE html>
<html>
      <head>
           <meta charset="utf-8" />
           <meta name="viewport" content="width=device-width, initial-scsle=1.0" />
           <title>Doaba Restaurant</title>
           <link rel="stylesheet" type="text/css" href="../styles/header.css" />
           <link rel="stylesheet" type="text/css" href="../styles/template.css" />
           <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css" />
           <script src="../scripts/template.js"></script>
           <script>
          
function redirectme()
{
    window.location="signup.php";
}
                 
function close_fail()
{
    document.getElementById("fail").style.top="-100px";
    document.getElementById("fail").style.display = "none";
}
function sfp()
{
    var username = document.getElementById("username").value;
    if(username =="")
    {
        alert("PLease Enter Your Username");
    }
    else
    {
        window.location.assign("updatepassword.php?id="+username);
    }
	
}
function getp(input)
{
   input.style.cursor="pointer";
   input.style.color="#ff4d4d";
}
   
                 </script>
       
          </head>
  <body onload="popup()">
  
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
          <li><a href="menu.php"><i class="fas fa-clipboard"></i>Menu </a> </li>
          <li><a href="videos.php" ><i class="fas fa-play"></i>Vidoes </a> </li>
          <li><a href="gallery.php" ><i class="fas fa-images"></i>Gallery  </a> </li>
          <li><a href="blogs.php" ><i class="fas fa-edit"></i>Blogs  </a> </li>
          <li><a href="delivery.php" ><i class="fas fa-bicycle"></i>Delivery  </a> </li>
          <li><a href="jobs.php" ><i class="fas fa-briefcase"></i>Jobs  </a> </li>
          <li><a href="training.php"><i class="fas fa-graduation-cap"></i>Training </a> </li>
          <li><a href="contactus.php" ><i class="fas fa-envelope"></i>Contact Us </a> </li>
          
          <li><button type="button" id="login-click" onclick="showpop()"><i class="fas fa-user"> </i>Login</button></li>
          <li><button type="button" id="signup-click" onclick="redirectme()"><i class="fas fa-user-plus"></i>Sign Up </button></li>
         </ul>
          
         </div>
          </div>
          <div id="pop" class="popup" onclick="closepopup()">
       <div class="login-box">
             <header>
         <h1>Login</h1></header> 
         <div class="row">
              
              <input id="username" type="text" onblur="haveinput(this)" name="username" placeholder="Enter Your Username" />
              <i id="user" class="fas fa-user" ></i>
          </div><h6 id="user_error"></h6>
          <div class="row">
          <input id="password" type="password" onblur="havepassword(this)" name="password" placeholder="Enter Your Password" />
              <i id="pass" class="fas fa-lock" ></i>
          </div><h6 id="pass_error"><?php echo $password_error; ?> </h6>
          
         <div class="row"> <button type="button" id="cancel" onclick="closepop()" >Cancel</button>
         <button type="submit" name="login" id="login-btn">Login </button>
         </div>
         <a onclick="sfp()" onmouseover="getp(this)" >Forget Password ?</a>
      </div>
       </div>
    
         <div class="main-content">