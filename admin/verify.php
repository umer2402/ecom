<?php
include "db.php";
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Get key and email from URL
$verificationKey = trim($_GET['key'] ?? '');
$sellerEmail = trim($_GET['email'] ?? '');

if ($verificationKey === '' || $sellerEmail === '') {
    echo "Invalid verification link.";
    exit;
}

// Check if the key and email match in the database
$stmt = $con->prepare("SELECT sellerEmail FROM sellers WHERE sellerEmail = ? AND verificationKey = ? AND verificationStatus = 'Pending'");
$stmt->bind_param("ss", $sellerEmail, $verificationKey);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    // Update the verification status
    $updateStmt = $con->prepare("UPDATE sellers SET verificationStatus = 'Verified', sellerStatus = 'active' WHERE sellerEmail = ?");
    $updateStmt->bind_param("s", $sellerEmail);
    if ($updateStmt->execute()) {
        echo "Email verified successfully. Your account is now active.";
    } else {
        echo "Error verifying email.";
    }
    $updateStmt->close();
} else {
    echo "Invalid verification link or email already verified.";
}

// Close connections
$stmt->close();
$con->close();
?>
