<?php
session_start();
include "../db.php";

if (!isset($_SESSION['sellerId']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(403);
    exit;
}

$userId = (int) ($_POST['userId'] ?? 0);
$sellerId = (int) ($_SESSION['sellerId']);
$postedSellerId = (int) ($_POST['sellerId'] ?? 0);
$message = trim($_POST['message'] ?? '');

if ($userId <= 0 || $sellerId <= 0 || $postedSellerId !== $sellerId || $message === '') {
    http_response_code(422);
    exit;
}

$stmt = $con->prepare("INSERT INTO chat (userId, sellerId, message, is_seller) VALUES (?, ?, ?, 1)");
$stmt->bind_param("iis", $userId, $sellerId, $message);
$stmt->execute();
$stmt->close();
?>
