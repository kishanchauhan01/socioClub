<?php include_once "../header.php" ?>

<link rel="stylesheet" href="../../../public/css/setting.css" />
<style>
    body {
        background-color: rgb(34, 34, 34);
        color: #fff;
    }

    .container {
        background-color: rgb(45, 45, 45);
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
    }

    .form-label {
        color: #fff;
    }

    .form-control {
        background-color: #555;
        color: #fff;
        border: 1px solid #777;
    }

    .form-control:focus {
        background-color: #666;
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    .form-control.error {
        border-color: red;
    }

    .error-message {
        color: red;
        font-size: 0.9rem;
    }

    .text-center.py-3 {
        background-color: #333;
        color: #fff;
    }
</style>
</head>

<body>

    <div class="hero vh-100 vw-100 bg-black overflow-y-autoz overflow-x-hidden">
        <div class="row w-100 h-100 gap-0 m-0">

            <!-- Left Sidebar -->
            <?php include_once "navbar.php" ?>

            <!-- Right Content (About Us) -->
            <div class="col-md-10 col-12 h-md-100 p-4 d-flex justify-content-center align-items-center">
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-2">
                            <!-- Sidebar (if applicable) -->
                        </div>
                        <div class="col-md-10">
                            <h2 class="text-center mb-4">Contact Us</h2>
                            <p class="text-center">We would love to hear from you! If you have any questions or feedback, please fill out the form below.</p>

                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <form action="../../../server/controllers/submit_contact.php" method="POST" id="contactForm" >
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Your Name</label>
                                            <input type="text" class="form-control" id="name" name="name" required>
                                            <div class="error-message" id="nameError"></div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Your Email</label>
                                            <input type="email" class="form-control" id="email" name="email" required>
                                            <div class="error-message" id="emailError"></div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="mobile" class="form-label">Your Mobile Number</label>
                                            <input type="text" class="form-control" id="mobile" name="mobile" maxlength="10" required pattern="\d{10}">
                                            <div class="error-message" id="mobileError"></div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="subject" class="form-label">Subject</label>
                                            <input type="text" class="form-control" id="subject" name="subject" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="message" class="form-label">Your Message</label>
                                            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                                        </div>
                                        <div class="mb-3 text-center">
                                            <button type="submit" class="btn btn-primary">Send Message</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>


    <script>
        $(document).ready(function() {
            $.validator.addMethod(
                "regex",
                function(value, element, regexp) {
                    let re = new RegExp(regexp);
                    return this.optional(element) || re.test(value);
                },
                "Invalid format"
            );

            $("#contactForm").validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 3,
                        maxlength: 50,
                        regex: "^[a-zA-Z ]+$",
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    mobile: {
                        required: true,
                        regex: "^[0-9]{10}$",
                    },
                    subject: {
                        required: true,
                        minlength: 5,
                        maxlength: 100,
                    },
                    message: {
                        required: true,
                        minlength: 10,
                        maxlength: 500,
                    },
                },

                messages: {
                    name: {
                        required: "Name is required",
                        minlength: "Name must contain at least 3 characters",
                        maxlength: "Name cannot exceed 50 characters",
                        regex: "Name should contain only alphabetical characters and spaces",
                    },
                    email: {
                        required: "Email is required",
                        email: "Enter a valid email address",
                    },
                    mobile: {
                        required: "Mobile number is required",
                        regex: "Enter a valid 10-digit mobile number",
                    },
                    subject: {
                        required: "Subject is required",
                        minlength: "Subject must contain at least 5 characters",
                        maxlength: "Subject cannot exceed 100 characters",
                    },
                    message: {
                        required: "Message is required",
                        minlength: "Message must contain at least 10 characters",
                        maxlength: "Message cannot exceed 500 characters",
                    },
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
                },
            });
        });
    </script>

</body>

</html>