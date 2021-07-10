<?php
   session_start();
   if(!isset($_GET["v"]) || $_GET["v"] ==="")
   {
       header("Location: video-manager.php");
   }
   else
   {
       ?>
         <a style="background:#a6ce39; color:#00652e; margin:10px; padding:10px 20px; text-decoration:none;" href="video-manager.php">Go Back</a><br />
        <center> <video src="../uploads/<?php echo $_GET['v']; ?>" width="750px" height="600px" type="video/mp4" preload="autoplay" controls></video></center>
       <?php
   }
?>