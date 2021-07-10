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
              $sql = "DELETE FROM training WHERE training.id='$key'";      
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
<h1>Training Applications</h1>
<form method="POST">
<?php
    $training = $conn->query("SELECT * FROM training");
    if($taining ->num_rows !== 0)
    {
        echo "<div class='manage-container'>";
        echo "<table>";
        echo "<tr>
        
            
              <td>Name</td>
              <td>Email</td>
              <td>Age</td>
              <td>Qualification</td>
              <td>Address</td>
              <td>Gender</td>
              <td>Mobile</td>
              <td>Training Of</td>
              <td>Start Date</td>
              <td>Registration Date</td>
              <td>Delete</td> </tr>";
        while($rows = $training ->fetch_array())
        {
             ?>
              <tr>
             
              <td><?php echo $rows["name"]; ?></td>
              <td><?php echo $rows["email"]; ?></td>
              <td><?php echo $rows["age"]; ?></td>
              <td><?php echo $rows["qualification"]; ?></td>
              <td><?php echo $rows["address"]; ?></td>
              <td><?php echo $rows["gender"]; ?></td>
              <td><?php echo $rows["mobile"]; ?></td>
              <td><?php echo $rows["trainingof"]; ?></td>
              <td><?php echo $rows["startdate"]; ?></td>
              <td><?php echo $rows["registerdate"]; ?></td>
              <td><button name="delete" type="submit" value=<?php echo $rows["id"] ?>><i class="fas fa-trash"></i></button></td> </tr>
             <?php
        }
        echo "</table></div>";
    }
    else
    {
       ?>
       <h1>There is no appliation to view.</h1>
       <?php 
    }
?>
</form>
</div>
</body>
</html>