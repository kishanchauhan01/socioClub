$(document).ready(function () {
    // Add regex validation method
    $.validator.addMethod(
        "regex",
        function (value, element, regexp) {
            let re = new RegExp(regexp);
            return this.optional(element) || re.test(value);
        },
        "Invalid format"
    );

    //
    $.validator.addMethod(
        "minAge",
        function (value, element, min) {
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
            return age >= min;
        },
        "You must be at least 14 years old"
    );

    //
    $.validator.addMethod(
        "matchPassword",
        function (value, element) {
            return value === $("#password").val();
        },
        "Confirm password must match Password"
    );

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

            email: {
                required: true,
                email: true,
            },

            password: {
                required: true,
                minlength: 8,
                maxlength: 20,
                regex: "^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)(?=.*[@$!%*#?&])[A-Za-z\\d@$!%*#?&]{8,20}$",
            },

            cPassword: {
                required: true,
                matchPassword: true,
            },

            invalidCheck: {
                required: true,
            },

            dob: {
                required: true,
                minAge: 14,
            },
        },

        messages: {
            firstName: {
                required: "Firstname is a required field",
                minlength: "Firstname must contain at least 3 characters",
                maxlength: "Firstname cannot exceed 30 characters",
                regex: "Firstname should contain only alphabetical characters and spaces",
            },

            lastName: {
                minlength: "Lastname must contain at least 3 characters",
                maxlength: "Lastname cannot exceed 30 characters",
                regex: "Lastname should contain only alphabetical characters and spaces",
            },

            userName: {
                required: "Username is a required field",
                minlength: "Username must contain at least 3 characters",
                maxlength: "Username cannot exceed 30 characters",
                regex: "Username can only contain letters, numbers, and symbols ($, &, *, -, _).",
            },

            email: {
                required: "Email is a required field",
                email: "Email should be in a valid format",
            },

            password: {
                required: "Password is a required field",
                minlength: "Password must contain at least 8 characters",
                maxlength: "Password must contain less than 20 characters",
                regex: "Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character",
            },

            cPassword: {
                required: "Confirm Password is a required field",
                matchPassword: "Confirm Password must match Password",
            },

            invalidCheck: {
                required: "You must agree to the terms and conditions",
            },

            dob: {
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
