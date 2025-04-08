<?php
session_start();
require_once '../db/connectDB.php';
require '../vendor/autoload.php'; // Ensure PHPMailer is installed via Composer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$smtp_username = $_ENV['SMTP_USERNAME'];
$smtp_password = $_ENV['SMTP_PASSWORD'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['loginEmail'];

    // Check if user exists
    $stmt = $conn->prepare("SELECT user_id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // Generate 6-digit OTP
        $otp = rand(100000, 999999);

        // Store OTP and email in cookies for 5 minutes
        setcookie('reset_otp', $otp, time() + 300, "/");
        setcookie('otp_email', $email, time() + 300, "/");

        $mail = new PHPMailer(true);
        try {
            // SMTP configuration
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = $smtp_username;// Replace with your Gmail
            $mail->Password = $smtp_password;// Use App Password, not Gmail password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Sender and recipient
            $mail->setFrom('kchauhan242@rku.ac.in', 'Socioclub Support');
            $mail->addAddress($email);

            // Email content
            $mail->isHTML(true);
            $mail->Subject = 'Your OTP to reset password';
            $mail->Body    = "Your OTP is: <b>$otp</b><br>It is valid for 5 minutes.";

            $mail->send();

            // Redirect to enter OTP page
            header('Location: ../../client/pages/forgot_password/otp.php');
            exit;
        } catch (Exception $e) {
            echo "<script>
                    alert('Failed to send OTP. Please try again later.');
                    window.location.href='../../client/pages/login/';
                  </script>";
            exit;
        }
    } else {
        // Email not found
        echo "<script>
                alert('Email not registered!');
                window.location.href='../../client/pages/forgot_password/';
              </script>";
        exit;
    }
}
