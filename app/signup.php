<?php
session_start();
 require '../inc/connect.php';
 error_reporting(0);
$userErr=$nameErr=$confirmErr=$emailErr=$passErr=$mobileErr=$quesErr=$ansErr=$genderErr="";
$username="";
$email="";
$pass="";
$mobile="";
$name="";
$question="";
$ans="";
$gender="";
$date = date("d-M-Y");
$success="";
$fail="";
$confirmpass="";
$redirect = "";
if($_GET["p"]=="" OR !$_GET["p"])
{
    $redirect="index";
}
else if($_GET["p"]=="index")
{
    $redirect="index";
}
else
{
    $redirect= $_GET["p"];
}
if(isset($_POST['signup']))
{
    
        if(empty ($_POST['uname']))
    {
        $userErr = "<p>Please Fill This Field </p>"; 
    }
    else
    {
        if(strlen($_POST['uname']) > 7 && strlen($_POST['uname']) < 16)
        {
            
           if(is_numeric($_POST['uname']))
        {
           $userErr = "<p>Please Use Some Characters for your Username </p>";
    
        }
              else{
                  $username = trim($_POST['uname']);
                  
              }
        }
      
        else
        {
            $userErr = "<p>Username Must be in between 8 to 15 characters </p>";
        }
        
    }
    
    
     if(empty ($_POST['uemail']))
    {
        $emailErr = "<p>Please Enter Your Email </p>"; 
    }
    else
    {
        if(!filter_var($_POST['uemail'],FILTER_VALIDATE_EMAIL))
        {
            
             $emailErr = "<p>Enter Valid Email Address</p>";
        }
        else
        {
           $email = trim($_POST['uemail']);
            
        }
        
    }
    
     if(empty ($_POST['upass']))
    {
        $passErr = "<p>Please Enter Your Password </p>"; 
    }
    else
    {
        if(strlen($_POST['upass']) > 7 && strlen($_POST['upass']) < 16)
        {
            
            $confirmpass= trim($_POST['upass']);
        }
        else
        {
            $passErr = "<p>Password Must Be between 8 to 15 characters</p>";
          
            
        }
        
    }
    if(empty ($_POST['confirmpass']))
    {
        $confirmErr = "<p>Please fill this field </p>"; 
    }
    else
    {
        if($_POST['upass'] ==$_POST['confirmpass'])
        {
            
          $pass= $confirmpass;  
        }
        else
        {
            $confirmErr = "<p>Passwords Does Not Match</p>";
            
            
        }
        
    }
    
    
    if(empty ($_POST['mobile']))
    {
        $mobile=""; 
    }
    else
    {
        if(strlen($_POST['mobile']) ==10)
        {
           
               $mobile = trim($_POST['mobile']);
        }
      
        else
        {
            $mobileErr = "<p>Enter 10 digit mobile number </p>";
        }
        
    }
    
    if(empty ($_POST['name']))
    {
        $nameErr ="<p>Please Enter Your Name </p>";
    }
    else
    {
            $name= trim($_POST['name']);
        
    }
    
    if(empty ($_POST['question']))
    {
        $quesErr ="<p>Please Select One Question</p>";
    }
    else
    {
       $question =$_POST['question'];
            
    }
    
        
         if(empty ($_POST['ans']))
    {
        $ansErr ="<p>Please Enter Your answer </p>";
    }
    else
    {
            $ans= trim($_POST['ans']);
        
    }
        
         if(empty ($_POST['gender']))
			 {
			   $genderErr="<p>Please Select Your Gender</p>";
			 }
			 else
			 {
			   if($_POST['gender'] =="Male")
               {
                   $gender="Male";
                   
               }
                 else if($_POST['gender']=="Female")
                 {
                    $gender="Female";                     
                 }
                 
			 }
    
    if(!empty($username) && !empty($email) && !empty($pass) && !empty($name) && !empty($question) && !empty($ans) && !empty ($gender))
    {
        
    
        
         
	$check = $conn ->query("SELECT uname,umail FROM userinfo WHERE uname = '$username' OR umail = '$email'");
    
        if ($check->num_rows > 0) {
             
             $fail="<p>Sorry !This account already registered</p>";
        }
         else
         {
              
        $sql = "INSERT INTO userinfo (uname, upass, umail, ufullname,ugender,umobile,ques,ans,regdate) VALUES ('$username','$pass','$email','$name','$gender','$mobile','$question','$ans','$date')";
  
    if($conn ->query($sql) ===TRUE  )
    {
        $_SESSION["username"] =$username;
        header("Location: uploadprofile.php?p=$redirect");
    }
       
    else
    {
        $fail="<p>Registration Failed </p>";
        
    } 
         }
	 
	}
	else
	{
		$fail="<p>Error </p>";
      
	}


	 
	 
     

	
	
   
    
       
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>Epic Punjab- Sign Up</title>
        
        <link rel="stylesheet" type="text/css" href="../styles/forms.css"/>
        <script type="text/javascript" >
        	function letters(input)
{
    var regex = /[^A-Za-z ]+$/;
   
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
          input.placeholder ="Only Alphabets are allowed";
           input.focus = input.style.backgroundColor="rgba(255,0,0,0.01)";      
           input.focus = input.style.color ="red";
            input.focus = input.style.fontWeight ="bold";
        
        }       
       
    
}
function uaddress(input)
{
    var regex = /^[A-Za-z0-9., ]+$/;
   
    input.value = input.value.match(regex);
    if(input.value.match(regex))
        {
            
    input.focus = input.style.borderColor ="green";  
         input.focus = input.style.backgroundColor="rgba(0,255,0,0.04)";      
          input.focus = input.style.color ="green";   
            input.style.fontWeight ="";
        }
    else
        {
           
        input.focus = input.style.borderColor ="red";  
          input.placeholder ="Special Characters Are Not Allowed";
           input.focus = input.style.backgroundColor="rgba(255,0,0,0.01)";      
           input.focus = input.style.color ="red";
            input.focus = input.style.fontWeight ="bold";
        
        }       
       
}
function unamevalid(input)
{
    var regex = /^[A-Za-z0-9._]+$/;
   
    input.value = input.value.match(regex);
    if(input.value.match(regex))
        {
            
    input.focus = input.style.borderColor ="green";  
         input.focus = input.style.backgroundColor="rgba(0,255,0,0.04)";      
          input.focus = input.style.color ="green";   
            input.style.fontWeight ="";
        }
    else
        {
           
        input.focus = input.style.borderColor ="red";  
          input.placeholder ="Special Characters and Spaces Are Not Allowed (._ is Allowed)";
           input.focus = input.style.backgroundColor="rgba(255,0,0,0.01)";      
           input.focus = input.style.color ="red";
            input.focus = input.style.fontWeight ="bold";
        
        }       
       
}


