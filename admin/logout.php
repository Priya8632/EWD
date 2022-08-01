<?php
session_start();
setcookie('aid',$_SESSION['aid'],time() - 60*10);
session_unset();
session_destroy();
header('location:admin_login.php');


?>