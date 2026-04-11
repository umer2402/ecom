<?php
include '../db.php';

$productId = $_POST['productId'];
$status = $_POST['status'];

// Prevent duplicate status
$check = $con->prepare("SELECT * FROM productStatus WHERE productId = ? AND status = ?");
$check->bind_param("is", $productId, $status);
$check->execute();
$result = $check->get_result();

if ($result->num_rows == 0) {
    $stmt = $con->prepare("INSERT INTO productStatus (productId, status) VALUES (?, ?)");
    $stmt->bind_param("is", $productId, $status);
    $stmt->execute();
}

echo json_encode(['success' => true]);
$con->close();
?>
