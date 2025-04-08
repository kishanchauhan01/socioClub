<?php
session_start();
require_once '../db/connectDB.php';

$user_id = $_SESSION['user_id'] ?? $_COOKIE['user_id'] ?? null;

if (!$user_id) {
    setcookie("error_profile", "Unauthorized access", time() + 5, "/");
    header("Location: ../client/pages/profile/");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = trim($_POST['firstName']);
    $last_name = trim($_POST['lastName']);
    $user_name = trim($_POST['userName']);
    $dob = $_POST['DOB'];

    if (empty($first_name) || empty($user_name) || empty($dob)) {
        setcookie("error_profile", "Please fill all required fields", time() + 5, "/");
        header("Location: ../client/pages/profile/");
        exit();
    }

    $stmt = $conn->prepare("UPDATE users SET first_name = ?, last_name = ?, username = ?, dob = ? WHERE user_id = ?");
    $stmt->bind_param("ssssi", $first_name, $last_name, $user_name, $dob, $user_id);

    if ($stmt->execute()) {
        $_SESSION['first_name'] = $first_name;
        $_SESSION['last_name'] = $last_name;
        $_SESSION['user_name'] = $user_name;
        $_SESSION['dob'] = $dob;

        setcookie("success_profile", "Profile updated successfully", time() + 5, "/");
    } else {
        setcookie("error_profile", "Update failed", time() + 5, "/");
    }

    $stmt->close();
    $conn->close();

    header("Location: ../../../client/pages/settings/");
    exit();
} else {
    setcookie("error_profile", "Invalid request", time() + 5, "/");
    header("Location: ../../../client/pages/settings/");
    exit();
}
