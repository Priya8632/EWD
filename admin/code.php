<?php

include 'config.php';

// insert user data
$query = "SELECT * FROM users";
if (isset($_REQUEST['add'])) {

    if (empty($_POST['fname'])) {
        $fnamearr = "fname is required";
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $_POST['fname'])) {
        $fnamearr = "only character and letter ";
    } elseif (empty($_POST['lname'])) {
        $lnamearr = "lname is required";
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $_POST['lname'])) {
        $lnamearr = "only character and letter ";
    } elseif (empty($_POST['email'])) {
        $emailarr = "email is required";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $emailarr = "invaild formet";
    } elseif (empty($_POST['p_word'])) {
        $pwarr = "password is required";
    } elseif (!preg_match("/[a-z'@,!,#,$,%,^,&,*,+']+/", $_POST['p_word'])) {
        $pwarr = "minimum 1 small";
    } elseif (!preg_match("/[A-Z]+/", $_POST['p_word'])) {
        $pwarr = "minum 1 capital";
    } elseif (!preg_match("/[0-9]/", $_POST['p_word'])) {
        $pwarr = "1 number";
    } elseif (strlen($_POST['p_word']) > 8 || strlen($_POST['p_word']) < 8) {
        $pwarr = "8 length is required";
    } elseif ($_POST['c_word'] != $_POST['p_word']) {
        $cwarr = "both password is not same..";
    } else {

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $pw = base64_encode($_POST['p_word']);
        $cw = base64_encode($_POST['c_word']);

        $insert = "INSERT INTO users
        (`firstName`,`lastName`,`Email`,`Password`,`Confirm_Password`) VALUES 
        ('$fname','$lname','$email','$pw','$cw')";

        if (mysqli_query($conn, $insert)) {
            // $_SESSION['status'] = "registered successfully";
            // $_SESSION['status_code'] = "success"; 
            header('location:users.php');
        }

    }
}

// insert doctor data 
$doctor = "SELECT d.Doctor_Id , d.Doctor_name , d.Email , d.mobile , d.gender , s.specialization  from doctor as d , specialization as s
          where d.specialization_id = s.specialization_id ";

if (isset($_REQUEST['doctor'])) {

    if (empty($_POST['fname'])) {
        $fnamearr = "fname is required";} 
    elseif (!preg_match("/^[a-zA-Z-' ]*$/", $_POST['fname'])) {
        $fnamearr = "only character and letter "; } 
    elseif (empty($_POST['email'])) {
        $emailarr = "email is required";} 
    elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $emailarr = "invaild formet";}
    elseif(empty($_POST['gender'])){
        $genderarr = "gender is required";}
    elseif (empty($_POST['specialization_id'])) {
        $specializationarr = "field is required";}
    elseif (!preg_match("/^[0-9]*$/", $_POST['specialization_id'])) {
        $specializationarr = "only number "; }
    elseif (empty($_POST['mobile'])) {
        $mobilearr = "field is required";}
    elseif (!preg_match("/^[0-9]*$/", $_POST['mobile'])) {
        $mobilearr = "length 10 is required";}
     else {

        $fname = $_POST['fname'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $gender = $_POST['gender'];
        $specialization_id = $_POST['specialization_id'];

        $insert = "INSERT INTO doctor
        (`doctor_name`,`email`,`mobile`,`gender`,`specialization_id`) VALUES 
        ('$fname','$email','$mobile','$gender','$specialization_id')";

        if (mysqli_query($conn, $insert)) {
            // $_SESSION['status'] = "registered successfully";
            // $_SESSION['status_code'] = "success"; 
            header('location:doctor.php');
        }

    }
}

// insert patient data
$patient = "SELECT p.patient_id,p.patient_name,p.email,p.mobile,p.gender,p.age,d.doctor_name FROM patient as p,doctor as d
            where p.doctor_id = d.doctor_id";

if (isset($_REQUEST['patient'])) {

    if (empty($_POST['fname'])) {
        $fnamearr = "fname is required";} 
    elseif (!preg_match("/^[a-zA-Z-' ]*$/", $_POST['fname'])) {
        $fnamearr = "only character and letter "; } 
    elseif (empty($_POST['email'])) {
        $emailarr = "email is required";} 
    elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $emailarr = "invaild formet";}
    elseif(empty($_POST['gender'])){
        $genderarr = "gender is required";}
    elseif (empty($_POST['doctor_id'])) {
        $specializationarr = "field is required";}
    elseif (!preg_match("/^[0-9]*$/", $_POST['doctor_id'])) {
        $specializationarr = "only number "; }
    elseif (empty($_POST['mobile'])) {
        $mobilearr = "field is required";}
    elseif (!preg_match("/^[0-9]*$/", $_POST['mobile'])) {
        $mobilearr = "length 10 is required";}
    elseif(empty($_POST['age'])){
        $agearr = "field is required";}
     else {

        $fname = $_POST['fname'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $doctor_id = $_POST['doctor_id'];

        $insert = "INSERT INTO patient
        (`patient_name`,`email`,`mobile`,`gender`,`age`,`doctor_id`) VALUES 
        ('$fname','$email','$mobile','$gender','$age','$doctor_id')";

        if (mysqli_query($conn, $insert)) {
            // $_SESSION['status'] = "registered successfully";
            // $_SESSION['status_code'] = "success"; 
            header('location:patient.php');
        }

    }
}

