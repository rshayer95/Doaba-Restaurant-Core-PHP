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
        $src = $conn -> query("SELECT profilepic FROM userinfo WHERE uname='$key' ");
               if($src ->num_rows > 0)
               {
                   $row = $src -> fetch_assoc();
                   $image = $row['profilepic'];
               }
              
              $sql = "DELETE FROM userinfo WHERE userinfo.uname='$key'";      
              if($conn ->query($sql) ===TRUE  )
              {
                  unlink("../$image");
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
<h1>Users</h1>
<form method="POST">
<?php
    $users = $conn->query("SELECT * FROM userinfo");
    if($users ->num_rows !== 0)
    {
        echo "<div class='manage-container'>";
        echo "<table>";
        echo "<tr>
        
              <td>Profile Picture</td>
              <td>Username</td>
              <td>Password</td>
              <td>Email</td>
              <td>Name</td>
              <td>Gender</td>
              <td>Mobile</td>
              <td>Registered On</td>
              <td>Delete</td> </tr>";
        while($rows = $users ->fetch_array())
        {
             ?>
              <tr>
              <td><img src="<?php echo '../'.$rows['profilepic']; ?>" /></td>
              <td><?php echo $rows["uname"]; ?></td>
              <td><?php echo $rows["upass"]; ?></td>
              <td><?php echo $rows["umail"]; ?></td>
              <td><?php echo $rows["ufullname"]; ?></td>
              <td><?php echo $rows["ugender"]; ?></td>
              <td><?php if($rows["umobile"] === ""){ echo "Not Available";}else{ echo $rows["umobile"];} ?></td>
              <td><?php echo $rows["regdate"]; ?></td>
              <td><button name="delete" type="submit" value=<?php echo $rows["uname"] ?>><i class="fas fa-trash"></i></button></td> </tr>
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