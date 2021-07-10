<?php
session_start();
include $_SERVER["DOCUMENT_ROOT"].'/Doaba Restaurant/inc/connect.php';
$username_error=$password_error =$fail="";
$username="";
$pass="";
if(isset($_SESSION['admin']))
{
    header("Location:dashboard.php");
}
if(isset($_POST['login']))
{
    if(empty ($_POST['username']))
    {
        $username_error = "Please Enter Your Username";
    }
    else
    {
        $username= trim($_POST['username']);
    }
     if(empty ($_POST['password']))
    {
        $passsword_error = "Please Enter Your Password";
    }
    else
    {
       $pass= trim($_POST['password']);
    }
if(!empty($username) && !empty($pass))
   {
     $check = "SELECT uname,upass FROM admin WHERE uname = '$username' AND upass = '$pass'";
     if ($stmt = $conn->prepare($check)) {
        
        $stmt->execute(); 
        $stmt->store_result();   
        $stmt->bind_result($username,$pass);
        $stmt->fetch();
        if ($stmt->num_rows == 1) {
             $_SESSION['admin'] =$username;
             header("Location: dashboard.php");
        }
         else
         {
             $fail = "Invalid Username/Password";
         }
     }
           else
           {
             $fail = "Something Went Wrong";
           }   
   }
}

?>