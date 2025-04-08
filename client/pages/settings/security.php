<?php
session_start();
require_once '../../../server/db/connectDB.php';


$user_id = $_SESSION['user_id'] ?? $_COOKIE['user_id'] ?? null;

if ($user_id) {
    // echo $user_id;
    $stmt = $conn->prepare("SELECT email FROM users WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    if ($result->num_rows === 0) {
        echo "No rows found for user_id $user_id";
    } 
}

include_once "../header.php"
?>

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
</style>
</head>

<body>

    <div class="hero vh-100 vw-100 bg-black overflow-y-hidden overflow-x-hidden">
        <div class="row w-100 h-100 gap-0 m-0">

<?php
// echo $user_id;
// echo '<pre>';
// var_dump($result);
// echo '</pre>';

?>

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

            <!-- Left Sidebar -->
            <?php include_once "navbar.php" ?>

            <!-- Right Content (Settings) -->
            <div class="col-md-10 col-12 h-md-100 p-4 d-flex justify-content-center align-items-center">
                <div class="settings-container">
                    <h4 class="mb-4 text-center">Account Settings</h4>

                    <form action="../../../server/controllers/update_security.php" method="post" class="text-white" id="form1">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" value="<?php echo htmlspecialchars($user['email']) ?>">
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="currenPswd" class="form-label">Current Password</label>
                                <input type="password" id="currenPswd" class="form-control" name="currenPswd" placeholder="Current Password">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="nPswd" class="form-label">New Password</label>
                                <input type="password" name="nPswd" id="nPswd" class="form-control" placeholder="New Password">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="cPswd" class="form-label">Confirm Password</label>
                                <input type="password" name="cPswd" id="cPswd" class="form-control" placeholder="Confirm Password">
                            </div>
                        </div>

                        <div class="toggle-container">
                            <span>Two-Step Authentication</span>
                            <label class="toggle-switch">
                                <input type="checkbox" id="twoStepToggle">
                                <span class="toggle-slider"></span>
                            </label>
                        </div>
                        <p id="twoStepMessage" class="text-info mt-2" style="display: none;">
                            When you log in, a code will be sent to your email ID for verification.
                        </p>

                        <button type="submit" class="btn btn-primary w-100 mt-3">Save Changes</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function() {
            // Add regex validation method
            $.validator.addMethod(
                "regex",
                function(value, element, regexp) {
                    let re = new RegExp(regexp);
                    return this.optional(element) || re.test(value);
                },
                "Invalid format"
            );

            // Custom method to check password match
            $.validator.addMethod("passwordMatch", function(value, element) {
                return $("#nPswd").val() === $("#cPswd").val();
            }, "Passwords do not match");

            // Apply validation to the form
            $("#form1").validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    currenPswd: {
                        minlength: 8,
                        maxlength: 20
                    },
                    nPswd: {
                        required: {
                            depends: function() {
                                return $("#currenPswd").val().length > 0;
                            }
                        },
                        minlength: 8,
                        maxlength: 20,
                        regex: "^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)(?=.*[@$!%*#?&])[A-Za-z\\d@$!%*#?&]{8,20}$"
                    },
                    cPswd: {
                        required: {
                            depends: function() {
                                return $("#currenPswd").val().length > 0;
                            }
                        },
                        passwordMatch: true
                    }
                },

                messages: {
                    email: {
                        required: "Email is required",
                        email: "Enter a valid email address"
                    },
                    currenPswd: {
                        minlength: "Password must be at least 8 characters",
                        maxlength: "Password cannot exceed 20 characters"
                    },
                    nPswd: {
                        required: "New password is required",
                        minlength: "Password must be at least 8 characters",
                        maxlength: "Password cannot exceed 20 characters",
                        regex: "Password must contain at least one uppercase, one lowercase, one digit, and one special character"
                    },
                    cPswd: {
                        required: "Please confirm your new password",
                        passwordMatch: "Passwords do not match"
                    }
                },

                errorElement: "div",
                errorPlacement: function(error, element) {
                    error.addClass("invalid-feedback");
                    element.after(error);
                },

                highlight: function(element) {
                    $(element).addClass("is-invalid").removeClass("is-valid");
                },

                unhighlight: function(element) {
                    $(element).addClass("is-valid").removeClass("is-invalid");
                }
            });

            $("#twoStepToggle").change(function() {
                if ($(this).is(":checked")) {
                    $("#twoStepMessage").fadeIn();
                } else {
                    $("#twoStepMessage").fadeOut();
                }
            });
        });
    </script>

</body>

</html>