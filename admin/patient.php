<?php
include 'config.php';


$query = "SELECT * FROM users";
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
    <title>Patient</title>

    <link rel="stylesheet" href="../css/sidebar.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css"/> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script> -->
<style>
  .list-group-item{
    padding: 20px 30px;
    border: none;
  }
  .list-group-item.active{
    background-color:transparent;
    color:var(--main-text-color);
    font-weight: bold;
    border: none;
  }
</style>

</head>
<body>
    
<!-- <div class="container-fluid"> -->

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

<!-- <div class="container justify-content-end p-3">

   <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
   <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto  mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link second-text fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user me-2"></i>john doe
                  </a>
                </li>
              </ul>
          </div>
   </nav>

    <div class="d-flex flex-row-reverse">
        <div class="col-lg-6">
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form> 
        </div>
    </div>
</div> -->
<!-- <div class="container mx-auto">
<div class="table-responsive mx-auto">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>PID</th>
                    <th>FNAME</th>
                    <th>LNAME</th>
                    <th>EMAIL</th>
                    <th>MOBILE</th>
                    <th>AGE</th>
                    <th>GENDER</th>
                    <th>BIRTHDATE</th>
                    <th>PASSWORD</th>
                    <th>OPERATION</th>
                </tr>
            </thead>
            <tbody id="rows">
                <?php while ($data = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $data['pid']; ?></td>
                        <td><?php echo $data['firstName']; ?></td>
                        <td><?php echo $data['lastName']; ?></td>
                        <td><?php echo $data['Email']; ?></td>
                        <td><?php echo $data['Mobile']; ?></td>
                        <td><?php echo $data['Age']; ?></td>
                        <td><?php echo $data['Gender']; ?></td>
                        <td><?php echo $data['Dob']; ?></td>
                        <td><?php echo $data['Password']; ?></td>
                        <td><a href="update.php?update=<?php echo $data['pid']; ?>"><i class="fa-solid fa-pen-to-square text-success" style="font-size:20px;margin-right:30px;"></i>
                            <a href="delete.php?delete=<?php echo $data['pid']; ?>"><i class="fa-solid fa-trash-can text-danger" style="font-size:20px;"></i></a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
</div>
</div>
        <!-- <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-start">
                <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div> -->


<!-- crud section end -->


</body>