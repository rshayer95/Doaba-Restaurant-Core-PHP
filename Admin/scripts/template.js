var callback = function(){
    // Handler when the DOM is fully loaded
    
  
  };
  
  if (
      document.readyState === "complete" ||
      (document.readyState !== "loading" && !document.documentElement.doScroll)
  ||
   document.onreadystatechange === (document.readyState === "complete")
) {
    callback();
  } else {
    document.addEventListener("DOMContentLoaded", callback);
  }

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
   function close_fail()
    {
        document.getElementById("fail").style.top="-100px";
        document.getElementById("fail").style.display = "none";
    }