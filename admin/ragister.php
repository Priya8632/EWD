<?php

include 'config.php';

$fnamearr = $lnamearr =$pwarr = $cwarr = $emailarr ="";
$error = $createTable ="";
$fname = $lname = $email = $pw = $cw ="";


$query = "SELECT * FROM users";

if(isset($_REQUEST['submit'])){
    if(!mysqli_query($conn,$query)){

    $createTable = "CREATE TABLE USERS(
        id int(10) auto_increment primary key,
        firstName text,
        lastName text,
        Email text,
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
    
 else{

    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pw = base64_encode($_POST['p_word']);
    $cw = base64_encode($_POST['c_word']);

    
    $insert = "INSERT INTO users
        (`firstName`,`lastName`,`Email`,`Password`,`Confirm_Password`) VALUES 
        ('$fname','$lname','$email','$pw','$cw')";
    
        if(mysqli_query($conn,$insert)){
            // $_SESSION['status'] = "registered successfully";
            // $_SESSION['status_code'] = "success"; 
            header('location:login.php');
        } 
        // else{
        //     $_SESSION['status'] = "Do not Registered";
        //     $_SESSION['status_code'] = "error";
        //     header('location:ragister.php');
        // }


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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css"/>
    <link href="../css/bootstrap.min.css" rel="stylesheet">

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
            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->

        <ul class="nav jastify-content-end">
          <li class="nav-item"><a class="nav-link text-success" href="index.php">Home</a></li>
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

          

            <div class="form-group">
                <input type="password" name="p_word" class="form-control" placeholder="password" value="<?php if(isset($_POST['p_word'])) { echo $_POST['p_word'];} ?>">
                <span class="error">* <?php echo $pwarr; ?></span>
            </div>
            
            <div class="form-group">
                <input type="password" name="c_word" class="form-control" placeholder="confirm" value="<?php if(isset($_POST['c_word'])) { echo $_POST['c_word'];}?>">
                <span class="error">* <?php echo $cwarr;?></span>
            </div>

            <div class="form-group">
                <p class="login-register-text">Alredy have an account?<a href="login.php">Login here</a></p>
                <button type="submit" class="btn btn-success btn-block" name="submit">SUBMIT</button>
            </div>

        </form>
        </div>

</body>
</html>


