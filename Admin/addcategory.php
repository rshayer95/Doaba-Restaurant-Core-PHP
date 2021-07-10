<?php
    session_start();
    $name_error="";
    $msgresult=$confirm="";
    $name="";
    $date = date("d-M-Y");
    $target_dir = "../img/Categories/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
    if(isset($_SESSION["admin"]))
    {
        include "inc/header.php";
    }
    else
    {
        header("Location: login.php");
    }
    if(isset($_POST["add"]))
    {
        if(empty($_POST["name"]))
        {
            $name_error = "Please Enter Category Name";
        }
        else
        {
                    $name = $_POST["name"];
            
        }
     
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      
      
      
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $msgresult= "File is not an image.";
        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_file)) {
    $msgresult= "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $msgresult= "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $msgresult= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $msgresult= "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
       // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
      $pic=basename($_FILES["fileToUpload"]["name"]);
  $sql="INSERT INTO categories(name,pic,createdon) VALUES('$name','$pic','$date')";
  if($conn ->query($sql) ===TRUE  )
    {
        $confirm =  "<p class='success'>Successfully Added</p>";
        $conn ->close();
    }
    else
    {
       $msgresult ="<p class='error'>Failed To Upload</p>";     
    } 
        
}
  else
    {
       $msgresult ="Error";
        
    }  
}
    }
?>
<form method="POST" enctype="multipart/form-data">
        <div class="addcategory-container">
            <h1>Add Category</h1>
            <div class="row-reverse">
            <input type="text" name="name" placeholder="Enter Category name" />
            <i id="name-icon" class="fas fa-cart-plus" ></i>
            </div>
            <h6 ><?php echo $name_error; ?></h6>
            <div class="row-reverse">
            <input type="file" name="fileToUpload" id="fileToUpload"/>
            <i id="image-icon" class="fas fa-image" ></i>
            </div>
            <h6><?php echo $msgresult; ?></h6>
                <h5 ><?php echo $confirm; ?></h5>
                <button name="add" type="submit">Add</button>
        </div>
 


</form>
</div>
</body>
</html>