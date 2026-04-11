<?php
session_start();
include "../db.php";

if (!isset($_SESSION['sellerId']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("location: ../login.php");
    exit;
}

$sellerId = (int) $_SESSION['sellerId'];
$postedSellerId = (int) ($_POST['sellerId'] ?? 0);
$couponNo = strtoupper(trim($_POST['couponNo'] ?? ''));
$genDate = trim($_POST['genDate'] ?? '');
$expDate = trim($_POST['expDate'] ?? '');
$totalCoupons = (int) ($_POST['totalCoupons'] ?? 0);
$discountPercent = (float) ($_POST['discountPercent'] ?? 0);

if ($postedSellerId !== $sellerId || $couponNo === '' || $totalCoupons <= 0 || $discountPercent <= 0) {
    header("location: ../index.php?generateCoupon=Invalid coupon data!");
    exit;
}

$checkStmt = $con->prepare("SELECT couponId FROM coupons WHERE couponNo = ?");
$checkStmt->bind_param("s", $couponNo);
$checkStmt->execute();
$checkStmt->store_result();

if ($checkStmt->num_rows > 0) {
    $checkStmt->close();
    header("location: ../index.php?generateCoupon=This Coupon No Already Exist!");
} else {
    $checkStmt->close();
    $stmt = $con->prepare("INSERT INTO coupons (sellerId, couponNo, genDate, expDate, discountPercent, noDiscounts) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssdi", $sellerId, $couponNo, $genDate, $expDate, $discountPercent, $totalCoupons);
    if($stmt->execute()){
        header("location: ../index.php?generateCoupon=Coupon Generated Successfully!");
    }else{
        header("location: ../index.php?generateCoupon=Error: " . $stmt->error);
    }
}
?>
