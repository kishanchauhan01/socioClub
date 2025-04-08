<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $entered_otp = $_POST['otp'];
    $stored_otp = $_COOKIE['reset_otp'] ?? null;

    if ($stored_otp && $entered_otp == $stored_otp) {
        header("Location: ../../client/pages/forgot_password/changePswd.php");
        exit;
    } else {
        echo "<script>
                alert('Invalid or expired OTP!');
                window.location.href='../../client/pages/login/';
              </script>";
        exit;
    }
}
?>
