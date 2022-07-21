<?php
session_start();
setcookie('pid',$_SESSION['pid'],time() - 60*10);
session_unset();
session_destroy();
header('location:home.php');


?>