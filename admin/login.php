<?php

include 'config.php';

// if (isset($_SESSION['id']) || isset($_COOKIE['id'])) {    
//     header('location:dashboard.php');
// }

$pwarr = $emailarr = "";

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

    $sql = "SELECT * FROM users WHERE email='$email'";
    $query = mysqli_query($conn, $sql);
    $arr = mysqli_fetch_assoc($query);
    $row = mysqli_num_rows($query);

    if ($row) {
        if($arr['Email'] == $email){
            // $_SESSION['status'] = "login successfully";
            // $_SESSION['status_code'] = "success"; 
            // $_SESSION['id'] = $arr['id'];
            // setcookie('id',$arr['id'],time() + 60*10);
            header('location:user_dashboard.php');
             }else {
                
                echo "invalid  password";
            }
    }    
    else{
        echo "invalid email please ragister first";
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
          <li class="nav-item"><a class="nav-link text-success" href="ragister.php">Registar</a></li>
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
                <label for="">User Name</label>
                <div class="input-group">
                    <input type="text" name="email" class="form-control" placeholder="User name" value="<?php if(isset($_POST['email'])) { echo $_POST['email'];}?>">
                </div>
                <span class="error">* <?php echo $emailarr;?></span>
            </div>

            <div class="form-group">
                <label for="">Password</label>
                <div class="input-group">
                    <input type="password" id="pass" name="p_word" class="form-control" placeholder="password" value="<?php if(isset($_POST['p_word'])) { echo $_POST['p_word'];} ?>">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <a href="#" class="text-dark" id="icon-click"><i class="fa fa-eye" id="icon"></i></a>                       
                        </div>
                    </div>
                </div>
                    <span class="error">* <?php echo $pwarr; ?></span>
            </div>

            <div class="form-group">
                <p class="login-register-text">Don't have an account?<a href="ragister.php">Registar here</a></p>
                <button type="submit" class="btn btn-success btn-block" name="submit">SUBMIT</button>
            </div>

        </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        
        <script type="text/javascript">
            $(document).ready(function()
            {
                $('#icon-click').click(function()
                {
                    $('#icon').toggleClass('fa-eye-slash');
                    var input = $('#pass');
                    if(input.attr('type') === 'password'){
                        input.attr('type','text');
                    }
                    else{
                        input.attr('type','password');
                    }
                });
            });

        </script>

</body>
</html>



