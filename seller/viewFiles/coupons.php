<div class="col-12">
    <h2>Coupons List</h2>
    <a href="index.php?generateCoupon"><button class="btn btn-primary float-end">Generate Coupons</button>
    </a>
    <?php
    $qry=mysqli_query($con, "SELECT * FROM coupons WHERE sellerId='$sellerId'");
    ?>
    <table class="table table-bordered table-sm">
        <thead class="bg-dark text-white">
            <tr>
                <th>Sr. #</th>
                <th>Coupon</th>
                <th>Generation Date</th>
                <th>Expiry Date</th>
                <th>Discount Percent</th>
                <th>Coupons Allowed</th>
                <th>Coupon Used</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $sr=1;
            while($row=mysqli_fetch_array($qry)){
            ?>
            <tr>
                <td><?php echo $sr++; ?></td>
                <td><?php echo $row['couponNo']; ?></td>
                <td><?php echo $row['genDate']; ?></td>
                <td><?php echo $row['expDate']; ?></td>
                <td><?php echo $row['discountPercent']; ?>%</td>
                <td><?php echo $row['noDiscounts']; ?></td>
                <td><?php echo $row['used']; ?></td>
                <td>
                    <button class="btn btn-danger btn-sm">Del</button>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>