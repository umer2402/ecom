<?php
include "../db.php";
$catId=$_POST['catId'];
$qry=mysqli_query($con, "SELECT * FROM subCategories WHERE categoryId='$catId'");
while($row=mysqli_fetch_array($qry)){
?>
<option value="<?php echo $row['subCategoryId']; ?>"><?php echo $row['subCategoryName']; ?> - <?php echo $row['subCategoryDesc']; ?></option>
<?php } ?>