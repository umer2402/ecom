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
    $brandName = $_POST['brandName'];
    $storeName = $_POST['storeName'];
    $storeDesc = $_POST['storeDesc'];
    $noEmp = $_POST['noEmp'];
    $storeEmail = $_POST['storeEmail'];
    $storeContact = $_POST['storeContact'];

    // Handle file uploads
    $storeBanner = basename($storeName.$_FILES["storeBanner"]["name"]);
    $storeLogo = basename($storeName.$_FILES["storeLogo"]["name"]);

    // Move uploaded files to the target directory
    if (!move_uploaded_file($_FILES["storeBanner"]["tmp_name"], "../../store/assets/storeImages/".$storeBanner)) {
        die("Error uploading store banner.");
    }
    if (!move_uploaded_file($_FILES["storeLogo"]["tmp_name"], "../../store/assets/storeImages/".$storeLogo)) {
        die("Error uploading store logo.");
    }

    // Insert data into the database
    $sql = "INSERT INTO `stores` (`sellerId`, `brandName`, `storeName`, `storeDesc`, `storeBanner`, `noEmp`, `storeEmail`, `storeContact`, `storeLogo`) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $con->prepare($sql);

    if ($stmt) {
        $stmt->bind_param(
            "sssssisss",
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
