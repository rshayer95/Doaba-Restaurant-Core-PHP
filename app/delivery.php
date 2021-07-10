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
<h1>Home Delivery</h1>
<div class="blog-viewer">
<div class="view">
 <img src="../img/delivery.jpg"  />
</div>
<div class="ingredients">
<h1>Place Your Order</h1>
<ul>
   <li style="list-style:none;"><b>Phone Numbers: </b> </li>
   <li>+918288858147</li>
   <li>+918544819619</li>
</ul>
</div>
</div>
</div>
</form>
</body>
</html>
