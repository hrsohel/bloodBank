<?php
    include("components/header.php");
    include("config.php");
    if($_SESSION['role'] != 1) {
        header("Location: {$hostName}/index.php");
    }
    $sql = "SELECT * FROM admin WHERE uid={$_GET['uid']}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
?>
<div class="container my-3">
    <h2>Update User</h2>
<form action="admin-update-user-two.php" method="post">
    <input type="hidden" name="uid" value="<?php echo $row['uid'] ?>">
    <div class="row p-5">
        <div class="col-md-4">
            <div class="mb-3">
                <span class="form-label">Full Name</span>
                <span style="color: red" class="required">*</span>
                <input type="text" name="fname" value="<?php echo $row['fullName'] ?>" class="form-control" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <span class="form-label">Phone</span>
                <span style="color: red" class="required">*</span>
                <input type="number" name="phone" value="<?php echo '0' . $row['phone'] ?>" class="form-control" required>
                <p class="text-danger">
                    <?php
                        if(isset($_SESSION['phone_error'])) {
                            echo $_SESSION['phone_error'];
                            unset($_SESSION['phone_error']);
                        }
                    ?>
                </p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <span class="form-label">Email</span>
                <input type="email" name="email" value="<?php echo $row['email'] ?>" class="form-control">
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <span class="form-label">Date Of Birth</span>
                <span style="color: red" class="required">*</span>
                <input type="date" name="dob" value="<?php echo $row['dob'] ?>" class="form-control" required>
                <p class="text-danger">
                    <?php
                        if(isset($_SESSION['age-error'])) {
                            echo $_SESSION['age-error'];
                            unset($_SESSION['age-error']);
                        }
                    ?>
                </p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <span class="form-label">Last Donated(MM-DD-YYYY)</span>
                <span style="color: red" class="required">*</span>
                <input type="date" name="lastDonated" value="<?php echo $row['lastDonated'] ?>" class="form-control" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <span class="form-label">Address</span>
                <span style="color: red" class="required">*</span>
                <textarea name="address" rows="3" class="form-control" required><?php echo $row['address'] ?></textarea>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <span class="form-label">Blood Group</span>
                <span style="color: red" class="required">*</span>
                <select class="form-select" name="bloodGroup" aria-label="Default select example" required>
                    <option>Open this select menu</option>
                    <option value="A+" <?php if($row['bloodGroup'] === "A+") echo "selected"?>>A+</option>
                    <option value="A-" <?php if($row['bloodGroup'] === "A-") echo "selected"?>>A-</option>
                    <option value="B+" <?php if($row['bloodGroup'] === "B+") echo "selected"?>>B+</option>
                    <option value="B-" <?php if($row['bloodGroup'] === "B-") echo "selected"?>>B-</option>
                    <option value="O+" <?php if($row['bloodGroup'] === "O+") echo "selected"?>>O+</option>
                    <option value="O-" <?php if($row['bloodGroup'] === "O-") echo "selected"?>>O-</option>
                    <option value="AB+" <?php if($row['bloodGroup'] === "AB+") echo "selected"?>>AB+</option>
                    <option value="AB-" <?php if($row['bloodGroup'] === "AB-") echo "selected"?>>AB-</option>
                </select>
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Update User">
    </div>
    </form>
</div>
<?php include("components/footer.php"); ?>