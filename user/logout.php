<?php
session_start();
setcookie('id',$_SESSION['id'],time() - 60*10);
session_unset();
session_destroy();
header('location:login.php');


?>