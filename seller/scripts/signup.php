<?php
// Autoload PHPMailer using Composer
require './vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include "../db.php";

$sellerName = trim((string) ($_POST['sellerName'] ?? ''));
$sellerEmail = filter_var(trim((string) ($_POST['sellerEmail'] ?? '')), FILTER_VALIDATE_EMAIL);
$sellerPass = (string) ($_POST['sellerPass'] ?? '');

if ($sellerName === '' || !$sellerEmail || $sellerPass === '') {
    header("location: ../signup.php?msg=Please fill in all required fields.");
    exit;
}

// Generate a verification key
$verificationKey = md5(uniqid(rand(), true));

// Hash the password (for security)
$hashedPassword = password_hash($sellerPass, PASSWORD_BCRYPT);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Check if the email already exists
$emailCheckStmt = $con->prepare("SELECT sellerEmail FROM sellers WHERE sellerEmail = ?");
$emailCheckStmt->bind_param("s", $sellerEmail);
$emailCheckStmt->execute();
$emailCheckStmt->store_result();

if ($emailCheckStmt->num_rows > 0) {
    header("location: ../signup.php?msg=The email address is already registered.");
    exit;
} else {
    // Email verification sending is disabled, so create an active verified seller
    // to keep signup/login usable on the live custom PHP seller panel.
    $stmt = $con->prepare("INSERT INTO sellers (sellerName, sellerEmail, sellerPass, verificationKey, sellerStatus, verificationStatus) VALUES (?, ?, ?, ?, 'active', 'Verified')");
    $stmt->bind_param("ssss", $sellerName, $sellerEmail, $hashedPassword, $verificationKey);

    // Execute the statement
    if ($stmt->execute()) {
        // Create a verification link
        $verificationLink = "https://hellodiscounters.com/seller/verify.php?key=$verificationKey&email=$sellerEmail";
        
        /*
        // Send verification email using PHPMailer
        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'mail.softobook.com'; // Replace with your SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'info@softobook.com'; // Replace with your email address
            $mail->Password = 'AgXi58!;5=&D'; // Use an app password for Gmail
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 465;

            // Recipients
            $mail->setFrom('info@softobook.com', 'Alibaba Team');
            $mail->addAddress($sellerEmail, $sellerName);

            // Content
            $mail->isHTML(true);
            $mail->Subject = "Verify Your Email - Alibaba Seller Registration";
            $mail->Body = "
                <p>Hi $sellerName,</p>
                <p>Thank you for registering as a seller on Alibaba. Please verify your email address by clicking the link below:</p>
                <p><a href='$verificationLink'>$verificationLink</a></p>
                <p>If you did not register, please ignore this email.</p>
                <p>Regards,<br>Alibaba Team</p>
            ";

            $mail->send();
            header("location: ../signup.php?msg=You are registered successfully. A verification email has been sent.");
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        */

        header("location: ../login.php?msg=Your seller account has been created. Please sign in.");
        exit;
    } else {
        header("location: ../signup.php?msg=Unable to create seller account right now.");
        exit;
    }

    $stmt->close();
}

$emailCheckStmt->close();
$con->close();
?>
