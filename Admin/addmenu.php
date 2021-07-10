<?php
    session_start();
    $name_error=$category_error=$price_error="";
    $msgresult=$confirm="";
    $name=$category=$price="";
    $date = date("d-M-Y");
    $target_dir = "../img/Menu/";
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
            $name_error = "Please Enter Dish Name";
        }
        else
        {
                    $name = $_POST["name"];
            
        }
       if($_POST["category"] == "")
       {
           $category_error = "Please Select One Category";
       }
       else
       {
          $category = $_POST["category"];
       }
       if(empty($_POST["price"]))
       {
          $price_error = "Please Enter Price For The Dish";
       }
       else
       {
           if(!preg_match("/^[1-9][0-9]{1,5}$/",$_POST["price"]))
           {
             $price_error="Please Enter digits only";
           }
           else
           {
               $price = $_POST["price"];
           }
       }
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
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
       
      $pic=basename($_FILES["fileToUpload"]["name"]);
  $sql="INSERT INTO menu(name,category,price,pic,createdon) VALUES('$name','$category','$price','$pic','$date')";
  if($conn ->query($sql) ===TRUE  )
    {
       echo '<script>alert("Successfully Added");</script>';
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
            <h1>Add Menu</h1>
            <div class="row-reverse">
            <input type="text" name="name" placeholder="Enter Dish Name" />
            <i id="name-icon" class="fas fa-cart-plus" ></i>
            </div>
            <h6 ><?php echo $name_error; ?></h6>
            <div class="row-reverse">
            <select name="category" placeholder="Select A Category">
            <option selected hidden value=""></option>
            <?php
            $categories =$conn->query("SELECT * FROM categories");
            if($categories -> num_rows > 0)
            {
                while ($rows = $categories -> fetch_array())
                {
                  
                echo "<option value='$rows[1]'>$rows[1]</option>";
              }
            }
            
            ?>
            </select>
            <i id="category-icon" class="fas fa-utensils" ></i>
            </div>
            <h6 ><?php echo $category_error; ?></h6>
            <div class="row-reverse">
            <input type="text" name="price" placeholder="Enter Dish Price " />
            <i id="price-icon" class="fas fa-rupee-sign" ></i>
            </div>
            <h6 ><?php echo $price_error; ?></h6>
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