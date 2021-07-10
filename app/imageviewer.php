<?php
 session_start();
 if(isset($_GET["img"]) || !empty($_GET["img"]))
 {
        echo "<a href='gallery.php' style='text-decoration:none; background:#ff4d4d; color:#fff; padding:10px 20px; margin:20px; border:1px solid #ff4d4d;'>Go Back</a>";

        ?>
          <img style="margin:20px;" src="<?php echo '../img/Blogs/'.$_GET['img'] ?>" />
        <?php
 }
 else
 {
    header("Location: gallery.php");
 }
?>