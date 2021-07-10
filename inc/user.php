<?php
$name="";
$path="";
$email="";
$username="";
$password="";
$mobile="";
$gender="";

$s=$_SESSION['username'];
$result = $conn -> query("SELECT * FROM userinfo WHERE uname = '$s' OR umail = '$s' ");

    if ($result ->num_rows ==1) {
         $row = $result -> fetch_assoc();
         
              $name= $row["ufullname"];
              $email=$row["umail"];
              $username = $row["uname"];
              $password=$row["upass"];
              $gender = $row["ugender"];
              if(empty($row["umobile"]))
              {
                  $mobile= "Mobile Number Not Given";
              }    
              else
              {
                  $mobile = $row["umobile"];
              }
              if(empty($row["profilepic"]))
              {
                   $path= 'img/user.png';
              }
              else
              {
                    $path = $row["profilepic"];
              }
    }
?>
