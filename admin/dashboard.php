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

$sql =  "SELECT COUNT(doctor_id) FROM doctor";
$result = mysqli_query($conn, $sql);
$mydata1 = mysqli_fetch_assoc($result);

$sql =  "SELECT COUNT(patient_id) FROM patient";
$result2 = mysqli_query($conn, $sql);
$mydata2 = mysqli_fetch_assoc($result2);

$sql =  "SELECT COUNT(appointment_id) FROM appointment";
$result3 = mysqli_query($conn, $sql);
$mydata3 = mysqli_fetch_assoc($result3);


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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Dashboard</title>
    <style>
        a {
            text-decoration: none;
        }
    </style>
</head>

<body class="antialiased bg-gray-100">
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
                    <h1 class="text-2xl font-semibold pt-2">Dashboard</h1>
                    <a class="nav-link second-text fw-bold d-flex p-3" style="color:black;" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="<?php echo $mydata['img']; ?>" alt="" class="rounded-circle mr-3" height="16px" width="40px"><?php echo $mydata['Email']; ?>
                    </a>
                </div>

                <!-- STATISTICS -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 py-6">
                    <div class="bg-white shadow rounded-sm flex justify-between items-center py-3.5 px-3.5">
                        <div class="space-y-2">
                            <p class="text-xs text-gray-400 uppercase">Doctor</p>
                            <div class="flex items-center space-x-2">

                                <h1 class="text-xl font-semibold">
                                    <?php foreach ($mydata1 as $key => $value) {
                                        echo $value;
                                    } ?>

                                </h1>
                            </div>
                        </div>
                        <i class="fa-solid fa-user-doctor me-2" style="font-size:xx-large;color:green;"></i>
                    </div>

                    <div class="bg-white shadow rounded-sm flex justify-between items-center py-3.5 px-3.5">
                        <div class="space-y-2">
                            <p class="text-xs text-gray-400 uppercase">Patient</p>
                            <div class="flex items-center space-x-2">
                                <h1 class="text-xl font-semibold">

                                <?php foreach ($mydata2 as $key => $value) {
                                        echo $value;
                                    } ?>

                                </h1>
                            </div>
                        </div>
                        <i class="fa-solid fa-bed" style="font-size:xx-large;color:green;"></i>
                    </div>

                    <div class="bg-white shadow rounded-sm flex justify-between items-center py-3.5 px-3.5">
                        <div class="space-y-2">
                            <p class="text-xs text-gray-400 uppercase">Appointment</p>
                            <div class="flex items-center space-x-2">
                                <h1 class="text-xl font-semibold">

                                <?php foreach ($mydata3 as $key => $value) {
                                        echo $value;
                                    } ?>
                                </h1>
                            </div>
                        </div>
                        <i class="fa-solid fa-clipboard-user me-2" style="font-size:xx-large;color:green;"></i>
                    </div>

                </div>
            </section>

            <footer class="text-center bg-success text-light w-100 align-middle p-2" style="margin-top:410px;">
                    Copyright © HealthCare Department Website
            </footer>
        </main>
        
    </div>
    
</body>

</html>