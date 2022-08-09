<?php

include 'config.php';

if (!isset($_SESSION['id'])) {
    header('location:login.php');
}
if (!isset($_SESSION['id'])) {
    $_SESSION['id'] = $_COOKIE['id'];
}

$id = $_SESSION['id'];
$sql =  "SELECT * FROM users WHERE id ='$id'";
$result1 = mysqli_query($conn, $sql);
$mydata = mysqli_fetch_assoc($result1);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user dasboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css" />
    <style>
        .data {
            font-size: larger;
            margin: 20px;
        }
    </style>
</head>

<body>
    <div class="container-fluid m-0 p-0">
        <div class="row no-gutters">
            <div class="col-2">
                <?php include 'side.php'; ?>
            </div>

            <div class="col-10">

                <nav class="navbar bg-light  shadow-sm">
                    <div class="container-lg p-2">
                        <a class="navbar-brand text-success" href="#">
                            <i class="fa-solid fa-heart-circle-plus"></i>
                            HEALTHCARE
                        </a>
                        <a href="logout.php" class="text-danger fw-3" style="text-decoration:none;">Logout</a>
                    </div>
                </nav>

                <!-- <div class="data"> -->
                <!-- <marquee>Welcome to your page</marquee> -->
                <!-- </div> -->

                <div class="content">

                    <!-- <div class="container-fluid justify-content-end"> -->
                    <!-- <div class="container mx-auto"> -->
                    <div class="table-responsive mx-auto p-4">
                        <h2 class="text-success">Details</h2>
                        <table class="table table-bordered mt-4 w-full bg-white">
                            <tr>
                                <th class="th-dark">Id</th>
                                <td><?php echo $mydata['id']; ?> </td>
                            </tr>
                            <tr>
                                <th>Fisrt_Name</th>
                                <td><?php echo $mydata['firstName']; ?> </td>
                            </tr>
                            <tr>
                                <th>Last_Name</th>
                                <td><?php echo $mydata['lastName']; ?> </td>
                            </tr>
                            <tr>
                                <th>email</th>
                                <td><?php echo $mydata['Email']; ?> </td>
                            </tr>
                            <tr>
                                <th>Mobile no</th>
                                <td><?php echo $mydata['Mobile']; ?> </td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td><?php echo $mydata['Gender']; ?> </td>
                            </tr>
                            <tr>
                                <th>Photo</th>
                                <td><img src="<?php echo $mydata['img']; ?>" alt="Network Error" hright='100px' width='100px'></td>
                            </tr>
                            <tr>
                                <th>Update</th>
                                <td>
                                    <a href="#" data-role="update" data-id="<?php echo $data['id']; ?>"><i class="fa-solid fa-pen-to-square text-success" data-bs-target="#edit" data-bs-toggle="modal" style="font-size:20px;margin-right:30px;"></i></a>
                                </td>
                            </tr>

                        </table>


                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- edit modal -->
    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">edit data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container p-5 text-dark mx-auto bg-light">
                        <form action="code.php" method="POST">

                            <div class="row">

                                <input type="hidden" id="userId" name="userId">

                                <div class="form-group col-md-6 p-2">
                                    <label>first name</label>
                                    <input type="text" name="fname" id="editfname" class="form-control" placeholder="first name" value="">
                                </div>

                                <div class="form-group col-md-6 p-2">
                                    <label>last name</label>
                                    <input type="text" name="lname" id="editlname" class="form-control" placeholder="last name" value="">
                                </div>

                                <div class="form-group col-md-12 p-2">
                                    <label>email</label>
                                    <input type="text" name="email" id="editemail" class="form-control" placeholder="email" value="">
                                </div>

                                <div class="form-group col-md-6 p-2">
                                    <label>mobile</label>
                                    <input type="text" name="mob" id="editmob" class="form-control" placeholder="mobile" value="">
                                </div>

                                <div class="form-group col-md-6 p-2">
                                    <label>gender</label>
                                    
                                </div>

                                <div class="form-group p-2">
                                    <label>photo</label>
                                    <input type="text" name="email" id="editemail" class="form-control" placeholder="email" value="">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
                                <button type="submit" name="update" class="btn btn-success" data-bs-dismiss="modal">update</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</body>

</html>