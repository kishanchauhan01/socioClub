const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#password");

togglePassword.addEventListener("click", () => {
    const type =
        password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);

    if (togglePassword.src.includes("close-eye.png")) {
        togglePassword.src = "../../../public/images/login/eye.png";
    } else {
        togglePassword.src = "../../../public/images/login/close-eye.png";
    }
});

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

    $("#form1").validate({
        rules: {
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
        },

        messages: {
            email: {
                required: "Email is a required field",
                email: "Email should be in a valid format",
            },

            pswd: {
                required: "Password is a required field",
                minlength: "Password must contain at least 8 characters",
                maxlength: "Password must contain less than 20 characters",
                regex: "Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character",
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
