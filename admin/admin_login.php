<?php

include 'config.php';

if (isset($_SESSION['aid'])) {
    header('location:dashboard.php');
}
if (isset($_COOKIE['aid'])) {
    header('location:dashboard.php');
}

$passarr = $emailarr = "";

if (isset($_POST['adsubmit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($_POST['email'])) {
        $emailarr = "username required";
    } elseif (empty($_POST['password'])) {
        $passarr = "password required";
    } else {


        $sql = "SELECT * FROM profile WHERE Email='$email'";
        $query = mysqli_query($conn, $sql);
        $arr = mysqli_fetch_assoc($query);
        $chkemail = mysqli_num_rows($query);

        if($chkemail)
        {

            if (base64_encode($password) == $arr['Password']) {
                $_SESSION['aid'] = $arr['id'];
                setcookie('aid', $arr['id'], time() + 60 * 10);
                header('location:dashboard.php');
            } else {

                $passarr = "password invalid";
            }
        }else{

            $emailarr =  "username is not exist";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>admin Login</title>
    <script src="../js/jquery.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        * {
            box-sizing: border-box;
        }

        h3 {
            color: rgb(43, 49, 43);
        }

        body {
            background-color: rgb(42, 153, 96);
        }

        .container {
            margin: 90px;
        }

        hr {
            position: relative;
            height: 3px;
            background: green;
            margin-bottom: 50px;
            width: 250px;
        }

        .error {
            color: red;
        }

        .eyes {
            position: absolute;
            right: 15px;

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
                <li class="nav-item"><a class="nav-link text-success" href="../index.php">Home</a></li>
            </ul>
        </div>
    </nav>
    <!-- navbar end -->

    <div class="container p-5 text-dark mx-auto bg-light w-50">

        <form action="" method="POST" enctype="multipart/form-data">
            <h3 class="p-2"><i class="fa-solid fa-user" style="font-size:30px;padding:10px;"></i>Admin</h3>
            <hr>

            <div class="form-group">
                <label for="">User name</label>
                <div class="input-group">
                    <input type="text" name="email" class="form-control" placeholder="User name" value="<?php if (isset($_POST['email'])) {
                                                                                                            echo $_POST['email'];
                                                                                                        } ?>">
                </div>
                <span class="error">* <?php echo $emailarr; ?></span>
            </div>

            <div class="form-group">
                <label for="">Password</label>
                <div class="input-group">
                    <input type="password" name="password" id="pass" class="form-control" placeholder="password" data-toggle="password" value="<?php if (isset($_POST['password'])) {
                                                                                                                                                    echo $_POST['password'];
                                                                                                                                                } ?>">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <a href="#" class="text-dark" id="icon-click"><i class="fas fa-eye" id="icon"></i></a>
                        </div>
                    </div>
                </div>
                <span class="error">* <?php echo $passarr; ?></span>
            </div>

            <div class="form-group">
                <p class="login-register-text"><a href="register.php" style="text-decoration:none;">Don't Have an Account</a></p>
                <button type="submit" class="btn btn-success btn-block" name="adsubmit">SUBMIT</button>
            </div>

        </form>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#icon-click').click(function() {
                $('#icon').toggleClass('fa-eye-slash');
                var input = $('#pass');
                if (input.attr('type') === 'password') {
                    input.attr('type', 'text');
                } else {
                    input.attr('type', 'password');
                }
            });
        });
    </script>

</body>

</html>