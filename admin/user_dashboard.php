<?php

include 'config.php';
if (!isset($_SESSION['id'])) {
    header('location:admin_login.php');
}
if (!isset($_SESSION['id'])) {
    $_SESSION['id'] = $_COOKIE['id'];
}

$id = $_SESSION['id'];
$sql =  "SELECT * FROM users WHERE id ='$id'";
$result1 = mysqli_query($conn, $sql);
$mydata = mysqli_fetch_assoc($result1);

$per_page = 3;
$start = 0;
$current_page = 1;
if (isset($_GET['start'])) {
    $start = $_GET['start'];
    if ($start <= 0) {
        $start = 0;
        $current_page = 1;
    } else {
        $current_page = $start;
        $start--;
        $start = $start * $per_page;
    }
}

$record = mysqli_num_rows(mysqli_query($conn, "select * from users"));
$pagi = ceil($record / $per_page);

$query = "SELECT * FROM users limit $start ,$per_page";
$result = mysqli_query($conn, $query);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user dashboard</title>
    <!-- TAILWIND CSS -->
    <link href="../assets/css/tailwind.css" rel="stylesheet">
    <!-- ALPINE JS -->
    <script src="../assets/js/alpine.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

    <style>
        .navigation {
            /* position: relative; */
        }

        .content {
            /* position: absolute; */
        }

        a,
        span {
            text-decoration: none;
        }
    </style>

</head>

<body class="antialiased bg-gray-100">
    <div class="navigation">
        <!-- navigation -->
        <nav class="navbar bg-light  shadow-sm">
            <div class="container-lg">

                <a class="navbar-brand text-success" href="#">
                    <i class="fa-solid fa-heart-circle-plus"></i>
                    HEALTH
                </a>
                <a class="nav-link second-text fw-bold d-flex p-2" style="color:black;" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="../img/admin.png" alt="" class="rounded-circle mr-3" height="26px" width="40px"><?php echo $mydata['Email']; ?>
                </a>
            </div>
        </nav>
    </div>
    <!-- navigation end -->
    <div class="" class="content">
        <div class="row">
            <div class="col-md-2">
                <nav class=" bg-success absolute md:relative w-64 transform -translate-x-full md:translate-x-0 h-screen overflow-y-scroll bg-black transition-all duration-300" :class="{'-translate-x-full': !navOpen}">
                    <div class="flex flex-col justify-between h-full">
                        <div class="p-4">
                            <div class="py-4 text-gray-400 space-y-1">
                                <!-- BASIC LINK -->
                                <a href="dashboard.php" class="block py-2.5 px-4 flex items-center space-x-2 text-white rounded">
                                    <i class="fas fa-tachometer-alt me-2" style="font-size:large;"></i>
                                    <span>Dashboard</span>
                                </a>
                                <!-- DROPDOWN LINK -->
                                <div class="block" x-data="{open: false}">
                                    <div @click="open = !open" class="flex items-center text-white justify-between cursor-pointer py-2.5 px-4 rounded">
                                        <div class="flex items-center space-x-2">
                                            <i class="fa-solid fa-user-doctor me-2" style="font-size:larger;"></i>
                                            <span>Doctor</span>
                                        </div>
                                        <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                        </svg>
                                        <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                    <div x-show="open" class="text-sm border-l-2 border-gray-800 mx-6 my-2.5 px-2.5 flex flex-col gap-y-1">
                                        <a href="doctor.php" class="block py-2 px-4 text-white hover:bg-gray-800 hover:text-white rounded">
                                            Profile
                                        </a>
                                        <a href="specialization.php" class="block py-2 px-4 text-white hover:bg-gray-800 hover:text-white rounded">
                                            Specialization
                                        </a>
                                    </div>
                                </div>
                                <div class="block" x-data="{open: false}">
                                    <div @click="open = !open" class="flex items-center text-white justify-between cursor-pointer py-2.5 px-4 rounded">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                            </svg>
                                            <span>Scheduled</span>
                                        </div>
                                        <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                        </svg>
                                        <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                    <div x-show="open" class="text-sm border-l-2 border-gray-800 mx-6 my-2.5 px-2.5 flex flex-col gap-y-1">
                                        <a href="appointments.php" class="block py-2 px-4 text-white hover:bg-gray-800 hover:text-white rounded">
                                            Appointments
                                        </a>
                                    </div>
                                </div>
                                <a href="patient.php" class="block py-2.5 px-4 flex items-center space-x-2 text-white rounded">
                                    <i class="fa-solid fa-bed me-2" style="font-size:large;"></i>
                                    <span>Patients</span>
                                </a>
                                <a href="users.php" class="block py-2.5 px-4 flex items-center space-x-2 text-white rounded">
                                    <i class="fa-solid fa-user me-2" style="font-size:large;"></i>
                                    <span>Users</span>
                                </a>
                                <a href="logout.php" class="block py-2.5 px-4 flex items-center space-x-2  text-white rounded">
                                    <i class="fas fa-project-diagram me-2" style="font-size:large;"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>


            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-hover table-bordered border-success text-center">
                            <thead class="bg-dark text-light">
                                <tr class="uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-center">ID</th>
                                    <th class="py-3 px-6 text-center">FNAME</th>
                                    <th class="py-3 px-6 text-center">LNAME</th>
                                    <th class="py-3 px-6 text-center">EMAIL</th>
                                    <th class="py-3 px-6 text-center">OPERATION</th>
                                </tr>
                            </thead>
                            <tbody id="rows">
                                <?php
                                if (mysqli_num_rows($result) > 0) {
                                    while ($data = mysqli_fetch_assoc($result)) { ?>
                                        <tr id="<?php echo $data['id']; ?>">
                                            <td class="id"><?php echo $data['id']; ?></td>
                                            <td data-target="firstName"><?php echo $data['firstName']; ?></td>
                                            <td data-target="lastName"><?php echo $data['lastName']; ?></td>
                                            <td data-target="Email"><?php echo $data['Email']; ?></td>
                                            <td>
                                                <a href="#" data-role="update" data-id="<?php echo $data['id']; ?>"><i class="fa-solid fa-pen-to-square text-success" data-bs-target="#edit" data-bs-toggle="modal" style="font-size:20px;margin-right:30px;"></i></a>
                                                <a href="#" class="delete-btn"><i class="fa-solid fa-trash-can text-danger" data-bs-target="#delete" data-bs-toggle="modal" style="font-size:20px;margin-right:30px;"></i></a>
                                                <!-- <a href="#" class="view-btn"><i class="fa-solid fa-eye text-primary" data-bs-target="#view" data-bs-toggle="modal" style="font-size:20px;margin-right:30px;"></i></a> -->
                                            </td>
                                        </tr>
                                    <?php }
                                } else {  ?>
                                    no records
                                <?php } ?>
                            </tbody>
                        </table>
                        <?php include 'pagination.php'; ?>

                    </div>
                </div>
            </div>


        </div>
    </div>

</body>

</html>