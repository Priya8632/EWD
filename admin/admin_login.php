<?php

include 'config.php';

// if (isset($_SESSION['aid']) || isset($_COOKIE['aid'])) {    
//     header('location:dashboard.php');
// }

$selectTable = "SELECT * FROM admin";
$tblQuery = mysqli_query($conn,$selectTable) ;

if (!$tblQuery) {
    $createTable = "CREATE TABLE  admin ( id int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    email varchar(20) NOT NULL, password varchar(10) NOT NULL )";

    if(!mysqli_query($conn,$createTable)){
       echo mysqli_errno($conn); 
    }
}

$adminarr = $pwarr = $error = $emailarr ="";

if(isset($_REQUEST['adsubmit'])){

    $email = $_POST['admin'];
    $password = $_POST['pw'];

    if (empty($email)) {
        $emailarr = "email required";}
    elseif (empty($password)) {
        $passarr = "password required";} 
    elseif(!preg_match("/[a-z'@,!,#,$,%,^,&,*,+']+/",$_POST['pw'])){
        $pwarr = "minimum 1 small";    }
    elseif(!preg_match("/[A-Z]+/",$_POST['pw'])){
        $pwarr = "minum 1 capital"; }
    elseif(!preg_match("/[0-9]/",$_POST['pw'])){
        $pwarr = "1 number";}
    elseif(strlen($_POST['pw']) > 8 || strlen($_POST['pw']) < 8 ){
        $pwarr = "8 length is required";}
    
    else{
    
    
    $fetch_array = mysqli_fetch_assoc($tblQuery);
    
    if ($email== $fetch_array['email'] && $password == $fetch_array['password']  ) {
        $_SESSION['aid'] = $fetch_array['admin_id'];
        setcookie('aid',$fetch_array['admin_id'],time() + 60*10);
        header('location:dashboard.php');
        
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
    <title>admin Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css"/>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <style>
        *{
            box-sizing:border-box;
        }
        h3{
            color:rgb(43, 49, 43);
        }
        body{
            background-color: rgb(59, 173, 82);
        }
        .container{
            margin:90px;
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
          <li class="nav-item"><a class="nav-link text-success" href="index.php">Home</a></li>
        </ul>
    </div>
  </nav>
<!-- navbar end -->

<div class="container p-5 text-dark mx-auto bg-light w-50">

        <form action="" method="POST" enctype="multipart/form-data">
            <!-- <span class="error">* <?php echo $error; ?></span> -->
            <h3 class="p-2"><i class="fa-solid fa-user" style="font-size:30px;padding:10px;"></i>login</h3>
            <hr>

            <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="admin" class="form-control" placeholder="User name" value="<?php if(isset($_POST['email'])) { echo $_POST['email'];}?>">
                <span class="error">* <?php echo $emailarr;?></span>
            </div>

            <div class="form-group">
                <label for="">Email</label>
                <input type="password" name="pw" class="form-control" placeholder="password" value="<?php if(isset($_POST['pw'])) { echo $_POST['pw'];} ?>">
                <span class="error">* <?php echo $pwarr; ?></span>
            </div>

            <div class="form-group">
                <p class="login-register-text"><a href="#">Forgot Your Password</a></p>
                <button type="submit" class="btn btn-success btn-block" name="adsubmit">SUBMIT</button>
            </div>

        </form>
        </div>



        <?php

        //  include 'alert.php';

         ?>
        
</body>



