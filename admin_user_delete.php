<?php
    include("config.php");
    if($_SESSION['role'] != 1) {
        header("Location: {$hostName}/index.php");
    }
    $sql = "SELECT * FROM admin WHERE uid={$_GET['uid']}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $sql1 = "DELETE FROM admin WHERE uid={$_GET['uid']}";
    if(mysqli_query($conn, $sql1)) {
        header("Location: {$hostName}/users.php");
    }
?>