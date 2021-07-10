<?php    
    //SET GLOBAL VARIABLES
    session_start();
    $name_error=$email_error=$message_error="";
    $name=$email=$message=$success="";
    $date = date("d-M-Y");
    date_default_timezone_set("Asia/Kolkata");
    $time = date("H:i:s a ");
    //Check If User Logged In and Set Header
    if(isset($_SESSION["username"]))
    {
       include "../inc/userheader.php";
    }
    else
    {
        include "../inc/header.php";
        
    }
    if(isset($_POST["contact"]))
    {
        if(empty($_POST["name"]))
        {
            $name_error = "Please Enter Your Name";
        }
        else
        {
            $name= trim($_POST["name"]);
        }
        if(empty($_POST["email"]))
        {
            $email_error = "Please Enter  Your Email";
        }
        else
        {
            if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
            {
                $email = trim($_POST["email"]);
            }
            else
            {
                $email_error ="Enter Valid Email";
            }
        }
        if(empty($_POST["message"]))
        {
            $message_error = "Please Write Your Message ";
        }
        else
        {
            $message = trim($_POST["message"]);
        }
        if(!empty($name) && !empty($email) && !empty($message))
         {
            $sql = "INSERT INTO contactus (name, email, message, sentdate,senttime) VALUES ('$name','$email','$message','$date','$time')";
      
        if($conn ->query($sql) ===TRUE  )
        {
            $success ="Successfully Sent ";
           
        }
           
        else
        {
           echo '<script>alert("Failed To Send Your Message"); </script>';
            
        } 
             
         
        }
        
    }
?>
<div class="container">
<h1>Contact Us</h1>
 <div class="row" id="row"> 
 <input type="text" name="name" placeholder="Enter Your Name" value='<?php echo $name; ?>' />
 <i class="fas fa-user"></i>
 </div>
 <h6 id="name-error"> <?php echo $name_error; ?></h6>
 <div id="row" class="row">
 
 <input type="text" name="email" placeholder="Enter Your Email" value='<?php echo $email; ?>' />
 <i class="fas fa-envelope"></i>
 </div>
 <h6 id="email-error"> <?php echo $email_error; ?></h6>
 <div id="row" class="row">
 
 <textarea id="message" name="message" placeholder="Write Your Message Here...."> </textarea>
 <i class="fas fa-pencil-alt"></i>
 </div>
 <h6 id="message_error"><?php echo $message_error; ?></h6>
 <h5><?php echo $success; ?></h5>
<button type="submit" name="contact" id="contactus">Send Message</button>
</div></div>
</form>
</body>
</html>