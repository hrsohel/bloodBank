<?php 
include("components/header.php"); 
if($_SESSION['role'] != 1) {
    header("Location: {$hostName}/index.php");
}
?>
<div class="container">
    <h1 class="my-3">Add User</h1>
    <hr>
    <h4 class="text-danger">
        <?php
            if(isset($_SESSION['user_exist'])) {
                echo $_SESSION['user_exist'];
                unset($_SESSION['user_exist']);
            }
        ?>
    </h4>
    <form action="admin-add-user-two.php" method="post">
    <div class="row p-5">
        <div class="col-md-4">
            <div class="mb-3">
                <span class="form-label">Full Name</span>
                <span style="color: red" class="required">*</span>
                <input type="text" name="fname" id="" class="form-control" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <span class="form-label">Phone</span>
                <span style="color: red" class="required">*</span>
                <input type="number" name="phone" id="" class="form-control" required>
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
                <input type="email" name="email" id="" class="form-control">
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
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
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <span class="form-label">Last Donated</span>
                <span style="color: red" class="required">*</span>
                <input type="date" name="lastDonated" id="" class="form-control" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <span class="form-label">Address</span>
                <span style="color: red" class="required">*</span>
                <textarea name="address" rows="3" class="form-control" required></textarea>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <span class="form-label">Blood Group</span>
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
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <span class="form-label">Role</span>
                <span style="color: red" class="required">*</span>
                <select name="role" id="" class="form-select">
                    <option value="1" selected>Admin</option>
                </select>
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Add User">
    </div>
    </form>
</div>
<?php include("components/footer.php"); ?>