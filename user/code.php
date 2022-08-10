<?php

include 'config.php';

// insert user data
$query = "SELECT * FROM users";
if (isset($_REQUEST['add'])) {

    if (empty($_POST['fname'])) {
        $fnamearr = "fname is required";
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $_POST['fname'])) {
        $fnamearr = "only character and letter ";
    } elseif (empty($_POST['lname'])) {
        $lnamearr = "lname is required";
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $_POST['lname'])) {
        $lnamearr = "only character and letter ";
    } elseif (empty($_POST['email'])) {
        $emailarr = "email is required";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $emailarr = "invaild formet";
    } elseif (empty($_POST['p_word'])) {
        $pwarr = "password is required";
    } elseif (!preg_match("/[a-z'@,!,#,$,%,^,&,*,+']+/", $_POST['p_word'])) {
        $pwarr = "minimum 1 small";
    } elseif (!preg_match("/[A-Z]+/", $_POST['p_word'])) {
        $pwarr = "minum 1 capital";
    } elseif (!preg_match("/[0-9]/", $_POST['p_word'])) {
        $pwarr = "1 number";
    } elseif (strlen($_POST['p_word']) > 8 || strlen($_POST['p_word']) < 8) {
        $pwarr = "8 length is required";
    } elseif ($_POST['c_word'] != $_POST['p_word']) {
        $cwarr = "both password is not same..";
    } else {

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $pw = base64_encode($_POST['p_word']);
        $cw = base64_encode($_POST['c_word']);

        $insert = "INSERT INTO users
        (`firstName`,`lastName`,`Email`,`Password`,`Confirm_Password`) VALUES 
        ('$fname','$lname','$email','$pw','$cw')";

        if (mysqli_query($conn, $insert)) {
            $_SESSION['status'] = "registered successfully";
            $_SESSION['status_code'] = "success"; 
            header('location:users.php');
        }
    }
}


// delete users data
if (isset($_POST['userdelete'])) {

    $uid = $_POST['id'];
    $query = "DELETE FROM users WHERE id = $uid";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header('location:users.php');
    }
}

// user update
if(isset($_POST['update']))
{
    $id = $_POST['userId'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $mobile = $_POST['mob'];

    $update = "UPDATE users SET firstName='$fname',lastName='$lname',Email ='$email',Mobile='$mobile' where id=$id";
    $chk = mysqli_query($conn,$update);
    if($chk){

        header('location:users.php');
    }
}


?>

           

