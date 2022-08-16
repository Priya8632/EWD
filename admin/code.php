<?php

include 'config.php';


// insert doctor data 
$doctor = "SELECT d.Doctor_Id , d.Doctor_name , d.Email , d.mobile , d.gender , s.specialization  from doctor as d , specialization as s
          where d.specialization_id = s.specialization_id ";
$doctorSelect = mysqli_query($conn, $doctor);

if (isset($_REQUEST['doctor'])) {

    if (!$doctorSelect) {
        $createTable = "CREATE TABLE doctor(
            doctor_id int(10) auto_increment primary key,
            doctor_name text,
            email text,
            mobile int(10),
            gender text,
            specialization_id int(10) references specialization(specialization_id)
        )";

        $tblchk = mysqli_query($conn, $createTable);
        if (!$tblchk) {
            echo mysqli_error($conn);
        }
    }

    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
    $specialization_id = $_POST['specialization_id'];

    $insert = "INSERT INTO doctor
        (`doctor_name`,`email`,`mobile`,`gender`,`specialization_id`) VALUES 
        ('$fname','$email','$mobile','$gender','$specialization_id')";

    if (mysqli_query($conn, $insert)) {
        header('location:doctor.php');
    }
}

// insert patient data
$patient = "SELECT p.patient_id,p.patient_name,p.email,p.mobile,p.gender,p.age,d.doctor_name FROM patient as p,doctor as d
            where p.doctor_id = d.doctor_id";
$patientSelect = mysqli_query($conn, $patient);

if (isset($_REQUEST['patient'])) {

    if (!$patientSelect) {
        $createTable = "CREATE TABLE patient(
            patient_id int(10) auto_increment primary key,
            patient_name text,
            email text,
            mobile int(10),
            gender text,
            age text,
            doctor_id int(10) references doctor(doctor_id)
        )";

        $tblchk = mysqli_query($conn, $createTable);
        if (!$tblchk) {
            echo mysqli_error($conn);
        }
    }

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
        header('location:patient.php');
    }
}

// insert specialization data
$specialization = "SELECT * FROM specialization";
$specializationSelect = mysqli_query($conn, $specialization);

if (isset($_REQUEST['speciality'])) {

    if (!$specializationSelect) {
        $createTable = "CREATE TABLE specialization(
            specialization_id int(10) auto_increment primary key,
            specialization text,
            img varchar(255) 

        )";

        $tblchk = mysqli_query($conn, $createTable);
        if (!$tblchk) {
            echo mysqli_error($conn);
        }
    }

    $filesize = $_FILES['file']['size'];

    $specialization_id = $_POST['specialization_id'];
    $specialization = $_POST['specialization'];

    $target_dir = "./doctorimage/";
    $imagepath = $target_dir . basename($_FILES['file']['name']);
    $chkfile = move_uploaded_file($_FILES['file']['tmp_name'], $imagepath);

    $insert = "INSERT INTO specialization
        (`specialization_id`,`specialization`,`img`) VALUES ('$specialization_id','$specialization','$imagepath')";

    if (mysqli_query($conn, $insert)) {
        header('location:specialization.php');
    } else {
        echo mysqli_error($conn);
    }
}


// insert appointment data
$appointment = "SELECT a.appointment_id,a.app_number,p.patient_name,d.doctor_name,s.specialization,a.fees,a.app_date,a.app_time FROM appointment as a, doctor as d , patient as p, specialization as s
           where a.Doctor_Id = d.Doctor_Id and p.patient_id = a.patient_id and a.specialization_id = s.specialization_id ";
$appointmentSelect = mysqli_query($conn, $appointment);


if (isset($_REQUEST['appointment'])) {

    if (!$appointmentSelect) {

        $createTable = "CREATE TABLE appointment(
            appointment_id int(10) auto_increment primary key,
            app_number text,
            patient_id int(10) references patient(patient_id),
            doctor_id int(10) references doctor(doctor_id),
            specialization_id int(10) references specialization(specialization_id),
            fees int(10),
            app_date date,
            app_time time,
            status text
        )";

        $tblchk = mysqli_query($conn, $createTable);
        if (!$tblchk) {
            echo mysqli_error($conn);
        }
    }

    $app_number = $_POST['app_number'];
    $patient_id = $_POST['patient_id'];
    $doctor_id = $_POST['doctor_id'];
    $specialization_id = $_POST['specialization_id'];
    $fees = $_POST['fees'];
    $app_date = $_POST['app_date'];
    $app_time = $_POST['app_time'];
    $status = $_POST['status'];


    $insert = "INSERT INTO appointment
        (`app_number`,`patient_id`,`doctor_id`,`specialization_id`,`fees`,`app_date`,`app_time`,`status`) VALUES 
        ('$app_number','$patient_id','$doctor_id','$specialization_id','$fees','$app_date','$app_time','$status')";

    if (mysqli_query($conn, $insert)) {
        header('location:appointments.php');
    }
}

