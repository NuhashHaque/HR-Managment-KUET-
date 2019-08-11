<?php
session_start();
//connect db
$db=mysqli_connect('localhost','root','','registration') or die($link);
if(isset($_POST['reg_user']))
{
     $username=mysqli_real_escape_string($db,$_POST['username']);
     $email=mysqli_real_escape_string($db,$_POST['email']);
     $password_1=mysqli_real_escape_string($db,$_POST['password_1']);
     $password_2=mysqli_real_escape_string($db,$_POST['password_2']);
     if($password_1==$password_2)
     {
      //create user
      $password_1=md5($password_1);
      $sql="INSERT INTO users(username,email,password) VALUES('$username','$email','$password_1')";
      mysqli_query($db,$sql);
      $_SESSION['message'] ="Registration Successful!";
      $_SESSION['username']=$username;
      header("location: login.php");
       
     }
     else
     {
      //failed
      $_SESSION['message'] ="THE PASSWORDS DOESN'T MATCH";

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
    <h2>Register</h2>
  </div>
    <?php
  if(isset($_SESSION['message']))
  {

    echo "<div class='error'>".$_SESSION['message']."</div>";
    unset($_SESSION['message']);
  }



  ?>
  <form method="post" action="register.php">
    <div class="input-group">
      <label>Username</label>
      <input type="text" name="username" class="textInput" >
    </div>
    <div class="input-group">
      <label>Email</label>
      <input type="email" name="email" class="textInput" >
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password_1" class="textInput" >
    </div>
    <div class="input-group">
      <label>Confirm password</label>
      <input type="password" name="password_2" class="textInput" >
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="reg_user">Register</button>
    </div>
    <p>
      Already a member? <a href="login.php">Sign in</a>
    </p>
  </form>
</body>
</html>