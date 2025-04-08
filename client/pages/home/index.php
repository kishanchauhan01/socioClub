<?php
session_start();
// session_unset();
// session_destroy();
include_once '../../../server/db/connectDB.php';

if (isset($_COOKIE['user_id']) && isset($_COOKIE['auth_token'])) {
    $user_id = $_COOKIE['user_id'];
    $auth_token = $_COOKIE['auth_token'];
    $_SESSION['user_id'] = $user_id;

    $stmt = $conn->prepare("SELECT * FROM users WHERE user_id = ? AND auth_token = ?");
    $stmt->bind_param("is", $user_id, $auth_token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows !== 1) {
        // Invalid token or user
        header("Location: ../login/");
        exit();
    }

    // User is authenticated
    $user = $result->fetch_assoc();
        
    if($user['first_name']) {
        if($_SESSION['profile_pic']) {
            $_SESSION['first_name'] = $user['first_name'];
        } else {
            $_SESSION['profile_pic'] = '../../../public/images/homess/nuser.jpeg';
            $_SESSION['first_name'] = $user['first_name'];
        }
    }

    // You can now use $first_name in your page
    // echo "Welcome, " . htmlspecialchars($first_name) . "!";
} else {
    // No token found
    header("Location: ../login/");
    exit();
}


include_once "../header.php";
?>

<link rel="stylesheet" href="../../../public/css/home.css" />
</head>

<body>
    <div class="hero vh-100 vw-100 bg-black overflow-y-hidden">


        <div class="row w-100 h-100">
            <!------------------------- nav-bar -------------------------->
            <?php include_once "leftNavbar.php" ?>

            <!------------------------- post-section --------------------->
            <?php include_once "postSection.php" ?>

        </div>

    </div>

    <?php include_once "notificationSidebar.php" ?>


    <script src="../../../public/js/home.js"></script>
</body>

</html>