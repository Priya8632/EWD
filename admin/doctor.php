<?php

include 'config.php';

// $query = "SELECT d.doctor_id , d.doctor_name , d.email , d.mobile , d.gender , s.specialization  from doctor as d , specialization as s
//           where d.specialization_id = s.specialization_id ";
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

$per_page = 4;
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

$record = mysqli_num_rows(mysqli_query($conn, "select * from doctor"));
$pagi = ceil($record / $per_page);
$query = "SELECT d.doctor_id , d.doctor_name , d.email , d.mobile , d.gender , s.specialization  from doctor as d , specialization as s
          where d.specialization_id = s.specialization_id limit $start ,$per_page ";
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
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>doctor</title>

  <link rel="stylesheet" href="../css/sidebar.css">
  <script src="../js/jquery.js"></script>
  <script src="../js/code.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css" />
  <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script> -->
</head>

<body>

  <div class="d-flex" id="wrapper">
    <div class="row">

      <div class="col-md-5">
        <?php include 'sidebar.php' ?>
      </div>

      <div class="col-md-7">
        <div class="container-fluid justify-content-end">

          <!-- <h1 class="text-2xl font-semibold pt-2">Dashboard</h1> -->
          <a class="nav-link second-text fw-bold d-flex p-3" style="color:black;" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="../img/admin.png" alt="" class="rounded-circle mr-3" height="16px" width="40px"><?php echo $mydata['email']; ?>
          </a>

          <!-- <div class="container mx-auto"> -->
          <div class="table-responsive mx-auto shadow">
            <div class="row">
              <div class="col-md-6">
                <h2 class="text-success">Doctor Records</h2>
              </div>
              <div class="col-md-6">
                <button class="btn btn-primary" data-bs-target="#add" data-bs-toggle="modal" style="float:right;">+ Add User</button>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <form action="" method="POST">
                  <select name="records" id="records" onclick="select()">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                  </select>
                  <span>Entities</span>
                </form>
              </div>

              <div class="col-md-6 mb-4 d-flex">
                <input class="form-control" id="search" type="text" name="search" placeholder="Search" aria-label="Search" style="margin-left:300px;">
              </div>
            </div>

            <table class="table table-hover table-bordered border-success text-center">
              <thead class="bg-dark text-light">
                <tr class="uppercase text-sm leading-normal">
                  <th class="py-3 px-6 text-center">ID</th>
                  <th class="py-3 px-6 text-center">NAME</th>
                  <th class="py-3 px-6 text-center">EMAIL</th>
                  <th class="py-3 px-6 text-center">MOBILE</th>
                  <th class="py-3 px-6 text-center">GENDER</th>
                  <th class="py-3 px-6 text-center">SPECIALIZATION</th>
                  <th class="py-3 px-6 text-center">OPERATION</th>
                </tr>
              </thead>
              <tbody id="rows">
                <?php
                if (mysqli_num_rows($result) > 0) {
                  while ($data = mysqli_fetch_assoc($result)) { ?>
                    <tr id="<?php echo $data['doctor_id']; ?>">
                      <td class="doctorid"><?php echo $data['doctor_id']; ?></td>
                      <td data-target="doctor_name"><?php echo $data['doctor_name']; ?></td>
                      <td data-target="email"><?php echo $data['email']; ?></td>
                      <td data-target="mobile"><?php echo $data['mobile']; ?></td>
                      <td data-target="gender"><?php echo $data['gender']; ?></td>
                      <td data-target="specialization"><?php echo $data['specialization']; ?></td>

                      <td>
                        <a href="#" data-role="doctorupdate" data-id="<?php echo $data['doctor_id']; ?>"><i class="fa-solid fa-pen-to-square text-success" data-bs-target="#edit" data-bs-toggle="modal" style="font-size:20px;margin-right:30px;"></i></a>
                        <a href="#" class="delete-btn"><i class="fa-solid fa-trash-can text-danger" data-bs-target="#delete" data-bs-toggle="modal" style="font-size:20px;margin-right:30px;"></i></a>
                        <!-- <a href="#" class="view-btn"><i class="fa-solid fa-eye text-primary" data-bs-target="#view" data-bs-toggle="modal" style="font-size:20px;margin-right:30px;"></i></a> -->
                    </tr>
                  <?php }
                } else {  ?>
                  no records
                <?php } ?>
              </tbody>
            </table>
            <?php include 'pagination.php'; ?>
          </div>
        </div>
      </div>
    </div>

    <!-- crud section end -->

    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////// -->

    <!-- add user modal -->
    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container p-5 text-dark mx-auto bg-light">

              <form action="code.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="form-group p-2">
                    <label>Doctor name</label>
                    <input type="text" name="fname" class="form-control" placeholder="fname" value="">
                  </div>

                  <div class="form-group p-2">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" placeholder="email" value="">
                  </div>

                  <div class="form-group p-2">
                    <label>Mobile</label>
                    <input type="text" name="mobile" class="form-control" placeholder="mobile" value="">
                  </div>

                  <div class="form-group p-2">
                    <label>Gender</label>
                    <input type="radio" name="gender" value="male">Male
                    <input type="radio" name="gender" value="female">feMale
                  </div>

                  <div class="form-group p-2">
                    <label>Specialization</label>
                    <input type="text" name="specialization_id" class="form-control" placeholder="specialization_id" value="">
                  </div>

                  <div class="form-group p-2">
                    <button type="submit" class="btn btn-success btn-block" name="doctor">Add</button>
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
            <div class="container p-5 text-dark mx-auto bg-light">
              <form action="code.php" method="POST">

                <div class="row">

                  <input type="hidden" id="doctor_id" name="doctor_id">

                  <div class="form-group col-md-6 p-2">
                    <label>doctor name</label>
                    <input type="text" name="doctor_name" id="editdoctorname" class="form-control" placeholder="doctor name" value="">
                  </div>

                  <div class="form-group col-md-6 p-2">
                    <label>email</label>
                    <input type="text" name="email" id="editemail" class="form-control" placeholder="email" value="">
                  </div>

                  <div class="form-group p-2">
                    <label>mobile</label>
                    <input type="text" name="mobile" id="editmobile" class="form-control" placeholder="mobile" value="">
                  </div>

                  <!-- <div class="form-group p-2">
                            <label>specialization</label>
                            <input type="text" name="specialization" id="editspecialization" class="form-control" placeholder="specialization" value="">
                          </div> -->

                  <div class="form-group p-2">
                    <label for="">Specialization</label>
                    <?php $query = "select specialization_id,specialization from specialization"; ?>
                    <select name="specialization" id="editspecialization" value="<?php echo $row[1]; ?>">
                      <?php echo FillComboBoxUpdate($query, $row[1]); ?>
                    </select>
                  </div>

                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
                  <button type="submit" name="doctor_update" class="btn btn-success" data-bs-dismiss="modal">update</button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end -->

    <!-- view modal -->
    <div class="modal fade" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">doctor details</h5>
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
              <input type="hidden" id="delete_id">
              <h4>Are you sure,you want to delete this data?</h4>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
              <button type="submit" name="doctordelete" class="btn btn-danger" data-bs-dismiss="modal">delete</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- end -->
  </div>

  <!-- script section -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

</body>

</html>