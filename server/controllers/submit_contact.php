<?php
session_start();
require_once '../db/connectDB.php';
require '../vendor/autoload.php'; // PHPMailer autoload

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$smtp_username = $_ENV['SMTP_USERNAME'];
$smtp_password = $_ENV['SMTP_PASSWORD'];

// Get user_id from session or cookie
$user_id = $_SESSION['user_id'] ?? $_COOKIE['user_id'] ?? null;

if ($_SERVER["REQUEST_METHOD"] == "POST" && $user_id) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $mobile = trim($_POST['mobile']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);

    // Save to DB
    $stmt = $conn->prepare("INSERT INTO contacts (user_id, name, email, mobile, subject, message) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssss", $user_id, $name, $email, $mobile, $subject, $message);

    if ($stmt->execute()) {
        // Send email to admin
        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = $smtp_username;// Your Gmail
            $mail->Password = $smtp_password;// App Password (NOT your normal Gmail password)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;


            // Recipients
            $mail->setFrom('kchauhan242@rku.ac.in', 'Website Contact Form');
            $mail->addAddress('kishanchauhan2006.25@gmail.com', 'Website Admin'); // Admin email

            // Content
            $mail->isHTML(true);
            $mail->Subject = "New Contact Message: " . $subject;
            $mail->Body    = "
                <h3>New message from contact form</h3>
                <p><strong>Name:</strong> {$name}</p>
                <p><strong>Email:</strong> {$email}</p>
                <p><strong>Mobile:</strong> {$mobile}</p>
                <p><strong>Message:</strong><br>{$message}</p>
            ";

            $mail->send();
            echo "<script>alert('Message sent successfully!'); window.location.href='../../client/pages/settings/contact.php';</script>";
        } catch (Exception $e) {
            echo "<script>alert('Message saved but failed to send email: {$mail->ErrorInfo}');</script>";
        }
    } else {
        echo "<script>alert('Failed to save your message.');</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('You must be logged in to contact us.');</script>";
}
