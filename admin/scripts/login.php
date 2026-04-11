<?php
session_start();
include "../db.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../login.php");
    exit;
}

$email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
$password = (string) ($_POST['pass'] ?? '');

if (!$email || $password === '') {
    echo "Error: Email and password are required.";
    exit;
}


// Prepare and bind the SQL query to check if the admin exists and if their status is active
$stmt = $con->prepare("SELECT adminId, adminPass, adminName, adminRole, adminStatus FROM admin WHERE adminEmail = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

// Check if the email exists in the database
if ($stmt->num_rows > 0) {
    // Bind the result to variables
    $stmt->bind_result($adminId, $hashedPassword, $adminName, $adminRole, $adminStatus);
    $stmt->fetch();

    // Verify the password
    $isValidPassword = password_verify($password, $hashedPassword) || hash_equals((string) $hashedPassword, $password);

    if ($isValidPassword) {
        // Check if the admin status is active
        if ($adminStatus == "active") {
            // Start the session and set the admin's session variables
            session_regenerate_id(true);
            $_SESSION['adminId'] = $adminId;
            $_SESSION['adminName'] = $adminName;
            $_SESSION['adminEmail'] = $email;
            $_SESSION['adminRole'] = $adminRole;
            $_SESSION['adminStatus'] = $adminStatus;

            // Redirect to the admin dashboard or the page the admin wants to access
            header("Location: ../index.php");
            exit;
        } else {
            echo "Error: Your account is inactive.";
        }
    } else {
        echo "Error: Incorrect password.";
    }
} else {
    echo "Error: No admin found with that email address.";
}

$stmt->close();
$con->close();
?>
