<?php
session_start();
//connect to database
$db=mysqli_connect("localhost","root","","authentication");
if(isset($_POST['register_btn']))
{
    $email=mysql_real_escape_string($_POST['email']);
    $password=mysql_real_escape_string($_POST['password']);
    $password2=mysql_real_escape_string($_POST['password2']);
     if($password==$password2)
     {           //Create User
            $password=md5($password); //hash password before storing for security purposes
            $sql="INSERT INTO users(email,password) VALUES('$email','$password')";
            mysqli_query($db,$sql);
            $_SESSION['message']="You are now logged in";
            $_SESSION['email']=$email;
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
  <title>Register , login and logout user php mysql</title>
  <link href="build/css/metro.css" rel="stylesheet">
  <link href="build/css/metro-icons.css" rel="stylesheet">
  <link href="build/css/metro-responsive.css" rel="stylesheet">

  <script src="build/js/jquery-2.1.3.min.js"></script>
  <script src="build/js/metro.js"></script>

</head>
<body>
<?php
    if(isset($_SESSION['message']))
    {
         echo "<div id='error_msg'>".$_SESSION['message']."</div>";
         unset($_SESSION['message']);
    }
?>
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
        <input type="password" name="password" id="password">
        <button class="button helper-button reveal"><span class="mif-looks"></span></button>
    </div>
    <br />
    <br />
    <div class="input-control text full-size" data-role="input">
        <label for="user_login">Re-enter Password</label>
        <input type="password" name="password2" id="password2">
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
