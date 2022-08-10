<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- TAILWIND CSS -->
    <link href="../assets/css/tailwind.css" rel="stylesheet">
    <!-- ALPINE JS -->
    <script src="../assets/js/alpine.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
</head>

<body class="antialiased bg-gray-100">
    
    <nav class=" bg-success absolute md:relative w-64 transform md:translate-x-0 h-screen bg-black transition-all duration-300" :class="{'-translate-x-full': !navOpen}">
        <div class="flex flex-col justify-between h-full">
            <div class="p-4">
                <!-- LOGO -->
                <a class="nav-link second-text fw-bold p-2" style="color:white;margin:10px;" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <!-- <img src="../img/admin.png" alt="" class="rounded-circle" style="margin-left:30px;" height="80px" width="80px"> -->
                    <img src="<?php echo $mydata['img']; ?>" class="rounded-circle" style="margin-left:30px;background-color:white;" alt="Network Error" height='70px' width='80px'>
                    <p style="padding-top:20px;"><?php echo $mydata['Email']; ?></p>
                </a>
    
                <div class="py-4 text-gray-400 space-y-1">
                    <a href="../index.php" class="block py-2.5 px-4 flex items-center space-x-2 text-white rounded" style="text-decoration:none;">
                        <i class="fa-solid fa-house-user" style="font-size:larger;"></i>
                        <span>Home</span>
                    </a>        
                    <a href="#" class="block py-2.5 px-4 flex items-center space-x-2 text-white rounded" style="text-decoration:none;">
                        <i class="fa-solid fa-clipboard-user me-2" style="font-size:large;"></i>
                        <span>Appointment</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

</body>
</html>