// insert specialization data
$specialization = "SELECT * FROM specialization";

if(isset($_REQUEST['speciality']))
{
    if(empty($_POST['specialization_id'])){
        $idarr = "feild is required";}
    elseif (empty($_POST['specialization'])) {
        $specializationarr = "feild is required";} 

    elseif (!preg_match("/^[a-zA-Z-' ]*$/", $_POST['specialization'])) {
        $fnamearr = "only character and letter "; } 
    else{

        $specialization_id= $_POST['specialization_id'];
        $specialization = $_POST['specialization'];

        $insert = "INSERT INTO specialization
        (`specialization_id`,`specialization`) VALUES ('$specialization_id','$specialization')";

        if (mysqli_query($conn, $insert)) {
            // $_SESSION['status'] = "registered successfully";
            // $_SESSION['status_code'] = "success"; 
            header('location:specialization.php');
        }

    }
}

// insert appointment data
$appointment= "SELECT a.appointment_id,a.app_number,p.patient_name,d.doctor_name,s.specialization,a.fees,a.app_date,a.app_time FROM appointment as a, doctor as d , patient as p, specialization as s
           where a.Doctor_Id = d.Doctor_Id and p.patient_id = a.patient_id and a.specialization_id = s.specialization_id ";
  
  if (isset($_REQUEST['appointment'])) {

        $app_number = $_POST['app_number'];
        $patient_id = $_POST['patient_id'];
        $doctor_id = $_POST['doctor_id'];
        $specialization_id = $_POST['specialization_id'];
        $fees = $_POST['fees'];
        $app_date = $_POST['app_date'];
        $app_time = $_POST['app_time'];

        $insert = "INSERT INTO appointment
        (`app_number`,`patient_id`,`doctor_id`,`specialization_id`,`fees`,`app_date`,`app_time`) VALUES 
        ('$app_number','$patient_id','$doctor_id','$specialization_id','$fees','$app_date','$app_time')";

        if (mysqli_query($conn, $insert)) {
            // $_SESSION['status'] = "registered successfully";
            // $_SESSION['status_code'] = "success"; 
            header('location:appointments.php');

    }
}

// delete specialization data
if(isset($_POST['delete']))
{
    $sid = $_POST['specialization_id'];
    $query = "DELETE FROM specialization WHERE specialization_id = $sid";
    $result = mysqli_query($conn,$query);
    if($result)
    {
        header('location:specialization.php');
    }
}

// delete doctor data
if(isset($_POST['delete']))
{
    $did = $_POST['doctor_id'];
    $query = "DELETE FROM doctor WHERE doctor_id = $did";
    $result = mysqli_query($conn,$query);
    if($result)
    {
        header('location:doctor.php');
    }
}

// delete patient data
if(isset($_POST['delete']))
{
    $pid = $_POST['patient_id'];
    $query = "DELETE FROM patient WHERE patient_id = $pid";
    $result = mysqli_query($conn,$query);
    if($result)
    {
        header('location:patient.php');
    }
}

// delete appointment data
if(isset($_POST['delete']))
{
    $aid = $_POST['appointment_id'];
    $query = "DELETE FROM appointment WHERE appointment_id = $aid";
    $result = mysqli_query($conn,$query);
    if($result)
    {
        header('location:appointments.php');
    }
}

// view specialization data 
if (isset($_POST['checking_viewbtn'])) {
    $id = $_POST['user_id'];
    // echo $return = $id;

    $query = "SELECT * FROM specialization where specialization_id = '$id'";
    $q_run = mysqli_query($conn, $query);
    if (mysqli_num_rows($q_run) > 0) {

        foreach ($q_run as $data) {

            echo $return = '
                <h5> specialization_Id : ' . $data['specialization_id'] . '</h5>
                <h5> specialization : ' . $data['specialization'] . '</h5>
            ';
        }
    }
}

// view appointment details
if (isset($_POST['checking_viewbtn'])) {
    $id = $_POST['user_id'];
    // echo $return = $id;

    $query = "SELECT * FROM appointment where appointment_id = '$id'";
    $q_run = mysqli_query($conn, $query);
    if (mysqli_num_rows($q_run) > 0) {

        foreach ($q_run as $data) {

            echo $return = '
                <h5> appointment_Id :       ' . $data['appointment_id'] . '</h5>
                <h5> appoint_number :       ' . $data['app_number'] . '</h5>
                <h5> patient_id :           ' . $data['patient_id'] . '</h5>
                <h5> doctor_id :            ' . $data['doctor_id'] . '</h5>
                <h5> specialization_id :    ' . $data['specialization_id'] . '</h5>
                <h5> fees :                 ' . $data['fees'] . '</h5>
                <h5> app_date :             ' . $data['app_date'] . '</h5>
                <h5> app_time :             ' . $data['app_time'] . '</h5>
            ';
        }
    }
}

