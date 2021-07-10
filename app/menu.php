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
<h1> What Would you like to have ? </h1>
<?php
    $menu = $conn ->query("SELECT * FROM categories");
    if($menu -> num_rows > 0 )
    {
        echo "<div class='product'>";
        while($rows = $menu ->fetch_array())
        {
            ?>
             <div class="product-card">
                <a href="dishes.php?c=<?php echo $rows['name']; ?>"> <img src= "<?php echo '../img/Categories/' .$rows['pic']  ?>" >
                <label><?php echo $rows["name"]; ?></label>
                </a>
             </div>
            <?php
        }
        echo "</div>";
    }
    else
    {
        echo "<h1>Sorry !! We don't have any dish right now</h1>";
    }
?>
</form>
</div>
</body>
</html>