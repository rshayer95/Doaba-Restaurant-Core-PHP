<?php
     session_start();
     $name_error=$email_error=$age_error=$qualification_error=$address_error=$mobile_error=$trainingof_error=$gender_error=$startdate_error=$confirm="";
     $name=$email=$age=$qualification=$gender=$mobile=$address=$trainingof="";
     $regdate =Date("d/M/Y");
     if(isset($_SESSION["username"]))
     {
        include "../inc/userheader.php";
     }
     else
     {
               include "../inc/header.php";
     }
   if(isset($_POST["register"]))
   {
       //Validate Name
       if(empty($_POST["name"]))
       {
           $name_error ="Please Enter Your Name";
       }
       else
       {
           if(!preg_match ("/^[a-zA-Z\s]+$/",$_POST["name"]))
           {
            $name_error ="Please Enter Only Alphabets";
           }
           else
           {
               $name = $_POST["name"];
           }
       }
       //Validate Email
       if(empty($_POST["email"]))
       {
           $email_error ="Please Enter Your Email";
       }
       else
       {
           if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
           {
            $email_error ="Please Enter Valid Email";
           }
           else
           {
               $email = $_POST["email"];
           }
       }
       //Validate Age
       if(empty($_POST["age"]))
       {
             $age_error= "Please Enter Your Age";
       }
       else
       {
            if(!ctype_digit($_POST["age"]))
            {
              $age_error="Please Enter Digits Only";
            }
            else
            {
              if( ($_POST["age"]) >110 || ($_POST["age"]) <12 )
              {
               $age_error="please Enter Your Correct Age";
              }
              
              else
              {
                  $age =$_POST["age"];
              }
            }
       }
       //Validate Quealificaltion
       if(empty($_POST["qualification"]))
       {
           $qualification_error = "Please Enter Your Qualification";
       }
       else
       {
           if(!preg_match ("/^[a-zA-Z\s]+$/",$_POST["qualification"]))
           {
               $qualification_error = "Please Enter Your Correct Qualification";
           }
           else
           {
               $qualification = $_POST["qualification"];
           }
       }
       //Validate Address
       if(empty($_POST["address"]))
       {
           $address_error ="Please Enter Your Address";
       }
       else
       {
           $address = $_POST["address"];
       }
       //Validate Gender
       if(empty($_POST["gender"]))
       {
        $gender_error = "Please Select One Gender";
       }
       else
       {
            if($_POST["gender"]== "Female")
            {
               $gender = "Female";
            }
           else if($_POST["gender"]== "Male")
           {
               $gender = "Male";
        
            }
       } 
       //Validate Mobile
       if(empty($_POST["mobile"]))
       {
          $mobile_error = "Please Enter Your Mobile Number";
       }
       else
       {
          if(ctype_digit($_POST["mobile"]) && strlen($_POST["mobile"]) ==10)
          {
               $mobile = $_POST["mobile"];
          }
          
          else
          {
              $mobile_error = "Please Enter 10 digit Mobile Number";
          }
       }
       //Validate Training of
       if(empty($_POST["trainingof"]) )
       {
          $trainingof_error = "Select Your Job Type";
       }
       else 
       {
         $trainingof = $_POST["trainingof"];
       }
       
       

       //Enter To Database
       if(!empty($name) && !empty($email) ** !empty($age) && !empty($qualification) && !empty($address) && !empty($mobile) && !empty($trainingof) )
       {
        $check = $conn ->query("SELECT * FROM training WHERE name = '$name' AND email = '$email'");
    
        if ($check->num_rows > 0) {
             
             $confirm="<p class='failed'>Sorry !This account already registered</p>";
        }
         else
         {
              
        $sql = "INSERT INTO jobs (name, email,age, qualification,address, gender, mobile,jobof,registerdate) VALUES ('$name','$email','$age','$qualification','$address','$gender','$mobile','$trainingof','$regdate')";
        
   
   
  
    if($conn ->query($sql) ===TRUE  )
    {
        $confirm ="<h5 class='successed'>Successfully Resgistered  </h5>";
       
    }
       
    else
    {
        $confirm="<h5 class='failed'>Registration Failed </h5>";
        
    } 
         }
	 
	}
	else
	{
		$confirm="<h5 class='failed'>Error </h5>";
      
	}
       
   }

?>
<div class="training-box">
<h1>Job Registration Form</h1>
<!--Start of Row -->
<div class="training-row">
<div class="training-cols">
<h6><?php echo $name_error; ?></h6>
<input type="text" name="name" placeholder="Enter Your Full Name">
<label>Name </label>
</div>
<div class="training-cols">
<h6><?php echo $email_error; ?></h6>
<input type="text" name="email" placeholder="Enter Your Email">
<label>Email </label>
</div>
<div class="training-cols">
<h6><?php echo $age_error; ?></h6>
<input type="text" name="age" placeholder="Enter Your Age">
<label>Age </label>
</div>
</div>
<!--End of Row -->
<!--Start of Row -->
<div class="training-row">

<div class="training-cols">
<h6><?php echo $qualification_error; ?></h6>
<input type="text" name="qualification" placeholder="Enter Your Qualification">
<label>Qualification </label>
</div>

<div class="training-cols">
<h6><?php echo $address_error; ?></h6>
<input type="text" name="address" placeholder="Enter Your Address">
<label>Address </label>
</div>
<div class="training-cols">
<h6><?php echo $gender_error; ?></h6>
<div class="gender-box">
<input type="radio" name="gender" value="Male" />Male
<input type="radio" name="gender" value-"Female" />Female
</div>
<label>Gender</label>
</div>
</div>
<!--End of Row -->

<!--Start of Row -->
<div class="training-row">
<div class="training-cols">
<h6><?php echo $mobile_error; ?></h6>
<input type="text" name="mobile" placeholder="Enter Your Contact Number">
<label>Mobile </label>
</div>
<div class="training-cols">
<h6><?php echo $trainingof_error; ?></h6>
<select name="trainingof">
<option Selected hidden value=""> </option>
<option value="Chef">Chef </option>
<option value="Catering">Catering </option>
<option value="IT">IT Section</option>
<option value="Receptionist">Receptionist</option>
<option value="Manager">Manager</option>
</select>
<label>Job Type</label>
    </div>


<!--End of Row -->
<!--Start of Row -->
    <h5><?php echo $confirm; ?></h5>
    <button type="submit" name="register">Register</button>

<!--End of Row -->
</div>
</div>
</form>
</body>
</html>