<?php
// Autoload PHPMailer using Composer
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


        $mail = new PHPMailer(true);
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'mail.softobook.com'; // Replace with your SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'info@softobook.com'; // Replace with your email address
            $mail->Password = 'T]wZfdT-]aTA'; // Use an app password for Gmail
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            // Recipients
            $mail->setFrom('info@softobook.com', 'Alibaba Team');
            $mail->addAddress('myfreelancing2402@gmail.com','umer');

            // Content
            $mail->isHTML(true);
            $mail->Subject = "Verify Your Email - Alibaba Seller Registration";
            $mail->Body = "
                <p>Hi umer,</p>
                <p>Thank you for registering as a seller on Alibaba. Please verify your email address by clicking the link below:</p>
                <p><a href='abc'>xyz</a></p>
                <p>If you did not register, please ignore this email.</p>
                <p>Regards,<br>Alibaba Team</p>
            ";

            $mail->send();
?>
