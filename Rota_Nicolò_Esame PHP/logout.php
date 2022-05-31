<?php   
session_start();
session_destroy();
header("location:login_esame/login.php");
exit();
