AOS.init();
$("#FrmSignUp").parsley();
$("#FrmSignUp").submit(function (e) {
    e.preventDefault();
    $("#SignUpErrMsg").html("");
    $("#BtnSignUp").html("<i class='fa fa-spinner fa-spin'></i>");
    $("#BtnSignUp").attr("disabled", "disabled");
    var phoneNumber = $("#PhoneNumber").val();
    var dataObject = {
        PhoneNumber: phoneNumber
    };
    $.ajax({
        url: "/account/create",
        data: dataObject,
        type: "POST",
        success: function (data) {
            if (data.ResponseCode == "200") {
                $("#VerifiedPhoneNumber").html(phoneNumber);
                $("#signUpModal").modal("hide");
                $("#verificationModal").modal("show");
                $("#BtnSignUp").html("Sign Up");
            }
            else {
                $("#SignUpErrMsg").html(data.Message);
                $("#BtnSignUp").removeAttr("disabled");
                $("#BtnSignUp").html("Sign Up");
            }
        },
        error: function () {
            $("#SignUpErrMsg").html("An Error has occured while processing your request, please try again later");
            $("#BtnSignUp").removeAttr("disabled");
            $("#BtnSignUp").html("Sign Up");
        }
    });
})
$("#FrmVerification").parsley();
$("#FrmVerification").submit(function (e) {
    e.preventDefault();
    $("#VerifyErrMsg").html("");
    $("#BtnVerify").html("<i class='fa fa-spinner fa-spin'></i>");
    $("#BtnVerify").attr("disabled", "disabled");
    var phoneNumber = $("#VerifiedPhoneNumber").html();
    var dataObject = {
        PhoneNumber: phoneNumber,
        VerificationCode: $("#VerificationCode").val()
    };
    $.ajax({
        url: "/Account/Verify",
        data: dataObject,
        type: "POST",
        success: function (data) {
            if (data.ResponseCode == "200") {
                location.href = "/account/dashboard"
            }
            else {
                $("#VerifyErrMsg").html(data.Message);
                $("#BtnVerify").removeAttr("disabled");
                $("#BtnVerify").html("Verify");
            }
        },
        error: function () {
            $("#VerifyErrMsg").html("An Error has occured while processing your request, please try again later");
            $("#BtnVerify").removeAttr("disabled");
            $("#BtnVerify").html("Verify");
        }
    });

});
$("#FrmRecover").parsley();
$("#FrmRecover").submit(
    function (e) {
        e.preventDefault();
        $("#ForgotErrMsg").html("");
        $("#BtnRecover").html("<i class='fa fa-spinner fa-spin'></i>");
        $("#BtnRecover").attr("disabled", "disabled");
        var phoneNumber = $("#RecoveryPhoneNumber").val();
        var dataObject = {
            PhoneNumber: phoneNumber
        };
        $.ajax({
            url: "/Account/RegenerateVerificationCode",
            data: dataObject,
            type: "POST",
            success: function (data) {
                if (data.ResponseCode == "200") {
                    $("#VerifiedPhoneNumber").html(phoneNumber);
                    $("#forgotModal").modal("hide");
                    $("#verificationModal").modal("show");
                    $("#BtnRecover").removeAttr("disabled");
                    $("#BtnRecover").html("RECOVER");
                }
                else {
                    $("#ForgotErrMsg").html(data.Message);
                    $("#BtnRecover").removeAttr("disabled");
                    $("#BtnRecover").html("RECOVER");
                }
            },
            error: function () {
                $("#ForgotErrMsg").html("An Error has occured while processing your request, please try again later");
                $("#BtnRecover").removeAttr("disabled");
                $("#BtnRecover").html("RECOVER");
            }
        });
})

$("#LnkRecoverPassword").click(function (e) {
    $("#loginModal").modal("hide");
    $("#forgotModal").modal("show");
})
$("#FrmContinue").parsley();
$("#FrmContinue").submit(
    function (e) {
        e.preventDefault();
        $("#ContinueErrMsg").html("");
        $("#BtnContinue").html("<i class='fa fa-spinner fa-spin'></i>");
        $("#BtnContinue").attr("disabled", "disabled");
        var phoneNumber = $("#ContinueRegistrationPhoneNumber").val();
        var dataObject = {
            PhoneNumber: phoneNumber,
            VerificationCode: $("#ContinueVerificationCode").val()
        };
        $.ajax({
            url: "/Account/Verify",
            data: dataObject,
            type: "POST",
            success: function (data) {
                if (data.ResponseCode == "200") {
                    location.href = "/account/dashboard"
                }
                else {
                    $("#ContinueErrMsg").html(data.Message);
                    $("#BtnContinue").removeAttr("disabled");
                    $("#BtnContinue").html("Verify");
                }
            },
            error: function () {
                $("#ContinueErrMsg").html("An Error has occured while processing your request, please try again later");
                $("#BtnContinue").removeAttr("disabled");
                $("#BtnContinue").html("Verify");
            }
        });
    }
)