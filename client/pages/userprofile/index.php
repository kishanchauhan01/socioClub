<?php
session_start();
// session_unset();
// session_destroy();
include_once '../../../server/db/connectDB.php';

if (isset($_COOKIE['user_id']) && isset($_COOKIE['auth_token'])) {
    $user_id = $_COOKIE['user_id'];
    $auth_token = $_COOKIE['auth_token'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE user_id = ? AND auth_token = ?");
    $stmt->bind_param("is", $user_id, $auth_token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows !== 1) {
        // Invalid token or user
        header("Location: ../login/");
        exit();
    }

    // ✅ User is authenticated
    $user = $result->fetch_assoc();

    // You can now use $first_name in your page
    // echo "Welcome, " . htmlspecialchars($first_name) . "!";
} else {
    // No token found
    header("Location: ../login/");
    exit();
}




include_once "../header.php" ?>

<link rel="stylesheet" href="../../../public/css/userProfile.css" />
</head>

<body class="overflow-y-hidden">
    <div class="hero vh-100 vw-100 bg-black">
        <div class="row w-100 h-100">
            <?php include_once "leftNavbar.php" ?>

            <div class="col-md-10 col-12 p-0 h-100">
                <div class="banner h-25">
                    <div class="banner-img h-100">
                        <img src="../../../public/images/homess/banner-bg.jpg" alt="" class="w-100 h-100">
                    </div>
                    <div class="profile-picture">
                        <img src="../../../public/images/homess/user1.jpg" alt="" class="" style="width: 100px; height: 100px; border-radius: 50%; margin-top: -60px; margin-left: 50px;">
                    </div>

                </div>
                <div class="user-info h-25">
                    <div class="usernames h-75 d-flex flex-column justify-content-end gap-1">
                        <div class="d-md-flex justify-content-md-between w-md-100">
                            <h3 class="text-white fs-3 fw-bold w-md-50"><?php echo $user['first_name'] . " " . $user['last_name'] ?></h3>
                            <div class="d-md-flex justify-content-md-start w-md-50 text-white-50 flex-md-wrap">
                                <p><b><i>"Each dream you leave behind is a part of your future that will <span class="text-warning"> no longer </span>exist."</i></b></p>
                            </div>
                        </div>
                        <p class="text-white-50">kishan007</p>


                    </div>
                    <div class="follwers-followings h-25 text-white">
                        <ul class="h-100 d-flex w-75 justify-content-around align-items-end pb-2">
                            <a href="#all-posts">
                                <li>2 posts</li>
                            </a>
                            <a href="./followers.php">
                                <li>45 follwers</li>
                            </a>
                            <a href="./followers.php">
                                <li>58 following</li>
                            </a>
                        </ul>

                    </div>

                </div>
                <div class="posts h-50 overflow-y-scroll" id="all-posts">
                    <div class="creat-posts h-25 d-flex justify-content-center align-items-center gap-2">
                        <a href="../create_post/" class="btn btn-outline-secondary h-50">+ Create Post</a>
                        <a class="btn btn-outline-secondary h-50" data-bs-toggle="modal" data-bs-target="#thoughtModal">+ Add Thought</a>
                    </div>
                    <div class="post-img h-75">
                        <div class="row h-100 w-100">
                            <div class="col-4">
                                <a href="./post.php"><img src="../../../public/images/homess/post1.jpg" alt="" class="w-100"></a>
                            </div>
                            <div class="col-4">
                                <img src="../../../public/images/homess/post3.jpg" alt="" class="w-100">
                            </div>
                            <div class="col-4">
                                <img src="../../../public/images/homess/post3.jpg" alt="" class="w-100">
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Thought Modal -->
    <div class="modal fade" id="thoughtModal" tabindex="-1" aria-labelledby="thoughtModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background: #222; color: #fff; border-radius: 10px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="thoughtModalLabel">Add Your Thought</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="thoughtForm">
                        <div class="mb-3">
                            <textarea class="form-control" id="thoughtText" name="thought" rows="4" placeholder="Share your thoughts..." required>Each dream you leave behind is a part of your future that will no longer exist."</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Post Thought</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include_once "notificationSidebar.php" ?>


</body>

</html>