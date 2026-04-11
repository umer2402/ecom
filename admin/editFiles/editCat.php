<?php
$qry=mysqli_query($con, "SELECT * FROM categories WHERE categoryId='$catId'");
$row=mysqli_fetch_array($qry);
?>
<div class="col-12">
    <h3>Edit Category</h3>
    <hr>
    <form action="scripts/updateCat.php" method="post">
        <input type="hidden" name="catId" value="<?php echo $catId; ?>">
    <div class="input-group my-2">
        <label>Category Name</label>
        <input type="text" value="<?php echo $row['categoryName']; ?>" class="form-control" name="catName" placeholder="Enter Category Name">
    </div>
    <div class="input-group my-2">
        <label>Category Description</label>
        <input type="text" value="<?php echo $row['categoryDesc']; ?>" class="form-control" name="catDesc" placeholder="Enter Category Description">
    </div>
    <button class="btn btn-primary float-end btn-sm" type="submit">Update</button>
    </form>
</div>