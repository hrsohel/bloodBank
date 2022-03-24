<?php
include('components/header.php');
include("config.php");
if(isset($_SESSION['user_id'])) {
    header("Location: {$hostName}/index.php"); die();
}
?>
<div class="form-container container my-5">
    <h2 class="my-5">Become A Donor</h2>
    <form action="add-user.php" method="post" class="row g-3" enctype="multipart/form-data">
        <div class="col-md-4">
            <label for="" class="form-label">Full Name</label>
            <span style="color: red" class="required">*</span>
            <input type="text" name="fname" id="" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label for="" class="form-label">Mobile Number</label>
            <span style="color: red" class="required">*</span>
            <input type="number" name="mobile" id="" class="form-control" required>
            <p class="text-danger">
                <?php
                    if(isset($_SESSION['phone_errror'])) {
                        echo $_SESSION['phone_errror'];
                        unset($_SESSION['phone_errror']);
                    } else { echo "";}
                ?>
            </p>
        </div>
        <div class="col-md-4">
            <label for="" class="form-label">Email</label>
            <input type="email" name="email" id="" class="form-control">
        </div>
        <div class="col-md-4">
        <span class="form-label">Date Of Birth</span>
        <span style="color: red" class="required">*</span>
        <input type="date" name="dob" id="" class="form-control" required>
        <p class="text-danger">
            <?php
                if(isset($_SESSION['age-error'])) {
                    echo $_SESSION['age-error'];
                    unset($_SESSION['age-error']);
                }
            ?>
        </p>
        </div>
        <div class="col-md-4">
            <label for="" class="form-label">Address</label>
            <span style="color: red" class="required">*</span>
            <textarea name="address" id="" rows="3" class="form-control" required></textarea>
        </div>
        <div class="col-md-4">
            <label for="" class="form-label">Blood Group</label>
            <span style="color: red" class="required">*</span>
            <select class="form-select" name="bloodGroup" aria-label="Default select example" required>
                <option selected>Open this select menu</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="" class="form-label">Last Donated</label>
            <span style="color: red" class="required">*</span>
            <input type="date" name="lastDonated" id="" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label for="" class="form-label">Upload Image</label>
            <input type="file" name="image" id="" class="form-control">
            <p class="text-danger">
                <?php
                    if(isset($_SESSION['ext_error'])) {
                        echo $_SESSION['ext_error'];
                        unset($_SESSION['ext_error']);
                    }
                ?>
            </p>
        </div>
        <div class="col-md-4">
            <label for="" class="form-label">Set Password</label>
            <span style="color: red" class="required">*</span>
            <input type="password" name="password" id="" class="form-control" required>
        </div><br><br>
        <p class="text-danger my-3">
        <?php
            if(isset($_SESSION['user_exist'])) {
                echo $_SESSION['user_exist'];
                unset($_SESSION['user_exist']);
            }
        ?>
    </p>
        <input type="submit" value="Submit" class="btn btn-primary">
    </form>
</div>
<?php
include('components/footer.php');
?>