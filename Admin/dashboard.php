<?php
    session_start();
    if(isset($_SESSION["admin"]))
    {
        include "inc/header.php";
    }
    else
    {
        header("Location: login.php");
    }
?>
<h1>Dashboard</h1>
<form method="post">
<div class="dashboard">
    <div class="card">
     <h1>Categoires </h1>
     <label><?php $categories = $conn->query("SELECT * FROM categories"); if($categories -> num_rows > 0) { echo $categories ->num_rows; } else { echo "No Data Available"; }?></label>
    </div>
    <div class="card">
     <h1>Dishes </h1>
     <label><?php $dishes= $conn->query("SELECT * FROM menu"); if($dishes -> num_rows > 0) { echo $dishes ->num_rows; } else { echo "No Data Available"; }?></label>
    </div>
    <div class="card">
     <h1>Blogs </h1>
     <label><?php $blogs= $conn->query("SELECT * FROM blogs"); if($blogs -> num_rows > 0) { echo $blogs ->num_rows; } else { echo "No Data Available"; }?></label>
    </div>
    <div class="card">
     <h1>Vidoes </h1>
     <label><?php $videos= $conn->query("SELECT * FROM videos"); if($videos -> num_rows > 0) { echo $videos ->num_rows; } else { echo "No Data Available"; }?></label>
    </div>
    <div class="card">
     <h1>Job Applications </h1>
     <label><?php $jobs= $conn->query("SELECT * FROM jobs"); if($jobs -> num_rows > 0) { echo $jobs ->num_rows; } else { echo "No Data Available"; }?></label>
    </div>
    <div class="card">
     <h1>Training Applications </h1>
     <label><?php $training= $conn->query("SELECT * FROM training"); if($training -> num_rows > 0) { echo $training ->num_rows; } else { echo "No Data Available"; }?></label>
    </div>
    <div class="card">
     <h1>Users </h1>
     <label><?php $users= $conn->query("SELECT * FROM userinfo"); if($users -> num_rows > 0) { echo $users ->num_rows; } else { echo "No Data Available"; }?></label>
    </div>
    <div class="card">
     <h1>Messages </h1>
     <label><?php $messages= $conn->query("SELECT * FROM contactus"); if($messages -> num_rows > 0) { echo $messages ->num_rows; } else { echo "No Data Available"; }?></label>
    </div>
    <div class="card">
     <h1>Orders </h1>
     <label><?php $orders= $conn->query("SELECT * FROM orders"); if($orders -> num_rows > 0) { echo $orders ->num_rows; } else { echo "No Data Available"; }?></label>
    </div>
</div>
</form>
</div>
</body>
</html>
