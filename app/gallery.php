<?php
     session_start();
     if(isset($_SESSION["username"]))
     {
        include "../inc/userheader.php";
     }
     else
     {
        include "../inc/header.php";
     }
   
?>

<h1>Gallery</h1>
<form method="post">
<?php
     $gallery = $conn -> query("SELECT b_img FROM blogs");
     if($gallery -> num_rows > 0 )
     {
         echo"<div class='gallery-container'>";
        while($rows = $gallery->fetch_array()){
                ?> 
                 <a href="imageviewer.php?img=<?php echo $rows['b_img']; ?>" ><img src="<?php echo '../img/Blogs/'.$rows['b_img']; ?>" /></a>
                <?php
        }
     }
     else
     {
         echo "<h1>No Data Available</h1>";
     }

  
?>

</form>

</div>
</form>
</body>
</html>
