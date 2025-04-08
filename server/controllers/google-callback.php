<?php
session_start();
require_once '../vendor/autoload.php';
require_once '../db/connectDB.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$client = new Google_Client();
$client->setClientId($_ENV['GOOGLE_CLIENT_ID']);
$client->setClientSecret($_ENV['GOOGLE_CLIENT_SECRET']);
$client->setRedirectUri('http://localhost/socioclub/server/controllers/google-callback.php');
$client->addScope('email');
$client->addScope('profile');

function generateAuthToken($length = 64)
{
    return bin2hex(random_bytes($length / 2)); // 64-char hex token
}

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    if (isset($token['error'])) {
        header('Location: ../../client/pages/login/index.php?error=oauth_failed');
        exit();
    }

    $client->setAccessToken($token);
    $oauth = new Google_Service_Oauth2($client);
    $googleUser = $oauth->userinfo->get();

    $googleId = $googleUser->id;
    $email = $googleUser->email;
    $firstName = $googleUser->givenName;
    $lastName = $googleUser->familyName;
    $profilePic = $googleUser->picture;

    $authToken = generateAuthToken();
    $expireTime = time() + (30 * 24 * 60 * 60); // 30 days

    // Check if user exists by Google ID
    $stmt = $conn->prepare("SELECT * FROM users WHERE google_id = ?");
    $stmt->bind_param("s", $googleId);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        // Existing user found by Google ID: update token
        $stmt = $conn->prepare("UPDATE users SET auth_token = ? WHERE user_id = ?");
        $stmt->bind_param("si", $authToken, $user['user_id']);
        $stmt->execute();
    } else {
        // Check if user exists by email (but no Google ID)
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user) {
            // Existing user found by email: update Google ID and token
            $stmt = $conn->prepare("UPDATE users SET google_id = ?, auth_token = ? WHERE user_id = ?");
            $stmt->bind_param("ssi", $googleId, $authToken, $user['user_id']);
            $stmt->execute();
        } else {
            // New user: insert everything
            $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, profile_pic, google_id, auth_token, created_at) VALUES (?, ?, ?, ?, ?, ?, NOW())");
            $stmt->bind_param("ssssss", $firstName, $lastName, $email, $profilePic, $googleId, $authToken);
            $stmt->execute();
            $user = [
                'user_id' => $stmt->insert_id,
                'email' => $email,
                'first_name' => $firstName,
                'profile_pic' => $profilePic
            ];
        }
    }

    // Set session and cookies
    $_SESSION['user_id'] = $user['user_id'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['first_name'] = $user['first_name'];
    $_SESSION['profile_pic'] = $user['profile_pic'];

    setcookie('user_id', $user['user_id'], $expireTime, '/', '', false, true);
    setcookie('auth_token', $authToken, $expireTime, '/', '', false, true);

    header('Location: ../../client/pages/home/');
    exit();
} else {
    header('Location: ../../client/pages/login/index.php?error=no_code');
    exit();
}