function uemailvalid(input)
{
    var regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
   
    input.value = input.value.match(regex);
    if(input.value.match(regex))
        {
            
    input.focus = input.style.borderColor ="green";  
         input.focus = input.style.backgroundColor="rgba(0,255,0,0.04)";      
          input.focus = input.style.color ="green";   
            input.style.fontWeight ="";
        }
    
    else
        {
           
        input.focus = input.style.borderColor ="red";  
          input.placeholder ="Enter Valid Email";
           input.focus = input.style.backgroundColor="rgba(255,0,0,0.01)";      
           input.focus = input.style.color ="red";
            input.focus = input.style.fontWeight ="bold";
        
        }       
       
    
}

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

function pincode(input)
{
    
    if(input.value.length ==10)
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
          input.placeholder ="Enter Ten Digit Mobile Number";
           input.focus = input.style.backgroundColor="rgba(255,0,0,0.01)";      
           input.focus = input.style.color ="red";
            input.focus = input.style.fontWeight ="bold";
        
        }  
    
    
       
    
}


function emcon(input)
{
    
    if(input.value.length ==10)
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
          input.placeholder ="Enter Ten Digit Mobile Number";
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
        
    </head>
  
    <body >    
        
        <form action="signup.php" method="POST"  >
            <div class="signup-box">
                <header><a href="../index.php"><img src="../img/logo.jpg" /></a></header>
               <div class="flex"> <div class="signup-left">
                    <label>Account Information</label><br /><br />
                    <p>Username</p>
                    <input type="text" name="uname" onkeyup="unamevalid(this)" onblur="em(this)" placeholder="Enter Username" />
                    <h6><?php echo $userErr; ?></h6>
                    <p>Email</p>
                    <input type="text" name="uemail" onblur="uemailvalid(this)" placeholder="Enter Email" />
                    <h6><?php echo $emailErr; ?></h6>
                    
                    <p>Password</p>
                    <input type="password" name="upass" onkeyup="passvalid(this)" onblur="em(this)" placeholder="Enter Password" />
                    <h6><?php echo $passErr; ?></h6>
                    <p>Confirm Password</p>
                    <input type="password" name="confirmpass" onkeyup="passvalid(this)"  onblur="em(this)" placeholder="Confirm Password" />
                    <h6><?php echo $confirmErr; ?></h6>
                    <p>Mobile</p>
                    <input type="text" name="mobile"  onblur="pincode(this)"  placeholder="Enter Mobile Number" />
                    <h6><?php echo $mobileErr; ?></h6>
                    
                </div>
                 <div class="signup-right">
                   <label>Personal Information</label><br /><br />
                    <p>Name</p>
                    <input type="text" id="name" maxlength="25" name="name" onkeyup="letters(this)" onblur="em(this)" placeholder="Enter Your Full Name" />
                    <h6><?php echo $nameErr; ?></h6>
                    
                    
<p>Select Your Security Question </p>                   
<select name="question" >
<option  value="q1" >Name of first pet ?</option>
<option  value="q2" >Name place of birth ?</option>
<option  value="q3" >Name of your favourite teacher ?</option>
<option  value="q4" >Place u like to visit commonly ?</option>
</select><br />
<h6><?php echo $quesErr; ?></h6>
<p>Your Answer</p>
<input type="text" name="ans" placeholder="Enter Your Answer"/><br>
<h6><?php echo $ansErr; ?></h6>
                     <p>Gender</p>
                     <input type="radio" name="gender" value="Male" />Male
                     <input type="radio" name="gender" value="Female" />Female
                     <br />
                     <h6><?php echo $genderErr; ?></h6>
                    
                    
                </div>
         </div>
                <center><h6><?php echo $fail; ?></h6><br /><h5><?php echo $success; ?></h5><br /><button type="submit" name="signup" value="Sign Up" >Sign Up </button></center> 
                </div>
            
        </form>
    </body>
</html>