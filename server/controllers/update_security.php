<?php
session_start();
require_once "../db/connectDB.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['user_id'] ?? $_COOKIE['user_id'] ?? null;

    if (!$userId) {
        setcookie("error_profile", "You must be logged in to update profile.", time() + 5, "/");
        header("Location: ../../client/pages/settings/security.php");
        exit;
    }

    $email = trim($_POST['email'] ?? '');
    $currentPswd = $_POST['currenPswd'] ?? '';
    $newPswd = $_POST['nPswd'] ?? '';
    $confirmPswd = $_POST['cPswd'] ?? '';

    // Get user info
    $stmt = $conn->prepare("SELECT password FROM users WHERE user_id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();

    if (!$user) {
        setcookie("error_profile", "User not found.", time() + 5, "/");
        header("Location: ../../client/pages/settings/security.php");
        exit;
    }

    // Begin SQL and parameters
    $sql = "UPDATE users SET email = ?";
    $params = [$email];
    $types = "s";

    // Check if password change is requested
    if (!empty($currentPswd)) {
        if (!password_verify($currentPswd, $user['password'])) {
            setcookie("error_profile", "Current password is incorrect.", time() + 5, "/");
            header("Location: ../../client/pages/settings/security.php");
            exit;
        }

        if (empty($newPswd) || empty($confirmPswd) || $newPswd !== $confirmPswd) {
            setcookie("error_profile", "New passwords do not match or are empty.", time() + 5, "/");
            header("Location: ../../client/pages/settings/security.php");
            exit;
        }

        $hashedPassword = password_hash($newPswd, PASSWORD_DEFAULT);
        $sql .= ", password = ?";
        $params[] = $hashedPassword;
        $types .= "s";
    }

    $sql .= " WHERE user_id = ?";
    $params[] = $userId;
    $types .= "i";

    // Prepare and execute update
    $stmt = $conn->prepare($sql);
    $stmt->bind_param($types, ...$params);

    if ($stmt->execute()) {
        setcookie("success_profile", "Profile updated successfully.", time() + 5, "/");
    } else {
        setcookie("error_profile", "Update failed: " . $stmt->error, time() + 5, "/");
    }

    $stmt->close();
    header("Location: ../../client/pages/settings/security.php");
    exit;
}
