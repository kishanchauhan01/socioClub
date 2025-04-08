<?php
session_start();
require_once '../db/connectDB.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['loginEmail']);
    $password = $_POST['loginPassword'];

    // Validate input
    if (empty($email) || empty($password)) {
        setcookie("error_login", "Please fill in all fields.", time() + 3, "/");
        header("Location: ../../client/pages/login/");
        exit();
    }

    // Sanitize email
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Prepare query
    $stmt = $conn->prepare("SELECT user_id, email, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($result && $result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {
            // Generate secure auth token
            $auth_token = bin2hex(random_bytes(32));

            // Store token in DB
            $update_stmt = $conn->prepare("UPDATE users SET auth_token = ? WHERE user_id = ?");
            $update_stmt->bind_param("si", $auth_token, $user['user_id']);
            $update_stmt->execute();

            // Set session variables
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['email'] = $user['email'];

            // Set cookies for 30 days
            $cookie_expiry = time() + (30 * 24 * 60 * 60); // 30 days
            setcookie("user_id", $user['user_id'], $cookie_expiry, "/");
            setcookie("auth_token", $auth_token, $cookie_expiry, "/");

            // Redirect
            setcookie("success_login", "Login successfull", time() + 3, "/");
            header("Location: ../../client/pages/home/");
            exit();
        } else {
            setcookie("error_login", "Invalid email or password.", time() + 3, "/");
            header("Location: ../../client/pages/login/");
            exit();
        }
    } else {
        setcookie("error_login", "User not found.", time() + 3, "/");
        header("Location: ../../client/pages/login/");
        exit();
    }
} else {
    header("Location: ../../client/pages/login/");
    exit();
}
