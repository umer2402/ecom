<?php
session_start();
include "../db.php";

if (!isset($_SESSION['adminId']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("location: ../login.php");
    exit;
}

$catId = (int) ($_POST['catId'] ?? 0);

if ($catId <= 0 || !isset($_FILES['catImage']) || $_FILES['catImage']['error'] !== UPLOAD_ERR_OK) {
    header("location: ../index.php?categories");
    exit;
}

$allowedExtensions = ['jpg', 'jpeg', 'png'];
$extension = strtolower(pathinfo($_FILES['catImage']['name'], PATHINFO_EXTENSION));

if (!in_array($extension, $allowedExtensions, true)) {
    header("location: ../index.php?categories");
    exit;
}

$catImage = $_FILES['catImage']['tmp_name'];
$catImageName = bin2hex(random_bytes(8)) . "." . $extension;
$imgPath = "assets/PICTURES/ICONS/" . $catImageName;

$stmt = $con->prepare("UPDATE categories SET categoryImg = ? WHERE categoryId = ?");
$stmt->bind_param("si", $imgPath, $catId);

if ($stmt->execute()) {
    if (move_uploaded_file($catImage, "../../" . $imgPath)) {
        header("location: ../index.php?categories");
        exit;
    }
}

$stmt->close();
?>
