<?php 

session_start();
$conn = mysqli_connect("localhost","root","");
if($conn){

    if(!mysqli_select_db($conn,"hospital")){
        $createdb = " CREATE DATABASE HOSPITAL";
        if(mysqli_query($conn,$createdb)){
            mysqli_select_db($conn,"hospital");
        }
    }
}
else{
    mysqli_connect_error();
}

?>

   
