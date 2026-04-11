<?php

$qry=mysqli_query($con, "SELECT * FROM products JOIN stores ON products.storeId=stores.storeId JOIN categories ON products.categoryId=categories.categoryId JOIN subCategories ON products.subCategoryId=subCategories.subCategoryId WHERE productId='$proId'");
$row=mysqli_fetch_array($qry);
$videoFile=$row['proVideo'];
?>
<style>
.col-3{
    
        display: inline-block;
        padding:5px;
}
    .strImg {
        position: relative; /* Required for z-index to work */
        z-index: 1; /* Default layer */
        transition: transform 1s ease, z-index 0s ease; /* Smooth zoom effect */
    }
    
    .strImg:hover {
        transform: scale(2.2); /* Zoom in effect */
        z-index: 10; /* Bring the image to the top layer */
    }

</style>
<b>Product Name: <?php echo $row['productName']; ?></b>
<b>SKU: <?php echo $row['SKU']; ?></b><br>
<b>Category: <?php echo $row['categoryName']." - ".$row['categoryDesc']; ?></b><br>
<b>Sub-Category: <?php echo $row['subCategoryName']." - ".$row['subCategoryDesc']; ?></b><br>
<b>Description: <?php echo $row['productDesc']; ?></b><br>
<b>Sizes: <?php echo $row['sizes']; ?></b><br>
<b>Colors: <?php echo $row['colors']; ?></b><br>
<b>Price: <?php echo $row['price']; ?></b><br>
<b>Discount: <?php echo $row['discount']; ?>%</b><br>
<b>Stock Quantity: <?php echo $row['stockQuantity']; ?></b><br>
<b>Min. Order Qty: <?php echo $row['minOrderQuantity']; ?></b><br>
<b>Status: <?php echo $row['proStatus']; ?></b><br>
<b>Listing Score: <?php echo $row['score']; ?></b><br>
<hr>
<h5>Images</h5>
<div class="row">
    <?php
    $qry=mysqli_query($con, "SELECT * FROM productImages WHERE productId='$proId'");
    while($get=mysqli_fetch_array($qry)){
    ?>
    <div class="col-3">
        
    <img src="../assets/productImages/lg/<?php echo $get['imageName']; ?>" class="img-fluid strImg" style="width:200px; height:260px;">
    
    </div>
    <?php } ?>
</div>
<div class="row">
    <div class="col-6 mb-3">
        <?php if (!empty($videoFile)) { ?>
            <video width="50%" height="200" controls>
                <source src="../assets/productVideos/<?php echo $videoFile; ?>" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        <?php } else { ?>
            <b class="text-danger">Video Not Available</b>
        <?php } ?>
    </div>
</div>
<div class="row">
    <div class="col-12 float-end">
        <a href="scripts/updateStatus.php?tableName=products&recCol=productId&recId=<?php echo $row['productId']; ?>&colName=proStatus&calValue=Approved&returnPage=products=<?php echo $proId; ?>"><button class="btn btn-success float-end mx-3">Approve</button></a>
        <a href="scripts/updateStatus.php?tableName=products&recCol=productId&recId=<?php echo $row['productId']; ?>&colName=proStatus&calValue=Reject&returnPage=products=<?php echo $proId; ?>"><button class="btn btn-danger float-end">Reject</button></a>
    </div>
</div>




