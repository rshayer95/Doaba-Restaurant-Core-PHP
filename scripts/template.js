function closeit()
{
	var menu = document.getElementById("menu");
	var open = document.getElementById("openmenu");
	var close = document.getElementById("closemenu");
    var body = document.getElementById("body");
    
    menu.style.display ="none";
    close.style.display ="none";
    
    open.style.display ="block";
    
    
 }

 function openit(menutoggle)
{
	  var x = document.getElementById('toggle');
   var list = document.getElementById('menu');
   
   if(menutoggle.dataset.opened =="no")
   {
	    x.classList.add('open');
		list.style.animation="openmenu 150ms";
	    list.style.webkitAnimation="openmenu 150ms";
	  list.style.display="flex";
	  menutoggle.dataset.opened ="yes";
   }
   else 
   {
     
      x.classList.remove('open');
	
	  list.style.display='none';
	  menutoggle.dataset.opened ="no";
   }
    

 }

  
 	window.onload = function()
 	{
 		var event = document.getElementById("addevent");
 		event.style.display ="none";
 	}
 	

 	 function closeblock()
 	{
 		var event = document.getElementById("addevent");
 		 var show = document.getElementById("show");
        

         event.style.display ="none";
         show.style.display ="block";

 	}

 	function showblock()
 	{
 		var event = document.getElementById("addevent");
 		 var show = document.getElementById("show");
         event.style.display ="flex";
         show.style.display ="none";

 	}
 
function digits(input)
{
    var regex = /[^0-9-]+$/;
   
    input.value = input.value.replace(regex,"");
    if(input.value.replace(regex,""))
        {
            
                    input.focus = input.style.borderColor ="green";  
         input.focus = input.style.backgroundColor="rgba(0,255,0,0.04)";      
          input.focus = input.style.color ="green";   
            input.style.fontWeight ="";
        }
    else
        {
           
        input.focus = input.style.borderColor ="red";  
          input.placeholder ="Only Digits Are Allowed";
           input.focus = input.style.backgroundColor="rgba(255,0,0,0.01)";      
           input.focus = input.style.color ="red";
            input.focus = input.style.fontWeight ="bold";
        
        }       
       
    
}
function popup()
{
    document.getElementById("pop").style.display = "none";
}
function closepop()
{
    document.getElementById("pop").style.display = "none";
}
function showpop()
{
    document.getElementById("pop").style.display = "flex";
}
function haveinput(input)
{
    var input = document.getElementById("username");
   if(input.value =="")
   {
       document.getElementById("user_error").innerHTML= "Please Enter Your Username/Email";
       input.style.border = "1px solid #ac1c1c";
       document.getElementById("user").style.color = "#ac1c1c";
   }
   else
   {
    input.style.border = "1px solid #ff4d4d";
    document.getElementById("user").style.color = "#ff4d4d";
    document.getElementById("user_error").innerHTML= "";
   }
}
function havepassword(input)
{
    var input = document.getElementById("password");
    if(input.value =="")
    {
        document.getElementById("pass_error").innerHTML= "Please Enter Your Password";
        input.style.border = "1px solid #ac1c1c";
        document.getElementById("pass").style.color = "#ac1c1c";
    }
    else
    {
     input.style.border = "1px solid #ff4d4d";
     document.getElementById("pass").style.color = "#ff4d4d";
     document.getElementById("pass_error").innerHTML= "";
    }
}

var message = document.getElementById("message");
var contact = document.getElementById("contactus");

function validmessage()
{
   if(message.value =="")
   {
      alert("Please Enter Your Message");
      return false;
   }
   else
   { 
      return true;
   }
}
function close_fail()
{
    document.getElementById("fail").style.top="-100px";
    document.getElementById("fail").style.display = "none";
}