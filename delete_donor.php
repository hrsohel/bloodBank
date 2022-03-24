<?php 

    include("config.php");
    $sql = "DELETE FROM users WHERE uid={$_GET['uid']}";
    $sql1 = "SELECT * FROM users WHERE uid={$_GET['uid']}";
    $result = mysqli_query($conn, $sql);
    $result1 = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result1);
    if($result) {
        unlink($row['image']);
        header("Location: {$hostName}/searchDonor.php");
    }
    
?>