<?php
 include('components/header.php'); 
 include('config.php');
 $user = $_SESSION['user_id'];
 if(!isset($_SESSION['user_id'])) {
    header("Location: {$hostName}/login.php"); die();
 }
 $sql = "SELECT * FROM users WHERE uid={$_SESSION['user_id']}";
 $result = mysqli_query($conn, $sql);
 $row = mysqli_fetch_assoc($result);
 $sql1 = "SELECT DATEDIFF(CURDATE(), '{$row['dob']}')";
 $result1 = mysqli_query($conn, $sql1);
 $row1 = mysqli_fetch_row($result1);
 $age = intval($row1[0] / 365);
?>
<section class="profile-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 img">
                <div style="width: 100%; height: 100%">
                <?php
                    if($row['image']) {
                        echo "<img src='{$row['image']}' class='img-fluid' alt=''>";
                    } else {
                        echo "<img src='images\profileimages.png' class='img-fluid' alt=''>";
                    }
                ?>
                </div>
                <!-- <input type="file" name="profilPic" id="file" accept="image/*">
                <label for="file">Upload Image</label> -->
            </div>
            <div class="col-md-6" style="text-transform: capitalize;">
                <h1 class="my-5">Personal Information</h1>
                <p class="my-3">Name: <?php echo $row['fullName'] ?></p>
                <p class="my-3">Age: <?php echo $age ?></p>
                <p class="my-3">Address: <?php echo $row['address'] ?></p>
                <p class="my-3">Phone Number: <?php echo 0 . $row['phone'] ?></p>
                <p class="my-3">Blood Group: <?php echo $row['bloodGroup'] ?></p>
                <a href="/bloodBank/update-user.php?uid=<?php echo $user ?>" class="my-3 btn btn-secondary">change profile</a>
            </div>
        </div>
    </div>
</section>
<?php include('components/footer.php'); ?>