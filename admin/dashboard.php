<?php

include 'config.php';
$query = "SELECT * FROM doctor_schedule";
$result = mysqli_query($conn,$query);
if(!$result){

  echo mysqli_error($conn);
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ragister</title>
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
          <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fa-solid fa-user-doctor me-2"></i>Doctors
          </a>
          <a href="patient.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fa-solid fa-bed me-2"></i>Patients
          </a> 
          <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fa-solid fa-clipboard-user me-2"></i>Appointments
          </a>
          <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fa-solid fa-star-of-life me-2"></i>Specialization
          </a>
          <a href="users.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fa-solid fa-user me-2"></i>Users
          </a>
          <a href="#" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold">
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
                   
                    <i class="fas fa-user me-2"></i>john doe
                  </a>
                 
                </li>
              </ul>
          </div>
    </nav>
    <!-- navbar end -->

    <div class="table-responsive mx-auto">
    <div class="row">
        <div class="col-md-6">
            <h2>Users Records </h2>
        </div>
        <div class="col-md-6">
          <i class="fa-solid fa-circle-plus" data-bs-target="#add" data-bs-toggle="modal" style="font-size:30px;margin-left:450px;"></i>
        </div>
    </div>
        <table class="table table-hover">
            <thead class="table table-dark">
                <tr>
                    <th>ID</th>
                    <th>FNAME</th>
                    <th>LNAME</th>
                    <th>EMAIL</th>
                    <th>PASSWORD</th>
                    <th>OPERATION</th>
                </tr>
            </thead>
            <tbody id="rows">
                <?php while ($data = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $data['id']; ?></td>
                        <td><?php echo $data['firstName']; ?></td>
                        <td><?php echo $data['lastName']; ?></td>
                        <td><?php echo $data['Email']; ?></td>
                        <td><?php echo $data['Password']; ?></td>
                        <td><a href="#"><i class="fa-solid fa-pen-to-square text-success" data-bs-target="#update" data-bs-toggle="modal" style="font-size:20px;margin-right:30px;"></i>
                            <a href="delete.php?delete=<?php echo $data['pid']; ?>"><i class="fa-solid fa-trash-can text-danger" style="font-size:20px;"></i></a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

  </div>
</div>


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



