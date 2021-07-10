<?php
session_start();
$category="";
date_default_timezone_set("Asia/Calcutta");
$date = date("d-M-Y");
$time = date("h:i:sa");
if(isset($_SESSION["username"]))
{
    include "../inc/userheader.php";
}
else
{
    include "../inc/header.php";
}
if(!isset($_GET["c"]) || empty($_GET["c"]))
{
    header("Location: menu.php");
}
else
{
    $category = $_GET["c"];
    
}
if(isset($_POST["order"]))
{
   if(!isset($_SESSION["username"]))
   {
    ?>
    <div id="fail" class="fail">
    <h6 id="login_error">Login First To Place an Order. </h6>
    <button type="button" id="close_error" onclick="close_fail()"><i class="fas fa-times-circle"></i></button>
    </div>
    <?php
   }
   else
   {
    $key = mysqli_real_escape_string($conn,$_POST["order"]);
    $dish_name=$price="";
    $dish = $conn-> query("SELECT * FROM menu WHERE id='$key'");
    if($dish -> num_rows > 0)
    {
          while($items = $dish->fetch_array())
          {
              $dish_name = $items["name"];
              $price     = $items["price"];
          }
    }
    else
    {
        ?>
        <div id="fail" class="fail">
        <h6 id="login_error">Sorry Item Does Not Exist </h6>
        <button type="button" id="close_error" onclick="close_fail()"><i class="fas fa-times-circle"></i></button>
        </div>
        <?php
    }
       $sql = "INSERT INTO orders(dish_id,dish_name,dish_price,category,customer_name,customer_email,customer_mobile,order_date,order_time) VALUES('$key','$dish_name','$price','$category','$name','$email','$mobile','$date','$time') ";
       if($conn-> query($sql))
       {
         ?>
    <div id="fail" class="success">
    <h6 id="login_error">Successfully Ordered. </h6>
    <button type="button" id="close_error" onclick="close_fail()"><i class="fas fa-times-circle"></i></button>
    </div>
    <?php 
       }
       else
       {
        ?>
        <div id="fail" class="fail">
        <h6 id="login_error">Failed to place an order. </h6>
        <button type="button" id="close_error" onclick="close_fail()"><i class="fas fa-times-circle"></i></button>
        </div>
        <?php 
       }
   }
}
?>
<h1><?php echo $category; ?></h1>
<?php
      $menu = $conn-> query("SELECT * FROM menu WHERE category='$category' ");
      if($menu -> num_rows > 0)
      {
          echo "<div class='menu'>";
          while($rows = $menu -> fetch_array())
          {
              
                          ?>
                       <div class="menu-card">
                       <img src="<?php echo '../img/Menu/'.$rows['pic'];  ?>" />
                       <div class="details">
                        <h1><?php echo $rows["name"]; ?></h1>
                        <div class="row">
                         <i class="fas fa-rupee-sign"></i>
                         <label class="price"><?php echo $rows["price"]; ?> </label>
                         </div>
                        
                         <button type="submit" name="order" value="<?php echo $rows['id']; ?>" class="order">
                           Order Now
          </button>
                       </div>

                       </div>
                          <?php
          }
          echo "</div>";
      }
      else
      {
           echo "<h1>Dishes Not Available</h1>";
      }
?>
</forms>
</div>
</body>
</html>