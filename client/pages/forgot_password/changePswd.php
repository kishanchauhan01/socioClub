<?php include_once "../header.php" ?>

<link rel="stylesheet" href="../../../public/css/login.css">
</head>

<body class="overflow-x-hidden">
    <div class="hero bg-black vw-100 v-100 d-flex align-items-center justify-content-center overflow-x-hidden overflow-y-auto p-0">
        <form id="changePasswordForm" class="login-form d-flex flex-column justify-content-center align-items-center w-100" method="POST" action="../../../server/controllers/update_pssword.php">
            <div class="card bg-dark p-4" style="max-width: 400px; width: 90%;">
                <div class="heading text-center mb-4">
                    <h1 class="text-white fs-1 mb-3">Change Password</h1>
                </div>

                <label class="form-label text-white d-flex justify-content-start">New Password</label>
                <input type="password" name="new_password" id="new_password" class="form-control bg-dark p-2 text-white"
                    style="border: 0.2px solid gray; border-radius: 6px;" required><br>

                <label class="form-label text-white d-flex justify-content-start">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password" class="form-control bg-dark p-2 text-white"
                    style="border: 0.2px solid gray; border-radius: 6px;" required><br>

                <div class="d-felx justify-content-end">
                    <br>
                    <button type="submit" class="btn btn-info d-flex justify-content-center w-100">Change</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#changePasswordForm').validate({
                rules: {
                    new_password: {
                        required: true,
                        minlength: 6
                    },
                    confirm_password: {
                        required: true,
                        minlength: 6,
                        equalTo: "#new_password"
                    }
                },
                messages: {
                    new_password: {
                        required: "Please enter your new password",
                        minlength: "Password must be at least 6 characters long"
                    },
                    confirm_password: {
                        required: "Please confirm your new password",
                        minlength: "Password must be at least 6 characters long",
                        equalTo: "Passwords do not match"
                    }
                },
                errorElement: "div",
                errorPlacement: function (error, element) {
                    error.addClass("invalid-feedback");
                    element.after(error);
                },
                highlight: function (element) {
                    $(element).addClass("is-invalid").removeClass("is-valid");
                },
                unhighlight: function (element) {
                    $(element).addClass("is-valid").removeClass("is-invalid");
                }
            });
        });
    </script>
</body>

</html>
