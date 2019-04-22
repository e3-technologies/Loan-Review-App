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
                    Show($("#VerificationDiv"));
                    $("#VerifiedPhoneNumber").html(phoneNumber);
                    $("#BtnRecover").html("RECOVER");
                    Hide($("#FrmRecover"));
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
    }
);
$("#FrmVerification").parsley();
$("#FrmVerification").submit(
    function (e) {
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
                    Show($("#PasswordDiv"));
                    Hide($("#VerificationDiv"));
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
    }
);
$("#FrmPassword").parsley();
$("#FrmPassword").submit(
    function (e) {
        e.preventDefault();
        $("#PasswordErrMsg").html("");
        $("#BtnSetPassword").html("<i class='fa fa-spinner fa-spin'></i>");
        $("#BtnSetPassword").attr("disabled", "disabled");
        var password = $("#Password").val();
        var dataObject = {
            NewPassword: password
        };
        $.ajax({
            url: "/Account/ChangePassword",
            data: dataObject,
            type: "POST",
            success: function (data) {
                if (data.ResponseCode == "200") {
                    location.href = "/account/dashboard"
                    $("#BtnSetPassword").html("Set Password");
                }
                else {
                    $("#PasswordErrMsg").html(data.Message);
                    $("#BtnSetPassword").removeAttr("disabled");
                    $("#BtnSetPassword").html("Set Password");
                }
            },
            error: function () {
                $("#PasswordErrMsg").html("An Error has occured while processing your request, please try again later");
                $("#BtnSetPassword").removeAttr("disabled");
                $("#BtnSetPassword").html("Set Password");
            }
        });
    }
);
$("#LnkResend").click(function (e) {
    e.preventDefault();
    Hide($("#LnkResend"));
    $("#VerifyErrMsg").html("");
    $("#BtnVerify").html("<i class='fa fa-spinner fa-spin'></i>");
    $("#BtnVerify").attr("disabled", "disabled");
    var dataObject = {
        PhoneNumber: $("#VerifiedPhoneNumber").html()
    };
    $.ajax({
        url: "/Account/RegenerateVerificationCode",
        data: dataObject,
        type: "POST",
        success: function (data) {
            if (data.ResponseCode == "200") {
                $("#ResetMessage").html("We have resent a one time password (OTP) to ")
                $("#BtnVerify").removeAttr("disabled");
                $("#VerifyErrMsg").html("");
                $("#BtnVerify").html("Next");
                Show($("#LnkResend"));
            }
            else {
                $("#VerifyErrMsg").html(data.Message);
                $("#BtnVerify").removeAttr("disabled");
                $("#BtnVerify").html("Next");
            }
        },
        error: function () {
            $("#VerifyErrMsg").html("An Error has occured while processing your request, please try again later");
            $("#BtnVerify").removeAttr("disabled");
            $("#BtnVerify").html("Next");
        }
    });
})
function Hide(elem) {
    elem.attr("hidden", "hidden");
}
function Show(elem) {
    elem.removeAttr("hidden");
}
window.Parsley.addValidator('lengthcheck', {
    validate: function (value) {
        return value.length >= 8
    },
    messages: {
        en: 'Your password must be at least 8 characters long'
    }
});
window.Parsley.addValidator('hasnumber', {
    validate: function (value) {
        return /\d/.test(value);
    },
    messages: {
        en: 'Your password must contain at least a number'
    }
});
window.Parsley.addValidator('hasspecial', {
    validate: function (value) {
        return !/[~`!#$%\^&*+=\-\[\]\\';,/{}|\\":<>\?]/g.test(value);
    },
    messages: {
        en: 'Your password must contain at least a special character'
    }
});
