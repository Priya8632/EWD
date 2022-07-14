<?php

include 'config.php';

$pwarr = $emailarr = "";
// $email = $password = "";

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['p_word'];

    if (empty($email)) {
        $emailarr = " email required";}
    elseif (empty($password)) {
        $passarr = "password required";} 
    elseif(!preg_match("/[a-z'@,!,#,$,%,^,&,*,+']+/",$_POST['p_word'])){
        $pwarr = "minimum 1 small";    }
    elseif(!preg_match("/[A-Z]+/",$_POST['p_word'])){
        $pwarr = "minum 1 capital"; }
    elseif(!preg_match("/[0-9]/",$_POST['p_word'])){
        $pwarr = "1 number";}
    elseif(strlen($_POST['p_word']) > 8 || strlen($_POST['p_word']) < 8 ){
        $pwarr = "8 length is required";}

    else {

    $sql = "SELECT * FROM patient WHERE email='$email'";
    $query = mysqli_query($conn, $sql);
    $arr = mysqli_fetch_assoc($query);
    $row = mysqli_num_rows($query);

    if ($row) {
            header('location:dashboard.php');
             }
            
    else{
        echo "invalid email";
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
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        *{
            box-sizing:border-box;
        }
        h2{
            color:rgb(43, 49, 43);
        }
        body{
            background-color: rgb(59, 173, 82);
        }
        .container{
            margin:90px;
            width:700px;
        }
        hr{
            position:relative;
            height:3px;
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
          <li class="nav-item"><a class="nav-link text-success" href="ragister.php">Registar</a></li>
          <li class="nav-item"><a class="nav-link text-success" href="#">Login</a></li>
        </ul>
    </div>
  </nav>
<!-- navbar end -->

<div class="container p-5 text-dark mx-auto bg-light">
        <form action="" method="POST" enctype="multipart/form-data">
            <!-- <span class="error">* <?php echo $error; ?></span> -->
            <h2 class="p-2">Login</h2>
            <hr>

            <div class="form-group">
                <input type="text" name="email" class="form-control" placeholder="User name" value="<?php if(isset($_POST['email'])) { echo $_POST['email'];}?>">
                <span class="error">* <?php echo $emailarr;?></span>
            </div>

            <div class="form-group">
                <input type="password" name="p_word" class="form-control" placeholder="password" value="<?php if(isset($_POST['p_word'])) { echo $_POST['p_word'];} ?>">
                <span class="error">* <?php echo $pwarr; ?></span>
            </div>

            <div class="form-group">
                <p class="login-register-text">Don't have an account?<a href="ragister.php">Registar here</a></p>
                <button type="submit" class="btn btn-success btn-block" name="submit">SUBMIT</button>
            </div>

        </form>
        </div>

</body>



