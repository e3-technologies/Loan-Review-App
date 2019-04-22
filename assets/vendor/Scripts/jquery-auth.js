$(document).ready(function() {

    
    // for date of birth
    $("#DateOfBirth").mask("00/00/0000");

    // job Commencement date
    $("#StartBirth").mask("00/00/0000");

    //---------- form --------------//
    $("#step1").parsley();
    $("#step1").submit(function(e) {
        e.preventDefault();
        $("#step1").attr("hidden", "hidden");
        $("#step2").removeAttr("hidden");
    });

    $("#step2").parsley();
    $("#step2").submit(function(e) {
        e.preventDefault();
        $("#step2").attr("hidden", "hidden");
        $("#step3").removeAttr("hidden");
    });

    $("#step3").parsley();
    $("#step3").submit(function(e) {
        e.preventDefault();
        $("#step3").attr("hidden", "hidden");
        $("#step4").removeAttr("hidden");
    });

    $("#step4").parsley();
    $("#step4").submit(function(e) {
        e.preventDefault();
        $("#step4").attr("hidden", "hidden");
        $("#step5").removeAttr("hidden");
    });

    $("#step5").parsley();
    $("#step5").click(function(e) {
        e.preventDefault();
        $("#step5").attr("hidden", "hidden");
        $("#step6").removeAttr("hidden");
    });

    $("#step6").parsley();
    $("#step6").submit(function(e) {
        e.preventDefault();
        $("#btn-step6").attr("disabled", "disabled");
        $("#btn-step6").html("<i class='fa fa-spinner fa-spin'></i>");
        $("#LnkBack5").html("");

        completeProfile();
    });


    //-------------Back Link -------------//
    $("#LnkBack1").click(function() {
        $("#step2").attr("hidden", "hidden");
        $("#step1").removeAttr("hidden");
    });

    $("#LnkBack2").click(function() {
        $("#step3").attr("hidden", "hidden");
        $("#step2").removeAttr("hidden");
    });

    $("#LnkBack3").click(function() {
        $("#step4").attr("hidden", "hidden");
        $("#step3").removeAttr("hidden");
    });

    $("#LnkBack4").click(function() {
        $("#step5").attr("hidden", "hidden");
        $("#step4").removeAttr("hidden");
    });

    $("#LnkBack5").click(function() {
        $("#step6").attr("hidden", "hidden");
        $("#step5").removeAttr("hidden");
    });



    function completeProfile() {

        // window.location.href='../core/complete_profile.php';

        var dataObject = {
            firstName: $("#firstName").val(),
            lastName: $("#lastName").val(),
            DateOfBirth: $("#DateOfBirth").val(),
            gender: $("#gender").val(),
            state: $("#state").val(),
            lga: $("#lga").val(),
            email: $("#email").val(),
            password: $("#password").val(),
            confirmPassword: $("#confirmPassword").val(),
            employer: $("#employer").val(),
            industry: $("#industry").val(),
            sub_sector: $("#sub_sector").val(),
            commencement_date: $("#DateOfBirth").val(),
            empState: $("#empState").val(),
            empLga: $("#empLga").val(),
            contract_type: $("#contract_type").val(),
            net_pay: $("#net_pay").val(),
            marital_status: $("#marital_status").val(),
            accomodation_status: $("#accomodation_status").val(),
            dependacies: $("#dependacies").val(),
            complete_profile: $("#complete_profile").val(),
            regPhone: $("#regPhone").val(),
        };
        $.ajax({
            url: "core/signup.php",
            data: dataObject,
            type: "POST",
            success: function (res) {
                if (res == 'yes') {
                    // $("#step6").attr("hidden", "hidden");
                    // $("#SuccessStep").removeAttr("hidden");
                    window.location.href='/e3tech/loan3/account/';
                }
            },
            error: function () {
                alert("An Error has occured while processing your request, please try again later");
                window.location.href='signup.php';
            }
        });

    }




});

