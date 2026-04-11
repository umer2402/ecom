<?php
session_start();
include "../db.php";
$catId = (int) ($_POST['catId'] ?? 0);

if (!isset($_SESSION['sellerId']) || $catId <= 0) {
    exit;
}

$stmt = $con->prepare("SELECT subCategoryId, subCategoryName, subCategoryDesc FROM subCategories WHERE categoryId = ?");
$stmt->bind_param("i", $catId);
$stmt->execute();
$result = $stmt->get_result();

while($row = $result->fetch_assoc()){
?>
<option value="<?php echo (int) $row['subCategoryId']; ?>"><?php echo htmlspecialchars($row['subCategoryName']); ?> - <?php echo htmlspecialchars($row['subCategoryDesc']); ?></option>
<?php } ?>
