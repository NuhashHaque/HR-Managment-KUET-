<?php
   session_start();
   session_destroy();
   unset($_SESSION['username']);
   $_SESSION['message'] ="logged OUT";
   header("location: login.php");

?>