    var callback = function(){
    // Handler when the DOM is fully loaded
    var username = document.loginform.username;
    var password = document.loginform.password;
    var user_icon = document.getElementById("username-icon");
    var password_icon = document.getElementById("password-icon");
    var username_error = document.getElementById("username_error");
    var password_error = document.getElementById("password_error");
    var login = document.loginform.login;
    var ajax_request;
    //Disable Button On Load
    window.onload = function(){
       login.disabled =true;
       if(login.disabled == true)
       {
           login.style.background = "grey";
           login.style.color = "#000";
           login.style.cursor = "default";
       }
       
    };
    
    //Validate Username
    username.onblur = function(){
       if(username.value =="")
       {
           username_error.innerHTML = "Please Enter Your username";
           user_icon.style.color = "#ac1c1c";
           username.style.border = "1px solid #ac1c1c";
           return false;
       }
       else
       {
           user_icon.style.color = "#a6ce39";
           username.style.border = "1px solid #a6ce39";
           username_error.innerHTML = null;
           return true;
           
       }
    };
    function button_enabled()
    {
        login.style.background = "#ff4d4d";
        login.style.color = "#fff";
        login.style.border="1px solid #ff4d4d";
        login.style.cursor = "pointer";

        login.onmouseover =function()
        {
            login.style.background = "#e3e3e3";
            login.style.color = "#333";
            login.style.border="1px solid #666";
        }
        login.onmouseout =function()
        {
            login.style.background = "#ff4d4d";
            login.style.color = "#fff";
            login.style.border="1px solid #ff4d4d";
            login.style.cursor = "pointer";
        }
    }
    //Check Password Length Dynamically To Enable Button
  password.onkeyup = function(){
      if(username.value !="" && password.value.length > 3 )
        {
         login.disabled =false;
         password_error.innerHTML =null;

         if(login.disabled === false)
         {
             button_enabled();
         }
        }
    };
      //Check Password Length Dynamically To Enable Button
  username.onkeyup = function(){
    if(password.value !="" && username.value.length > 3 )
      {
       login.disabled =false;

       if(login.disabled === false)
       {
           button_enabled();
       }
      }
  };
    //Validate Password And Enable Button If We Have both values
    password.onblur = function(){
        if(password.value =="")
        {
            login.disabled =true;
            password_error.innerHTML="Please Enter Your Password";
            password_icon.style.color = "#ac1c1c";
            password.style.border = "1px solid #ac1c1c";
            return false;
        }
      
       else if(username.value !="" && password.value!="")
       {
            login.disabled = false;
            if(login.disabled === false)
            {
                button_enabled();
            }
            password_error.innerHTML=null;
            password_icon.style.color = "#a6ce39";
            password.style.border = "1px solid #a6ce39";
            return true;

            
       }
    };
    
   
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
