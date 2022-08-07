<?php

include 'config.php';

if (isset($_SESSION['aid'])) {
    header('location:dashboard.php');
}
if (isset($_COOKIE['aid'])) {
    header('location:dashboard.php');
}

$selectTable = "SELECT * FROM admin";
$tblQuery = mysqli_query($conn, $selectTable);
$fetch_array = mysqli_fetch_assoc($tblQuery);

if (!$tblQuery) {
    $createTable = "CREATE TABLE  admin ( admin_id int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL, password VARCHAR(20) NOT NULL )";

    if (!mysqli_query($conn, $createTable)) {
        echo mysqli_errno($conn);
    }
}

$passarr = $error = $emailarr = "";

if (isset($_POST['adsubmit'])) {

    if (empty($_POST['email'])) {
        $emailarr = "username required";
    } elseif (empty($_POST['password'])) {
        $passarr = "password required";
    } else {

        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($email == $fetch_array['email'] && $password == $fetch_array['password']) {

            $_SESSION['aid'] = $fetch_array['admin_id'];
            setcookie('aid', $fetch_array['admin_id'], time() + 60 * 10);
            header('location:exam.php');
            
        } else {

            $error = "username or password invalid";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <style>
        * {
            box-sizing: border-box;
        }

        h3 {
            color: rgb(43, 49, 43);
        }

        body {
            background-color: rgb(59, 173, 82);
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
                <li class="nav-item"><a class="nav-link text-success" href="index.php">Home</a></li>
            </ul>
        </div>
    </nav>
    <!-- navbar end -->

    <div class="container p-5 text-dark mx-auto bg-light w-50">

        <form action="" method="POST" enctype="multipart/form-data">
            <h3 class="p-2"><i class="fa-solid fa-user" style="font-size:30px;padding:10px;"></i>Sign in</h3>
            <hr>

            <span class="error">* <?php echo $error; ?></span>
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
                <p class="login-register-text"><a href="#">Forgot Your Password</a></p>
                <button type="submit" class="btn btn-success btn-block" name="adsubmit">SUBMIT</button>
            </div>

        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

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
    <?php

    //  include 'alert.php';

    ?>

</body>