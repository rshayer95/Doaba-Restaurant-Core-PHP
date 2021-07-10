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
    if(isset($_POST["delete"]))
    {
        $key = mysqli_real_escape_string($conn,$_POST["delete"]);
        $src = $conn -> query("SELECT pic FROM menu WHERE id='$key' ");
               if($src ->num_rows > 0)
               {
                   $row = $src -> fetch_assoc();
                   $image = $row['pic'];
               }
              
              $sql = "DELETE FROM menu WHERE menu.id='$key'";      
              if($conn ->query($sql) ===TRUE  )
              {
                  unlink("../img/Menu/$image");
                ?>
            <div id="fail" class="success">
        <h6 id="login_error">Successfully Deleted </h6>
        <button type="button" id="close_error" onclick="close_fail()"><i class="fas fa-times-circle"></i></button>
        </div>
                <?php
          
                  $conn ->close();
                 
                  
          
              }
                 
              else
              {
                ?>
                 <div id="fail" class="fail">
    <h6 id="login_error">Error In Performing Action. </h6>
    <button type="button" id="close_error" onclick="close_fail()"><i class="fas fa-times-circle"></i></button>
    </div>
                <?php
                  
              } 
    }
?>
<h1>Menu</h1>
<form method="POST">
<?php
    $menu = $conn->query("SELECT * FROM menu");
    if($menu ->num_rows !== 0)
    {
        echo "<div class='manage-container'>";
        echo "<table>";
        echo "<tr>
        
              <td>Dish Picture</td>
              <td>Dish Name</td>
              <td>Dish Category</td>
              <td>Dish Price</td>
              <td>Service Started</td>
              <td>Delete</td> </tr>";
        while($rows = $menu ->fetch_array())
        {
             ?>
              <tr>
              <td><img src="<?php echo '../img/Menu/'.$rows['pic']; ?>" /></td>
              <td><?php echo $rows["name"]; ?></td>
              <td><?php echo $rows["category"]; ?></td>
              <td><?php echo $rows["price"]; ?></td>
              <td><?php echo $rows["uploadedon"]; ?></td>
              <td><button name="delete" type="submit" value=<?php echo $rows["id"] ?>><i class="fas fa-trash"></i></button></td> </tr>
             <?php
        }
        echo "</table></div>";
    }
    else
    {
       ?>
       <h1>No User Exists.</h1>
       <?php 
    }
?>
</form>
</div>
</body>
</html>