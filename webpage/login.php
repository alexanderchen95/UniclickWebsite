<?php
session_start();
//connect to database
$db=mysqli_connect("localhost","root","","authentication");
if(isset($_POST['login_btn']))
{
    $username=mysql_real_escape_string($_POST['username']);
    $password=mysql_real_escape_string($_POST['password']);
    $password=md5($password); //Remember we hashed password before storing last time
    $sql="SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result=mysqli_query($db,$sql);
    if(mysqli_num_rows($result)==1)
    {
        $_SESSION['message']="You are now Loggged In";
        $_SESSION['username']=$username;
        header("location:home.php");
    }
   else
   {
                $_SESSION['message']="Username and Password combiation incorrect";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Register , login and logout user php mysql</title>
  <link href="build/css/metro.css" rel="stylesheet">
  <link href="build/css/metro-icons.css" rel="stylesheet">
  <link href="build/css/metro-responsive.css" rel="stylesheet">

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



</head>
<body class="bg-lightBlue">

<?php
    if(isset($_SESSION['message']))
    {
         echo "<div id='error_msg'>".$_SESSION['message']."</div>";
         unset($_SESSION['message']);
    }
?>
<form method="post" action="login.php">
  <h1 class="text-light">Login</h1>
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
  <div class="form-actions">
      <button type="submit" name="login_btn" class="Login">Login</button>
  </div>
</form>
</body>
</html>
