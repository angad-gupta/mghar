$(document).ready(function () {
    $("#subscriber_submit").validate(
        {
            rules: {
                username: "required",
                full_name: "required",
                email: {
                    required: true,
                    email: true
                },
                mobile_no: {
                    required: true,
                    minlength: 10,
                    maxlength: 10
                },
                password: {
                    required: true,
                    minlength: 6,
                },
                password_confirmation: {
                    required: true,
                    minlength: 6,
                    equalTo: "#rpassword"
                },
            },
            messages: {
                username: "Enter Username Name",
                full_name: "Enter Full Name",
                email: "Enter Email Address",
                mobile_no: "Enter Mobile No. should be exactly 10 digit",
                password: {
                    required: "Enter Password",
                    minlength: "Minimum 8 characters",
                },
                password_confirmation: {
                    required: "Enter Confirm Password",
                    minlength: "Minimum 8 Characters",
                    equalTo: "Must be equals to password"
                },
            },
            errorElement: "em",
            errorPlacement: function (error, element) {
                console.log(element)
                // Add the `help-block` class to the error element
                error.addClass("help-block");

                // Add `has-feedback` class to the parent div.form-group
                // in order to add icons to inputs
                element.parents(".col-lg-9").addClass("form-group-feedback");

                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.parent("label"));
                } else {
                    error.insertAfter(element.parent());
                }

                // Add the span element, if doesn't exists, and apply the icon classes to it.
                if (!element.parent().parent().next("div")[0]) {
                    $("<div class='form-control-feedback'><i class='icon-cross2 text-danger'></i></div>").insertAfter(element);
                }
            },
            success: function (label, element) {

                console.log(element);
                // Add the span element, if doesn't exists, and apply the icon classes to it.
                if (!$(element).next("div")[0]) {
                    $("<div class='form-control-feedback'><i class='icon-checkmark4 text-success'></i></div>").insertAfter($(element));
                }
            },
            highlight: function (element, errorClass, validClass) {
                $(element).parent().find('span .input-group-text').addClass("alpha-danger text-danger border-danger ").removeClass("alpha-success text-success border-success");
                $(element).addClass("border-danger").removeClass("border-success");
                $(element).parent().parent().addClass("text-danger").removeClass("text-success");
                $(element).next('div .form-control-feedback').find('i').addClass("icon-cross2 text-danger").removeClass("icon-checkmark4 text-success");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parent().find('span .input-group-text').addClass("alpha-success text-success border-success").removeClass("alpha-danger text-danger border-danger ");
                $(element).addClass("border-success").removeClass("border-danger");
                $(element).parent().parent().addClass("text-success").removeClass("border-danger");
                $(element).next('div .form-control-feedback').find('i').addClass("icon-checkmark4 text-success").removeClass("icon-cross2 text-danger");
            }

        });
});

