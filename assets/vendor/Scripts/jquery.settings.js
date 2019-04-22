$(".lnksettings").addClass("active");
$("#FrmUpdateProfile").parsley();
$("#FrmUpdateProfile").submit(
    function (e) {
        e.preventDefault();
        $("#UpdateErrMsg").html("");
        Hide($("#UpdateSuccessMsg"));
        $("#BtnUpdate").html("<i class='fa fa-spinner fa-spin'></i>");
        $("#BtnUpdate").attr("disabled", "disabled");
        var dataObject = {
            Email: $("#Email").val(),
            FirstName: $("#FirstName").val(),
            LastName: $("#LastName").val()
        };
        $.ajax({
            url: "/account/updateprofile",
            data: dataObject,
            type: "POST",
            success: function (data) {
                if (data.ResponseCode === "200") {
                    $("#BtnUpdate").removeAttr("disabled");
                    $("#BtnUpdate").html("Update");
                    Show($("#UpdateSuccessMsg"));
                    $("#UpdateErrMsg").html("");
                }
                else {
                    Hide($("#UpdateSuccessMsg"));
                    $("#UpdateErrMsg").html(data.Message);
                    $("#BtnUpdate").removeAttr("disabled");
                    $("#BtnUpdate").html("Update");
                }
            },
            error: function () {
                Hide($("#UpdateSuccessMsg"));
                $("#UpdateErrMsg").html("An Error has occured while processing your request, please try again later");
                $("#BtnUpdate").removeAttr("disabled");
                $("#BtnUpdate").html("Update");
            }
        });
    }
);
$("#FrmChangePassword").parsley();
$("#FrmChangePassword").submit(
    function (e) {
        e.preventDefault();
        $("#ChangePasswordErrMsg").html("");
        Hide($("#ChangePasswordSuccessMsg"));
        $("#BtnChangePassword").html("<i class='fa fa-spinner fa-spin'></i>");
        $("#BtnChangePassword").attr("disabled", "disabled");
        var dataObject = {
            CurrentPassword: $("#CurrentPassword").val(),
            NewPassword: $("#NewPassword").val()
        };
        $.ajax({
            url: "/account/changepassword",
            data: dataObject,
            type: "POST",
            success: function (data) {
                if (data.ResponseCode === "200") {
                    Show($("#ChangePasswordSuccessMsg"));
                    $("#CurrentPassword").val("");
                    $("#NewPassword").val("");
                    $("#ConfirmPassword").val("");
                    $("#BtnChangePassword").removeAttr("disabled");
                    $("#BtnChangePassword").html("Change");
                    $("#ChangePasswordSuccessMsg").html("Password Changed Succesffully");
                    $("#ChangePasswordErrMsg").html("");
                }
                else {
                    Hide($("#ChangePasswordSuccessMsg"));
                    $("#ChangePasswordErrMsg").html(data.Message);
                    $("#BtnChangePassword").removeAttr("disabled");
                    $("#BtnChangePassword").html("Change");
                }
            },
            error: function () {
                Hide($("#ChangePasswordSuccessMsg"));
                $("#ChangePasswordErrMsg").html("An Error has occured while processing your request, please try again later");
                $("#BtnChangePassword").removeAttr("disabled");
                $("#BtnChangePassword").html("Change");
            }
        });
    }
);
$("#FrmSetTransactionPasscode").parsley();
$("#FrmSetTransactionPasscode").submit(
    function (e) {
        e.preventDefault();
        $("#ChangePassCodeErrMsg").html("");
        Hide($("#ChangePassCodeSuccessMsg"));
        var currentcode = $("#CurrentTransactionPasscode").val();
        var newcode = $("#NewTransactionPasscode").val();
        var confirmcode = $("#ConfirmTransactionPasscode").val();
        if (newcode === confirmcode) {
            $("#BtnChangePasscode").html("<i class='fa fa-spinner fa-spin'></i>");
            $("#BtnChangePasscode").attr("disabled", "disabled");
            var dataObject = {
                CurrentPassword: currentcode,
                NewPassword: newcode
            };
            $.ajax({
                url: "/account/changetransactioncode",
                data: dataObject,
                type: "POST",
                success: function (data) {
                    if (data.ResponseCode === "200") {
                        $("#CurrentTransactionPasscode").val("");
                        $("#NewTransactionPasscode").val("");
                        $("#ConfirmTransactionPasscode").val("");
                        $("#BtnChangePasscode").removeAttr("disabled");
                        $("#BtnChangePasscode").html("Change Transaction Pin");
                        Show($("#ChangePassCodeSuccessMsg"));
                        $("#ChangePassCodeErrMsg").html("");
                    }
                    else {
                        Hide($("#ChangePassCodeSuccessMsg"));
                        $("#ChangePassCodeErrMsg").html(data.Message);
                        $("#BtnChangePasscode").removeAttr("disabled");
                        $("#BtnChangePasscode").html("Change Transaction Pin");
                    }
                },
                error: function () {
                    Hide($("#ChangePassCodeSuccessMsg"));
                    $("#ChangePassCodeErrMsg").html("An Error has occured while processing your request, please try again later");
                    $("#BtnChangePasscode").removeAttr("disabled");
                    $("#BtnChangePasscode").html("Change Transaction Pin");
                }
            });
        }
        else {
            $("#ChangePassCodeErrMsg").html("New transaction pin and confirmation do not match");
        }
    }
);
$("#FrmSetMeLink").parsley();

