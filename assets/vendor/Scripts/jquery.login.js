$("#FrmLogin").parsley();
$("#FrmLogin").submit(
    function (e) {
        e.preventDefault();
        $("#LoginErrMsg").html("");
        $("#BtnLogin").html("<i class='fa fa-spinner fa-spin'></i>");
        $("#BtnLogin").attr("disabled", "disabled");
        var phoneNumber = $("#LoginPhoneNumber").val();
        var password = $("#LoginPassword").val();
        var dataObject = {
            PhoneNumber: phoneNumber,
            Password: password
        };
        $.ajax({
            url: "/Account/Login",
            data: dataObject,
            type: "POST",
            success: function (data) {
                if (data.ResponseCode == "200") {
                    ga('send', 'event', 'Successful Login', 'Login', $("#LoginPhoneNumber").val() + ' logged in successfully', 1);
                    location.href = "/account/dashboard"
                } else if (data.ResponseCode == "100") {
                    location.href = "/merchant/dashboard";
                }
                else {
                    $("#LoginErrMsg").html(data.Message);
                    ga('send', 'event', 'Unsuccessful Login', 'Login', $("#LoginPhoneNumber").val() + ' log in unsuccessful: '+ data.Message, 1);
                    $("#BtnLogin").removeAttr("disabled");
                    $("#BtnLogin").html("LOG IN");
                }
            },
            error: function () {
                ga('send', 'event', 'Failed Login', 'Login', $("#LoginPhoneNumber").val() + ' login failed: Internal Server error', 1);
                $("#LoginErrMsg").html("An Error has occured while processing your request, please try again later");
                $("#BtnLogin").removeAttr("disabled");
                $("#BtnLogin").html("LOG IN");
            }
        });
    }
)
