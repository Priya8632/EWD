<?php


include 'config.php';

$query = "SELECT * FROM users";

if(isset($_REQUEST['add'])){
 
if(empty($_POST['fname'])){
    $fnamearr = "fname is required";}
elseif(!preg_match("/^[a-zA-Z-' ]*$/",$_POST['fname'])){
    $fnamearr = "only character and letter ";    }
elseif(empty($_POST['lname'])){
    $lnamearr = "lname is required";}
elseif(!preg_match("/^[a-zA-Z-' ]*$/",$_POST['lname'])){
    $lnamearr = "only character and letter ";     }
elseif(empty($_POST['email'])){
    $emailarr = "email is required";}
elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    $emailarr = "invaild formet";}
elseif(empty($_POST['p_word'])){
    $pwarr = "password is required"; }
elseif(!preg_match("/[a-z'@,!,#,$,%,^,&,*,+']+/",$_POST['p_word'])){
    $pwarr = "minimum 1 small";    }
elseif(!preg_match("/[A-Z]+/",$_POST['p_word'])){
    $pwarr = "minum 1 capital"; }
elseif(!preg_match("/[0-9]/",$_POST['p_word'])){
    $pwarr = "1 number";}
elseif(strlen($_POST['p_word']) > 8 || strlen($_POST['p_word']) < 8 ){
    $pwarr = "8 length is required";}
elseif($_POST['c_word'] != $_POST['p_word']){
    $cwarr = "both password is not same..";}
    
 else{

    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pw = base64_encode($_POST['p_word']);
    $cw = base64_encode($_POST['c_word']);

    
    $insert = "INSERT INTO users
        (`firstName`,`lastName`,`Email`,`Password`,`Confirm_Password`) VALUES 
        ('$fname','$lname','$email','$pw','$cw')";
    
        if(mysqli_query($conn,$insert)){
            // $_SESSION['status'] = "registered successfully";
            // $_SESSION['status_code'] = "success"; 
            header('location:users.php');
        } 
        // else{
        //     $_SESSION['status'] = "Do not Registered";
        //     $_SESSION['status_code'] = "error";
        //     header('location:ragister.php');
        // }

    }
}

if(isset($_POST['checking_viewbtn']))
{
    $id = $_POST['user_id'];
    // echo $return = $id;

    $query = "SELECT * FROM users where id = '$id'";
    $q_run = mysqli_query($conn,$query);
    if(mysqli_num_rows($q_run) > 0 ){
        
        foreach($q_run as $data)
        {
    
            echo $return = '
                <h5> ID : '.$data['id'].'</h5>
                <h5> first Name : '.$data['firstName'].'</h5>
                <h5> Last Name : '.$data['lastName'].'</h5>
                <h5> Email : '.$data['Email'].'</h5>
            ';
        }
    }
    else{
        echo $return = "<h3>no records found</h3>";
    }
}

// update data

if(isset($_POST['checking_editbtn']))
{
    $id = $_POST['user_id'];
    // echo $return = $id;
    $result_array = [];

    $query = "SELECT * FROM users where id = '$id'";
    $q_run = mysqli_query($conn,$query);
    if(mysqli_num_rows($q_run) > 0 ){
        foreach($q_run as $data)
        {
        //    echo $data['firstName'];
           array_push($result_array, $data);
           header('content:type:application/json');
           echo json_encode($result_array);
        }
    }
    else{
        echo $return = "<h3>no records found</h3>";
    }
}
 
?>