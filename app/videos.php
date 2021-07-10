<?php
session_start();
if(isset($_SESSION["username"]))
{
   include "../inc/userheader.php";
}
else
{
   include "../inc/header.php";
}
?>
<h1>Vidoes</h1>
<?php
$videos = $conn->query("SELECT * FROM videos");
if($videos -> num_rows > 0)
{
    
    while($rows = $videos ->fetch_array())
    {
        ?>
        
       <div style=" with:100vw; display:flex; flex-direction:row;">
       <video style="margin-bottom: 20px; margin-top:-10px;"  src="<?php echo '../uploads/'.$rows['video']; ?>" width="700px" height="560px" preload="metadata" controls type="video/mp4" type="video/ogg">
    </video>
    </div>
        <?php 
        }
}
else
{
   echo "<h1>No Video Tutorial Available</h1>";
}
?>
</form>

</div>
</form>
</body>
</html>
