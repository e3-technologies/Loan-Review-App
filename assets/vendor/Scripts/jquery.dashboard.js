var creditsData = [];
var debitsData = [];
var weeks = [];
var months = [];
var debitsWeekly = [];
var creditsWeekly = [];
var GraphWeeklyData = [];
var debitsMonthly = [];
var creditsMonthly = [];
var GraphMonthlyData = [];
LoadTransactionsTable();
$("#LnkDashboard").addClass("active");
function LoadDashboardData() {
    $.ajax({
        url: "/Account/GetDashboardData",
        type: "GET",
        success: function (data) {
            weeks = data.Weeks;
            months = data.Months;
            var creditsDataLength = 0;
            var debitsDataLength = 0;
            var creditsMonthlyDataLength = 0;
            var debitsMonthlyDataLength = 0;
            for (var i = 0; i < weeks.length; i++) {
                var weeklyDebitsData = _.where(data.Debits, { "Week": weeks[i].weekyear });
                var weeklyCreditsData = _.where(data.Credits, { "Week": weeks[i].weekyear });
                var weeklyAllData = _.where(data.All, { "Week": weeks[i].weekyear });
                var weeklyGraphObject = { "Week": weeks[i].weekyear, "Debits": weeklyDebitsData.length, "Credits": weeklyCreditsData.length, "All": weeklyAllData.length };
                creditsDataLength += weeklyCreditsData.length;
                debitsDataLength += weeklyDebitsData.length;
                GraphWeeklyData.push(weeklyGraphObject);
            }
            for (var i = 0; i < months.length; i++) {
                var monthlyDebitsData = _.where(data.Debits, { "Month": months[i].monthyear });
                var monthlyCreditsData = _.where(data.Credits, { "Month": months[i].monthyear });
                var monthlyAllData = _.where(data.All, { "Month": months[i].monthyear });
                var monthlyGraphObject = { "Month": months[i].monthyear, "Debits": monthlyDebitsData.length, "Credits": monthlyCreditsData.length, "All": monthlyAllData.length };
                creditsMonthlyDataLength += monthlyCreditsData.length;
                debitsMonthlyDataLength += monthlyDebitsData.length;
                GraphMonthlyData.push(monthlyGraphObject);
            }
            var allDataLength = creditsDataLength + debitsDataLength;
            var allMonthsDataLength = creditsMonthlyDataLength + debitsMonthlyDataLength;
            if (allDataLength > 0) {
                var creditspercentage = (creditsDataLength / allDataLength) * 100;
                var debitspercentage = (debitsDataLength / allDataLength) * 100;
                var strCreditsPercentage = creditspercentage.toFixed(2) + "%";
                var strDebitsPercentage = debitspercentage.toFixed(2) + "%";
                $("#SpanCreditFigure").html(strCreditsPercentage);
                $("#SpanDebitFigure").html(strDebitsPercentage);
                $("#CreditProgressBar").css("width", strCreditsPercentage);
                $("#DebitProgressBar").css("width", strDebitsPercentage);
                $("#SpanAllFigure").html("100%");
                $("#AllProgressBar").css("width", "100%");
            }
            if (allMonthsDataLength > 0) {
                var creditspercentage = (creditsMonthlyDataLength / allMonthsDataLength) * 100;
                var debitspercentage = (debitsMonthlyDataLength / allMonthsDataLength) * 100;
                var strCreditsPercentage = creditspercentage.toFixed(2) + "%";
                var strDebitsPercentage = debitspercentage.toFixed(2) + "%";
                $("#SpanMonthCreditFigure").html(strCreditsPercentage);
                $("#SpanMonthDebitFigure").html(strDebitsPercentage);
                $("#MonthCreditProgressBar").css("width", strCreditsPercentage);
                $("#MonthDebitProgressBar").css("width", strDebitsPercentage);
                $("#SpanAllMonthFigure").html("100%");
                $("#AllMonthProgressBar").css("width", "100%");
            }
            console.log(allDataLength);
            console.log(allMonthsDataLength);
            ConstructWalletGraph(GraphWeeklyData);
            console.log(GraphMonthlyData);
            ConstructMonthsWalletGraph(GraphMonthlyData);
            LoadCreditsData(data.Credits);
            LoadDebitsData(data.Debits);
        }
    })
}
function LoadCreditsData(data) {
    $("#CreditsLoader").hide();
    if (data.length > 0) {
        var count = 0;
        for (var i = data.length - 1; i >= 0; i--) {
            if (count > 4) {
                break;
            }
            $("#CreditsList").append("<li class='list-item'>" +
                                    "<div class='list-body'>" +
                                    "<div class='text-ellipsis'>Amount: <strong>NGN" + data[i].Amount + "</strong>, Transaction Reference: <strong>" + data[i].TransactionReference + "</strong></div>" +
                                    "<small class='block text-muted'><i class='fa fa-fw fa-clock-o'></i> " + data[i].DateTime + "</small>" +
                                    "</div>" +
                                    "</li>");
            $("#NoCredits").hide();
            count++;
        }
    }
       
}
function LoadDebitsData(data) {
    $("#DebitsLoader").hide();
    if (data.length > 0) {
        var count = 0;
        for (var i = data.length - 1; i >= 0; i--) {
            if (count > 4) {
                break;
            }
            $("#DebitsList").append("<li class='list-item'>" +
                                    "<div class='list-body'>" +
                                    "<div class='text-ellipsis'>Amount: <strong>NGN" + data[i].Amount + "</strong>, Transaction Reference: <strong>" + data[i].TransactionReference + "</strong></div>" +
                                    "<small class='block text-muted'><i class='fa fa-fw fa-clock-o'></i> " + data[i].DateTime + "</small>" +
                                    "</div>" +
                                    "</li>");
            $("#NoDebits").hide();
            count++;
        }
    }
            
}

