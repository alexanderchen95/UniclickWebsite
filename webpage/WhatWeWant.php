<?php
session_start();
//connect to database
$db=mysqli_connect("localhost","root","","authentication");
if(isset($_POST['register_btn']))
{
    $username=mysql_real_escape_string($_POST['username']);
    $email=mysql_real_escape_string($_POST['email']);
    $password=mysql_real_escape_string($_POST['password']);
    $password2=mysql_real_escape_string($_POST['password2']);
     if($password==$password2)
     {           //Create User
            $password=md5($password); //hash password before storing for security purposes
            $sql="INSERT INTO users(username,email,password) VALUES('$username','$email','$password')";
            mysqli_query($db,$sql);
            $_SESSION['message']="You are now logged in";
            $_SESSION['username']=$username;
            header("location:studentindex.php");  //redirect home page
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
            height: 18.75rem;
            position: fixed;
            top: 50%;
            margin-top: -9.375rem;
            left: 50%;
            margin-left: -12.5rem;
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
<body class="bg-darkTeal">
    <div class="login-form padding20 block-shadow">
        <form>
            <h1 class="text-light">Login to service</h1>
            <hr class="thin"/>
            <br />
            <table>
               <tr>
                     <td>Username : </td>
                     <td><input type="text" name="username" class="textInput"></td>
               </tr>
               <tr>
                     <td>Email : </td>
                     <td><input type="email" name="email" class="textInput"></td>
               </tr>
                <tr>
                     <td>Password : </td>
                     <td><input type="password" name="password" class="textInput"></td>
               </tr>
                <tr>
                     <td>Password again: </td>
                     <td><input type="password" name="password2" class="textInput"></td>
               </tr>
                <tr>
                     <td></td>
                     <td><input type="submit" name="register_btn" class="Register"></td>
               </tr>
        </form>
    </div>
</body>
</html>
