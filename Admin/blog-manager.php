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
        $src = $conn -> query("SELECT b_img FROM blogs WHERE b_id='$key' ");
               if($src ->num_rows > 0)
               {
                   $row = $src -> fetch_assoc();
                   $image = $row['b_img'];
               }
              
              $sql = "DELETE FROM blogs WHERE blogs.b_id='$key'";      
              if($conn ->query($sql) ===TRUE  )
              {
                  unlink("../img/Blogs/$image");
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
<h1>Blogs</h1>
<form method="POST">
<?php
    $blogs = $conn->query("SELECT * FROM blogs");
    if($blogs ->num_rows !== 0)
    {
        echo "<div class='manage-container'>";
        echo "<table>";
        echo "<tr>
        
              
              <td>Blog Picture</td>
              <td>By</td>
              <td>Title</td>
              <td>Ingredients</td>
              <td>Uploaded On</td>
              <td>Delete</td> </tr>";
        while($rows = $blogs ->fetch_array())
        {
             ?>
              <tr>
                  
              <td><img src="<?php echo '../img/Blogs/'.$rows['b_img']; ?>" /></td>
              
              <td><?php echo $rows["b_by"]; ?></td>
              <td><?php echo $rows["b_head"]; ?></td>
              <td><?php echo $rows["b_ingredients"]; ?></td>
            
              <td><?php echo $rows["uploaddate"]; ?></td>
             
              <td><button name="delete" type="submit" value=<?php echo $rows["b_id"] ?>><i class="fas fa-trash"></i></button></td> </tr>
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