//////////////////////////////////////////////////////////////////////////////////////////////////////

// delete specialization data
if (isset($_POST['specializationdelete'])) {
    $sid = $_POST['s_id'];
    $query = "DELETE FROM specialization WHERE specialization_id = $sid";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header('location:specialization.php');
    }
}

// delete doctor data
if (isset($_POST['doctordelete'])) {
    $did = $_POST['delete_id'];
    $query = "DELETE FROM doctor WHERE doctor_id = $did";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header('location:doctor.php');
    }
}

// delete patient data
if (isset($_POST['patientdelete'])) {

    $pid = $_POST['patient_id'];
    $query = "DELETE FROM patient WHERE patient_id = $pid";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header('location:patient.php');
    }
}

// delete appointment data
if (isset($_POST['appdelete'])) {

    $aid = $_POST['app_id'];
    $query = "DELETE FROM appointment WHERE appointment_id = $aid";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header('location:appointments.php');
    }
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////

// doctor update
if (isset($_POST['doctor_update'])) {
    $id = $_POST['doctor_id'];
    $doctor_name = $_POST['doctor_name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $specialization = $_POST['specialization'];

    $update = "UPDATE doctor SET doctor_name='$doctor_name',email='$email',mobile='$mobile', specialization='$specialization' where doctor_id=$id";
    $chk = mysqli_query($conn, $update);
    if ($chk) {

        header('location:doctor.php');
    }
}

// appointment update
if (isset($_POST['appointment_update'])) {
    $id = $_POST['app_id'];
    $app_number = $_POST['app_number'];
    $patient_id = $_POST['patient_name'];
    $doctor_id = $_POST['doctor_name'];
    $specialization_id = $_POST['specialization'];
    $fees = $_POST['fees'];
    $app_date = $_POST['app_date'];
    $app_time = $_POST['app_time'];
    $status = $_POST['status'];

    $update = "UPDATE appointment SET app_number='$app_number',patient_id='$patient_id',doctor_id='$doctor_id', specialization_id='$specialization_id', fees='$fees',app_date='$app_date',app_time='$app_time', status ='$status'  where appointment_id=$id";
    $chk = mysqli_query($conn, $update);
    if ($chk) {
        header('location:appointments.php');
    }
}

// patient update
if (isset($_POST['patient_update'])) {
    $id = $_POST['patient_id'];
    $patient_name = $_POST['patient_name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $age = $_POST['age'];
    $doctor_name = $_POST['doctor_name'];

    $update = "UPDATE patient SET patient_name='$patient_name',email='$email',mobile='$mobile', age='$age',doctor_id='$doctor_name' where patient_id=$id";
    $chk = mysqli_query($conn, $update);
    if ($chk) {

        header('location:patient.php');
    }
}

// specialization update
if (isset($_POST['specialization_update'])) {

    $id = $_POST['s_id'];
    $specialization = $_POST['specialization'];

    # my code strats 
    $select_data = "SELECT * FROM specialization WHERE specialization_id = $id";
    $query = mysqli_query($conn, $select_data);
    $fetch_array = mysqli_fetch_assoc($query);

    $target_dir = "./doctorimage/";
    if (!file_exists($_FILES['file']['tmp_name'])) {
        $imagepath = $fetch_array['img'];
    } else {
        $imagepath = $target_dir . basename($_FILES['file']['name']);
    }
    $chkfile = move_uploaded_file($_FILES['file']['tmp_name'], $imagepath);
    $update = "UPDATE specialization SET specialization='$specialization',img='$imagepath' where specialization_id=$id";
    # my code ends

    $chk = mysqli_query($conn, $update);
    if ($chk) {

        header('location:specialization.php');
    }
}

// admin update
if (isset($_POST['admin_update'])) {

    $aid = $_POST['admin_id'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $city = $_POST['city'];

    $select_data = "SELECT * FROM profile WHERE id = $aid";
    $query = mysqli_query($conn, $select_data);
    $rows = mysqli_fetch_assoc($query);

    $target_dir = "./profile/";

    if (!file_exists($_FILES['file']['tmp_name'])) {
        $imagepath = $rows['img'];
    } else {
        $imagepath = $target_dir . basename($_FILES['file']['name']);
    }
    $chkfile = move_uploaded_file($_FILES['file']['tmp_name'], $imagepath);

    $update = "UPDATE profile SET fullName='$full_name',Email ='$email',Mobile= '$mobile',City='$city',img='$imagepath' where id=$aid";
    $chk = mysqli_query($conn, $update);
    if ($chk) {

        header('location:profile.php');
    }
}
