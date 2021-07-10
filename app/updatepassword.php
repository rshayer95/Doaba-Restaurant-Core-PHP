<!DOCTYPE html>
<html>
<head>
<title> Password Update</title>
<style>
/* css reset */

* {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
	font: inherit;
	vertical-align: baseline;
	font-family:'century gothic';
}
a
{
	color:#333;
}
/* css html document */
html,body
{
      margin:0 0 0 0;
	  padding:0 0 0 0;
	  
	  
}
html
{
	overflow-y:auto;
}
	::-webkit-scrollbar
    {
        width:5px;
        
        background-color: #f5f5f5;
        
    }
    ::-webkit-scrollbar-thumb
{
    
    background-color: #333;
    
}
html
{
    
	font-size:1em;
	overflow-x:hidden;
	overflow-y:auto;
	margin:0 0 0 0;
	padding:0 0 0 0;
}

.wrapper
{
     width:100%;
	 margin: 0 0 0 0;
	 
	 
	} 
.wrapper nav
{
       width:100%;
	   height:10vh;
	   top:0;
	   left:0;
	   right:0;
	 position:fixed;
	 display:flex;
	 align-items:center;
	 justify-content: center;
	   background-color:#fff;
	   z-index:10;
	   box-shadow: 0 0px 2px 0 rgba(0,0,0,0.16) !important;
	 
}


.wrapper img
{
	height: 10vh;
	margin:0 0 0 2%;
	
}

.wrapper h1
{
	color:#333;
	font-size:2.5em;
	
	text-transform:uppercase;
}
.maincontent
{
   
   top:10vh;
   position:absolute;
   width:100%;
   
   margin-bottom:2%;
}
	
		

.maincontent .fpc
{
	width:40vw;
	margin:1% 30vw;
   background:#f9f9f9;
	display:flex;
	justify-content:flex-start;
	flex-direction:column;
	align-items:center;
	padding:40px;
}
.maincontent .fpc input[type="submit"]
{
	width:200px;
	height:40px;
	margin:1px auto;
	outline:none;
	color:#fff;
	background:#ff4d4d;
	border:1px solid #ff4d4d;
	cursor:pointer;
}
.maincontent b
{
    font-weight:bold;
    margin:10px auto;
}
.maincontent .fpc input
{
width:300px;
height:35px;
background:#f5f5f5;
border:1px solid #d1d1d1;
padding-left:10px;
margin:20px auto;
}
.maincontent .fpc input[type="submit"]:hover
{
	color:#333;
	border:1px solid #666;
    background:#e3e3e3;
}
.maincontent .fpc h1
{
	font-size:2em;
	text-transform:uppercase;
	color:#222;
}
.maincontent .fpc p
{
	color:#ff4d4d;
	font-weight:bold;
    margin:10px auto;
}

    </style>

</head>
<body>
<script type="text/javascript">

</script>
<header class="wrapper">
<nav>
<a href="../index.php"><img src="../img/logo.jpg" /></a>
</nav>

</header>
<div class="maincontent">
<div class="fpc">
<h1>Answer Your Secret Question </h1>
<form method="POST">
<?php
session_start();
require '../inc/connect.php';
echo "<br/>\n";
$flag=0;
$usr="";
$ques="";
$ansErr="Enter Your Answer";
$nam="";
if(isset($_SESSION["username"]) && empty($_GET["id"]))
{
  $nam = $_SESSION["username"];
}
else if(empty($_SESSION["username"]) && !empty($_GET["id"]))
{
  $nam = $_GET["id"];
}
else
{
   header("Location: ../index.php");
}
echo "<center><b>Recover Your Password</b><br />";
if(filter_var($nam,FILTER_VALIDATE_EMAIL))
{
	$sql="SELECT * FROM userinfo WHERE umail='$nam'";
}
else
{
	$sql="SELECT * FROM userinfo WHERE uname='$nam'";
}

$result=$conn->query($sql);

$question=array('q1'=>'Name of first pet ?','q2'=>'Name place of birth ?' , 'q3'=>'Name of your favourite teacher ?' , 'q4'=>'Place u like to visit commonly ?');

while($row=$result->fetch_array())
{
	$usr=$row['uname'] ;
	$mail= $row['umail'];
	$pas=$row['upass'];
	$ques=$row['ques'];
	$ans=$row['ans'];
	
}

if($nam!=$usr && $nam!=$mail)
{
	echo"<script>alert('Username does not exist !');</script>";
	header("Location: ../index.php");

	
}

else if ($nam==$usr or $nam==$mail)
{
 foreach($question as $questionid => $questionvalues)
        {
            if($ques == $questionid)
			{
				//echo "<center>";
				echo "<center><p>Q:- ".$questionvalues."<input type='hidden' name='C' value=$ans />  </p><br/> ";
				echo"<input type='hidden' name='X' value=$pas /> ";
				echo "</center><center>";
			}
		}

echo " <input onblur='lockit(this)' placeholder='$ansErr' type='text' name='B' / ><br/> ";
	
if(isset($_POST['submit']))
{
	$anw=$_POST['B'];
	$anwc=$_POST['C'];
	$pasc=$_POST['X'];
    if(empty ($anw))
    {
    	$ansErr="Please Enter the Answer";
    	echo "<script>alert('$ansErr');</script>";
    }
    else
    {
       if(strtolower($anw) == strtolower($anwc) )
	{
        $_SESSION["change-pass"] = $pasc;
        header("Location: changepassword.php");
	}
	else 
	{
		echo "<script> alert('Incorrect Answer'); </script>";
	}
}	
    }
	}
echo "</center>";
?>
<input type="submit" name="submit" value="Submit" />
</form>
</div></div>
</body>
</html>

