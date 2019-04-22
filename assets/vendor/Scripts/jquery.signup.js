$("select").material_select();
(function (i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
        (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date(); a = s.createElement(o),
        m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

ga('create', 'UA-90864312-1', 'auto');
ga('send', 'pageview');
$("#DateOfBirth").mask("00/00/0000");


//---- FORM ------//
$("#step1").parsley();
$("#step1").submit(function (e) {
    e.preventDefault();
    $(this).attr("hidden", "hidden");
    $("#step2").removeAttr("hidden");
});

$("#step1").parsley();
$("#step1").submit(function (e) {
    e.preventDefault();
    $(this).attr("hidden", "hidden");
    $("#step3").removeAttr("hidden");
});


$("#step1").parsley();
$("#step3").submit(function (e) {
    e.preventDefault();
    $(this).attr("hidden", "hidden");
    $("#step3").removeAttr("hidden");
});


// $("#FrmPersonalDetails").parsley();
// $("#FrmPersonalDetails").submit(function (e) {
//     e.preventDefault();
//     $(this).attr("hidden", "hidden");
//     $("#FrmAccountDetails").removeAttr("hidden");
// });


// $("#FrmAccountDetails").parsley();
// $("#FrmAccountDetails").submit(function (e) {
//     e.preventDefault();
//     $(this).attr("hidden", "hidden");
//     $("#FrmAccountDetails2").removeAttr("hidden");
// });

// $("#accountInfo").parsley();
// $("#FrmAccountDetails2").submit(function (e) {
//     e.preventDefault();
//     $("#submit").attr("disabled", "disabled");
//     $("#submit").html("<i class='fa fa-spinner fa-spin'></i>");
//     $("#LnkBack2").html("");

//     // completeProfile();
//     window.location.href='../account/complete-profile.php';
    
// });

// $("#submit").parsley();
// $("#FrmAccountDetails2").submit(function (e) {
//     e.preventDefault();
//     $("#submit").attr("disabled", "disabled");
//     $("#submit").html("<i class='fa fa-spinner fa-spin'></i>");
//     $("#LnkBack2").html("");

//     completeProfile();

    
// });


// function completeProfile() {

//     // alert("hello");
//     // window.location.href='../core/complete_profile.php';

//     var dataObject = {
//         employer: $("#employer").val(),
//         industry: $("#industry").val(),
//         sub_sector: $("#sub_sector").val(),
//         commencement_date: $("#DateOfBirth").val(),
//         state: $("#state").val(),
//         lga: $("#lga").val(),
//         contract_type: $("#contract_type").val(),
//         net_pay: $("#net_pay").val(),
//         marital_status: $("#marital_status").val(),
//         accomodation_status: $("#accomodation_status").val(),
//         dependacies: $("#dependacies").val(),
//         complete_profile: $("#complete_profile").val()
//     };
//     $.ajax({
//         url: "../core/signup.php",
//         data: dataObject,
//         type: "POST",
//         success: function (res) {
//             // alert("hello");
//             if (res) {
//                 window.alert('Hello eee');
//                 window.location.href='account/';
//             }
//         },
//         error: function () {
//             $("#ff").html("An Error has occured while processing your request, please try again later");
//         }
//     });

// }



//navigation
// $("#LnkChange").click(function () {
//     $("#FrmInputCode").attr("hidden", "hidden");
//     $("#FrmInputPhoneNumber").removeAttr("hidden");
//     $("#WhatsappLoader").hide();
//     $("#LnkWhatsapp").show();
//     $("#CodeDestination").html("an SMS");
// });
$("#LnkBack").click(function () {
    $("#step2").attr("hidden", "hidden");
    $("#step2").attr("hidden", "hidden");
    $("#step1").removeAttr("hidden");
});

$("#LnkBack2").click(function () {
    $("#FrmAccountDetails2").attr("hidden", "hidden");
    $("#FrmAccountDetails").removeAttr("hidden", "hidden");
  
});

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