$("#FrmSetMeLink").submit(
    function (e) {
        e.preventDefault();
        $("#MeErrMsg").html("");
        Hide($("#MeSuccessMsg"));
        $("#BtnSetMeLink").html("<i class='fa fa-spinner fa-spin'></i>");
        $("#BtnSetMeLink").attr("disabled", "disabled");
        var dataObject = {
            Username: $("#Username").val()
        };
        $.ajax({
            url: "/account/UpdateMeUsername",
            data: dataObject,
            type: "POST",
            success: function (data) {
                if (data.ResponseCode === "200") {
                    $("#BtnSetMeLink").removeAttr("disabled");
                    $("#BtnSetMeLink").html("Update");
                    Show($("#MeSuccessMsg"));
                    $("#MeErrMsg").html("");
                }
                else {
                    Hide($("#MeSuccessMsg"));
                    $("#MeErrMsg").html(data.Message);
                    $("#BtnSetMeLink").removeAttr("disabled");
                    $("#BtnSetMeLink").html("Set Me! Link");
                }
            },
            error: function () {
                Hide($("#MeSuccessMsg"));
                $("#MeErrMsg").html("An Error has occured while processing your request, please try again later");
                $("#BtnSetMeLink").removeAttr("disabled");
                $("#BtnSetMeLink").html("Set Me! Link");
            }
        });
    }
);
function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode !== 46 && charCode > 31
        && (charCode < 48 || charCode > 57))
        return false;

    return true;
}
function Hide(elem) {
    elem.attr("hidden", "hidden");
}
function Show(elem) {
    elem.removeAttr("hidden");
}
$.autotab({ tabOnSelect: true });
$('.currentcode').autotab('filter', 'number');
$('.newcode').autotab('filter', 'number');
$('.confirmcode').autotab('filter', 'number');

window.Parsley.addValidator('nonumber', {
    validateString: function (value) {
        var numbers = value.match(/[0-9]/g) || [];
        return numbers.length === 0;
    },
    messages: {
        en: 'Your Me! link can not contain numbers.'
    }
});

//has special character
window.Parsley.addValidator('nospecial', {
    validateString: function (value) {
        var specials = value.match(/[^a-zA-Z0-9]/g) || [];
        return specials.length === 0;
    },
    messages: {
        en: 'Your Me! link can not contain special characters or space.'
    }
});
$("#Username").keyup(function () {
    var val = $(this).val();
    val = val.replace(" ", "");
    $(this).val(val);
    $("#melink").html(val);
});

var allowsSMS = $("#AllowsSMS").val();
var allowsEmail = $("#AllowsEmail").val();
var allowsPushNotification = $("#AllowsPushNotification").val();

$("#SMSToggle").click(function () {
    if (allowsSMS === "true")
        allowsSMS = false;
    else
        allowsSMS = true;
});

$("#EmailToggle").click(function () {
    if (allowsEmail === "true")
        allowsEmail = false;
    else
        allowsEmail = true;
});

$("#PushNotificationToggle").click(function () {
    if (allowsPushNotification === "true")
        allowsPushNotification = false;
    else
        allowsPushNotification = true;
});


$("#FrmSetNotificationSettings").submit(
    function (e) {
        e.preventDefault();
        $("#NotificationsErrMsg").html("");
        Hide($("#NotificationSettingsSuccessMsg"));
        $("#BtnSaveSettings").html("<i class='fa fa-spinner fa-spin'></i>");
        $("#BtnSaveSettings").attr("disabled", "disabled");

        if (typeof attr !== typeof undefined && attr !== false) {
            sms = true;
        }
        var dataObject = {
            PushNotification: allowsPushNotification,
            Email: allowsEmail,
            SMS: allowsSMS
        };
        $.ajax({
            url: "/account/SetNotifications",
            data: dataObject,
            type: "POST",
            success: function (data) {
                if (data.ResponseCode === "200") {
                    $("#BtnSaveSettings").removeAttr("disabled");
                    $("#BtnSaveSettings").html("Save");
                    Show($("#NotificationSettingsSuccessMsg"));
                    $("#NotificationsErrMsg").html("");
                }
                else {
                    Hide($("#NotificationSettingsSuccessMsg"));
                    $("#NotificationsErrMsg").html(data.Message);
                    $("#BtnSaveSettings").removeAttr("disabled");
                    $("#BtnSaveSettings").html("Save");
                }
            },
            error: function () {
                Hide($("#NotificationSettingsSuccessMsg"));
                $("#NotificationsErrMsg").html("An Error has occured while processing your request, please try again later");
                $("#BtnSaveSettings").removeAttr("disabled");
                $("#BtnSaveSettings").html("Save");
            }
        });
    }
);

function previewFile() {
    $("#UploadContainer").hide();
    $("#UploadLoader").show();
    Upload();
}
function Upload() {
    var blobFile = document.getElementById('UserLogoUpload').files[0];
    var formData = new FormData();
    formData.append("fileToUpload", blobFile);
    $.ajax({
        url: "/account/uploadlogo",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.ResponseCode === "200") {
                location.reload();
            }
            else {
                alert(response.Message);
                $("#ImageText").html("Change Profile Photo");
                $("#UserLogoUpload").removeAttr("disabled");
                $("#UploadLoader").hide();
                $("#UploadContainer").show();
            }
        },
        error: function (jqXHR, textStatus, errorMessage) {
            $("#ImageText").html("Change Profile Photo");
            $("#UserLogoUpload").removeAttr("disabled");
            $("#UploadLoader").hide();
            $("#UploadContainer").show();
        }
    });
    $("#ImageText").html("Change Profile Photo");
    $("#UserLogoUpload").removeAttr("disabled");
}