<?php
session_start();
require_once '../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();


$client_id = $_ENV['GOOGLE_CLIENT_ID'];
$client_secret = $_ENV['GOOGLE_CLIENT_SECRET'];

$client = new Google_Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri('http://localhost/socioclub/server/controllers/google-callback.php');
$client->addScope("email");
$client->addScope("profile");

$login_url = $client->createAuthUrl();
?>

<a href="<?= $login_url ?>">Login with Google</a>
