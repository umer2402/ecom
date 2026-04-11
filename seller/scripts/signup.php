<?php
// Autoload PHPMailer using Composer
require './vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include "../db.php";

$sellerName = $_POST['sellerName'];
$sellerEmail = $_POST['sellerEmail'];
$sellerPass = $_POST['sellerPass'];

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
    echo "Error: The email address is already registered.";
} else {
    // Prepare and bind for inserting new seller
    $stmt = $con->prepare("INSERT INTO sellers (sellerName, sellerEmail, sellerPass, verificationKey) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $sellerName, $sellerEmail, $hashedPassword, $verificationKey);

    // Execute the statement
    if ($stmt->execute()) {
        // Create a verification link
        $verificationLink = "https://alibaba.softobook.com/seller/verify.php?key=$verificationKey&email=$sellerEmail";
        
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

        header("location: ../signup.php?msg=You are registered successfully.");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$emailCheckStmt->close();
$con->close();
?>
