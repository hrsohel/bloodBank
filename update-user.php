<?php 
    include('components/header.php');
    include("config.php");
    if(!isset($_SESSION['user_id'])) {
        header("Location: {$hostName}/login.php"); die();
    }
    if($_SESSION['user_id'] !== $_GET['uid']) {
        header("Location: {$hostName}/profile.php");
    }
    include('config.php');
    $sql = "SELECT * FROM users WHERE uid={$_SESSION['user_id']}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
?>
<div class="container">
    <form action="update-user-two.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="uid" value="<?php echo $row['uid'] ?>">
        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="fname" value="<?php echo $row['fullName'] ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="number" name="phone" value="<?php echo 0 . $row['phone'] ?>" class="form-control">
            <p class="text-danger">
                <?php
                    if(isset($_SESSION['phone_error'])) {
                        echo $_SESSION['phone_error'];
                        unset($_SESSION['phone_error']);
                    }
                ?>
            </p>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" value="<?php echo $row['email'] ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Address</label>
            <textarea name="address" id="" rows="3" class="form-control"><?php echo $row['address'] ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Last Donated (MM-DD-YYYY)</label>
            <input type="date" name="date" value="<?php echo $row['lastDonated'] ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Update Image</label>
            <input type="file" name="newImg" id="" class="form-control">
            <p class="text-danger">
                <?php
                    if(isset($_SESSION['ext_error'])) {
                        echo $_SESSION['ext_error'];
                        unset($_SESSION['ext_error']);
                    }
                ?>
            </p>
            <?php
            if($row['image']) {
                echo "<img src='{$row['image']}' style='width: 300px; height: 200px; object-fit: cover'/>";
            }
            ?>
            <input type="hidden" name="oldImg" value="<?php echo $row['image'] ?>">
        </div>
        <div class="mb-3">
            <input type="submit" name="submit" value="Update" class="btn btn-primary">
        </div>
    </form>
</div>
<?php 
    include('components/footer.php');
?>