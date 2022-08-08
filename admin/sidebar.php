<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sidebar</title>
    <!-- TAILWIND CSS -->
    <link href="../assets/css/tailwind.css" rel="stylesheet">
    <!-- ALPINE JS -->
    <script src="../assets/js/alpine.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="../css/sidebar.css"> -->

    <style>
        a {
            text-decoration: none;
        }
    </style>
</head>

<body class="antialiased bg-gray-100">
<!-- <div class="flex relative" x-data="{navOpen: false}"> -->
<!-- NAV -->
<nav class=" bg-success absolute md:relative w-64 transform -translate-x-full md:translate-x-0 h-screen overflow-y-scroll bg-black transition-all duration-300" :class="{'-translate-x-full': !navOpen}">
    <div class="flex flex-col justify-between h-full">
        <div class="p-4">
            <!-- LOGO -->
            <a class="flex items-center text-white space-x-4" href="">
                <i class="fas fa-user-secret me-2" style="font-size:larger;"></i>
                <span class="text-2xl font-bold">HEALTHCARE</span>
            </a>
            <hr>
            <!-- NAV LINKS -->
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

<!-- PAGE CONTENT -->
 <!-- <main class="flex-1 h-screen overflow-y-scroll overflow-x-hidden">
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
                <img src="../img/admin.png" alt="" class="rounded-circle mr-3" height="16px" width="40px">
            </a>
        </div>
    </section>
</main> -->

<!-- </div> -->




<!-- <div class="d-flex" id="wrapper">
    <div class="bg-white" id="sidebar-wrapper">
        <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-blod text-uppercase border-bottom">
            <i class="fas fa-user-secret me-2"></i>HEALTHCARE
        </div>
        <div class="list-group list-group-flush my-3">
            <a href="dashboard.php" class="list-group-item list-group-item-action bg-transparent second-text active">
                <i class="fas fa-tachometer-alt me-2"></i>Dashboard
            </a>
            <a href="doctor.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fa-solid fa-user-doctor me-2"></i>Doctors
            </a>
            <a href="patient.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fa-solid fa-bed me-2"></i>Patients
            </a>
            <a href="appointments.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fa-solid fa-clipboard-user me-2"></i>Appointments
            </a>
            <a href="specialization.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fa-solid fa-star-of-life me-2"></i>Specialization
            </a>
            <a href="users.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fa-solid fa-user me-2"></i>Users
            </a>
            <a href="logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold">
                <i class="fas fa-project-diagram me-2"></i>logout
            </a>
        </div>
    </div>
</div> -->

</body>

</html>