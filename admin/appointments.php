<?php

include 'config.php';

// $query = "SELECT a.appointment_id,a.app_number,p.patient_name,d.doctor_name,s.specialization,a.fees,a.app_date,a.app_time FROM appointment as a, doctor as d , patient as p, specialization as s
//            where a.Doctor_Id = d.Doctor_Id and p.patient_id = a.patient_id and a.specialization_id = s.specialization_id ";
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

$record = mysqli_num_rows(mysqli_query($conn, "select * from appointment"));
$pagi = ceil($record / $per_page);

$query = "SELECT a.appointment_id,a.app_number,p.patient_name,d.doctor_name,s.specialization,a.fees,a.app_date,a.app_time FROM appointment as a, doctor as d , patient as p, specialization as s
           where a.Doctor_Id = d.Doctor_Id and p.patient_id = a.patient_id and a.specialization_id = s.specialization_id  limit $start ,$per_page";
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
  <!-- <script src="../js/code.js"></script> -->
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
          <h1 class="text-2xl font-semibold pt-2">Appointments</h1>
          <a class="nav-link second-text fw-bold d-flex p-3" style="color:black;" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="../img/admin.png" alt="" class="rounded-circle mr-3" height="16px" width="40px"><?php echo $mydata['email']; ?>
          </a>
        </div>

        <!-- Appointment Table -->
        <div class="table-responsive mx-auto shadow p-4 mt-5 bg-white">

          <div class="row">
            <div class="col-md-6">
              <button class="btn btn-primary" data-bs-target="#add" data-bs-toggle="modal">+ Add Appointment</button>
            </div>

            <div class="col-md-6 mb-4 d-flex">
              <input class="form-control" id="search" type="text" name="search" placeholder="Search" aria-label="Search" style="margin-left:300px;">
            </div>
          </div>

          <table class="table table-hover table-bordered border-success text-center">
            <thead class="bg-dark text-light">
              <tr class="uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-center">ID</th>
                <th class="py-3 px-6 text-center">APP_NUMBER</th>
                <th class="py-3 px-6 text-center">PATIENT NAME</th>
                <th class="py-3 px-6 text-center">DOCTOR NAME</th>
                <th class="py-3 px-6 text-center">SPECALIZATION</th>
                <th class="py-3 px-6 text-center">FEES</th>
                <th class="py-3 px-6 text-center">DATE</th>
                <th class="py-3 px-6 text-center">TIME</th>
                <th class="py-3 px-6 text-center">OPERATION</th>
              </tr>
            </thead>
            <tbody id="rows">
              <?php
              if (mysqli_num_rows($result) > 0) {
                while ($data = mysqli_fetch_assoc($result)) { ?>
                  <tr id="<?php echo $data['appointment_id']; ?>">
                    <td class="app_id"><?php echo $data['appointment_id']; ?></td>
                    <td data-target="app_number"><?php echo $data['app_number']; ?></td>
                    <td data-target="patient_name"><?php echo $data['patient_name']; ?></td>
                    <td data-target="doctor_name"><?php echo $data['doctor_name']; ?></td>
                    <td data-target="specialization"><?php echo $data['specialization']; ?></td>
                    <td data-target="fees"><?php echo $data['fees']; ?></td>
                    <td data-target="app_date"><?php echo $data['app_date']; ?></td>
                    <td data-target="app_time"><?php echo $data['app_time']; ?></td>

                    <td>
                      <a href="#" data-role="appointmentupdate" data-id="<?php echo $data['appointment_id']; ?>"><i class="fa-solid fa-pen-to-square text-success" data-bs-target="#edit" data-bs-toggle="modal" style="font-size:20px;margin-right:30px;"></i></a>
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

  <!-- add user modal -->

  <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container p-3 text-dark mx-auto bg-light">

            <form action="code.php" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="form-group p-2">
                  <label>Appointment number</label>
                  <input type="text" name="app_number" class="form-control" placeholder="appointment_number" value="">
                </div>

                <div class="form-group p-2">
                  <label>Patient</label>
                  <input type="text" name="patient_id" class="form-control" placeholder="patient_id" value="">
                </div>

                <div class="form-group p-2">
                  <label>Doctor</label>
                  <input type="text" name="doctor_id" class="form-control" placeholder="doctor_id" value="">
                </div>

                <div class="form-group p-2">
                  <label>Specialization</label>
                  <input type="text" name="specialization_id" class="form-control" placeholder="specialization_id" value="">
                </div>

                <div class="form-group col-md-6 p-2">
                  <label>Fees</label>
                  <input type="text" name="fees" class="form-control" placeholder="fees" value="">
                </div>

                <div class="form-group col-md-6 p-2">
                  <label>Date</label>
                  <input type="date" name="app_date" class="form-control" placeholder="appointment_date" value="">
                </div>

                <div class="form-group p-2">
                  <label>Time</label>
                  <input type="text" name="app_time" class="form-control" placeholder="appointment_time" value="">
                </div>

                <div class="form-group p-2">
                  <button type="submit" class="btn btn-success btn-block" name="appointment">Add</button>
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
        <div class="modal-body">
          <div class="container p-3 text-dark mx-auto bg-light">
            <form action="code.php" method="POST">

              <div class="row">

                <input type="hidden" id="app_id" name="app_id">

                <div class="form-group p-2">
                  <label>Appointment number</label>
                  <input type="text" name="app_number" id="editapp_number" class="form-control" placeholder="appointment_number" value="">
                </div>

                <!-- <div class="form-group p-2">
                        <label>Patient</label>
                        <input type="text" name="patient_name" id="editpatient_id" class="form-control" placeholder="patient_id" value="">
                      </div>

                      <div class="form-group p-2">
                        <label>Doctor</label>
                        <input type="text" name="doctor_name" id="editdoctor_id" class="form-control" placeholder="doctor_id" value="">
                      </div>

                      <div class="form-group p-2">
                        <label>Specialization</label>
                        <input type="text" name="specialization" id="editspecialization_id" class="form-control" placeholder="specialization_id" value="">
                      </div> -->

                <div class="form-group p-2">
                  <label for="">Patient</label>
                  <?php $query = "select patient_id,patient_name from patient"; ?>
                  <select name="patient_name" id="editpatientname" value="<?php echo $row[3] ?>">
                    <?php echo FillComboBoxUpdate($query, $row[5]); ?>
                  </select>
                </div>

                <div class="form-group p-2">
                  <label for="">Doctor</label>
                  <?php $query = "select doctor_id,doctor_name from doctor"; ?>
                  <select name="doctor_name" id="editdoctorname" value="<?php echo $row[3] ?>">
                    <?php echo FillComboBoxUpdate($query, $row[5]); ?>
                  </select>
                </div>

                <div class="form-group p-2">
                  <label for="">Specialization</label>
                  <?php $query = "select specialization_id,specialization from specialization"; ?>
                  <select name="specialization" id="editspecialization" value="<?php echo $row[1]; ?>">
                    <?php echo FillComboBoxUpdate($query, $row[1]); ?>
                  </select>
                </div>

                <div class="form-group col-md-6 p-2">
                  <label>Fees</label>
                  <input type="text" name="fees" id="editfees" class="form-control" placeholder="fees" value="">
                </div>

                <div class="form-group col-md-6 p-2">
                  <label>Date</label>
                  <input type="date" name="app_date" id="editapp_date" class="form-control" placeholder="appointment_date" value="">
                </div>

                <div class="form-group p-2">
                  <label>Time</label>
                  <input type="text" name="app_time" id="editapp_time" class="form-control" placeholder="appointment_time" value="">
                </div>

              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
                <button type="submit" name="appointment_update" class="btn btn-success" data-bs-dismiss="modal">update</button>
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
            <input type="hidden" id="delete_id" name="app_id">
            <h4>Are you sure,you want to delete this data?</h4>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
            <button type="submit" name="appdelete" class="btn btn-danger" data-bs-dismiss="modal">delete</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- end -->

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

      // edit value
      $(document).on('click', 'a[data-role=appointmentupdate]', function() {
        // append values in input feilds

        var id = $(this).attr('data-id');
        var app_number = $('#' + id).children('td[data-target=app_number]').text();
        var patient_id = $('#' + id).children('td[data-target=patient_name]').text();
        var doctor_id = $('#' + id).children('td[data-target=doctor_name]').text();
        var specialization_id = $('#' + id).children('td[data-target=specialization]').text();
        var fees = $('#' + id).children('td[data-target=fees]').text();
        var app_date = $('#' + id).children('td[data-target=app_date]').text();
        var app_time = $('#' + id).children('td[data-target=app_time]').text();

        // alert(app_number);

        $('#app_id').val(id);
        $('#editapp_number').val(app_number);
        $('#editpatientname').val(patient_id);
        $('#editdoctorname').val(doctor_id);
        $('#editspecialization').val(specialization_id);
        $('#editfees').val(fees);
        $('#editapp_date').val(app_date);
        $('#editapp_time').val(app_time);
        $('#edit').modal('toggle');

      });

      $('.delete-btn').click(function(e) {
      e.preventDefault();

      var sid = $(this).closest('tr').find('.app_id').text();
      $('#delete_id').val(sid);
      $('#delete').modal('show');

    });

    });
  </script>
  <!-- script section -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

</body>

</html>