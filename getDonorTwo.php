<?php
    include('components/header.php');
    include('config.php');
    if($_GET['group'] == "A") {$group = "A" . "+";}
    else if($_GET['group'] == "B") {$group = "B+";}
    else if($_GET['group'] == "O") {$group = "O+";}
    else if($_GET['group'] == "AB") {$group = "AB+";}
    else {$group = $_GET['group'];}
    // echo $group;die();
?>
    <div class="container my-5">
    <div class="table-responsive">
        <table id='search-data-row' style="text-transform: capitalize;" class="table table-light table-hover">
            <tr>
                <th>Full Name</th>
                <th>Mobile Number</th>
                <th>Address</th>
                <th>Blood Group</th>
                <th>Available</th>
                <th>Last Donated(YYYY-MM-DD)</th>
            </tr>
            <?php
                $sql = "SELECT * FROM users WHERE bloodGroup LIKE '{$group}'";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $sql1 = "SELECT DATEDIFF(CURDATE(), '{$row['lastDonated']}')";
                        $result1 = mysqli_query($conn, $sql1);
                        $date = mysqli_fetch_row($result1);
                        if($date[0] >= 90) {$avail = "yes";} else {$avail = "no";}
                        echo "
                            <tr>
                                <td>{$row['fullName']}</td>
                                <td>" . 0 . $row['phone'] . "</td>
                                <td>{$row['address']}</td>
                                <td>{$row['bloodGroup']}</td>
                                <td>{$avail}</td>
                                <td>{$row['lastDonated']} ({$date[0]} days ago)</td>
                            </tr>
                        ";
                    }
                } else {
                    echo "<p class='text-danger'>No Record Found!</p>";
                }
            ?>
        </table>
    </div>
    </div>
<?php
    include('components/footer.php');
?>