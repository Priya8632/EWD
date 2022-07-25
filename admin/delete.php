<?php 

include 'config.php';

$id = $_GET['users'];

$query = "DELETE FROM users WHERE id=$id";
$result = mysqli_query($conn,$query);

if($result){
    header('location:users.php');
}else{
     echo mysqli_connect_error($conn);
}

$sid = $_GET['speciality'];

$query = "DELETE FROM specialization WHERE specialization_id=$sid";
$result = mysqli_query($conn,$query);

if($result){
    header('location:specialization.php');
}else{
     echo mysqli_connect_error($conn);
}
?>