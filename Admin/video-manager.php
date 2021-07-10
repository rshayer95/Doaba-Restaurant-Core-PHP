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
        $src = $conn -> query("SELECT video FROM videos WHERE id='$key' ");
               if($src ->num_rows > 0)
               {
                   $row = $src -> fetch_assoc();
                   $video = $row['video'];
               }
              
              $sql = "DELETE FROM videos WHERE videos.id='$key'";      
              if($conn ->query($sql) ===TRUE  )
              {
                  unlink("../uploads/$video");
                ?>
            <div id="fail" class="success">
        <h6 id="login_error">Video Successfully Deleted </h6>
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
<h1>Vidoes</h1>
<form method="POST">
<?php
    $videos = $conn->query("SELECT * FROM videos");
    if($videos ->num_rows !== 0)
    {
        echo "<div class='manage-container'>";
        echo "<table>";
        echo "<tr>
        
              <td>ID</td>
              <td>Video</td>
              <td>Delete</td> </tr>";
        while($rows = $videos ->fetch_array())
        {
             ?>
              <tr>
              <td><?php echo $rows['id']; ?></td>
              <td><a target="_blank" href="videomanager-viewer.php?v=<?php echo $rows['video'] ?>"><?php echo $rows['video'] ?></a> </td>
              
              <td><button name="delete" type="submit" value=<?php echo $rows["id"] ?>><i class="fas fa-trash"></i></button></td> </tr>
             <?php
        }
        echo "</table></div>";
    }
    else
    {
       ?>
       <h1>No Video Exists.</h1>
       <?php 
    }
?>
</form>
</div>
</body>
</html>