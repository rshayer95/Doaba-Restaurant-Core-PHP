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
<h1>Upload Videos
</h1>
<div class="upload-container">
<form class="upload" action="upload.php" method="post" enctype="multipart/form-data" id="upload" > 
<fieldset>
         <legend>Upload Files</legend>
        <input type="file" name="file[]" id="file" required multiple />
        <button type="submit" id="submit" name="submit" > Upload </button>
</fieldset>
<div class="bar">
<span class="bar-fill" id="pb"><span class="bar-fill-text" id="pt"></span></span>
</div>
<div id="uploads" class="uploads">


</div>
<script src="../Admin/scripts/upload.js"></script>
<script>
   document.getElementById('submit').addEventListener('click',function(e){
        e.preventDefault();
        var f  = document.getElementById("file");
        var pb = document.getElementById("pb");
        var pt = document.getElementById("pt");
        app.uploader({
           files: f,
           progressBar: pb,
           progressText: pt,
           processor: 'upload.php',
           finished: function(data){
                var uploads = document.getElementById("uploads"),
                    succeeded = document.createElement("div"),
                    failed= document.createElement("div"),
                 anchor,span,x;

                if(data.failed.length)
                {
                    failed.innerText = "Unfortunately the following files failed."; 
                }
                uploads.innerText = "";
                for(x=1; x < data.succeeded.length; x=x+1)
                {
                    anchor = document.createElement("label");
                    anchor.innerText =data.succeeded.length + " Videos Uploaded Successfully";
                    succeeded.appendChild(anchor); 
                    break;
                }

                for(x=1; x< data.failed.length; x=x+1)
                {
                    span = document.createElement("span");
                    span.innerText =data.failed[x].name  + "Failed";
                    failed.appendChild(span); 
                }
                uploads.appendChild(succeeded);
                uploads.appendChild(failed);
           },
            errors: function(){
                console.log('Not Working');
            }
       });
    }); 
    
   
</script>
</form>
</div>
</div>
</body>
</html>
