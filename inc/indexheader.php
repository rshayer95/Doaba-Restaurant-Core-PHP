<?php
      //Connect With Server
      require 'inc/connect.php';
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
            <meta name="viewport" content="width=device-width , initial-scale=1.0" />
            <title>Doaba Restaurant </title>
            <link rel="stylesheet" type="text/css" href="styles/index.css" />
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css" />       
           <script src="scripts/index.js">
                  
                 </script>
                 <script>
                 
function close_fail()
{
    document.getElementById("fail").style.top="-100px";
    document.getElementById("fail").style.display = "none";
}
function redirectme()
{
    window.location="app/signup.php?p=index";
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
        window.location.assign("app/updatepassword.php?id="+username);
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
       <header class="wrapper">
       <nav>
         <a href="index.php"><img src="img/logo.jpg" /></a>
         <div class="log-grp">
            <button id="login" type="button" onclick = "showpop()"><i class="fas fa-user"></i>Login </button>
            <button id="signup" type="button" onclick="redirectme()"><i class="fas fa-user-plus"></i>Sign Up </button>
         </div>   
         </nav>
       </header>
       
       <div id="pop" class="popup" onclick="closepopup()">
       <div id="login-box" class="login-box">
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
      