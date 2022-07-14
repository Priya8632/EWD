<?php

include 'config.php';

$fnamearr = $lnamearr =$pwarr = $cwarr = $genderarr = $agearr = $dobarr  = $mobarr = $emailarr ="";
$error = $createTable ="";
$fname = $lname = $email = $mob = $gender = $age = $dob = $pw = $cw ="";



$query = "SELECT * FROM patient";

if(isset($_REQUEST['submit'])){
    if(!mysqli_query($conn,$query)){

    $createTable = "CREATE TABLE PATIENT(
        pid int(10) auto_increment primary key,
        firstName text,
        lastName text,
        Email text,
        Mobile int,
        Age int(3),
        Gender text,
        Dob date,
        Password varchar(30),
        Confirm_Password varchar(30)
       
    )";

$tblchk = mysqli_query($conn,$createTable);
if(!$tblchk){
    echo mysqli_error($conn);
}
}


if(empty($_POST['fname'])){
    $fnamearr = "fname is required";}
elseif(!preg_match("/^[a-zA-Z-' ]*$/",$_POST['fname'])){
    $fnamearr = "only character and letter ";    }
elseif(empty($_POST['lname'])){
    $lnamearr = "lname is required";}
elseif(!preg_match("/^[a-zA-Z-' ]*$/",$_POST['lname'])){
    $lnamearr = "only character and letter ";     }
elseif(empty($_POST['email'])){
    $emailarr = "email is required";}
elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    $emailarr = "invaild formet";}
elseif(empty($_POST['mob'])){
    $mobarr = "mobile is required";}
elseif(!preg_match("/[0-9]/",$_POST['mob'])){
    $mobarr = "only number are allowed";}
elseif(empty($_POST['p_word'])){
    $pwarr = "password is required"; }
elseif(!preg_match("/[a-z'@,!,#,$,%,^,&,*,+']+/",$_POST['p_word'])){
    $pwarr = "minimum 1 small";    }
elseif(!preg_match("/[A-Z]+/",$_POST['p_word'])){
    $pwarr = "minum 1 capital"; }
elseif(!preg_match("/[0-9]/",$_POST['p_word'])){
    $pwarr = "1 number";}
elseif(strlen($_POST['p_word']) > 8 || strlen($_POST['p_word']) < 8 ){
    $pwarr = "8 length is required";}
elseif($_POST['c_word'] != $_POST['p_word']){
    $cwarr = "both password is not same..";}
elseif(empty($_POST['gender'])){
    $genderarr = "gender is required";}
elseif(empty($_POST['age'])){
    $agearr = "age is required";}
elseif(empty($_POST['dob'])){
    $dojarr = "dob is required";}    
 else{

    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $mob = $_POST['mob'];
    $pw = base64_encode($_POST['p_word']);
    $cw = base64_encode($_POST['c_word']);
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $dob = $_POST['dob'];

    
    $insert = "INSERT INTO patient
        (`firstName`,`lastName`,`Email`,`Mobile`,`Password`,`Confirm_Password`,`Gender`,`Age`,`Dob`) VALUES 
        ('$fname','$lname','$email','$mob','$pw','$cw','$gender','$age','$dob')";
    
        if(mysqli_query($conn,$insert)){
            header('location:login.php');
        } 


    }
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ragister</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css"/>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        h2{
            color:rgb(59, 178, 82);
            /* text-align: center; */
        }
        body{
            background-color: rgb(59, 173, 82);;
        }
        .container{
            margin:30px;
            width:800px;
        }
        hr{
            position:relative;
            size:3px;
            background: green;
            margin-bottom: 50px;
            width:250px;
        }
        .error{
            color:red;
        }
    </style>
  </head>
<body>
    
<!--navbar start  -->
    <nav class="navbar navbar-light bg-light shadow-sm">
        <div class="container-lg">
            <a class="navbar-brand text-success fw-bold fs-4" href="#">HEALTH</a>
        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button> -->
        <ul class="nav jastify-content-end">
          <li class="nav-item"><a class="nav-link text-success" href="home.php">Home</a></li>
          <li class="nav-item"><a class="nav-link text-success" href="#">AboutUs</a></li>
          <li class="nav-item"><a class="nav-link text-success" href="#">Contact</a></li>
          <li class="nav-item"><a class="nav-link text-success" href="#">Registar</a></li>
          <li class="nav-item"><a class="nav-link text-success" href="login.php">Login</a></li>
        </ul>
    </div>
  </nav>
<!-- navbar end -->

    <div class="container p-5 text-dark mx-auto bg-light">
        <form action="" method="POST" enctype="multipart/form-data">
            <h2 class="p-2">Registration</h2>
            <hr>

            <div class="row">
            <div class="form-group col-md-6">
                <input type="text" name="fname" class="form-control" placeholder="first name" value="<?php if(isset($_POST['fname'])) { echo $_POST['fname'];}?>">
                <span class="error">* <?php echo $fnamearr;?></span>
            </div>

            <div class="form-group col-md-6">
                <input type="text" name="lname" class="form-control" placeholder="last name" value="<?php if(isset($_POST['lname'])) { echo $_POST['lname'];}?>">
                <span class="error">*<?php echo $lnamearr; ?></span>
            </div>
            </div>

            <div class="form-group">
                <input type="text" name="email" class="form-control" placeholder="email" value="<?php if(isset($_POST['email'])) { echo $_POST['email'];}?>">
                <span class="error">* <?php echo $emailarr;?></span>
            </div>

            <div class="row">
            <div class="form-group col-md-6">
                    <input type="text" name="mob" class="form-control" placeholder="mobile no" value="<?php if(isset($_POST['mob'])) { echo $_POST['mob'];}?>">
                    <span class="error">*<?php echo $mobarr; ?></span>
            </div>
            
                <div class="form-group col-md-6">
                    <input type="text" name="age" class="form-control" placeholder="age" value="<?php if(isset($_POST['age'])) { echo $_POST['age'];}?>">
                    <span class="error">*<?php echo $agearr; ?></span>
                </div>
            </div>

            <div class="form-group">
                <input type="password" name="p_word" class="form-control" placeholder="password" value="<?php if(isset($_POST['p_word'])) { echo $_POST['p_word'];} ?>">
                <span class="error">* <?php echo $pwarr; ?></span>
            </div>
            
            <div class="form-group">
                <input type="password" name="c_word" class="form-control" placeholder="confirm" value="<?php if(isset($_POST['c_word'])) { echo $_POST['c_word'];}?>">
                <span class="error">* <?php echo $cwarr;?></span>
            </div>

            <div class="form-group">
                <label>Gender :</label>
                <input type="radio" name="gender" value="male" <?php if(isset($_POST['gender']) == 'male') { echo 'checked';}?>>MALE
                <input type="radio" name="gender" value="female" <?php if(isset($_POST['gender']) == 'female') { echo 'checked';}?>>FEMALE
                <span class="error">*<?php echo $genderarr; ?></span>
            </div>
                
            <div class="form-group">
                <label>Dath Of Birth:</label>
                <span class="error">*<?php echo $dobarr; ?></span>
                <input type="date" name="dob" placeholder="birthdate" class="form-control" value="<?php if(isset($_POST['dob'])) { echo $_POST['dob'];}?>"><br>
            </div>
            
            <div class="form-group">
                <p class="login-register-text">Alredy have an account?<a href="login.php">Login here</a></p>
                <button type="submit" class="btn btn-success btn-block" name="submit">SUBMIT</button>
            </div>

        </form>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>


