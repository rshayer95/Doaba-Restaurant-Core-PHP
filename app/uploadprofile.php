<?php
error_reporting(0);
     session_start();
     $name="";
     $path="";
     $s="";
     $msgresult="";
     $success="";
     if($_SESSION["username"])
     {
        $s = $_SESSION["username"];
        require '../inc/connect.php';
        
        $result = $conn -> query("SELECT * FROM userinfo WHERE uname = '$s' OR umail = '$s' ");
        
            if ($result ->num_rows ==1) {
                 $row = $result -> fetch_assoc();
                 
                      $name= $row["ufullname"];
                      
                      if(empty($row["profilepic"]))
                      {
                           $path= '../img/user.png';
                      }
                      else
                      {
                            $path = "../".$row["profilepic"];
                      }
            }
     }
     else
     {
         header("Location: ../index.php");
     }
     if(isset($_POST["logout"]))
     {
        session_destroy();
        session_unset();
        header("Location: ../index.php");
     }
     $target_dir= "../img/";
     
       $target_file=$target_dir . basename($_FILES["fileToUpload"]["name"]);
       $uploadOK=1;
       $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
     
     if(isset($_POST['upload']))
     {
     
           $check=getimagesize($_FILES["fileToUpload"]["tmp_name"]);
         
             if($check !== false)
               {
                  echo $check["mime"].". <br/>";
                  $uploadOK=1;
               }
              else
               {
                $msgresult ="<p class='fail'>File is not an image</p>";
                $uploadOK = 0;
                }
                if($imageFileType !="jpg" && $imageFileType !="png"  &&  $imageFileType !="jpeg" && $imageFileType !="gif")
       {
         
         $msgresult ="<p class='fail'>Sorry, File allowed are jpg ,jpeg ,png ,gif !!</p>";
         $uploadOK = 0;
       }
             if($imageFileType =="mp4")
       {
         
         $msgresult ="<p class='fail'>Sorry, File allowed are jpg ,jpeg ,png ,gif !!</p>";
         $uploadOK = 0;
       }
       if(file_exists($target_file))
       {
        
          $msgresult ="<p class='fail'>Sorry, file already exists</p>";
         $uploadOK = 0;
       }
       if($_FILES["fileToUpload"]["size"] > 5000000)
       {
         
         $msgresult ="<p class='fail'>Sorry, your file is to large</p>";
         $uploadOK = 0;
       }
       
       if($uploadOK==0)
       {
         
         $msgresult ="<p class='fail'>Sorry!! Something went wrong ,please try again</p>";
       }
       else
       {
         if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file))
         {
           //echo "The File".basename($_FILES["fileToUpload"]["name"])."   has been uploaded.";
           $pic="img/".basename($_FILES["fileToUpload"]["name"]);
           $picresult = $conn -> query("SELECT * FROM userinfo WHERE uname = '$s' OR umail = '$s' ");
           
               if ($picresult ->num_rows ==1) {
                    $prow = $picresult -> fetch_assoc();  
                         if(!empty($prow["profilepic"]))
                         {
                              $path= "../".$prow["profilepic"];
                              unlink($path);
                         }
                        }
       $sql="UPDATE userinfo SET profilepic = '$pic' WHERE uname='$s' OR umail='$s' ";
       if($conn ->query($sql) ===TRUE  )
         {
             $success ="Successfully Uploaded. ";
     
             $conn ->close();
             
     
         }
            
         else
         {
            $msgresult ="<p class='fail'>Failed To Upload</p>";
             
         } 
              
         }
         
       else
         {
            $msgresult ="Error";
             
         } 
       
     }
     
     
     }
     
?>
<!DOCTYPE html>
<html>
     <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Doaba Restaurant</title>
        <link rel="stylesheet" type="text/css" href="../styles/index.css" /> 
        <link rel="stylesheet" type="text/css" href="../font-awesome/web-fonts-with-css/css/fontawesome-all.css" />
     </head>
<body>
      <form method="POST" enctype="multipart/form-data">
      <header class="wrapper">
      <nav>
        <a href="../index.php"><img src="../img/logo.jpg" /></a>
        <div class="log-grp">
           <a  href="profile.php"><img src='<?php echo $path; ?>' /> </a>
           <a href="profile.php"><?php echo $name; ?></a>
           <button id="login" style="font-weight:bolder;" type="submit" name="logout" >Logout </button>
        </div>   
        </nav>
      </header>
   <div class="main-content">
    <div class="upload-box">
    <h1>Upload Profile Picture</h1>
      <input type="file" name="fileToUpload" accept="image/*" id="fileToUpload" />
      <h6><?php echo $msgresult; ?></h6>
      <h5><?php echo $success; ?></h5>
      <div class="btn-grouped">
      <button type="submit" name="upload">Upload</button>
      <a href="profile.php">Skip</a>
    </div>
    </div>
   </div>

</form>
</body>
</html>