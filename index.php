<?php
session_start();
if(isset($_SESSION['username']))
{

include 'inc/indexuserheader.php';
     
}
else if(!isset($_SESSION['username']))
{
  include 'inc/indexheader.php';
}
?>

       <div class="main-content">
         <div class="services">
              <div class="row">
              <a href="app/menu.php"><i class="fas fa-clipboard"></i>Menu</a>
              <a href="app/videos.php"><i class="fas fa-play" ></i>Videos  </a>
              <a href="app/gallery.php"><i class="fas fa-images" ></i>Gallery </a>
              <a href="app/blogs.php"><i class="fas fa-edit"></i>Blogs </a>
              </div>
              <div class="row">
              <a href="app/jobs.php"><i class="fas fa-briefcase" ></i>Jobs </a>
              <a href="app/training.php"><i class="fas fa-graduation-cap" ></i>Training </a>
              <a href="app/delivery.php"><i class="fas fa-bicycle" ></i>Home Delivery </a>
              <a href="app/contactus.php"><i class="fas fa-envelope" ></i>Contact US </a>
              </div>
         </div>
       </div>
     </form>
   </body>
</html>