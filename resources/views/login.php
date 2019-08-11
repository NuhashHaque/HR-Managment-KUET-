<?php
session_start();

$db=mysqli_connect('localhost','root','','registration') or die($link);
if(isset($_POST['login_user']))
{
     $username=mysqli_real_escape_string($db,$_POST['username']);
     $password_1=mysqli_real_escape_string($db,$_POST['password_1']);
     $password_1=md5($password_1);

     $sql="SELECT * FROM users WHERE username='$username' AND password='$password_1'";
     $result=mysqli_query($db,$sql);
    if(mysqli_num_rows($result)==1)
    {
      $_SESSION['message'] ="logged in";
      $_SESSION['username']=$username;
      header("location: home.php");
    }
    else
    {
            $_SESSION['message'] ="Username/Password incorrect";

    }
       if(!empty($_POST["remember"]))   
   {  
    $cookie_name = $_POST['username'];
    $cookie_value = $_POST['username'];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
   }  

  }

?>

<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
    <h2>Login</h2>
  </div>
     <?php
  if(isset($_SESSION['message']))
  {

    echo "<div class='error'>".$_SESSION['message']."</div>";
    unset($_SESSION['message']);
  }
  ?>
  <form method="post" action="login.php">
    <div class="input-group">
      <label>Username</label>
      <input type="text" name="username" >
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password_1">
    </div>
   <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
    <div class="input-group">
      <button type="submit" class="btn" name="login_user">Login</button>
    </div>
    <p>
      Not yet a member? <a href="register.php">Sign up</a>
    </p>
  </form>
</body>
</html>