<?php
    session_start();
    $heading_error=$ingredients_error=$blog_error="";
    $msgresult=$confirm="";
    $heading=$subtitle1=$subtitle2=$subtitle3=$blog1=$blog2=$blog3=$ingredients="";
    $date = date("d-M-Y");
    $target_dir = "../img/Blogs/";
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
        if(empty($_POST["heading"]))
        {
            $heading_error = "Please Enter Blog Heading";
        }
        else
        {
                    $heading = $_POST["heading"];
            
        }
        if(empty($_POST["ingredients"]))
        {
            $ingredients_error = "Please Enter Receipt Ingredients";
        }
        else
        {
                    $ingredients = $_POST["ingredients"];
            
        }
       if(empty($_POST["blog1"] ))
       {
           $blog_error = "Please Enter Some Content To the Blog";
       }
       else
       {
          $blog1= $_POST["blog1"];
       }
       if(empty($_POST["blog2"] ))
       {
           $blog2 = "";
       }
       else
       {
          $blog2= $_POST["blog2"];
       }
       if(empty($_POST["blog3"] ))
       {
           $blog3 = "";
       }
       else
       {
          $blog3= $_POST["blog3"];
       }
       if(empty($_POST["subtitle1"] ))
       {
           $subtitle1= "";
       }
       else
       {
        $subtitle1= $_POST["subtitle1"];
       }
       if(empty($_POST["subtitle2"] ))
       {
           $subtitle2 = "";
       }
       else
       {
          $subtitle2= $_POST["subtitle2"];
       }
       if(empty($_POST["subtitle3"] ))
       {
           $subtitle3 = "";
       }
       else
       {
          $subtitle3= $_POST["subtitle3"];
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
  $sql="INSERT INTO blogs(b_by,b_head,b_ingredients,subtitle1,b_blog1,subtitle2,b_blog2,subtitle3,b_blog3,b_img,uploaddate) VALUES('Admin','$heading','$ingredients','$subtitle1','$blog1','$subtitle2','$blog2','$subtitle3','$blog3','$pic','$date')";
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
            <h1>Add Blog</h1>
            <div class="row-reverse">
            <input type="text" name="heading" placeholder="Enter Heading" />
            <label>Heading</label>
            </div>
            <h6 ><?php echo $heading_error; ?></h6>

            <div class="row-reverse">
            <textarea name="ingredients" placeholder="Enter Ingredients Used For Receipt " value=""></textarea>
            <label>Ingredients</label>
            </div>
            <h6 ><?php echo $ingredients_error; ?></h6>
            <div class="row-reverse">
            <input type="text" name="subtitle1" placeholder="Enter Subtitle " />
            <label>Subtitle</label>
            </div>
           
            <div class="row-reverse">
            <textarea name="blog1" placeholder="Enter Blog Content" value=""></textarea>
            <label>Content</label>
            </div>
            <h6 ><?php echo $blog_error; ?></h6>

            <div class="row-reverse">
            <input type="text" name="subtitle2" placeholder="Enter Subtitle " />
            <label>Subtitle 2</label>
            </div>
            <div class="row-reverse">
            <textarea name="blog2" placeholder="Enter Blog Content 2" value=""></textarea>
            <label>Content 2</label>
            </div>
           

            <div class="row-reverse">
            <input type="text" name="subtitle3" placeholder="Enter Subtitle " />
            <label>Subtitle 3 </label>
            </div>
            
            <div class="row-reverse">
            <textarea name="blog3" placeholder="Enter Blog Content 3" value=""></textarea>
            <label>Content 3</label>
            </div>
        
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