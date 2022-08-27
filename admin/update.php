<?php

include 'config.php';


if (!isset($_SESSION['aid'])) {
    header('location:admin_login.php');
}
if (!isset($_SESSION['aid'])) {
    $_SESSION['aid'] = $_COOKIE['aid'];
}

$id = $_SESSION['aid'];
$sql =  "SELECT * FROM profile WHERE id ='$id'";
$result1 = mysqli_query($conn, $sql);
$mydata = mysqli_fetch_assoc($result1);

# update user's data by self
$fullnamearr = $cityarr = $pwarr = $cwarr = $emailarr = $genderarr = $mobarr = "";
$error = $createTable = $imgarr = "";
$fullname = $city = $email = $pw = $cw = $filesize = $gender = "";

if (isset($_POST['admin_update'])) {


    if (empty($_POST['full_name'])) {
        $fullnamearr = 'first name should be not empty';}
    // } elseif (!preg_match("/^[a-zA-Z]*$/", $_POST['full_name'])) {
    //     $fullnamearr = 'only enter alphabet';
    // } elseif (empty($_POST['email'])) {
    //     $emailarr = 'email should be not empty';
    // } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    //     $emailarr = 'email invalid';
    // } elseif (empty($_POST['pw'])) {
    //     $pwarr = 'Password should be not empty';
    // } elseif (!preg_match("/[A-Z]/", $_POST['pw'])) {
    //     $pwarr = 'Password should contain at least one Capital Letter';
    // } elseif (!preg_match("/[a-z]/", $_POST['pw'])) {
    //     $pwarr = 'Password should contain at least one small Letter';
    // } elseif (!preg_match("/\d/", $_POST['pw'])) {
    //     $pwarr = 'Password should contain at least one digit';
    // } elseif (!preg_match("/\W/", $_POST['pw'])) {
    //     $pwarr = 'Password should contain at least one special character';
    // } elseif (strlen($_POST['pw']) < 8) {
    //     $pwarr = 'Password should be minimum 8 characters';
    // } elseif (empty($_POST['cw'])) {
    //     $cwarr = 'enter your confirm password';
    // } elseif ($_POST['cw'] != $_POST['pw']) {
    //     $cwarr = 'password and confirm password are not match';
    // } elseif ($_FILES["file"]["size"] > 1000000) {
        // $fileErr = 'image size should be less than 1 MB';
    else {

        $fullname = $_POST['full_name'];
        $email = $_POST['email'];
        $city = $_POST['city'];
        $mobile = $_POST['mobile'];
        $gender = $_POST['gender'];
        $pw = base64_encode($_POST['pw']);
        $cw = base64_encode($_POST['cw']);

        $target_dir = "./profile/";

        if (!file_exists($_FILES["file"]["tmp_name"])) {
            $imagepath = $mydata['img'];
        } else {

            $imagepath = $target_dir . basename($_FILES['file']['name']);
        }

        $movefile = move_uploaded_file($_FILES['file']['tmp_name'], $imagepath);

        $updateQuery = "UPDATE profile SET fullName = '$fullname',Email = '$email',City = '$city', Mobile = '$mobile',Gender = '$gender' ,Password = '$pw',Confirm_Password = '$cw' ,img = '$imagepath' WHERE id=$id";

        if (mysqli_query($conn, $updateQuery)) {
            header('location:profile.php');
        }
        else{
            echo mysqli_error($conn);
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- TAILWIND CSS -->
    <link href="../assets/css/tailwind.css" rel="stylesheet">
    <!-- ALPINE JS -->
    <script src="../assets/js/alpine.js" defer></script>
    <script src="../js/code.js"></script>
    <script src="../js/jquery.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Admin Profile</title>
    <style>
        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="flex relative" x-data="{navOpen: false}">
        <?php require 'sidebar.php' ?>

        <!-- PAGE CONTENT -->
        <main class="flex-1 h-screen overflow-y-scroll overflow-x-hidden">
            <div class="md:hidden justify-between items-center bg-success text-white flex">
                <h1 class="text-2xl font-bold px-4">HEALTHCARE</h1>
                <button @click="navOpen = !navOpen" class="btn p-4 focus:outline-none">
                    <svg class="w-6 h-6 fill-current" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>

            <section class="max-w-7xl mx-auto py-4 px-5">
                <div class="flex justify-between items-center border-b border-gray-300">
                    <h1 class="text-2xl font-semibold pt-2">Update Details</h1>
                </div>

                <!-- update form -->
                <div class="container p-5 text-dark mx-auto bg-light">
                    <form method="POST">

                        <div class="row">

                            <input type="hidden" id="admin_id" name="admin_id">

                            <div class="form-group p-2">
                                <label>Full name</label>
                                <input type="text" name="full_name" id="editadminname" class="form-control" placeholder="full name" value="<?php echo $mydata['fullName'] ?>">
                            </div>

                            <div class="form-group col-md-6 p-2">
                                <label>Email</label>
                                <input type="text" name="email" id="editemail" class="form-control" placeholder="email" value="<?php echo $mydata['Email'] ?>">
                            </div>

                            <div class="form-group col-md-6 p-2">
                                <label>Mobile</label>
                                <input type="text" name="mobile" id="editmobile" class="form-control" placeholder="mobile" value="<?php echo $mydata['Mobile'] ?>">
                            </div>

                            <div class="form-group col-md-6 p-2">
                                <label for="password">Password</label>
                                <input type="text" class="form-control" name="pw"  value=<?php echo base64_decode($mydata['Password']);?>>
                                <small class="red"><?php echo $pwarr; ?></small>
                            </div>

                            <div class="form-group col-md-6 p-2">
                                <label for="cPassword">Confirm Password</label>
                                <input type="text" class="form-control" name="cw"  value=<?php echo base64_decode($mydata['Confirm_Password']);?>>
                                <small class="red"><?php echo $cwarr; ?></small>
                            </div>

                            <div class="form-group col-md-6 p-2">
                                <label for="">City</label>
                                <input type="text" name="city" id="editcity" class="form-control" placeholder="city" value="<?php echo $mydata['City'] ?>">
                            </div>

                            <div class="form-group col-md-6 p-2">
                                <label for="">Gender
                                    <div class="form-check">
                                        <label for="" class="form-check-label">
                                            <input type="radio" value="male" class="form-check-input" name="gender" <?php if ($mydata['Gender'] == 'male') { ?> checked <?php } ?>> Male
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label for="" class="form-check-label">
                                            <input type="radio" value="female" class="form-check-input" name="gender" <?php if ($mydata['Gender'] == 'female') { ?> checked <?php } ?>> Female
                                        </label>
                                    </div>
                                </label>
                            </div>

                            <div class="form-group">
                                <label>Photo:</label>
                                <img src="<?php echo $mydata['img']; ?>" width="120px" alt="no photo">
                            </div>

                            <div class="form-group p-2">
                                <input type="file" name="file" value="">
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
                            <button type="submit" name="admin_update" class="btn btn-success" data-bs-dismiss="modal">update</button>
                        </div>
                    </form>

                </div>
            </section>
        </main>
    </div>

</body>

</html>