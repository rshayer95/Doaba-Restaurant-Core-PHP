<?php
     require "inc/login_parse.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Doaba Restaurant Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/forms.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../font-awesome/on-server/css/fontawesome-all.css" />
    <script src="scripts/login.js"></script>
</head>
<body>
    <form method="POST" name="loginform" >
        <div class="login-form">
            <h1>Doaba Restaurant Admin Login</h1>
            <div class="row-reverse">
            <input type="text" name="username" placeholder="Enter Your Username" />
            <i id="username-icon" class="fas fa-user" ></i>
            </div>
            <h6 id="username_error"><?php echo $username_error; ?></h6>
            <div class="row-reverse">
                <input type="password" name="password" placeholder="Enter Your Password" />
                <i id="password-icon" class="fas fa-lock" ></i>
                </div>
                <h6 id="password_error"><?php echo $password_error; ?></h6>
                <h6 id="fail"><?php echo $fail; ?></h6>
                <button name="login" type="submit">Login</button>
        </div>
    </form>
</body>
</html>