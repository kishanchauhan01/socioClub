<?php
include_once "../header.php";
?>
<style>
    body {
        background-color: #121212;
        /* Dark background */
        /* color: #ffffff; */
        /* White text */
    }

    .card {
        background-color: #1e1e1e;
        /* Dark card */
        border: none;
    }

    .nav-tabs .nav-link {
        color: #bbb;
    }

    .nav-tabs .nav-link.active {
        background-color: #333;
        color: #fff;
    }

    .btn-follow {
        background-color: #007bff;
        color: white;
    }

    .btn-follow:hover {
        background-color: #0056b3;
    }
</style>
</head>

<body>
    <!-- <div class="hero bg-dark vh-100 vw-100"> -->
    <a href="./index.php" class="text-light fs-4 m-1">
        <i class="bi bi-arrow-left"></i>
    </a>
    <div class="container mt-5">
        <!-- Profile Section -->
        <div class="text-center mb-4">
            <div class="w-100 d-flex justify-content-center">

                <img src="../../../public/images/homess/user1.jpg" class="rounded-circle" alt="User Avatar" width="70px">
            </div>
            <h3 class="mt-2 text-white">John Doe</h3>
        </div>

        <!-- Tabs for Followers & Following -->
        <ul class="nav nav-tabs justify-content-center" id="followTabs">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#followers">Followers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#following">Following</a>
            </li>
        </ul>

        <div class="tab-content mt-4">
            <!-- Followers List -->
            <div id="followers" class="tab-pane fade show active">
                <div class="card p-3 mb-2 text-white">
                    <div class="d-flex align-items-center">
                        <img src="../../../public/images/homess/user2.jpg" class="rounded-circle me-3" alt="User" width="50px">
                        <div class="flex-grow-1">
                            <h6 class="mb-0">Alice Smith</h6>
                            <small>@alice_smith</small>
                        </div>
                        <button class="btn btn-sm btn-follow">Follow</button>
                    </div>
                </div>

                <div class="card p-3 mb-2 text-white">
                    <div class="d-flex align-items-center">
                        <img src="../../../public/images/homess/nuser.jpeg" class="rounded-circle me-3" alt="User" width="50px">
                        <div class="flex-grow-1">
                            <h6 class="mb-0 ">Michael Brown</h6>
                            <small>@michael_brown</small>
                        </div>
                        <button class="btn btn-sm btn-follow">Follow</button>
                    </div>
                </div>
            </div>

            <!-- Following List -->
            <div id="following" class="tab-pane fade">
                <div class="card p-3 mb-2 text-white">
                    <div class="d-flex align-items-center">
                        <img src="../../../public/images/homess/nuser.jpeg" class="rounded-circle me-3" alt="User" width="50px">
                        <div class="flex-grow-1">
                            <h6 class="mb-0">Emma Johnson</h6>
                            <small>@emma_johnson</small>
                        </div>
                        <button class="btn btn-sm btn-outline-light">Unfollow</button>
                    </div>
                </div>

                <div class="card p-3 mb-2 text-white">
                    <div class="d-flex align-items-center">
                        <img src="../../../public/images/homess/user2.jpg" class="rounded-circle me-3" alt="User" width="50px">
                        <div class="flex-grow-1">
                            <h6 class="mb-0">David Lee</h6>
                            <small>@david_lee</small>
                        </div>
                        <button class="btn btn-sm btn-outline-light">Unfollow</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->

</body>

</html>