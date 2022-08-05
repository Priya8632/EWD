<?php

include 'config.php';

// $query = "SELECT * FROM specialization";
// $result = mysqli_query($conn, $query);

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

$record = mysqli_num_rows(mysqli_query($conn, "select * from specialization"));
$pagi = ceil($record / $per_page);

$query = "SELECT * FROM specialization limit $start ,$per_page";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>specialization</title>

  <link rel="stylesheet" href="../css/sidebar.css">
  <script src="../js/jquery.js"></script>
  <script src="../js/code.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css" />
  <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script> -->

  <style>
    body {
      background-color: rgb(146, 234, 153);
      padding: 0;
      margin: 0;
    }

    .table-responsive.mx-auto {
      width: 82%;
      position: absolute;
      top: 15%;
      /* right: 30px; */
      background-color: white;
      padding: 30px;
    }

    h2 {
      margin-bottom: 30px;
    }

    .list-group-item {
      border: none;
      padding: 20px 30px;
    }

    .list-group-item.active {
      background-color: transparent;
      color: var(--main-text-color);
      font-weight: bold;
      border: none;
    }
  </style>

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
        <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
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


    <div class="container justify-content-end p-3">

      <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand"><i class="fas fa-user me-2"></i><?php echo $mydata['email']; ?></a>
          <!-- <i class="fa-solid fa-gear me-2"></i> -->
        </div>
      </nav>

      <!-- <div class="container mx-auto"> -->
      <div class="table-responsive mx-auto bg-light shadow">
        <div class="row">
          <div class="col-md-6">
            <h2 class="text-success">Specialization Records </h2>
          </div>
          <div class="col-md-6">
            <button class="btn btn-primary" data-bs-target="#add" data-bs-toggle="modal" style="float:right;">+ Add speciality</button>
            <!-- <i class="fa-solid fa-circle-plus" data-bs-target="#add" data-bs-toggle="modal" style="font-size:35px;margin-left:540px;color:blue;"></i> -->
          </div>
        </div>

        <div class="row">

          <div class="col-md-6">
            <form action="" method="POST">
              <select name="records" id="records">
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="70">70</option>
              </select>
              <span>Entities</span>
            </form>
          </div>

          <div class="col-md-6 mb-4 d-flex">
            <input class="form-control" id="search" type="text" name="search" placeholder="Search" aria-label="Search" style="margin-left:300px;">
          </div>
        </div>

        <table class="table table-hover text-center" id="mytable">
          <thead class="table table-dark">
            <tr>
              <th>ID</th>
              <th>SPECIALIZATION</th>
              <th>OPERATION</th>
            </tr>
          </thead>
          <tbody id="rows">
            <?php
            if (mysqli_num_rows($result) > 0) {
              while ($data = mysqli_fetch_assoc($result)) { ?>

                <tr id="<?php echo $data['specialization_id']; ?>">
                  <td class="s_id"><?php echo $data['specialization_id']; ?></td>
                  <td data-target="specialization"><?php echo $data['specialization']; ?></td>

                  <td>
                    <a href="#" data-role="specializationupdate" data-id="<?php echo $data['specialization_id']; ?>"><i class="fa-solid fa-pen-to-square text-success" data-bs-target="#edit" data-bs-toggle="modal" style="font-size:20px;margin-right:30px;"></i></a>
                    <a href="#" class="delete-btn"><i class="fa-solid fa-trash-can text-danger" data-bs-target="#delete" data-bs-toggle="modal" style="font-size:20px;margin-right:30px;"></i></a>
                    <a href="#" class="view-btn"><i class="fa-solid fa-eye text-primary" data-bs-target="#view" data-bs-toggle="modal" style="font-size:20px;margin-right:30px;"></i></a>
                </tr>
              <?php }
            } else { ?>
              no records
            <?php } ?>
          </tbody>
        </table>
              <?php include 'pagination.php'; ?>
      </div>
    </div>

    <!-- crud section  -->

    <!-- add user modal -->

    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add speciality</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container p-5 text-dark mx-auto bg-light">

              <form action="code.php" method="POST" enctype="multipart/form-data">
                <div class="row">

                  <div class="form-group col-md-6 p-2">
                    <label>Specialization id</label>
                    <input type="text" name="specialization_id" class="form-control" placeholder="specialization id" value="">
                  </div>

                  <div class="form-group col-md-6 p-2">
                    <label>Specialization</label>
                    <input type="text" name="specialization" class="form-control" placeholder="specialization name" value="">
                  </div>

                  <div class="form-group p-2">
                    <button type="submit" class="btn btn-success btn-block" name="speciality">Add</button>
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end -->

    <!-- edit modal -->

    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">edit data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="code.php" method="POST">
            <div class="modal-body">
              <div class="container p-5 text-dark mx-auto bg-light">

                <div class="row">

                  <input type="hidden" id="s_id" name="s_id">

                  <div class="form-group col-md-6 p-2">
                    <label>Specialization</label>
                    <input type="text" name="specialization" id="editspecialization" class="form-control" placeholder="specialization" value="">
                  </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
                  <button type="submit" name="specialization_update" class="btn btn-success" data-bs-dismiss="modal">update</button>
                </div>

              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- end -->

    <!-- view modal -->
    <div class="modal fade" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">specialization details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="user_viewing"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- end -->

    <!-- delete modal -->
    <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">delete</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="code.php" method="POST">
            <div class="modal-body">
              <input type="text" id="delete_id" name="s_id">
              <h4>Are you sure,you want to delete this data?</h4>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
              <button type="submit" name="specializationdelete" class="btn btn-danger" data-bs-dismiss="modal">delete</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- end -->
  </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

</body>
</html>