<?php
    session_start();
    if($_SESSION['role'] != 1) {
        header("Location: {$hostName}/index.php");
    }
    include("config.php");
    $fullName = mysqli_real_escape_string($conn, $_POST['fname']);
    $phone = $_POST['phone'];
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $dob = date("Y-m-d", strtotime($_POST['dob']));
    $lastDonated = date("Y-m-d", strtotime($_POST['lastDonated']));
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $bloodGroup = $_POST['bloodGroup'];
    $role = $_POST['role'];
    if(strlen("{$phone}") !== 11) {
        $_SESSION['phone_error'] = "{$phone} is not valid";
        header("Location: {$hostName}/admin-add-user.php");die();
    }
    $sql = "SELECT DATEDIFF(CURDATE(), '{$dob}')";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_row($result);
    $age = intval($row[0] / 365);
    if($age < 18) {
        $_SESSION['age-error'] = "User Must Be Older Than 18";
        header("Location: {$hostName}/admin-add-user.php");die();
    }
    $sql1 = "SELECT * FROM admin WHERE phone={$phone}" ;
    $result1 = mysqli_query($conn, $sql1);
    if(mysqli_num_rows($result1) > 0) {
        $_SESSION['user_exist'] = "User Already Exist";
        header("Location: {$hostName}/admin-add-user.php");die();
    }
    $sql2 = "INSERT INTO admin(fullName, phone, email, dob, lastDonated, address, bloodGroup, role)
    VALUES('{$fullName}', {$phone}, '{$email}', '{$dob}', '{$lastDonated}', '{$address}', '{$bloodGroup}', '{$role}')";
    $result2 = mysqli_query($conn, $sql2);
    if($result2) {
        header("Location: {$hostName}/users.php");
    }
?>