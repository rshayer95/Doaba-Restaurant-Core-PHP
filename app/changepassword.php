<?php
       session_start();
       require "../inc/connect.php";
       $user = "";
       $pass=$confirmpass=$success=$fail="";
       if(isset($_SESSION["change-pass"]))
       {
           $user= $_SESSION["change-pass"];
       }
       else
       {
           header("location: ../index.php");
       }
       if(isset($_POST["change"]))
       {
        if(empty ($_POST['newpass']))
        {
            echo '<script>alert("Please Enter Your Password"); </script>';
        }
        else
        {
            if(strlen($_POST['newpass']) > 7 && strlen($_POST['newpass']) < 16)
            {
                
                $confirmpass= trim($_POST['newpass']);
            }
            else
            {
                echo '<script>alert("Password Must Be between 8 to 15 characters");</script>';
              
                
            }
            
        }
        if(empty ($_POST['confirmpass']))
        {
            echo '<script>alert("Please fill this field"); </script>'; 
        }
        else
        {
            if($_POST['newpass'] ==$_POST['confirmpass'])
            {
                
              $pass= $confirmpass;  
             
              
            }
            else
            {
                echo '<script>alert("Passwords Does Not Match");</script>';
                
                
            }
            
        }
        if(!empty($confirmpass) && !empty($pass))
        {
            try
            {
                $sql="UPDATE userinfo SET upass = '$pass' WHERE upass='$user' ";
                if($conn ->query($sql) ===TRUE  )
                  {
                      $success ="Successfully Changed. ";
                      $fail = "NOTE: You have to login again now to see changes.";
                      session_destroy();
                      
                  }
                     
                  else
                  {
                     echo"Failed To Change Password";
                      
                  } 
            }
            catch (customException $e) {
                //display custom message
                echo $e->errorMessage();
              }
        }
       }
?>
<!DOCTYPE html>
<html>
<head>
<title> Password Update</title>
<style type="text/css">
/* css reset */

* {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
	font: inherit;
	vertical-align: baseline;
	font-family:'century gothic';
}
a
{
	color:#333;
}
/* css html document */
html,body
{
      margin:0 0 0 0;
	  padding:0 0 0 0;
	  
	  
}
html
{
	overflow-y:auto;
}
	::-webkit-scrollbar
    {
        width:5px;
        
        background-color: #f5f5f5;
        
    }
    ::-webkit-scrollbar-thumb
{
    
    background-color: #333;
    
}
html
{
    
	font-size:1em;
	overflow-x:hidden;
	overflow-y:auto;
	margin:0 0 0 0;
	padding:0 0 0 0;
}

.wrapper
{
     width:100%;
	 margin: 0 0 0 0;
	 
	 
	} 
.wrapper nav
{
       width:100%;
	   height:10vh;
	   top:0;
	   left:0;
	   right:0;
	 position:fixed;
	 display:flex;
	 align-items:center;
	 justify-content: flex-start;
	   background-color:#fff;
	   z-index:10;
	   box-shadow: 0 0px 2px 0 rgba(0,0,0,0.16) !important;
	 
}


.wrapper img
{
	height: 10vh;
	margin:0 0 0 2%;
	
}

.wrapper h1
{
	color:#333;
	font-size:2.5em;
	
	text-transform:uppercase;
}
.maincontent
{
   top:10vh;
   position:absolute;
   width:100%;
   display:flex;
   align-items:center;
   justify-content:center;
   
}
	
.maincontent .fpc
{
	width:50vw;
	margin:5% auto;
   background:#f9f9f9;
	display:flex;
	justify-content:center;
	flex-direction:column;
	align-items:center;
	padding:40px;
}
.maincontent .fpc input[type="submit"]
{
	width:200px;
	height:40px;
	margin:1px auto;
	outline:none;
	color:#fff;
    background:#ff4d4d;
    border:1px solid #ff4d4d;
	cursor:pointer;
}
.maincontent b
{
    font-weight:bold;
    margin:10px auto;
}
.maincontent .fpc h5
{
    color:#a6ce39;
}
.maincontent .fpc h6
{
    color:#ac1c1c;
}
.maincontent .fpc input
{
width:300px;
height:35px;
background:#f5f5f5;
border:1px solid #d1d1d1;
padding-left:10px;
margin:20px auto;
}
.maincontent .fpc input[type="submit"]:hover
{
    color:#333;
    border:1px solid #666;
    background:#e3e3e3;
}
.maincontent .fpc h1
{
	font-size:2em;
	text-transform:uppercase;
	color:#222;
}
.maincontent .fpc p
{
    color:#ff4d4d;
    font-size:bold;
    margin:10px auto;
}

    </style>

</head>
<body>
<script type="text/javascript">
function em(input)
{
    
    if(input.value !="")
        {
            
    input.focus = input.style.borderColor ="green";  
         input.focus = input.style.backgroundColor="rgba(0,255,0,0.04)";      
          input.focus = input.style.color ="green";   
            input.style.fontWeight ="";
        }
    else
        {
           input.value="";
        input.focus = input.style.borderColor ="red";  
          input.placeholder ="You Can't Leave This Field Empty";
           input.focus = input.style.backgroundColor="rgba(255,0,0,0.01)";      
           input.focus = input.style.color ="red";
            input.focus = input.style.fontWeight ="bold";
        
        }       
       
    
}
function passvalid(input)
{
    var regex = /[^A-Za-z0-9]+$/;
   
    input.value = input.value.replace(regex,"");
    if(input.value.replace(regex,""))
        {
            
    input.focus = input.style.borderColor ="green";  
         input.focus = input.style.backgroundColor="rgba(0,255,0,0.04)";      
          input.focus = input.style.color ="green";   
            input.style.fontWeight ="";
        }
    else
        {
           
        input.focus = input.style.borderColor ="red";  
          input.placeholder ="Spaces and Special Characters are not allowed";
           input.focus = input.style.backgroundColor="rgba(255,0,0,0.01)";      
           input.focus = input.style.color ="red";
            input.focus = input.style.fontWeight ="bold";
        
        }       
       
    
}
</script>
<header class="wrapper">
<nav>
<a href="../index.php"><img src="../img/logo.jpg" /></a>
</nav>

</header>
<div class="maincontent">
<form method="POST">
<div class="fpc">
<h1>Change Password </h1>

    <p>New Password </p>
    <input type="password" name="newpass" onkeyup="passvalid(this)" onblur="em(this)" placeholder="Enter Your New Password" /><br />
     <p>Confirm Password </p>
     <input type="password" name="confirmpass" onkeyup="passvalid(this)" onblur="em(this)" placeholder="Confirm Password" />
   <input type="submit" name="change" value="Change Password" />
   <h5><?php echo $success; ?></h5>
   <h6><?php echo $fail; ?></h6>
</div></form></div>
</body>
</html>

