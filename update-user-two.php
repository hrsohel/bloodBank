<?php
    session_start();
    include("config.php");
    $fullName = $_POST['fname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $date = date("Y-m-d", strtotime($_POST['date']));
    $phone = $_POST['phone'];
    $filDir = $_POST['oldImg'];
    // echo empty($_FILES['newImg']['name']);die();
    if(strlen("{$phone}") !== 11) {
        $_SESSION['phone_error'] = "{$phone} number is not valid";
        header("Location: {$hostName}/update-user.php?uid={$_SESSION['user_id']}");
        die();
    }
    if(empty($_FILES['newImg']['name'])) {
        $fileDir = $_POST['oldImg'];
    } else {
        $ext = strtolower(pathinfo($_FILES['newImg']['name'], PATHINFO_EXTENSION));
        $fileDir = "images/uploads/" . rand() . ".{$ext}";
        $validExt = array("jpg", "jpeg", "png", "jfif");
        if(!in_array($ext, $validExt)) {
            session_start();
            $_SESSION['ext_error'] = "Only Image File Accepted";
            header("Location: {$hostName}/update-user.php?uid={$_SESSION['user_id']}"); die();
        }
        //  echo move_uploaded_file($_FILES['image']['tmp_name'], $fileDir); die();
        move_uploaded_file($_FILES['newImg']['tmp_name'], $fileDir);
        unlink($_POST['oldImg']);
    }
    $sql = "UPDATE users SET fullName='{$fullName}', phone={$phone}, email='{$email}',
    address='{$address}', lastDonated='{$date}', image='{$fileDir}' WHERE uid={$_SESSION['user_id']}";
    $result = mysqli_query($conn, $sql);
    if($result) {
        header("Location: {$hostName}/profile.php");
    }
?>