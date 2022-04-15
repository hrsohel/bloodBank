<?php
    include('config.php');
    $showData = "";
    $search = $_POST['search'];
    $sql = "SELECT * FROM users WHERE bloodGroup LIKE '{$search}'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
        
        $showTitle = "<tr>
        <th>Full Name</th>
        <th>Mobile Number</th>
        <th>Address</th>
        <th>Blood Group</th>
        <th>Available</th>
        <th>Last Donated(YYYY-MM-DD)</th>
    </tr>";
        while($row = mysqli_fetch_assoc($result)) {
            $sql1 = "SELECT DATEDIFF(CURDATE(), '{$row['lastDonated']}')";
            $result1 = mysqli_query($conn, $sql1);
            $date = mysqli_fetch_row($result1);
            if($date[0] >= 90) {$avail = "yes";} else {$avail = "no";}
            $showData .= "
            <tr>
                <td>{$row['fullName']}</td>
                <td>" . 0 . "{$row['phone']}</td>
                <td>{$row['address']}</td>
                <td>{$row['bloodGroup']}</td>
                <td>" . $avail . "</td>
                <td>{$row['lastDonated']} ({$date[0]} days ago)</td>
            </tr>";
        }
        echo $showTitle . $showData;
    } else {
        echo "<p class='text-danger'>No Record Found.</p>";
    }
?>