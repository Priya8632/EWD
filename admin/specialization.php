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
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- TAILWIND CSS -->
  <link href="../assets/css/tailwind.css" rel="stylesheet">
  <!-- ALPINE JS -->
  <script src="../assets/js/alpine.js" defer></script>
  <script src="../js/code.js"></script>
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
          <h1 class="text-2xl font-semibold pt-2">Specializations</h1>
          <a class="nav-link second-text fw-bold d-flex p-3" style="color:black;" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="../img/admin.png" alt="" class="rounded-circle mr-3" height="16px" width="40px"><?php echo $mydata['email']; ?>
          </a>
        </div>

        <!-- Specializations Table -->
        <div class="table-responsive mx-auto shadow p-4 mt-5 bg-white">
          <div class="row">

            <div class="col-md-6">
              <button class="btn btn-primary" data-bs-target="#add" data-bs-toggle="modal">+ Add Speciality</button>
            </div>

            <div class="col-md-6 mb-4 d-flex">
              <input class="form-control" id="search" type="text" name="search" placeholder="Search" aria-label="Search" style="margin-left:300px;">
            </div>
          </div>

          <table class="table table-hover table-bordered border-success text-center">
            <thead class="bg-dark text-light">
              <tr class="uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-center">ID</th>
                <th class="py-3 px-6 text-center">SPECIALIZATION</th>
                <th class="py-3 px-6 text-center">PHOTO</th>
                <th class="py-3 px-6 text-center">OPERATION</th>
              </tr>
            </thead>
            <tbody id="rows">
              <?php
              if (mysqli_num_rows($result) > 0) {
                while ($data = mysqli_fetch_assoc($result)) { ?>

                  <tr id="<?php echo $data['specialization_id']; ?>">
                    <td class="s_id"><?php echo $data['specialization_id']; ?></td>
                    <td data-target="specialization"><?php echo $data['specialization']; ?></td>
                    <td data-target="image"><img src="<?php echo $data['img']; ?>" alt="Network Error" width='60px'></td>
                    <td>
                      <a href="#" data-role="specializationupdate" data-id="<?php echo $data['specialization_id']; ?>"><i class="fa-solid fa-pen-to-square text-success" data-bs-target="#edit" data-bs-toggle="modal" style="font-size:20px;margin-right:30px;"></i></a>
                      <a href="#" class="delete-btn"><i class="fa-solid fa-trash-can text-danger" data-bs-target="#delete" data-bs-toggle="modal" style="font-size:20px;margin-right:30px;"></i></a>
                  </tr>
                <?php }
              } else { ?>
                no records
              <?php } ?>
            </tbody>
          </table>
          <?php include 'pagination.php'; ?>
        </div>

      </section>
    </main>
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

                <div class="form-group col-md-6 p-2">
                  <label>Photo</label>
                  <input type="file" name="file">
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

                <div class="form-group p-2">
                  <label>Specialization</label>
                  <input type="text" name="specialization" id="editspecialization" class="form-control" placeholder="specialization" value="">
                </div>

                <div class="form-group p-2">
                  <input type="file" name="file">
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

        var sid = $(this).closest('tr').find('.s_id').text();
        $('#delete_id').val(sid);
        $('#delete').modal('show');

      });

      // edit value
      $(document).on('click', 'a[data-role=specializationupdate]', function() {
        // append values in input feilds

        var id = $(this).attr('data-id');
        var specialization = $('#' + id).children('td[data-target=specialization]').text();
        // alert(id);

        $('#s_id').val(id);
        $('#editspecialization').val(specialization);
        $('#edit').modal('toggle');

      });

    });
  </script>

  <!-- script section -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

</body>

</html>