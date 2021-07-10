<?php
session_start();
$heading="";
if(isset($_SESSION["username"]))
{
   include "../inc/userheader.php";
}
else
{
    echo '<script>alert("You Must Login First to See a Blog");</script>';
    die("<a href='blogs.php' style='text-decoration:none; background:#ff4d4d; padding:10px 20px; border:none; color:#fff; font:16px century gothic,sans-serif; margin-top:40px; margin-left:20px;'>Go Back</a>");
   
    
    
}
if(!isset($_GET["blog"]) || empty($_GET["blog"]))
{
    header("Location: blogs.php");
}
else
{
    $heading = $_GET["blog"];
}
?>
<h2 class="blog-heading"><?php echo $heading; ?>
<label>Upload Date: <span><?php $date = $conn-> query("SELECT uploaddate FROM blogs WHERE b_head='$heading' "); if($date -> num_rows > 0 ) { $upload = $date-> fetch_assoc(); echo $upload["uploaddate"];} else {echo "<h1>Information not available </h1>"; } ?></span></label>
</h2>
<?php
  $blog = $conn -> query("SELECT * FROM blogs WHERE b_head='$heading' ");
  if($blog -> num_rows > 0 )
  {
      
        echo "<div class='blog-viewer'>";
        while($rows = $blog-> fetch_array())
        {
            ?>
            <div class="view">
            <img src="<?php echo '../img/Blogs/'.$rows['b_img']; ?>" />
            </div>
            <div class="ingredients">
             <h1>Ingredients</h1>
             <ul>
               <?php $ingredients = explode(',',$rows["b_ingredients"]);
                  foreach($ingredients as $key => $value)
                  {
                      echo '<li>'.$value.'</li>';
                  }
               ?>
             </ul>
            </div>
                </div>
            <div class="information">
                <h1>Receipt</h1>
                <h2><?php echo $rows["subtitle1"] ?></h2>
                <p> <?php echo $rows["b_blog1"]; ?></p>
                <h2><?php echo $rows["subtitle2"] ?></h2>
                <p> <?php echo $rows["b_blog2"]; ?></p>
                <h2><?php echo $rows["subtitle3"] ?></h2>
                <p> <?php echo $rows["b_blog3"]; ?></p>
            <?php
        }
        echo "</div>";
        
  }
  else
  {
      echo "<h1>Post Does Not Exists</h1>";
  }
?>

</form>
</div>
</body>
</html>