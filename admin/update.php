<?php

include 'config.php';

// $id = $_GET['update'];
// $query = "SELECT * FROM users WHERE id = $id";
// $result = mysqli_query($conn,$query);
// $data =mysqli_fetch_assoc($result);

// $error ="";
// $fnamearr = $lnamearr = $emailarr = $pwarr = $cwarr = $genderarr = $agearr = $dojarr = $deptarr = $salarr = $imgarr= "";
//$filesize = $_FILES['file']['size']; 

if(isset($_POST['update'])){

    
    // if(empty($_POST['fname'])){
    //     $fnamearr = "fname is required";}
    // elseif(!preg_match("/^[a-zA-Z-' ]*$/",$_POST['fname'])){
    //     $fnamearr = "only character and letter ";    }
    // elseif(empty($_POST['lname'])){
    //     $lnamearr = "lname is required";}
    // elseif(!preg_match("/^[a-zA-Z-' ]*$/",$_POST['lname'])){
    //     $lnamearr = "only character and letter ";     }
    // elseif(empty($_POST['email'])){
    //     $emailarr = "email is required";}
    // elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    //     $emailarr = "invaild formet";}
    // elseif(empty($_POST['p_word'])){
    //     $pwarr = "password is required"; }
    // elseif(!preg_match("/[a-z'@,!,#,$,%,^,&,*,+']+/",$_POST['p_word'])){
    //     $pwarr = "minimum 1 small";    }
    // elseif(!preg_match("/[A-Z]+/",$_POST['p_word'])){
    //     $pwarr = "minum 1 capital"; }
    // elseif(!preg_match("/[0-9]/",$_POST['p_word'])){
    //     $pwarr = "1 number";}
    // elseif(strlen($_POST['p_word']) > 8 || strlen($_POST['p_word']) < 8 ){
    //     $pwarr = "8 length is required";}   

    // else{


    $id = $data['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pw = base64_encode($_POST['p_word']);
    $cw = $_POST['c_word'];
   


    $update = "UPDATE users SET firstName='$fname',lastName='$lname', Password ='$pw',Email ='$email', Confirm_Password = '$cw' where id=$id";
    $chk = mysqli_query($conn,$update);
    if($chk){

        // $insert = "INSERT INTO users
        // (`firstName`,`lastName`,`Email`,`Password`,`Confirm_Password`) VALUES 
        // ('$fname','$lname','$email','$pw','$cw')";
        echo '<script>alert("data updated")</script>';
        header('location:users.php');
    }
    else{
        echo '<script>alert("data not updated")</script>';

    }

}


?>