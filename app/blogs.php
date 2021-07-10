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

<h1>Blogs<h1>
<?php
    $blogs = $conn -> query("SELECT * FROM blogs");
    if($blogs -> num_rows > 0 )
    {
            echo "<div class='blog-container'>";
            while($rows = $blogs -> fetch_array())
            {
               ?>
                <div class="blog-card">
                <a href="blogviewer.php?blog=<?php echo $rows['b_head'] ; ?>"> <img src="<?php echo '../img/Blogs/'.$rows['b_img'];  ?>" />
            <label><?php echo $rows["b_head"]; ?></label>
            </a></div>

               <?php
            }
            echo "</div>";
    }
    else
    {
      echo "<h1>There is no blog to read </h1>";
    }
?>
</div>
</form>
</body>
</html>