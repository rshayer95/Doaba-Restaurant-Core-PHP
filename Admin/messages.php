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
        $sql = "DELETE FROM contactus WHERE contactus.id='$key'";      
        if($conn ->query($sql) ===TRUE  )
        {
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
<h1>Messages</h1>
<form method="POST">
<?php
    $messages = $conn->query("SELECT * FROM contactus");
    if($messages ->num_rows !== 0)
    {
        echo "<div class='manage-container'>";
        echo "<table>";
        echo "<tr>
              <td>ID</td>
              <td>From</td>
              <td>Email</td>
              <td>Message</td>
              <td>Received on</td>
              <td>Receive At</td>
              <td>Delete</td> </tr>";
        while($rows = $messages ->fetch_array())
        {
             ?>
              <tr>
             
              <td><?php echo $rows["id"]; ?></td>
              <td><?php echo $rows["name"]; ?></td>
              <td><?php echo $rows["email"]; ?></td>
              <td><?php echo $rows["message"]; ?></td>
              <td><?php echo $rows["sentdate"]; ?></td>
             
              <td><?php echo $rows["senttime"]; ?></td>
              <td><button name="delete" type="submit" value="<?php echo $rows["id"] ?>"><i class="fas fa-trash"></i></button></td> </tr>
             <?php
        }
        echo "</table></div>";
    }
    else
    {
       ?>
       <h1>No Message Exists.</h1>
       <?php 
    }
?>
</form>
</div>
</body>
</html>