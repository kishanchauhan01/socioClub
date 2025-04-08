<?php

require_once '../../../server/db/connectDB.php';

$user_id = $_SESSION['user_id'] ?? $_COOKIE['user_id'] ?? null;

if ($user_id) {
    $stmt = $conn->prepare("SELECT first_name, last_name, username, dob FROM users WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
}

include_once "../header.php";
?>

<link rel="stylesheet" href="../../../public/css/setting.css" />
</head>

<body>
    <div class="hero vh-100 vw-100 bg-black overflow-y-hidden">
        <div class="row w-100 h-100 gap-0 m-0">
            <?php include_once "navbar.php" ?>

            <!-- Main Content -->

            <div class="col-md-10 col-12 h-md-100 w-md-100 p-0 position-relative">
                <div class="banner h-25 position-relative">
                    <div class="banner-img h-75">
                        <img id="bannerImage" src="../../../public/images/homess/banner-bg.jpg" alt="" class="w-100 h-100">
                    </div>

                    <!-- Hidden file input for banner -->
                    <input type="file" id="bannerInput" accept="image/*" style="display: none;">

                    <!-- Edit Icon for Banner -->
                    <i class="bi bi-pencil text-white fs-3 position-absolute top-0 end-0 m-3 bg-dark rounded-2 p-2"
                        style="cursor: pointer;" id="editBanner">edit</i>

                    <!-- Profile Picture Section -->
                    <div class="profile-picture position-relative"
                        style="width: 100px; height: 100px; margin-top: -60px; margin-left: 50px;">
                        <img id="profileImage" src="../../../public/images/homess/user1.jpg"
                            alt="" class="w-100 h-100 rounded-circle border border-white">

                        <!-- Hidden file input for profile picture -->
                        <input type="file" id="profileInput" accept="image/*" style="display: none;">

                        <!-- Edit Icon for Profile Picture -->
                        <i class="bi bi-pencil text-white fs-5 position-absolute bottom-0 end-0 bg-dark p-1 rounded-circle"
                            style="cursor: pointer; transform: translate(25%, 25%);" id="editProfile"></i>
                    </div>
                </div>

                <?php if (isset($_COOKIE['success_profile'])): ?>
                    <div style="position: fixed; top: 20px; right: 20px; z-index: 1050; min-width: 300px;">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= htmlspecialchars($_COOKIE['success_profile']) ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                <?php elseif (isset($_COOKIE['error_profile'])): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= htmlspecialchars($_COOKIE['error_profile']) ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>


                <div class="edit-info container mt-1" id="formContainer">

                    <h3 class="text-info fs-3">Edit Your Info</h3>
                    <form class="row g-3 mt-2 needs-validation" method="post" action="../../../server/controllers//update_profile.php" id="form1" novalidate>
                        <div class="col-md-6">
                            <label for="firstName" class="form-label text-white">First Name</label>
                            <input type="text" class="form-control" placeholder="Enter first name" name="firstName" required value="<?= htmlspecialchars($user['first_name'] ?? '') ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="lastName" class="form-label text-white">Last Name</label>
                            <input type="text" class="form-control" placeholder="Enter last name" name="lastName" required value="<?= htmlspecialchars($user['last_name'] ?? '') ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="userName" class="form-label text-white">User Name</label>
                            <input type="text" class="form-control" placeholder="Enter user name" name="userName" required value="<?= htmlspecialchars($user['username'] ?? '') ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="DOB" class="form-label text-white">Date Of Birth</label>
                            <div class="date-container">
                                <input type="date" class="form-control" name="DOB" required value="<?= htmlspecialchars($user['dob'] ?? '') ?>">
                            </div>
                        </div>
                        <!-- Other fields -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary w-100 py-2">Update Info</button>
                        </div>
                    </form>


                </div>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

    <script src="../../../public/js/setting.js"></script>
</body>

</html>