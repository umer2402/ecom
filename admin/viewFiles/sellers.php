<?php
// Query to fetch sellers with 'Verified' or 'Rejected' verification statuses
$qry = mysqli_query($con, "SELECT * FROM sellers WHERE verificationStatus IN ('Verified', 'Rejected')");

if (!$qry) {
    die("Query failed: " . mysqli_error($con)); // Handle query errors
}
?>

<div class="col-12">
    <h3>All Sellers</h3>
    <table class="table table-bordered table-sm">
        <thead>
            <tr>
                <th>Sr. #</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Email Verification</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Loop through the query results and populate the table rows
            $sr=1;
            while ($row = mysqli_fetch_assoc($qry)) {
                $sellerId=$row['sellerId'];
                ?>
                <tr>
                    <td><?php echo $sr++; ?></td>
                    <td><?php echo htmlspecialchars($row['sellerName']); ?></td>
                    <td><?php echo htmlspecialchars($row['sellerEmail']); ?></td>
                    <td><?php echo htmlspecialchars($row['sellerStatus']); ?></td>
                    <td><?php echo htmlspecialchars($row['verificationStatus']); ?></td>
                    <td>
                        <?php
                        if($row['sellerStatus'] == 'inactive'){
                        ?>
                        <a href="scripts/updateStatus.php?tableName=sellers&recCol=sellerId&recId=<?php echo $row['sellerId']; ?>&colName=sellerStatus&calValue=active&returnPage=sellers"><button class="btn btn-success btn-sm">Approve</button></a>
                        <?php }else{ ?>
                        <a href="scripts/updateStatus.php?tableName=sellers&recCol=sellerId&recId=<?php echo $row['sellerId']; ?>&colName=sellerStatus&calValue=inactive&returnPage=sellers"><button class="btn btn-danger btn-sm">Decline</button></a>
                        <?php } ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>
