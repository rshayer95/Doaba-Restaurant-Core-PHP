<?php
     session_start();
    $name_error=$email_error=$mobile_error=$username_error=$fail=$success="";
    $name=$email=$mobile=$username="";
     if(isset($_SESSION["username"]))
     {
        include "../inc/userheader.php";
     }
     else
     {
       header("Location: ../index.php");
     }
     if(isset($_POST["edit"]))
     {
         if(empty($_POST["name"]))
         {
             $name_error = "Please Enter Your Name";
         }
         else
         {
             $name= $_POST["name"];
         }
         if(empty($_POST["email"]))
         {
             $email_error = "Please Enter Your Email";
         }
         else
         {
            if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
            {
                
                 $email_error = "Enter Valid Email Address";
            }
            else
            {
               $email = trim($_POST['email']);
                
            }
         }

         //Username Validation
         if(empty ($_POST['username']))
    {
        $username_error = "Please Enter Your Username"; 
    }
    else
    {
        if(strlen($_POST['username']) > 7 && strlen($_POST['username']) < 16)
        {
            
           if(is_numeric($_POST['username']))
        {
           $username_error = "Please Use Some Characters for your Username";
    
        }
              else{
                  $username = trim($_POST['username']);
                  
              }
        }
      
        else
        {
            $userErr = "<p>Username Must be in between 8 to 15 characters </p>";
        }
        
    }
    //Validate Mobile
    if(empty ($_POST['mobile']) OR $_POST['mobile']=="Mobile Number Not Given")
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
            $mobile_error = "Enter 10 digit mobile number ";
        }
        
    }
    //Insert To Database
    if(!empty($name) && !empty($username) && !empty($email))
    {
        try
        {
            $sql="UPDATE userinfo SET uname = '$username' , umail = '$email', ufullname='$name' , umobile = '$mobile' WHERE uname='$s' OR umail='$s' ";
            if($conn ->query($sql) ===TRUE  )
              {
                  $success ="Successfully Edited. ";
                  $fail = "NOTE: You have to login again now to see changes.";
                  session_destroy();
                  
              }
                 
              else
              {
                 $fail ="Failed To Edit Profile";
                  
              } 
        }
        catch (customException $e) {
            //display custom message
            $fail =  $e->errorMessage();
          }
        
    }
    
     }
?>
<h1>Edit Profile</h1>
<!-Edit Profile Box- -->
<div class="section">
     <div class="section-row">
     <input type="text" name="name" value='<?php echo $name; ?>' />
     <i class="fas fa-user"></i>
     </div>

     <h6><?php echo $name_error; ?></h6>
     <div class="section-row">
     <input type="text" name="email" value='<?php echo $email; ?>' />
     <i class="fas fa-envelope"></i>
     </div>
     <h6><?php echo $email_error; ?></h6>

     <div class="section-row">
     <input type="text" name="mobile" value='<?php echo $mobile; ?>' />
     <i class="fas fa-phone"></i>
     </div>
     <h6><?php echo $mobile_error; ?></h6>

     <div class="section-row">
     <input type="text" name="username" value='<?php echo $username; ?>' />
     <i class="far fa-user"></i>
     </div>
     <h6><?php echo $username_error; ?></h6>
     <div class="section-row">
     <h6><?php echo $fail; ?> </h6>
     <h5><?php echo $success; ?></h5></div>
   <button type="submit" name="edit">Edit Profile</button>
    
    
</div>
    </form>
    </body>
    </html>
