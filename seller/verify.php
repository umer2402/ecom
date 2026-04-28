<?php
include "db.php";

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$verificationKey = trim((string) ($_GET['key'] ?? ''));
$sellerEmail = filter_var(trim((string) ($_GET['email'] ?? '')), FILTER_VALIDATE_EMAIL);

if ($verificationKey === '' || !$sellerEmail) {
    echo "Invalid verification link.";
    exit;
}

$stmt = $con->prepare("SELECT sellerEmail FROM sellers WHERE sellerEmail = ? AND verificationKey = ? LIMIT 1");
$stmt->bind_param("ss", $sellerEmail, $verificationKey);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $updateStmt = $con->prepare("UPDATE sellers SET verificationStatus = 'Verified', sellerStatus = 'active' WHERE sellerEmail = ?");
    $updateStmt->bind_param("s", $sellerEmail);

    if ($updateStmt->execute()) {
        header("location: login.php?msg=Your seller account is verified. Please sign in.");
        exit;
    }

    $updateStmt->close();
    echo "Error verifying email.";
} else {
    header("location: login.php?msg=This verification link is invalid or already used.");
    exit;
}

$stmt->close();
$con->close();
?>
