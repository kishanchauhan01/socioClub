<?php
session_start();
require_once "../db/connectDB.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and fetch input
    $first_name   = trim($_POST["firstName"]);
    $last_name    = trim($_POST["lastName"]);
    $user_name    = trim($_POST["userName"]);
    $dob          = trim($_POST["dob"]);
    $email        = trim($_POST["email"]);
    $password     = $_POST["password"];
    $c_password   = $_POST["cPassword"];
    $invalidCheck = isset($_POST["invalidCheck"]) ? 1 : 0;

    // Validate fields
    if (
        empty($first_name) || empty($last_name) || empty($user_name) || empty($dob) ||
        empty($email) || empty($password) || empty($c_password) || !$invalidCheck
    ) {
        setcookie("error_signUp", "All fields are required.", time() + 5, "/");
        header("Location: ../../client/pages/signup/");
        exit;
    }

    // Check email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        setcookie("error_signUp", "Invalid email format.", time() + 5, "/");
        header("Location: ../../client/pages/signup/");
        exit;
    }

    // Password confirmation
    if ($password !== $c_password) {
        setcookie("error_signUp", "Passwords do not match.", time() + 5, "/");
        header("Location: ../../client/pages/signup/");
        exit;
    }

    // Check if username or email already exists
    $stmt = $conn->prepare("SELECT user_id FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $user_name, $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        setcookie("error_signUp", "Username or email already taken.", time() + 5, "/");
        $stmt->close();
        header("Location: ../../client/pages/signup/");
        exit;
    }
    $stmt->close();

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert user
    $insert = $conn->prepare("INSERT INTO users (first_name, last_name, username, email, password, dob) VALUES (?, ?, ?, ?, ?, ?)");
    $insert->bind_param("ssssss", $first_name, $last_name, $user_name, $email, $hashedPassword, $dob);

    if ($insert->execute()) {
        setcookie("success_signUp", "Signup successful! Please login.", time() + 5, "/");
        $insert->close();
        header("Location: ../../client/pages/login/");
        exit;
    } else {
        setcookie("error_signUp", "Signup failed. Try again.", time() + 5, "/");
        $insert->close();
        header("Location: ../../client/pages/signup/");
        exit;
    }
}
