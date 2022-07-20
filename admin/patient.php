<?php
include 'config.php';


$query = "SELECT * FROM patient";
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
    <link rel="stylesheet" href="../css/dashboard.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css"/> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script> -->

    <style>
     .table-responsive.mx-auto {
        width: 83%;
        position: absolute;
        top: 15%;
        right: 0px;
  }
</style>

</head>
<body>
<!--crud section  -->
<?php
include_once 'dashboard.php';

?>

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
                    <th>DATE OF BIRTH</th>
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
                        <td><a href="update.php?update=<?php echo $data['pid']; ?>" class="btn btn-primary" style="margin-right:5px;">UPDATE
                            <a href="delete.php?delete=<?php echo $data['pid']; ?>" class="btn btn-danger">DELETE</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
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
    </div>


<!-- crud section end -->


</body>

