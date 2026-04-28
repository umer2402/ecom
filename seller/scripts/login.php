<?php
session_start();
include "../db.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("location: ../login.php?msg=Error: Invalid request.");
    exit;
}

$email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
$password = (string) ($_POST['pass'] ?? '');

if (!$email || $password === '') {
    header("location: ../login.php?msg=Error: Email and password are required.");
    exit;
}

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Prepare and bind the SQL query to check if the user exists and if they are verified and active
$stmt = $con->prepare("SELECT sellerId, sellerPass, sellerName, sellerStatus, verificationStatus FROM sellers WHERE sellerEmail = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

// Check if the email exists in the database
if ($stmt->num_rows > 0) {
    // Bind the result to variables
    $stmt->bind_result($sellerId, $hashedPassword, $sellerName, $status, $verified);
    $stmt->fetch();

    // Support both modern hashed passwords and legacy plain-text values.
    $isValidPassword = password_verify($password, (string) $hashedPassword)
        || hash_equals((string) $hashedPassword, $password);

    if ($isValidPassword) {
        // Check if the email is verified and status is active
        if (strcasecmp((string) $status, "active") === 0 && strcasecmp((string) $verified, 'Verified') === 0) {
            // Start the session and set the user's session variables
            session_regenerate_id(true);
            $_SESSION['sellerEmail'] = $email;
            $_SESSION['SELLERSTORE'] = $sellerName;
            $_SESSION['sellerId'] = $sellerId;
            
            $storeStmt = $con->prepare("SELECT storeId FROM stores WHERE sellerId = ? LIMIT 1");
            if ($storeStmt) {
                $storeStmt->bind_param("i", $sellerId);
                $storeStmt->execute();
                $storeStmt->bind_result($storeId);

                if ($storeStmt->fetch()) {
                    $_SESSION['storeId'] = $storeId;
                } else {
                    unset($_SESSION['storeId']);
                }

                $storeStmt->close();
            }

            // Redirect to the dashboard or the page the user wants to access
            header("Location: ../index.php");
            exit;
        } else {
            header("location: ../login.php?msg=Error: Your account is not verified or is inactive.");
            exit;
        }
    } else {
        header("location: ../login.php?msg=Error: Incorrect password.");
        exit;
    }
} else {
    
    header("location: ../login.php?msg=Error: No user found with that email address.");
    exit;
}

$stmt->close();
$con->close();
?>
