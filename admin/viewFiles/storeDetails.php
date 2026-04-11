<?php
$qry=mysqli_query($con, "SELECT * FROM stores WHERE storeId='$storeId'");
$row=mysqli_fetch_array($qry);
?>
<style>
    .strImg {
        display: block;
        width: 50%; /* Initial size of the image */
        position: relative; /* Required for z-index to work */
        z-index: 1; /* Default layer */
        transition: transform 1s ease, z-index 0s ease; /* Smooth zoom effect */
    }
    
    .strImg:hover {
        transform: scale(3.5); /* Zoom in effect */
        z-index: 10; /* Bring the image to the top layer */
    }

</style>
<div class="col-2">
    <img src="../../store/assets/storeImages/<?php echo $row['storeLogo']; ?>" class="img-thumbnail">
</div>
<div class="col-10 border">
    <h1>Store Name: <?php
    echo $row['storeName'];
    ?></h1>
    <h3>Brand: <?php
    echo $row['brandName'];
    ?></h3>
    <b># Employees: <?php echo $row['noEmp']; ?></b><br>
    <b>Reg. Date: <?php echo $row['creationDate']; ?></b><br>
    <p><?php echo $row['storeDesc']; ?></p>
    <div class="row">
        <div class="col-8">
            
            <b>Banner Image:</b>
            <img src="../../store/assets/storeImages/<?php echo $row['storeBanner']; ?>" class="img-fluid w-50 strImg">
        </div>
        <div class="col-4">
            <?php
            if($row['storeStatus'] == "Pending"){
            ?>
            <a href="scripts/updateStatus.php?tableName=stores&recCol=storeId&recId=<?php echo $row['storeId']; ?>&colName=storeStatus&calValue=Approved&returnPage=storeDetails=<?php echo $storeId; ?>"><button class="btn btn-success btn-lg w-100 mt-3">Approve</button></a>
            <?php }else{ ?>
            <a href="scripts/updateStatus.php?tableName=stores&recCol=storeId&recId=<?php echo $row['storeId']; ?>&colName=storeStatus&calValue=Pending&returnPage=storeDetails=<?php echo $storeId; ?>"><button class="btn btn-danger btn-lg w-100 mt-3">Decline</button></a>
            <?php } ?>
        </div>
    </div>
    <hr>
    <h4>Contact Info</h4>
    <b><?php echo $row['storeEmail']; ?></b><br>
    <b><?php echo $row['storeContact']; ?></b><br>
</div>