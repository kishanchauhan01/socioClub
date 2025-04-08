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
        },

        messages: {
            email: {
                required: "Email is a required field",
                email: "Email should be in a valid format",
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
