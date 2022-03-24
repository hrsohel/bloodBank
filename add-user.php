<?php
    include('config.php');
     $fullName = mysqli_real_escape_string($conn, $_POST['fname']);
     $dob = date("Y-m-d", strtotime($_POST['dob']));
     $mobile = $_POST['mobile'];
     $sql1 = "SELECT * FROM users WHERE phone={$mobile}";
     $result = mysqli_query($conn, $sql1);
     if(!empty($_FILES['image']['name'])) {
        $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $fileDir = "images/uploads/" . rand() . ".{$ext}";
        $validExt = array("jpg", "jpeg", "png", "jiff");
        if(!in_array($ext, $validExt)) {
            session_start();
            $_SESSION['ext_error'] = "Only Image File Accepted";
            header("Location: {$hostName}/becomeDonor.php"); die();
        }
        //  echo move_uploaded_file($_FILES['image']['tmp_name'], $fileDir); die();
        move_uploaded_file($_FILES['image']['tmp_name'], $fileDir);
     } else {
        $fileDir = "";
     }
     if(mysqli_num_rows($result) > 0) {
         session_start();
         $_SESSION['user_exist'] = "User Already Exists!";
         header("Location: {$hostName}/becomeDonor.php"); die();
     }
    //  echo strlen("{$mobile}") !== 11; die();
     if(strlen("{$mobile}") !== 11) {
         session_start();
         $_SESSION['phone_errror'] = "{$mobile} Is Not Valid";
         header("Location: {$hostName}/becomeDonor.php"); die();
     }
     $email = mysqli_real_escape_string($conn, $_POST['email']);
     $address = mysqli_real_escape_string($conn, $_POST['address']);
     $bloodGroup = mysqli_real_escape_string($conn, $_POST['bloodGroup']);
     $password = password_hash($_POST['password'] , PASSWORD_BCRYPT);
     $lastDonated = date("Y-m-d", strtotime($_POST['lastDonated']));
     $sql = "INSERT INTO users (fullName, phone, email, dob, address, bloodGroup, lastDonated,image ,Password)
            VALUES ('{$fullName}', $mobile, '{$email}', '{$dob}', '{$address}', '{$bloodGroup}', '{$lastDonated}', '{$fileDir}', '{$password}')";
    if(mysqli_query($conn, $sql)) {
        header("Location: {$hostName}/login.php");
    } else {
        
    }
?>