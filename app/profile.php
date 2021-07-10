<?php
      session_start();
      if(isset($_SESSION["username"]))
      {
          include "../inc/userheader.php";
      }
      else
      {
          header("Location: ../index.php");
      }
?>
<h1>Profile </h1>
<div class="profile-box">
<div class="profile-column">
<img src='<?php echo "../".$path; ?>' />
<a href="uploadprofile.php">Edit Profile Picture</a>
</div>

<div class="profile-column">
 <div class="profile-row">
 <label>Username </label>
 <p><?php echo $username; ?></p>
 </div>
 <div class="profile-row">
 <label>Email </label>
 <p><?php echo $email; ?></p>
 </div>
 <div class="profile-row">
 <label>Name </label>
 <p><?php echo $name; ?></p>
 </div>
 <div class="profile-row">
 <label>Password </label>
 <p><?php echo $password; ?></p>
 </div>
 <div class="profile-row">
 <label>Gender </label>
 <p><?php echo $gender; ?></p>
 </div>
 <div class="profile-row">
 <label>Mobile </label>
 <p><?php echo $mobile; ?></p>
 </div>
 <div class="profile-row">
 <a href="editprofile.php">Edit Profile</a>
 <a href="updatepassword.php">Change Password</a>
</div>
</div>
</div>