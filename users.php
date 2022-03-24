<?php
    include("components/header.php");
    include("config.php");
    if(!isset($_SESSION['role'])) {
        header("Location: {$hostName}/index.php");
    }
?>
<div class="container my-3">
<div class="table-responsive-xl">
    <table class="table">
        <tr>
            <th>Full Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Age</th>
            <th>Blood Group</th>
            <th>Last Donated(YYYY-MM-DD)</th>
            <th>Address</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
        <?php
        $sql = "SELECT * FROM admin";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
            $sql1 = "SELECT DATEDIFF(CURDATE(), '{$row['dob']}')";
            $result1 = mysqli_query($conn, $sql1);
            $row1 = mysqli_fetch_row($result1);
            $age = intval($row1[0] / 365);
            if($row['role'] === '1') { $role = "admin"; }
            else { $role = "user"; }
            echo "
            <tr style='text-transform: capitalize;'>
                <td>{$row['fullName']}</td>
                <td>" . 0 . $row['phone'] . "</td>
                <td>{$row['email']}</td>
                <td>{$age}</td>
                <td>{$row['bloodGroup']}</td>
                <td>{$row['lastDonated']}</td>
                <td>{$row['address']}</td>
                <td>{$role}</td>
                <td>
                <a href='admin_user_update.php?uid={$row['uid']}' class='btn btn-primary'><i class='fa-solid fa-pen-clip'></i></a>
                <a href='admin_user_delete.php?uid={$row['uid']}' class='btn btn-danger' onclick='confirm('Do You Delete This User?')'><i class='fa-solid fa-trash-can'></i></i></a>
                </td>
            </tr>
            ";
        }
        ?>
    </table>
</div>
</div>
<?php include("components/footer.php"); ?>