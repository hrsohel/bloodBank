<?php
    include('components/header.php');
    include('config.php');
?>
    <div class="search-form-container container">
        <form action="" class="my-3">
            <div class="mb-3">
                <input type="search" id="search" name="" placeholder="Search Blood Group" class="form-group">
                <input type="submit" id="search_btn" value="Search" class="btn btn-primary btn-sm">
            </div>
        </form>
        <div class="table-responsive">
            <table id='search-data-row' style="text-transform: capitalize;" class="table table-light table-hover">
                <tr>
                    <th>Full Name</th>
                    <th>Mobile Number</th>
                    <th>Address</th>
                    <th>Blood Group</th>
                    <th>Available</th>
                    <th>Last Donated(YYYY-MM-DD)</th>
                    <th><?php 
                        if(isset($_SESSION['role']) && $_SESSION['role'] == 1) {
                            echo "Action";
                        }
                    ?></th>
                </tr>
                <?php
                    $sql = "SELECT * FROM users"; 
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            $sql1 = "SELECT DATEDIFF(CURDATE(), '{$row['lastDonated']}')";
                            $result1 = mysqli_query($conn, $sql1);
                            $date = mysqli_fetch_row($result1);
                            if($date[0] >= 120) {$avail = "yes";} else {$avail = "no";}
                            if(isset($_SESSION['role']) && $_SESSION['role'] == 1) {
                                $ban = "<td>
                                <a href=delete_donor.php?uid={$row['uid']} class='btn btn-danger'><i class='fa-solid fa-trash-can'></i></a>
                                </td>";
                            }
                            echo "<tr>
                                <td>{$row['fullName']}</td>
                                <td>" . 0 . "{$row['phone']}</td>
                                <td>{$row['address']}</td>
                                <td>{$row['bloodGroup']}</td>
                                <td>" . $avail . "</td>
                                <td>{$row['lastDonated']} ({$date[0]} days ago)</td>
                                {$ban}
                                </tr>";
                        }
                    } else {
                        echo "No Record Found.";
                    }
                ?>
            </table>
        </div>
    </div>
<?php
    include('components/footer.php');
?>

