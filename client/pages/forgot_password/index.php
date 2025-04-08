<?php include_once "../header.php" ?>

<link rel="stylesheet" href="../../../public/css/login.css">

</head>

<body class="overflow-x-hidden">

    <div
        class="hero bg-black vw-100 v-100 d-flex align-items-center justify-content-center overflow-x-hidden overflow-y-auto p-0">

        <form class="login-form d-flex flex-column justify-content-center align-items-center w-100" method="POST" action="../../../server/controllers/forgot_pswd.php" id="form1">
            <div class="card bg-dark p-4" style="max-width: 400px; width: 90%;">
                <div class="heading text-center mb-4">
                    <h1 class="text-white fs-1 mb-3">Forgot Password</h1>
                </div>
                <label for="loginEmail" class="form-label text-white d-flex justify-content-start">Email</label>
                <input type="email" name="loginEmail" id="emailID" class="form-control bg-dark p-2 text-white"
                    style="border: 0.2px solid gray; border-radius: 6px;" required><br>
                <p class="text-white d-flex justify-content-start">We will sent a OTP to your email for recoery of your password</p>

                <div class="d-felx justify-content-end">
                    <br>
                    <button type="submit" class="btn btn-info d-flex justify-content-center w-100">Send</button>
                </div>
            </div>
        </form>

    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="../../../public/js/forgotPassword.js"></script>
</body>

</html>