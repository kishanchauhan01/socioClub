<?php
require_once '../db/connectDB.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $email = $_COOKIE['otp_email'] ?? null;

    if (!$email) {
        echo "<script>alert('Something went wrong. Please try again.'); window.location.href='../../client/pages/login/';</script>";
        exit;
    }

    if ($new_password !== $confirm_password) {
        echo "<script>alert('Passwords do not match.'); window.location.href='../../client/pages/forgot_password/changePswd.php';</script>";
        exit;
    }

    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
    $stmt->bind_param("ss", $hashed_password, $email);
    $stmt->execute();

    // Clean up cookies
    setcookie('reset_otp', '', time() - 3600, '/');
    setcookie('otp_email', '', time() - 3600, '/');

    // Success message with redirect
    echo "<script>
            alert('Password updated successfully. Please login again.');
            window.location.href='../../client/pages/login/';
          </script>";
    exit;
}
?>
