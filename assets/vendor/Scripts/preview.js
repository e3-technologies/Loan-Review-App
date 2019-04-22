$(document).ready(function() {

    $("select").material_select();

    // for date of first repayment
    $("#repaymentDate").mask("00/00/0000");

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
        $("#step6").attr("hidden", "hidden");
        $("#step7").removeAttr("hidden");
    });

    $("#step7").parsley();
    $("#step7").submit(function(e) {
        e.preventDefault();
        $("#step7").attr("hidden", "hidden");
        $("#step8").removeAttr("hidden");
    });

    $("#step8").parsley();
    $("#step8").submit(function(e) {
        e.preventDefault();
        $("#step8").attr("hidden", "hidden");
        $("#step9").removeAttr("hidden");
    });

    $("#step9").parsley();
    $("#step9").submit(function(e) {
        e.preventDefault();
        $("#step9").attr("hidden", "hidden");
        $("#step10").removeAttr("hidden");
    });

    $("#step10").parsley();
    $("#step10").submit(function(e) {
        e.preventDefault();
        $("#submitReview").attr("disabled", "disabled");
        $("#submitReview").html("<i class='fa fa-spinner fa-spin'></i>");
        $("#LnkBack9").html("");

        completeReview();
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

    $("#LnkBack6").click(function() {
        $("#step5").attr("hidden", "hidden");
        $("#step6").removeAttr("hidden");
    });

    $("#LnkBack6").click(function() {
        $("#step7").attr("hidden", "hidden");
        $("#step6").removeAttr("hidden");
    });

    $("#LnkBack7").click(function() {
        $("#step8").attr("hidden", "hidden");
        $("#step7").removeAttr("hidden");
    });

    $("#LnkBack8").click(function() {
        $("#step9").attr("hidden", "hidden");
        $("#step8").removeAttr("hidden");
    });

    $("#LnkBack9").click(function() {
        $("#step10").attr("hidden", "hidden");
        $("#step9").removeAttr("hidden");
    });

// ====================================================== //

    // --------- For new or Existing client ----------- //

    var noe = document.querySelector("#noe");

    $("#newCstm").click(function() {
        $("#newCstm").attr("disabled", "disabled");
        $("#existing").removeAttr("disabled");
        $("#next").removeAttr("disabled");
        noe.value = "newValue";
    });


    $("#existing").click(function() {
        $("#existing").attr("disabled", "disabled");
        $("#newCstm").removeAttr("disabled");
        $("#next").removeAttr("disabled");
        noe.value = "existing";
    });


    // ----------------- Ratin 1 -----------------------//

    var rate1 = document.querySelector("#rate1");

    $("#sone").click(function() {
        $("#sone").addClass("checked");
        $("#stwo").removeClass("checked");
        $("#sthree").removeClass("checked");
        $("#sfour").removeClass("checked");
        $("#sfive").removeClass("checked");
        rate1.value = 1;
    });

    $("#stwo").click(function() {
        $("#sone").addClass("checked");
        $("#stwo").addClass("checked");
        $("#sthree").removeClass("checked");
        $("#sfour").removeClass("checked");
        $("#sfive").removeClass("checked");
        rate1.value = 2;
    });

    $("#sthree").click(function() {
        $("#sone").addClass("checked");
        $("#stwo").addClass("checked");
        $("#sthree").addClass("checked");
        $("#sfour").removeClass("checked");
        $("#sfive").removeClass("checked");
        rate1.value = 3;
    });

    $("#sfour").click(function() {
        $("#sone").addClass("checked");
        $("#stwo").addClass("checked");
        $("#sthree").addClass("checked");
        $("#sfour").addClass("checked");
        $("#sfive").removeClass("checked");
        rate1.value = 4;
    });

    $("#sfive").click(function() {
        $("#sone").addClass("checked");
        $("#stwo").addClass("checked");
        $("#sthree").addClass("checked");
        $("#sfour").addClass("checked");
        $("#sfive").addClass("checked");
        rate1.value = 5;
    });

    // ----------------- Ratin 2 -----------------------//

    var rate2 = document.querySelector("#rate2");

    $("#Xone").click(function() {
        $("#Xone").addClass("checked");
        $("#Xtwo").removeClass("checked");
        $("#Xthree").removeClass("checked");
        $("#Xfour").removeClass("checked");
        $("#Xfive").removeClass("checked");
        rate2.value = 1;
    });

    $("#Xtwo").click(function() {
        $("#Xone").addClass("checked");
        $("#Xtwo").addClass("checked");
        $("#Xthree").removeClass("checked");
        $("#Xfour").removeClass("checked");
        $("#Xfive").removeClass("checked");
        rate2.value = 2;
    });

    $("#Xthree").click(function() {
        $("#Xone").addClass("checked");
        $("#Xtwo").addClass("checked");
        $("#Xthree").addClass("checked");
        $("#Xfour").removeClass("checked");
        $("#Xfive").removeClass("checked");
        rate2.value = 3;
    });

    $("#Xfour").click(function() {
        $("#Xone").addClass("checked");
        $("#Xtwo").addClass("checked");
        $("#Xthree").addClass("checked");
        $("#Xfour").addClass("checked");
        $("#Xfive").removeClass("checked");
        rate2.value = 4;
    });

    $("#Xfive").click(function() {
        $("#Xone").addClass("checked");
        $("#Xtwo").addClass("checked");
        $("#Xthree").addClass("checked");
        $("#Xfour").addClass("checked");
        $("#Xfive").addClass("checked");
        rate2.value = 5;
    });

    // ----------------- Ratin 3 -----------------------//

    var rate3 = document.querySelector("#rate3");

    $("#Kone").click(function() {
        $("#Kone").addClass("checked");
        $("#Ktwo").removeClass("checked");
        $("#Kthree").removeClass("checked");
        $("#Kfour").removeClass("checked");
        $("#Kfive").removeClass("checked");
        rate3.value = 1;
    });

    $("#Ktwo").click(function() {
        $("#Kone").addClass("checked");
        $("#Ktwo").addClass("checked");
        $("#Kthree").removeClass("checked");
        $("#Kfour").removeClass("checked");
        $("#Kfive").removeClass("checked");
        rate3.value = 2;
    });

    $("#Kthree").click(function() {
        $("#Kone").addClass("checked");
        $("#Ktwo").addClass("checked");
        $("#Kthree").addClass("checked");
        $("#Kfour").removeClass("checked");
        $("#Kfive").removeClass("checked");
        rate3.value = 3;
    });

    $("#Kfour").click(function() {
        $("#Kone").addClass("checked");
        $("#Ktwo").addClass("checked");
        $("#Kthree").addClass("checked");
        $("#Kfour").addClass("checked");
        $("#Kfive").removeClass("checked");
        rate3.value = 4;
    });

    $("#Kfive").click(function() {
        $("#Kone").addClass("checked");
        $("#Ktwo").addClass("checked");
        $("#Kthree").addClass("checked");
        $("#Kfour").addClass("checked");
        $("#Kfive").addClass("checked");
        rate3.value = 5;
    });

    // ----------------------------------------//

    function completeReview() {

        // window.location.href='../core/complete_profile.php';

        var dataObject = {
            lender: $("#lender").val(),
            loanType: $("#loanType").val(),
            noe: $("#noe").val(),
            principalAmount: $("#principalAmount").val(),
            tenor: $("#tenor").val(),
            repaymentAmount: $("#repaymentAmount").val(),
            repaymentDate: $("#repaymentDate").val(),
            repaymentInstrument: $("#repaymentInstrument").val(),
            rate1: $("#rate1").val(),
            rate2: $("#rate2").val(),
            rate3: $("#rate3").val(),
            reviewed: $("#reviewed").val()
        };

        // alert(dataObject.lender + ' '+ dataObject.reviewed + ' ' + dataObject.rate1);
        $.ajax({
            url: "../core/review.php",
            data: dataObject,
            type: "POST",
            success: function (res) {
                if (res == 'yes') {
                    window.location.href='../account/result.php';
                    // alert(res);
                }
            },
            error: function () {
                $("#ff").html("An Error has occured while processing your request, please try again later");
            }
        });

    }

});
