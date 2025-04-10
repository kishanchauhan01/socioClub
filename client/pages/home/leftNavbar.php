<!-- for-mobile  -->

<div class="mobile-nav col-2 d-md-none d-flex text-white pt-2 w-100 justify-content-between">
    <h1 class="heading mt-md-2 w-75 fs-1">SocioClub</h1>
    <div class="noti-msg w-25 d-flex justify-content-between">
        <img src="../../../public/images/homess/bell.png" alt="" data-bs-toggle="offcanvas"
            data-bs-target="#notificationSidebar" aria-controls="notificationSidebar">
        <img src="../../../public/images/homess/messenger.png" alt="">
    </div>
</div>

<!-- for-desktop  -->
<div
    class="nav-bar col-md-2 d-none d-md-block  bg-black text-white text-center d-md-flex flex-md-column justify-content-md-between align-items-md-center">
    <h2 class="heading mt-md-2 fs-2">SocioClub</h2>
    <nav class="nav-links h-50">
        <ul class="list-unstyled d-md-flex flex-md-column h-100 justify-content-md-around align-items-md-start">
            <li class="home-link d-md-flex justify-content-md-between align-items-md-center">
                <img src="../../../public/images/homess/home.png" alt="">
                <div class="d-md-flex justify-content-center w-75">

                    <a href="#" class="text-decoration-none text-white fw-bolder fs-5">Home</a>
                </div>
            </li>
            <li class="notification-link d-md-flex justify-content-md-between align-items-md-center">
                <img src="../../../public/images/homess/bell.png" alt="">
                <div class="d-md-flex justify-content-center w-75">

                    <a href="#" class="text-decoration-none text-white fw-bolder fs-5" data-bs-toggle="offcanvas"
                        data-bs-target="#notificationSidebar" aria-controls="notificationSidebar">notification</a>
                </div>
            </li>
            <li class="search-link d-md-flex justify-content-md-between align-items-md-center">
                <img src="../../../public/images/homess/search.png" alt="">
                <div class="d-md-flex justify-content-center w-75">
                    <a href="../search/" class="text-decoration-none text-white fw-bolder fs-5">
                        Search
                    </a>
                </div>
            </li>

            <li class="settings-link d-md-flex justify-content-md-between align-items-md-center">
                <img src="../../../public/images/homess/setting.png" alt="">
                <div class="d-md-flex justify-content-center w-75">

                    <a href="../settings/" class="text-decoration-none text-white fw-bolder fs-5">Settings</a>
                </div>
            </li>
            <li class="messages-link d-md-flex justify-content-md-between align-items-md-center">
                <img src="../../../public/images/homess/messenger.png" alt="">
                <div class="d-md-flex justify-content-center w-75">
                    <a href="../chat/" class="text-decoration-none text-white fw-bolder fs-5">Messages</a>
                </div>
            </li>
        </ul>
    </nav>

    <div class="profile d-md-flex justify-content-md-between align-items-md-center mb-2">
        <div class="profile-image p-2">
            <img src="<?php echo $_SESSION['profile_pic']?>" alt="">
        </div>
        <div class="user-name px-3">
            <a href="../userprofile/">
                <h5><?php echo $_SESSION['first_name'] ?></h5>
            </a>
        </div>
    </div>
</div>