<?php

include 'config.php';


if (!isset($_SESSION['id'])) {
    header('location:login.php');
}
if (!isset($_SESSION['id'])) {
    $_SESSION['id'] = $_COOKIE['id'];
}

$id = $_SESSION['id'];
$query = "SELECT * FROM users where id=$id";
$result = mysqli_query($conn,$query);
$data = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ragister</title>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js'></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css"/> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script> -->

    <link rel="stylesheet" href="../css/dashboard.css">
  </head>


<body>

 <div class="d-flex" id="wrapper">

 <!-- sidbar start -->

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
 <!-- end -->

<div id="page-content-wrapper">
   <!-- navbar  -->
   <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
          <div class="d-flex align-items-center">
            <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
            <h2 class="fs-2 m-0">dashboard</h2>
          </div>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
          aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <li class="nav-item">
                  <a class="nav-link second-text fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                   
                    <i class="fas fa-user me-2"></i><?php echo $data['Email'];?>
                  </a>
                 
                </li>
              </ul>
          </div>
    </nav>
    <!-- navbar end -->



  
        <!-- pie chart canvas element -->
        <canvas id="countries" width="600" height="400"></canvas>
        <script>

            var pieData = [
                {
                    value: 20,
                    color:"#878BB6"
                },
                {
                    value : 40,
                    color : "#4ACAB4"
                },
                {
                    value : 10,
                    color : "#FF8153"
                },
                {
                    value : 30,
                    color : "#FFEA88"
                },
                {
                    value : 16,
                    color : 'red'

                }
            ];
            // pie chart options
            var pieOptions = {
                 segmentShowStroke : false,
                 animateScale : true
            }
            // get pie chart canvas
            var countries= document.getElementById("countries").getContext("2d");
            // draw pie chart
            new Chart(countries).Pie(pieData, pieOptions);
            
        </script>


<?php
// include 'alert.php';
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  var el = document.getElementById("wrapper")
  var toggleButton = document.getElementById("menu-toggle");

  toggleButton.onclick = function(){
    el.classList.toggle("toggled")
  }
</script>

</body>



