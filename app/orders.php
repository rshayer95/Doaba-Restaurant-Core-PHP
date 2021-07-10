<?php
session_start();
if(isset($_SESSION["username"]))
{
   include "../inc/userheader.php";
}
else
{
    die ("<p>Please Login First To See Your Orders</p> <br /> <a style='background:#a6ce39; color:#00652e; padding:10px 20px; font-size:16px; font-family:century gothic,sans-serif; text-decoration:none;'  href='../index.php'>Go Back</a>");
    
}
?>
<h1>Your Orders</h1>
<?php
    $orders = $conn->query("SELECT * FROM orders WHERE customer_email='$email' ");
    if($orders ->num_rows > 0)
    {
        echo "<div class='order-container'>";
        echo "<table>";
        echo "<tr>
        
              <td>Dish Name</td>
              <td>Dish Price</td>
              <td>Category</td>
              <td>By</td>
              <td>Email</td>
              <td>Mobile</td>
              <td>Date</td>
              <td>Time</td> </tr>";
        while($items = $orders ->fetch_array())
        {
             ?>
              <tr>
              <td><?php echo $items["dish_name"]; ?></td>
              <td><?php echo '<i class="fas fa-rupee-sign"> </i>'. $items["dish_price"]; ?></td>
              <td><?php echo $items["category"]; ?></td>
              <td><?php echo $items["customer_name"]; ?></td>
              <td><?php echo $items["customer_email"]; ?></td>
              <td><?php if($items["customer_mobile"] === "Mobile Number Not Given"){ echo "Not Available";}else{ echo $items["customer_mobile"];} ?></td>
              <td><?php echo $items["order_date"]; ?></td>
              <td><?php echo $items["order_time"]; ?></td> </tr>
             <?php
        }
        echo "</table></div>";
    }
    else
    {
       ?>
       <h1>You didn't order anything yet.</h1>
       <?php 
    }
?>