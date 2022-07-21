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
    <title>Ragister</title>

    <!-- <link rel="stylesheet" href="../css/sidebar.css"> -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css"/> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script> -->

    <style>
     .table-responsive.mx-auto {
        width: 80%;
        position: absolute;
        top:25%;
        right: 30px;
        background-color:white;
        padding:30px;
    }
    h2{
        margin-bottom:30px;
    }
    :root{
    --main-bg-color:green;
    --main-text-color:green;
    --second-text-color:gray;
    --second-bg-color:#c1efde;
  }
  .primary-text{
    color:var(--main-text-color);
  }
  .second-text{
    color:var(--second-text-color);
  }
  .primary-bg{
    background-color: var(--main-bg-color);
  }
  .secondary-bg{
    background-color: var(--second-bg-color);
  }
  .rounded-full{
    border-radius: 100%;
  }
  #wrapper{
    overflow-x: hidden;
    background-image: linear-gradient(
      to right,
      #baf3d7,
      #c2f5de,
      #cbf7e4,
      #d4f8ea,
      #ddfaef
      );
      position: relative;
  }
  #sidebar-wrapper{
    min-height:100vh;
    margin-left:-15rem;
    transition: margin 0.25s ease-out;
  }
  #sidebar-wrapper .sidebar-heading{
    padding:0.875rem 1.25rem;
    font-size: 1.2rem;
  }
  #sidebar-wrapper .list-group{
    width:15rem;
  }
  #page-content-wrapper{
    min-width:100vw;
  }
  #wrapper.toggled #sidebar-wrapper{
    margin-left:0;
  }
  #menu-toggle{
    cursor: pointer;
  }
  .list-group-item{
    border: none;
    padding: 20px 30px;
  }
  .list-group-item.active{
    background-color:transparent;
    color:var(--main-text-color);
    font-weight: bold;
    border: none;
  }
  @media(min-width:768px){
      #sidebar-wrapper{
        margin-left: 0;
      }
      #page-content-wrapper{
        min-width: 0;
        width:100%;
      }
      #wrapper-toggled #sidebar-wrapper{
        margin-left: -15rem;
      }
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
          <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fa-solid fa-user me-2"></i>Users
          </a>
          <a href="#" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold">
            <i class="fas fa-project-diagram me-2"></i>logout
          </a>
        </div>

      </div>

<div class="container justify-content-end p-3">

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
            <button class="btn btn-success" type="submit">Search</button>
        </form> 
        </div>
    </div>
</div>
<!-- <div class="container mx-auto"> -->
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


<!-- add user modal -->

<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- end -->

<!-- update modal -->
<div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- end -->


</body>