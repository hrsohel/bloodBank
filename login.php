<?php 
    include('components/header.php');
    include('config.php');
    if(isset($_SESSION['user_id'])) {
        header("Location: {$hostName}/index.php"); die();
    }
    if(isset($_POST['mobile']) && $_POST['password']) {
        $mobile = 0 . $_POST['mobile'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM users WHERE phone = {$mobile}";
        $sql1 = "SELECT * FROM admin WHERE phone={$mobile}";
        $result1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_assoc($result1);
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);   
        if(mysqli_num_rows($result) > 0 && password_verify($password, $row['password'])) {
            $_SESSION['fullName'] = $row['fullName'];
            $_SESSION['user_id'] = $row['uid'];
            $_SESSION['role'] = $row1['role'];
            header("Location: {$hostName}/searchDonor.php");
        } else {
            $error = "Bad Password / User";
        }
    }
?>

<div class="login-form-container container">
    <form action="" method="post">
        <h1 style="text-align: center;">Login</h1>
        <div class="mb-3">
            <label class="form-label" for="">Phone Number</label>
            <input type="number" name="mobile" id="" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Password</label>
            <input type="password" name="password" id="" class="form-control" required>
        </div>
        <input type="submit" value="Login" class="btn btn-primary">
        <p class="alert alert-danger my-3">
            <?php
                if(isset($error)) {
                    echo $error;
                }
            ?>
        </p>
        <p class="my-3">If you don't have an account <a href="/bloodBank/becomeDonor.php" class="text-primary">Register Now</a></p>
    </form>
</div>

<?php 
    include('components/footer.php');
?>