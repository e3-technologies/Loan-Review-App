$(document).ready(function() {

    $("select").material_select();
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date(); a = s.createElement(o),
            m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-90864312-1', 'auto');
    ga('send', 'pageview');

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
    $("#step5").submit(function(e) {
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
        empState: $("#emp-state").val(),
        empLga: $("#emp-lga").val(),
        contract_type: $("#contract_type").val(),
        net_pay: $("#net_pay").val(),
        marital_status: $("#marital_status").val(),
        accomodation_status: $("#accomodation_status").val(),
        dependacies: $("#dependacies").val(),
        complete_profile: $("#complete_profile").val(),
        regPhone: $("#regPhone").val(),
    };
    $.ajax({
        url: "../core/signup.php",
        data: dataObject,
        type: "POST",
        success: function (res) {
            if (res == 'yes') {
                window.location.href='../account/';
            }
        },
        error: function () {
            $("#ff").html("An Error has occured while processing your request, please try again later");
        }
    });

    }



    //validators
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


    function Hide(elem) {
        elem.attr("hidden", "hidden");
    }
    function Show(elem) {
        elem.removeAttr("hidden");
    }


    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }



});
