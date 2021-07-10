function popup()
{
    document.getElementById("pop").style.display = "none";
}
function closepop()
{
    document.getElementById("pop").style.display = "none";
    document.getElementById("login-box").style.display="none";
}
function showpop()
{
    document.getElementById("pop").style.display = "flex";
    document.getElementById("login-box").style.display="flex";
}
function close_signpop()
{
    document.getElementById("pop").style.display = "none";
    document.getElementById("signup-box").style.display="none";
}
function show_signpop()
{
    document.getElementById("pop").style.display = "flex";
    document.getElementById("signup-box").style.display="flex";
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
