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

$record = mysqli_num_rows(mysqli_query($conn, "select * from patient"));
$pagi = ceil($record / $per_page);

$query = "SELECT p.patient_id,p.patient_name,p.email,p.mobile,p.gender,p.age,d.doctor_name FROM patient as p,doctor as d
          where p.doctor_id = d.doctor_id limit $start ,$per_page";
$result = mysqli_query($conn, $query);

function FillComboBoxUpdate($query, $id)
{

  global $conn;
  $cmbStr = "<option value=\"select\">Select</option>";
  $cmbRS = mysqli_query($conn, $query) or die(mysqli_error($conn));
  while ($cmbRow = mysqli_fetch_array($cmbRS)) {
    if ($cmbRow[0] == $id)
      $cmbStr = $cmbStr . "<option selected=\"selected\" value=" . $cmbRow[0] . ">" . $cmbRow[1] . "</option>";
    else
      $cmbStr = $cmbStr . "<option value=" . $cmbRow[0] . ">" . $cmbRow[1] . "</option>";
  }
  return $cmbStr;
}

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
  <script src="../js/jquery.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Appoinment</title>
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
          <h1 class="text-2xl font-semibold pt-2">Patients</h1>
          <a class="nav-link second-text fw-bold d-flex p-3" style="color:black;" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="../img/admin.png" alt="" class="rounded-circle mr-3" height="16px" width="40px"><?php echo $mydata['Email']; ?>
          </a>
        </div>

        <!-- Doctors Table -->
        <div class="table-responsive mx-auto shadow p-4 mt-5 bg-white">

          <div class="row">

            <div class="col-md-6">
              <button class="btn btn-primary" data-bs-target="#add" data-bs-toggle="modal">+ Add Patients</button>
            </div>

            <div class="col-md-6 mb-4 d-flex">
              <input class="form-control" id="search" type="text" name="search" placeholder="Search" aria-label="Search" style="margin-left:300px;">
            </div>
          </div>

          <table class="table table-hover table-bordered border-success text-center">
            <thead class="bg-dark text-light">
              <tr class="uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-center">ID</th>
                <th class="py-3 px-6 text-center">PATIENT_NAME</th>
                <th class="py-3 px-6 text-center">EMAIL</th>
                <th class="py-3 px-6 text-center">MOBILE</th>
                <th class="py-3 px-6 text-center">GENDER</th>
                <th class="py-3 px-6 text-center">AGE</th>
                <th class="py-3 px-6 text-center">DOCTOR</th>
                <th class="py-3 px-6 text-center">OPERATION</th>
              </tr>
            </thead>
            <tbody id="rows">
              <?php
              if (mysqli_num_rows($result) > 0) {
                while ($data = mysqli_fetch_assoc($result)) { ?>
                  <tr id="<?php echo $data['patient_id']; ?>">
                    <td class="patient_id"><?php echo $data['patient_id']; ?></td>
                    <td data-target='patient_name'><?php echo $data['patient_name']; ?></td>
                    <td data-target='email'><?php echo $data['email']; ?></td>
                    <td data-target='mobile'><?php echo $data['mobile']; ?></td>
                    <td data-target='gender'><?php echo $data['gender']; ?></td>
                    <td data-target='age'><?php echo $data['age']; ?></td>
                    <td data-target='doctor_name'><?php echo $data['doctor_name']; ?></td>

                    <td>
                      <a href="#" data-role="patientupdate" data-id="<?php echo $data['patient_id']; ?>"><i class="fa-solid fa-pen-to-square text-success" data-bs-target="#edit" data-bs-toggle="modal" style="font-size:20px;margin-right:30px;"></i></a>
                      <a href="#" class="delete-btn"><i class="fa-solid fa-trash-can text-danger" data-bs-target="#delete" data-bs-toggle="modal" style="font-size:20px;margin-right:30px;"></i></a>
                  </tr>
                <?php }
              } else {  ?>
                no records
              <?php } ?>
            </tbody>
          </table>
          <?php include 'pagination.php'; ?>
        </div>

      </section>
    </main>
  </div>

  <!-- crud section end -->
  <div class="d-flex" id="wrapper">


    <!-- add user modal -->

    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add patient</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container p-5 text-dark mx-auto bg-light">

              <form action="code.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="form-group p-2">
                    <label>Patient name</label>
                    <input type="text" name="fname" class="form-control" placeholder="first name" value="">
                  </div>

                  <div class="form-group p-2">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" placeholder="email" value="">
                  </div>

                  <div class="form-group col-md-6 p-2">
                    <label>Age</label>
                    <input type="text" name="age" class="form-control" placeholder="age" value="">
                  </div>

                  <div class="form-group col-md-6 p-2">
                    <label>Mobile</label>
                    <input type="text" name="mobile" class="form-control" placeholder="mobile" value="">
                  </div>

                  <div class="form-group p-2">
                    <label>Gender</label>
                    <input type="radio" name="gender" value="male">Male
                    <input type="radio" name="gender" value="female">Female
                  </div>

                  <div class="form-group p-2">
                    <label for="">Doctor</label>
                    <?php $query = "select doctor_id,doctor_name from doctor"; ?>
                    <select name="doctor_id" id="editdoctorname" value="<?php echo $row[3] ?>">
                      <?php  echo FillComboBoxUpdate($query,$row[5]);
                      ?>
                    </select>
                  </div>

                  <div class="form-group p-2">
                    <button type="submit" class="btn btn-success btn-block" name="patient">Add</button>
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
            <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container p-5 text-dark mx-auto bg-light">
              <form action="code.php" method="POST">

                <div class="row">

                  <input type="hidden" id="patient_id" name="patient_id">

                  <div class="form-group col-md-6 p-2">
                    <label>patient name</label>
                    <input type="text" name="patient_name" id="editpatientname" class="form-control" placeholder="patient name" value="">
                  </div>

                  <div class="form-group col-md-6 p-2">
                    <label>email</label>
                    <input type="text" name="email" id="editemail" class="form-control" placeholder="email" value="">
                  </div>

                  <div class="form-group p-2">
                    <label>mobile</label>
                    <input type="text" name="mobile" id="editmobile" class="form-control" placeholder="mobile" value="">
                  </div>

                  <div class="form-group p-2">
                    <label>age</label>
                    <input type="text" name="age" id="editage" class="form-control" placeholder="specialization" value="">
                  </div>

                  <div class="form-group p-2">
                    <label for="">Doctor</label>
                    <?php $query = "select doctor_id,doctor_name from doctor"; ?>
                    <select name="doctor_name" id="editdoctorname" value="<?php echo $row[3] ?>">
                      <?php  echo FillComboBoxUpdate($query,$row[5]);
                      ?>
                    </select>
                  </div>

                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
                  <button type="submit" name="patient_update" class="btn btn-success" data-bs-dismiss="modal">update</button>
                </div>
              </form>

            </div>
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
              <input type="hidden" id="delete_id" name="patient_id">
              <h4>Are you sure,you want to delete this data?</h4>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
              <button type="submit" name="patientdelete" class="btn btn-danger" data-bs-dismiss="modal">delete</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- end -->
  </div>
  <script>
    $(document).ready(function() {

      $('#search').keyup(function() {
        search_table($(this).val());

      });

      function search_table(value) {
        $('#rows tr').each(function() {
          var found = 'false';
          $(this).each(function() {
            if ($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0) {
              found = 'true';
            }
          });
          if (found == 'true') {
            $(this).show();
          } else {
            $(this).hide();
          }
        });

      }
      $('.delete-btn').click(function(e) {
        e.preventDefault();

        var sid = $(this).closest('tr').find('.patient_id').text();
        $('#delete_id').val(sid);
        $('#delete').modal('show');

      });

      // edit value
      $(document).on('click', 'a[data-role=patientupdate]', function() {
        // append values in input feilds
        // alert($(this).attr('data-id'));
        var id = $(this).attr('data-id');
        var patient_name = $('#' + id).children('td[data-target=patient_name]').text();
        var email = $('#' + id).children('td[data-target=email]').text();
        var mobile = $('#' + id).children('td[data-target=mobile]').text();
        var age = $('#' + id).children('td[data-target=age]').text();
        var doctor_name = $('#' + id).children('td[data-target=doctor_name]').text();

        $('#patient_id').val(id);
        $('#editpatientname').val(patient_name);
        $('#editemail').val(email);
        $('#editmobile').val(mobile);
        $('#editage').val(age);
        $('#editdoctorname').val(doctor_name);

        $('#edit').modal('toggle');

      });
    });
  </script>

  <!-- script section -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

</body>

</html>