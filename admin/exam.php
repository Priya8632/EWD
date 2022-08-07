<?php
include 'config.php';

// $query = "SELECT * FROM users";
// $result = mysqli_query($conn, $query);


// if (!isset($_SESSION['aid'])) {
//     header('location:admin_login.php');
// }
// if (!isset($_SESSION['aid'])) {
//     $_SESSION['aid'] = $_COOKIE['aid'];
// }

// $id = $_SESSION['aid'];
// $sql =  "SELECT * FROM admin WHERE admin_id ='$id'";
// $result1 = mysqli_query($conn, $sql);
// $mydata = mysqli_fetch_assoc($result1);

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
    <!-- TAILWIND CSS -->
    <link href="../assets/css/tailwind.css" rel="stylesheet">
    <!-- ALPINE JS -->
    <script src="../assets/js/alpine.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Better Code</title>
    <style>
    a{
        text-decoration: none;
    }
</style>
</head>

<body class="antialiased bg-gray-100">
    <div class="flex relative" x-data="{navOpen: false}">
        <!-- NAV -->
        <nav class=" bg-success absolute md:relative w-64 transform -translate-x-full md:translate-x-0 h-screen overflow-y-scroll bg-black transition-all duration-300" :class="{'-translate-x-full': !navOpen}">
            <div class="flex flex-col justify-between h-full">
                <div class="p-4">
                    <!-- LOGO -->
                    <a class="flex items-center text-white space-x-4" href="">
                        <i class="fas fa-user-secret me-2" style="font-size:larger;"></i>
                        <span class="text-2xl font-bold">HEALTHCARE</span>
                    </a><hr>
                    <!-- NAV LINKS -->
                    <div class="py-4 text-gray-400 space-y-1">
                        <!-- BASIC LINK -->
                        <a href="#" class="block py-2.5 px-4 flex items-center space-x-2 bg-gray-800 text-white rounded">
                            <i class="fas fa-tachometer-alt me-2" style="font-size:large;"></i>
                            <span>Dashboard</span>
                        </a>
                        <!-- DROPDOWN LINK -->
                        <div class="block" x-data="{open: false}">
                            <div @click="open = !open" class="flex items-center bg-gray-800 text-white justify-between cursor-pointer py-2.5 px-4 rounded">
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
                                <a href="#" class="block py-2 px-4 text-white hover:bg-gray-800 hover:text-white rounded">
                                    Specialization
                                </a>
                            </div>
                        </div>
                        <div class="block" x-data="{open: false}">
                            <div @click="open = !open" class="flex items-center bg-gray-800 text-white justify-between cursor-pointer py-2.5 px-4 rounded">
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
                                <a href="#" class="block py-2 px-4 text-white hover:bg-gray-800 hover:text-white rounded">
                                    Appointments
                                </a>
                                <a href="#" class="block py-2 px-4 text-white hover:bg-gray-800 hover:text-white rounded">
                                    Patients
                                </a>
                            </div>
                        </div>
                        <a href="#" class="block py-2.5 px-4 flex items-center space-x-2 bg-gray-800 text-white rounded">
                            <i class="fa-solid fa-user me-2"  style="font-size:large;"></i>
                            <span>Users</span>
                        </a>
                        <a href="#" class="block py-2.5 px-4 flex items-center space-x-2 bg-gray-800 text-white rounded">
                            <i class="fas fa-project-diagram me-2" style="font-size:large;"></i>
                            <span>Logout</span>
                        </a>
                        
                    </div>
                </div>

                <!-- PROFILE -->
                <!-- <div class="text-gray-200 border-gray-800 rounded flex items-center justify-between p-2">
                    <div class="flex items-center space-x-2">
                        <img src="https://ui-avatars.com/api/?name=Habib+Mhamadi&size=128&background=ff4433&color=fff" class="w-7 w-7 rounded-full" alt="Profile">
                    </div>
                    <a onclick="event.preventDefault(); document.getElementById('logoutForm').submit()" href="#" class="hover:bg-gray-800 hover:text-white p-2 rounded">
                        <form id="logoutForm" action="" method="POST"></form>
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        </form>
                    </a>
                </div> -->

            </div>
        </nav>
        <!-- END OF NAV -->

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
                    <h1 class="text-2xl font-semibold pt-2 pb-6">Dashboard</h1>
                </div>

                <!-- STATISTICS -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 py-6">
                    <div class="bg-white shadow rounded-sm flex justify-between items-center py-3.5 px-3.5">
                        <div class="space-y-2">
                            <p class="text-xs text-gray-400 uppercase">Doctor</p>
                            <div class="flex items-center space-x-2">
                                <h1 class="text-xl font-semibold">14</h1>
                            </div>
                        </div>
                        <i class="fas fa-user-secret me-2" style="font-size:xx-large;color:green;"></i>
                    </div>

                    <div class="bg-white shadow rounded-sm flex justify-between items-center py-3.5 px-3.5">
                        <div class="space-y-2">
                            <p class="text-xs text-gray-400 uppercase">Patient</p>
                            <div class="flex items-center space-x-2">
                                <h1 class="text-xl font-semibold">219</h1>
                            </div>
                        </div>
                        <i class="fa-solid fa-bed" style="font-size:xx-large;color:green;"></i>
                    </div>

                    <div class="bg-white shadow rounded-sm flex justify-between items-center py-3.5 px-3.5">
                        <div class="space-y-2">
                            <p class="text-xs text-gray-400 uppercase">Appointment</p>
                            <div class="flex items-center space-x-2">
                                <h1 class="text-xl font-semibold">121</h1>
                            </div>
                        </div>
                        <i class="fa-solid fa-clipboard-user me-2" style="font-size:xx-large;color:green;"></i>
                    </div>

                    <div class="bg-white shadow rounded-sm flex justify-between items-center py-3.5 px-3.5">
                        <div class="space-y-2">
                            <p class="text-xs text-gray-400 uppercase">Users</p>
                            <div class="flex items-center space-x-2">
                                <h1 class="text-xl font-semibold">213</h1>
                            </div>
                        </div>
                        <i class="fa-solid fa-user me-2" style="font-size:xx-large;color:green;"></i>
                    </div>
                </div>

                <!-- table -->
                <!-- <div class="bg-white shadow rounded-sm my-2.5 overflow-x-auto">
                    <table class="min-w-max w-full table-auto table table-bordered">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th>ID</th>
                                <th>FNAME</th>
                                <th>LNAME</th>
                                <th>EMAIL</th>
                                <th>OPERATION</th>
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
                                            <a href="#" class="view-btn"><i class="fa-solid fa-eye text-primary" data-bs-target="#view" data-bs-toggle="modal" style="font-size:20px;margin-right:30px;"></i></a>
                                        </td>
                                    </tr>
                                <?php }
                            } else {  ?>
                                no records
                            <?php } ?>
                        </tbody>
                    </table> -->
                <!-- </div> -->
            </section>
        </main>
    </div>