<?php
session_start();
include '../db.php'; // Include your database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the sellerId exists in the session
    if (!isset($_SESSION['sellerId'])) {
        die("Unauthorized access. Please log in.");
    }

    $sellerId = $_SESSION['sellerId']; // Fetch sellerId from session

    // Check if the seller already has a store
    $checkSql = "SELECT storeId FROM stores WHERE sellerId = ?";
    $checkStmt = $con->prepare($checkSql);

    if ($checkStmt) {
        $checkStmt->bind_param("s", $sellerId);
        $checkStmt->execute();
        $checkStmt->store_result();

        if ($checkStmt->num_rows > 0) {
            header("location: ../index.php?storeSettings=&res=Error: A store already exists!");
            $checkStmt->close();
            $con->close();
            exit;
        }
        $checkStmt->close();
    } else {
        header("location: ../index.php?storeSettings=&res=Error preparing the check statement: " . $con->error);
        $con->close();
        exit;
    }

    // Retrieve other form data
    $brandName = trim($_POST['brandName'] ?? '');
    $storeName = trim($_POST['storeName'] ?? '');
    $storeDesc = trim($_POST['storeDesc'] ?? '');
    $noEmp = (int) ($_POST['noEmp'] ?? 0);
    $storeEmail = filter_var(trim($_POST['storeEmail'] ?? ''), FILTER_VALIDATE_EMAIL);
    $storeContact = trim($_POST['storeContact'] ?? '');

    if ($brandName === '' || $storeName === '' || !$storeEmail || $storeContact === '') {
        header("location: ../index.php?storeSettings=&res=Error: Invalid store details.");
        $con->close();
        exit;
    }

    // Handle file uploads
    if (
        !isset($_FILES["storeBanner"], $_FILES["storeLogo"]) ||
        $_FILES["storeBanner"]["error"] !== UPLOAD_ERR_OK ||
        $_FILES["storeLogo"]["error"] !== UPLOAD_ERR_OK
    ) {
        header("location: ../index.php?storeSettings=&res=Error: Store banner and logo are required.");
        $con->close();
        exit;
    }

    $img1Name = $_FILES["storeBanner"]["name"];
    $img2Name = $_FILES["storeLogo"]["name"];
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
    $bannerExtension = strtolower(pathinfo($img1Name, PATHINFO_EXTENSION));
    $logoExtension = strtolower(pathinfo($img2Name, PATHINFO_EXTENSION));

    if (!in_array($bannerExtension, $allowedExtensions, true) || !in_array($logoExtension, $allowedExtensions, true)) {
        header("location: ../index.php?storeSettings=&res=Error: Invalid image format.");
        $con->close();
        exit;
    }

    $safeStoreName = preg_replace('/[^A-Za-z0-9_-]/', '', $storeName);
    $storeBanner = $sellerId . "-" . $safeStoreName . "-" . bin2hex(random_bytes(6)) . "." . $bannerExtension;
    $storeLogo = $sellerId . "-" . $safeStoreName . "-" . bin2hex(random_bytes(6)) . "." . $logoExtension;
    
    // Move uploaded files to the target directory
    if (!move_uploaded_file($_FILES["storeBanner"]["tmp_name"], "../../assets/storeImages/" . $storeBanner)) {
        die("Error uploading store banner.");
    }
    if (!move_uploaded_file($_FILES["storeLogo"]["tmp_name"], "../../assets/storeImages/" . $storeLogo)) {
        die("Error uploading store logo.");
    }

    // Insert data into the database
    $sql = "INSERT INTO `stores` (`sellerId`, `brandName`, `storeName`, `storeDesc`, `storeBanner`, `noEmp`, `storeEmail`, `storeContact`, `storeLogo`) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $con->prepare($sql);

    if ($stmt) {
        $stmt->bind_param(
            "issssisss",
            $sellerId,
            $brandName,
            $storeName,
            $storeDesc,
            $storeBanner,
            $noEmp,
            $storeEmail,
            $storeContact,
            $storeLogo
        );

        if ($stmt->execute()) {
            header("location: ../index.php?storeSettings=&res=Store added successfully!");
        } else {
            echo "Error: " . $stmt->error;
            header("location: ../index.php?storeSettings=&res=Error: " . $stmt->error);
        }

        $stmt->close();
    } else {
        header("location: ../index.php?storeSettings=&res=Error preparing the SQL statement: " . $con->error);
    }

    $con->close();
}
?>
