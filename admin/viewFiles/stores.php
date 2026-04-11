<?php
// Query to fetch all stores
$qry = mysqli_query($con, "SELECT * FROM stores");
?>

<div class="col-12">
    <h3>All Stores</h3>
    <hr>
    <table class="table table-bordered table-sm">
        <thead>
            <tr>
                <th>Sr. #</th>
                <th>Store Name</th>
                <th>Brand</th>
                <th>Contact</th>
                <th>Status</th>
                <th>Total Products</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $srNo = 1; // Counter for serial number
            while ($row = mysqli_fetch_assoc($qry)) {
                // Extract data from the row
                $storeId = $row['storeId'];
                $storeName = $row['storeName'];
                $brandName = $row['brandName'];
                $storeContact = $row['storeContact'];
                $storeStatus = $row['storeStatus'];
            ?>
                <tr>
                    <td><?php echo $srNo++; ?></td>
                    <td><?php echo htmlspecialchars($storeName); ?></td>
                    <td><?php echo htmlspecialchars($brandName); ?></td>
                    <td><?php echo htmlspecialchars($storeContact); ?></td>
                    <td><?php echo $storeStatus; ?></td>
                    <td><?php  
                        echo mysqli_num_rows(mysqli_query($con, "SELECT * FROM products WHERE storeId='$storeId'"));
                    ?></td> 
                    <td>
                        <a href="index.php?storeDetails=<?php echo $row['storeId']; ?>"><button class="btn btn-primary btn-sm">Details</button></a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>