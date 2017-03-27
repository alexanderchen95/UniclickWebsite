<?php
session_start();
//connect to database
$db=mysqli_connect("localhost","root","","data");
if(isset($_POST['register_btn']))
{
    $email=mysql_real_escape_string($_POST['email']);
    $user_password=mysql_real_escape_string($_POST['user_password']);
    $user_password_confirm=mysql_real_escape_string($_POST['user_password_confirm']);
     if($user_password==$user_password_confirm)
     {           //Create User
            $password=md5($password); //hash password before storing for security purposes
            $sql="INSERT INTO users(email, password) VALUES('$email','$user_password')";
            mysqli_query($db,$sql);
            $_SESSION['message']="You are now logged in";
            $_SESSION['username']=$username;
            header("location:home.php");  //redirect home page
    }
    else
    {
      $_SESSION['message']="The two password do not match";
     }
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Metro, a sleek, intuitive, and powerful framework for faster and easier web development for Windows Metro Style.">
    <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, metro, front-end, frontend, web development">
    <meta name="author" content="Sergey Pimenov and Metro UI CSS contributors">

    <link rel='shortcut icon' type='image/x-icon' href='../favicon.ico' />

    <title>Login form :: Metro UI CSS - The front-end framework for developing projects on the web in Windows Metro Style</title>

    <link href="build/css/metro.css" rel="stylesheet">
    <link href="build/css/metro-icons.css" rel="stylesheet">
    <link href="build/css/metro-responsive.css" rel="stylesheet">

    <script src="build/js/jquery-2.1.3.min.js"></script>
    <script src="build/js/metro.js"></script>

    <style>
        .login-form {
            width: 25rem;
            height: 20.75rem;
            position: fixed;
            top: 45%;
            margin-top: -9.375rem;
            left: 50%;
            margin-left: -11.5rem;
            background-color: #ffffff;
            opacity: 0;
            -webkit-transform: scale(.8);
            transform: scale(.8);
        }
    </style>

    <script>
        $(function(){
            var form = $(".login-form");

            form.css({
                opacity: 1,
                "-webkit-transform": "scale(1)",
                "transform": "scale(1)",
                "-webkit-transition": ".5s",
                "transition": ".5s"
            });
        });
    </script>
</head>
<body class="bg-lightBlue">
    <div class="login-form padding20 block-shadow">
        <form>
            <h1 class="text-light">Registration</h1>
            <hr class="thin"/>
            <br />
            <div class="input-control text full-size" data-role="input">
                <label for="user_login">Email:</label>
                <input type="text" name="email" id="user_login">
                <button class="button helper-button clear"><span class="mif-cross"></span></button>
            </div>
            <br />
            <br />
            <div class="input-control password full-size" data-role="input">
                <label for="user_password">Password:</label>
                <input type="password" name="user_password" id="user_password">
                <button class="button helper-button reveal"><span class="mif-looks"></span></button>
            </div>
            <br />
            <br />
            <div class="input-control text full-size" data-role="input">
                <label for="user_login">Re-enter Password</label>
                <input type="password" name="user_password_confirm" id="user_password_confirm">
                <button class="button helper-button reveal"><span class="mif-looks"></span></button>
            </div>
            <br />
            <br />
            <div class="form-actions">
                <button type="submit" name="register_btn" class="Register">Register</button>
            </div>
        </form>
    </div>
</body>
</html>
