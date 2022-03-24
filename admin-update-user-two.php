<?php
    session_start();
    if($_SESSION['role'] != 1) {
        header("Location: {$hostName}/index.php");
    }
    include("config.php");
    $fullName = mysqli_real_escape_string($conn, $_POST['fname']);
    $oldPhone = $phone = $_POST['phone'];
    $email = $_POST['email'];
    $dob = date("Y-m-d", strtotime($_POST['dob']));
    $lastDonated = date("Y-m-d", strtotime($_POST['lastDonated']));
    $bloodGroup = $_POST['bloodGroup'];
    $role = $_POST['role'];
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    if(strlen("{$phone}") !== 11) {
        $_SESSION['phone_error'] = "{$phone} is not valid";
        header("Location: {$hostName}/admin_user_update.php?uid={$_POST['uid']}");die();
    }
    $sql = "SELECT DATEDIFF(CURDATE(), '{$dob}')";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_row($result);
    $age = intval($row[0] / 365);
    if($age < 18) {
        $_SESSION['age-error'] = "User Must Be Older Than 18";
        header("Location: {$hostName}/admin_user_update.php?uid={$_POST['uid']}");die();
    }
    $sql1 = "UPDATE admin SET fullName='{$fullName}', phone={$phone}, email='{$email}',
    dob='{$dob}', lastDonated='{$lastDonated}', address='{$address}', role='{$role}' WHERE uid={$_POST['uid']}";
    if(mysqli_query($conn, $sql1)) {
        header("Location: {$hostName}/users.php");
    }
?>