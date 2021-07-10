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
        $menu = $conn-> query("SELECT pic FROM menu WHERE category='$key' ");
        if($menu -> num_rows > 0)
        {
            while($pics = $menu -> fetch_array())
            {
                
                    $images = $pics['pic'];
                    unlink("../img/Menu/$images");
                    
            }
            
        }
        $sql ="DELETE FROM menu WHERE category='$key'";
        if($conn->query($sql) ===TRUE)
        {
            $src = $conn -> query("SELECT pic FROM categories WHERE name='$key' ");
               if($src ->num_rows > 0)
               {
                   $row = $src -> fetch_assoc();
                   $image = $row['pic'];
               }
              
              $csql = "DELETE FROM categories WHERE categories.name='$key'";      
              if($conn ->query($csql) ===TRUE  )
              {
                  unlink("../img/Categories/$image");
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
<h1>Categories</h1>
<form method="POST">
<?php
    $category = $conn->query("SELECT * FROM categories");
    if($category ->num_rows !== 0)
    {
        echo "<div class='manage-container'>";
        echo "<table>";
        echo "<tr>
        
              <td>Category Picture</td>
              <td> Name</td>
              <td>Service Started</td>
              <td>Delete</td> </tr>";
        while($rows = $category ->fetch_array())
        {
             ?>
              <tr>
              <td><img src="<?php echo '../img/Categories/'.$rows['pic']; ?>" /></td>
              <td><?php echo $rows["name"]; ?></td>
              <td><?php echo $rows["createdon"]; ?></td>
             
              <td><button name="delete" type="submit" value=<?php echo $rows["name"] ?>><i class="fas fa-trash"></i></button></td> </tr>
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