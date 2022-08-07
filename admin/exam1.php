<?php

include 'config.php';

if (!isset($_SESSION['aid'])) {
  header('location:admin_login.php');
}
if (!isset($_SESSION['aid'])) {
  $_SESSION['aid'] = $_COOKIE['aid'];
}


$id = $_SESSION['aid'];
$sql =  "SELECT * FROM admin WHERE admin_id ='$id'";
$result1 = mysqli_query($conn, $sql);
$mydata = mysqli_fetch_assoc($result1);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>dashboard</title>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js'></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css"/> -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script> -->
  <link rel="stylesheet" href="../css/dashboard.css">

</head>


<body>

  <div class="d-flex" id="wrapper">
    <?php include 'sidebar.php';?>
    
    <!-- end -->

    <div id="page-content-wrapper">
      <!-- navbar  -->
      <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
        <div class="d-flex align-items-center">
          <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
          <h2 class="fs-2 m-0">DASHBOARD</h2>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

            <li class="nav-item">
              <a class="nav-link second-text fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user me-2"></i><?php echo $mydata['email']; ?> 
              </a>
            </li>
          </ul>
        </div>
      </nav>
      <!-- navbar end -->


      <div class="row m-2 p-3">
        <div class="col-sm-3">
        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
              <div class="card-header p-3">Appointments</div>
              <div class="card-body">
                <a href="appointments.php" class="text-light">View details &raquo;</a>
              </div>
            </div>
        </div>
          <div class="col-sm-3">
          <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
              <div class="card-header p-3">Doctors</div>
              <div class="card-body">
                <a href="doctor.php" class="text-light">View details &raquo;</a>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
          <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
              <div class="card-header p-3">Patients</div>
              <div class="card-body">
                <a href="patient.php" class="text-light">View details &raquo;</a>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
          <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
              <div class="card-header p-3">Users</div>
              <div class="card-body">
                <a href="users.php" class="text-light">View details &raquo;</a>
              </div>
            </div>
          </div>
        </div>
        <!-- pie chart canvas element -->
        <!-- <canvas id="countries" width="600" height="400"></canvas>
        <script>
          var pieData = [{
              value: 20,
              color: "#878BB6"
            },
            {
              value: 40,
              color: "#4ACAB4"
            },
            {
              value: 10,
              color: "#FF8153"
            },
            {
              value: 30,
              color: "#FFEA88"
            },
            {
              value: 16,
              color: 'red'

            }
          ];
          // pie chart options
          var pieOptions = {
            segmentShowStroke: false,
            animateScale: true
          }
          // get pie chart canvas
          var countries = document.getElementById("countries").getContext("2d");
          // draw pie chart
          new Chart(countries).Pie(pieData, pieOptions);
        </script> -->


        <?php
        // include 'alert.php';
        ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script>
          var el = document.getElementById("wrapper")
          var toggleButton = document.getElementById("menu-toggle");

          toggleButton.onclick = function() {
            el.classList.toggle("toggled")
          }
        </script>

</body>