$(document).ready(function () {
    // Custom method to check minimum age
    $.validator.addMethod(
        "minAge",
        function (value, element, minAge) {
            let birthDate = new Date(value);
            let today = new Date();
            let age = today.getFullYear() - birthDate.getFullYear();
            let monthDiff = today.getMonth() - birthDate.getMonth();

            if (
                monthDiff < 0 ||
                (monthDiff === 0 && today.getDate() < birthDate.getDate())
            ) {
                age--;
            }
            return age >= minAge;
        },
        "You must be at least 14 years old."
    );

    // Add regex validation method
    $.validator.addMethod(
        "regex",
        function (value, element, regexp) {
            let re = new RegExp(regexp);
            return this.optional(element) || re.test(value);
        },
        "Invalid format"
    );

    // Apply validation to the actual <form>
    $("#form1").validate({
        rules: {
            firstName: {
                required: true,
                minlength: 3,
                maxlength: 30,
                regex: "^[a-zA-Z ]+$",
            },

            lastName: {
                minlength: 3,
                maxlength: 30,
                regex: "^[a-zA-Z ]+$",
            },

            userName: {
                required: true,
                minlength: 3,
                maxlength: 30,
                regex: "^[a-zA-Z0-9$&*\\-_]+$",
            },

            DOB: {
                // Match the name attribute exactly
                required: true,
                minAge: 14,
            },
        },

        messages: {
            firstName: {
                required: "First name is required",
                minlength: "At least 3 characters required",
                maxlength: "Cannot exceed 30 characters",
                regex: "Only letters and spaces are allowed",
            },

            lastName: {
                minlength: "At least 3 characters required",
                maxlength: "Cannot exceed 30 characters",
                regex: "Only letters and spaces are allowed",
            },

            userName: {
                required: "Username is required",
                minlength: "At least 3 characters required",
                maxlength: "Cannot exceed 30 characters",
                regex: "Only letters, numbers, and symbols ($, &, *, -, _) allowed",
            },

            DOB: {
                required: "Date of Birth is required",
                minAge: "You must be at least 14 years old.",
            },
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
        },
    });
});

$(document).ready(function () {
    // Banner Image Upload
    $("#editBanner").click(function () {
        $("#bannerInput").click();
    });

    $("#bannerInput").change(function (event) {
        let file = event.target.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (e) {
                $("#bannerImage").attr("src", e.target.result);
            };
            reader.readAsDataURL(file);
        }
    });

    // Profile Picture Upload
    $("#editProfile").click(function () {
        $("#profileInput").click();
    });

    $("#profileInput").change(function (event) {
        let file = event.target.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (e) {
                $("#profileImage").attr("src", e.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
});
