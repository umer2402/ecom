<?php
session_start();
include "../db.php";

if (!isset($_SESSION['adminId']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("location: ../login.php");
    exit;
}

$catId = (int) ($_POST['catId'] ?? 0);
$catName = trim($_POST['catName'] ?? '');
$catDesc = trim($_POST['catDesc'] ?? '');

if ($catId <= 0 || $catName === '') {
    header("location: ../index.php?categories");
    exit;
}

$stmt = $con->prepare("UPDATE categories SET categoryName = ?, categoryDesc = ? WHERE categoryId = ?");
$stmt->bind_param("ssi", $catName, $catDesc, $catId);
$stmt->execute();
$stmt->close();

header("location: ../index.php?categories");
?>
