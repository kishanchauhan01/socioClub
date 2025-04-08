<?php include_once "../header.php" ?>

<link rel="stylesheet" href="../../../public/css/setting.css" />
<style>
    body {
        background-color: #000;
        color: #fff;
    }

    .settings-container {
        max-width: 600px;
        background: #111;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
    }

    .form-control {
        background: #222;
        border: 1px solid #444;
        color: #fff;
    }

    .form-control:focus {
        background: #222;
        color: #fff;
        border-color: #666;
        box-shadow: none;
    }

    .toggle-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px 0;
    }

    .toggle-switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 26px;
    }

    .toggle-switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .toggle-slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #555;
        transition: 0.3s;
        border-radius: 26px;
    }

    .toggle-slider:before {
        position: absolute;
        content: "";
        height: 18px;
        width: 18px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        transition: 0.3s;
        border-radius: 50%;
    }

    input:checked+.toggle-slider {
        background-color: #0d6efd;
    }

    input:checked+.toggle-slider:before {
        transform: translateX(24px);
    }

    .privacy-message {
        font-size: 14px;
        color: #aaa;
    }

    .btn-save {
        background: #0d6efd;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        margin-top: 10px;
        transition: 0.3s;
    }

    .btn-save:hover {
        background: #0b5ed7;
    }
</style>
</head>

<body>

    <div class="hero vh-100 vw-100 bg-black overflow-y-hidden overflow-x-hidden">
        <div class="row w-100 h-100 gap-0 m-0">

            <!-- Left Sidebar -->
            <?php include_once "navbar.php" ?>

            <!-- Right Content (Settings) -->
            <div class="col-md-10 col-12 h-md-100 p-4 d-flex justify-content-center align-items-center">
                <div class="settings-container">
                    <h3 class="text-center">Privacy Settings</h3>

                    <div class="toggle-container">
                        <label for="privacyToggle">Account Privacy</label>
                        <label class="toggle-switch">
                            <input type="checkbox" id="privacyToggle">
                            <span class="toggle-slider"></span>
                        </label>
                    </div>

                    <p id="privacyText" class="privacy-message">
                        Your account is currently <strong class="text-primary">Public</strong>. Everyone can see your posts.
                    </p>

                    <button class="btn btn-save w-100">Save Changes</button>
                </div>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function () {
            $("#privacyToggle").change(function () {
                if ($(this).is(":checked")) {
                    $("#privacyText").html('Your account is now <strong class="text-danger">Private</strong>. Only your followers can see your posts.');
                } else {
                    $("#privacyText").html('Your account is currently <strong class="text-primary">Public</strong>. Everyone can see your posts.');
                }
            });
        });
    </script>

</body>

</html>