// view doctor data
if (isset($_POST['checking_viewbtn'])) {
    $id = $_POST['user_id'];
    // echo $return = $id;

    $query = "SELECT * FROM doctor where doctor_id = '$id'";
    $q_run = mysqli_query($conn, $query);
    if (mysqli_num_rows($q_run) > 0) {

        foreach ($q_run as $data) {

            echo $return = '
                <h5> Dcotor_ID : ' . $data['doctor_id'] . '</h5>
                <h5> Doctor_name : ' . $data['doctor_name'] . '</h5>
                <h5> Email : ' . $data['email'] . '</h5>
                <h5> Mobile : ' . $data['mobile'] . '</h5>
                <h5> Gender : ' . $data['gender'] . '</h5>
                <h5> Specialization_id : ' . $data['specialization_id'] . '</h5>
            ';
        }
    }
}

// view patient data
if (isset($_POST['checking_viewbtn'])) {
    $id = $_POST['user_id'];
    // echo $return = $id;

    $query = "SELECT * FROM patient where patient_id = '$id'";
    $q_run = mysqli_query($conn, $query);
    if (mysqli_num_rows($q_run) > 0) {

        foreach ($q_run as $data) {

            echo $return = '
                <h5> patient_ID : ' . $data['patient_id'] . '</h5>
                <h5> patient_name : ' . $data['patient_name'] . '</h5>
                <h5> Email : ' . $data['email'] . '</h5>
                <h5> Mobile : ' . $data['mobile'] . '</h5>
                <h5> Gender : ' . $data['gender'] . '</h5>
                <h5> Age : ' . $data['age'] . '</h5>
                <h5> Doctor_id : ' . $data['doctor_id'] . '</h5>
            ';
        }
    }
}

// view user data
if (isset($_POST['checking_viewbtn'])) {
    $id = $_POST['user_id'];
    // echo $return = $id;

    $query = "SELECT * FROM users where id = '$id'";
    $q_run = mysqli_query($conn, $query);
    if (mysqli_num_rows($q_run) > 0) {

        foreach ($q_run as $data) {

            echo $return = '
                <h5> ID : ' . $data['id'] . '</h5>
                <h5> first Name : ' . $data['firstName'] . '</h5>
                <h5> Last Name : ' . $data['lastName'] . '</h5>
                <h5> Email : ' . $data['Email'] . '</h5>
            ';
        }
    }
}







// update data

// $id = $_GET['update'];
// $query = "SELECT * FROM users WHERE id = $id";
// $result = mysqli_query($conn,$query);
// $data =mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $id = $_POST['user_id'];
    // $id = $data['id'];

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pw = base64_encode($_POST['p_word']);
    $cw = base64_encode($_POST['c_word']);

    $update = "UPDATE users SET firstName='$fname',lastName='$lname', Password ='$pw',Email ='$email', Confirm_Password = '$cw' where id=$id";
    $chk = mysqli_query($conn,$update);
    if($chk)
    {
        header('location:users.php');

    }
    else{
        echo '<script>alert("data not updated")</script>';}
}


// edit data

if (isset($_POST['checking_editbtn'])) {
    $id = $_POST['user_id'];

    $query = "SELECT * FROM users where id = '$id'";
    $q_run = mysqli_query($conn, $query);

    if (mysqli_num_rows($q_run) > 0) {
    $fetchData = mysqli_fetch_array($q_run);
    
         ?>
            <div class="row">
    
                <div class="form-group col-md-6 p-2">
                    <label>first name</label>
                    <input type="text" name="fname" id="editfname" class="form-control" placeholder="first name" value="<?= $fetchData['firstName'] ?>">
                </div>

                <div class="form-group col-md-6 p-2">
                    <label>last name</label>
                    <input type="text" name="lname" id="editlname" class="form-control" placeholder="last name" value="<?= $fetchData['lastName'] ?>">
                </div>

                <div class="form-group p-2">
                    <label>email</label>
                    <input type="text" name="email" id="editemail" class="form-control" placeholder="email" value="<?= $fetchData['Email'] ?>">
                </div>

                <div class="form-group p-2">
                    <label>password</label>
                    <input type="password" name="p_word" id="editpw" class="form-control" placeholder="password" value="<?= $fetchData['Password'] ?>">
                </div>

                <div class="form-group p-2">
                    <label>confirm password</label>
                    <input type="password" name="c_word" id="editcw" class="form-control" placeholder="confirm" value="<?= $fetchData['Confirm_Password'] ?>">
                </div>
            </div>  
<?php
    } else {
        echo $return = "<h3>no records found</h3>";
    }
}
?>