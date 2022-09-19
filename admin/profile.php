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

<body class="bg-light">
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
                    <h1 class="text-2xl font-semibold pt-2">Profile</h1>
                    <a href="admin_logout.php" class="text-danger">Logout</a>
                </div>

                <!-- Doctors Table -->
                <div class="table-responsive mx-auto shadow p-4 mt-5 bg-white">

                    <div class="table-responsive mx-auto">
                        <table class="table table-bordered mt-4 w-full bg-white">

                            <tr>
                                <th>Full name</th>
                                <td data-target="full_name"><?php echo $mydata['fullName']; ?> </td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td data-target="email"><?php echo $mydata['Email']; ?> </td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <td data-target="city"><?php echo $mydata['City']; ?> </td>
                            </tr>
                            <tr>
                                <th>Mobile no</th>
                                <td data-target="mobile"><?php echo $mydata['Mobile']; ?> </td>
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
                                    <a href="update.php"><i class="fa-solid fa-pen-to-square text-success" style="font-size:20px;margin-right:30px;"></i></a>
                                </td>
                            </tr>

                        </table>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <!-- crud section end -->

    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->

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

                                <input type="hidden" id="admin_id" name="admin_id">

                                <div class="form-group p-2">
                                    <label>full name</label>
                                    <input type="text" name="full_name" id="editadminname" class="form-control" placeholder="full name" value="">
                                </div>

                                <div class="form-group p-2">
                                    <label>email</label>
                                    <input type="text" name="email" id="editemail" class="form-control" placeholder="email" value="">
                                </div>

                                <div class="form-group col-md-6 p-2">
                                    <label>mobile</label>
                                    <input type="text" name="mobile" id="editmobile" class="form-control" placeholder="mobile" value="">
                                </div>

                                <div class="form-group col-md-6 p-2">
                                    <label for="">city</label>
                                    <input type="text" name="city" id="editcity" class="form-control" placeholder="city" value="">
                                </div>

                                <div class="form-group col-md-6 p-2">
                                    <input type="file" name="file" value="">
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
                                <button type="submit" name="admin_update" class="btn btn-success" data-bs-dismiss="modal">update</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end -->


    </div>
    <script>
        $(document).ready(function() {



            // edit value
            $(document).on('click', 'a[data-role=update]', function() {
                // append values in input feilds
                // alert($(this).attr('data-id'));
                var id = $(this).attr('data-id');
                var full_name = $('#' + id).children('td[data-target=full_name]').text();
                var email = $('#' + id).children('td[data-target=email]').text();
                var mobile = $('#' + id).children('td[data-target=mobile]').text();
                var city = $('#' + id).children('td[data-target=city]').text();

                $('#admin_id').val(id);
                $('#editadminname').val(full_name);
                $('#editemail').val(email);
                $('#editmobile').val(mobile);
                $('#editcity').val(city);
                $('#edit').modal('toggle');

            });


        });
    </script>
    <!-- script section -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

</body>

</html>