<?php 

include 'config.php';
$id = $_GET['delete'];
$query = "DELETE FROM users WHERE id=$id";

$result = mysqli_query($conn,$query);

if($result){
    header('location:users.php');
}else{
     echo mysqli_connect_error($conn);
}

?>