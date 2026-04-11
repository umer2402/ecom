<?php
include '../db.php';

$productId = $_POST['productId'];
$status = $_POST['status'];

$stmt = $con->prepare("DELETE FROM productStatus WHERE productId = ? AND status = ?");
$stmt->bind_param("is", $productId, $status);
$stmt->execute();

echo json_encode(['success' => true]);
$con->close();
?>
