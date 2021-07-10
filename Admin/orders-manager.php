<?php
    session_start();
    error_reporting(0);
    if(isset($_SESSION["admin"]))
    {
        include "inc/header.php";
    }
    else
    {
        header("Location: login.php");
    }
   
?>
<h1>Orders</h1>
<form method="POST">
<?php
    $orders = $conn-> query("SELECT * FROM orders");
    if($orders -> num_rows > 0)
    {
        echo "<div class='manage-container'>";
        echo "<table>";
        echo "<tr>
        
            
              <td>Dish ID</td>
              <td>Dish Name</td>
              <td>Dish Price</td>
              <td>Category</td>
              <td>Order By</td>
              <td>Email</td>
              <td>Mobile</td>
              <td>Order Date</td>
              <td>Order Time</td>
              </tr>";
        while($rows = $orders ->fetch_array())
        {
             ?>
              <tr>
             
              <td><?php echo $rows["dish_id"]; ?></td>
              <td><?php echo $rows["dish_name"]; ?></td>
              <td><?php echo '<i class="fas fa-rupee-sign"></i>'.$rows["dish_price"]; ?></td>
              <td><?php echo $rows["category"]; ?></td>
              <td><?php echo $rows["customer_name"]; ?></td>
              <td><?php echo $rows["customer_email"]; ?></td>
              <td><?php echo $rows["customer_mobile"]; ?></td>
              <td><?php echo $rows["order_date"]; ?></td>
              <td><?php echo $rows["order_time"]; ?></td>
              <</tr>
             <?php
        }
        echo "</table></div>";
    }
    else
    {
       ?>
       <h1>There is no Order to view.</h1>
       <?php 
    }
?>
</form>
</div>
</body>
</html>