function FormatWeekYear(date) {
    return moment(date).format("ww YYYY");
}
function ConstructWalletGraph(graphData) {
    var colors = ["#ef193c", "#22b66e", "#f3c111"];
    new Morris.Line({
        // ID of the element in which to draw the chart.
        element: 'myfirstchart',
        // Chart data records -- each entry in this array corresponds to a point on
        // the chart.
        lineColors: colors,
        data: graphData,
        // The name of the data record attribute that contains x-values.
        xkey: 'Week',
        // A list of names of data record attributes that contain y-values.
        ykeys: ['Debits', 'Credits', 'All'],
        // Labels for the ykeys -- will be displayed when you hover over the
        // chart.
        labels: ['Debits', 'Credits', 'All'],
        parseTime: false,
        hideHover: 'auto'
    });
}
function ConstructMonthsWalletGraph(graphData) {
    var colors = ["#ef193c", "#22b66e", "#f3c111"];
    new Morris.Line({
        // ID of the element in which to draw the chart.
        element: 'monthChart',
        // Chart data records -- each entry in this array corresponds to a point on
        // the chart.
        lineColors: colors,
        data: graphData,
        // The name of the data record attribute that contains x-values.
        xkey: 'Month',
        // A list of names of data record attributes that contain y-values.
        ykeys: ['Debits', 'Credits', 'All'],
        // Labels for the ykeys -- will be displayed when you hover over the
        // chart.
        labels: ['Debits', 'Credits', 'All'],
        parseTime: false,
        hideHover: 'auto'
    });
}
function LoadTransactionsTable() {
    $.ajax({
        url: "/Account/GetWalletTransactions",
        type: "GET",
        success: function (data) {
            if (data.length > 0) {
                $("#BtnSeeAllTransactions").removeAttr("hidden", "hidden");
                $("#NoTransactions").attr("hidden", "hidden");
                $("#TransactionsTable").removeAttr("hidden");
                for (var i = 0; i < data.length; i++) {
                    var transactionClass = data[i].TransactionType == 1 ? "crd" : "debit";
                    $("#TransactionsTable").append("<div class='clearfix thistory'><div class='trans-date'>" + data[i].Month + " <span>" + data[i].Day + "</span></div><div class='trans-type'><p>" + data[i].Description + "<span>" + data[i].Category + "</span></p></div><div class='trans-amount'><p class='" + transactionClass + "'>₦" + numeral(data[i].Amount).format('0,0') + "</p></div></div>")
                }
            }
            else {
                $("#TransactionsTable").attr("hidden", "hidden");
                $("#NoTransactions").removeAttr("hidden");
            }
        }
    })
}
$("#LnkResendEmailVerification").click(function () {
    ResendVerificationEmail();
})
function ResendVerificationEmail() {
    $("#LnkResendEmailVerification").hide();
    $("#ResendLoader").show();
    $.ajax({
        url: "/Account/ResendVerificationEmail",
        type: "POST",
        success: function (data) {
            $("#DivResend").hide();
            $("#DivResent").show();
        },
        error: function (data) {
            $("#ResendLoader").hide();
            $("#LnkResendEmailVerification").show();
        }
    })
}