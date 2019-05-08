<?php
    include '../core/logic.php';

    // Get Lenders
    $lenders = getLenders();
?>

<!DOCTYPE html>
<html>

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans:400,400i,500,500i,700" rel="stylesheet">
    <!-- START EXPORTED BOOTSTRAPE FOR ERROR ALERT  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../assets/vendor/loanassets/css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="../assets/vendor/loanassets/css/font-awesome.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="../assets/vendor/loanassets/css/app.css" media="screen,projection" />
    <title>Review Loan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
    .checked {
        color: orange;
    }
    </style>
</head>

<body class="onboarding">
    <div id="SignupApp" class="container">
        <center>
            <div class="row">
                <div class="general-card card login-card">
                    <div class="row">
                        <div class="row">

                            <!-- Form Start -->
                            <form id="step1">
                                <h5>LENDERS INFORMATION</h5>
                                <p class="text-center">Now, tell us the loan company and loan type</p>
                                <div class="input-field">
                                    <input id="lender" type="text" list="loanComp" class="validate" data-parsley-required-message="Lender is required" required placeholder="John">
                                    <label>Lender</label>

                                    <datalist id="loanComp">
                                        <select>
                                            <?php while ($row = mysqli_fetch_assoc($lenders)) : ?>
                                                <option value="<?= $row['company_name'] ?>"><?= $row['company_name'] ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </datalist>
                                </div>
                                <div class="input-field">
                                    <select id="loanType" required>
                                        <option></option>
                                        <option value="personal">Personal Loan</option>
                                        <option value="business">Business Loan</option>
                                    </select>
                                    <label>Loan Type</label>
                                </div>
                                <div class="input-field col s12">
                                    <button type="submit" class="btn waves-effect waves-light full-width">Next</button>
                                </div>
                            </form>

                            <form id="step2" hidden>
                                <h5></h5>
                                <p class="text-center">Is this your first time dealing with this lender or have you done business with them before</p>
                                <!-- Switch -->
                                <a id="newCstm" class="btn waves-effect waves-light">New</a>
                                <a id="existing" class="btn waves-effect waves-light">Existing</a>

                                <input id="noe" type="hidden" required>
                                <br><br>
                                <div class="alert alert-info">
                                        <h5>Industry Statistics </h5>
                                        <p>Based on your profile, proportion of existing customers to total customers on paylatter is 45%</p>
                                </div>
                                <br><br>
                                <div class="input-field col s12">
                                    <button type="submit" id="next" disabled class="btn waves-effect waves-light full-width">Next</button>
                                </div>
                                <center>
                                    <br />
                                    <br />
                                    <span class="error-message" id="SignupErrMsg"></span>
                                    <br />
                                    <br />
                                    <a id="LnkBack1" href="javascript:void(0)" class="forgot-pwd">Go Back</a>
                                </center>
                            </form>

                            <form id="step3" hidden>
                            <h5>PRINCIPAL AMOUNT</h5>
                                <p class="text-center">Please enter the principal amount given.</p>
                                <div class="input-field">
                                    <!-- <input class="principalAmount" type="number" id="currency-field" data-type="currency" placeholder="1,000,000.00" data-parsley-required-message="Principal Amount is required" required> -->
                                    <input type="text" id="principalAmount" data-type="currency" placeholder="1,000,000.00" required>

                                    <label>Principal Amount</label>
                                </div>

                                <button type="submit" class="btn waves-effect waves-light full-width">Next</button>

                                <center>
                                    <br />
                                    <br />
                                    <span class="error-message" id="SignupErrMsg"></span>
                                    <br />
                                    <br />
                                    <a id="LnkBack2" href="javascript:void(0)" class="forgot-pwd">Go Back</a>
                                </center>
                            </form>


                            <form id="step4" hidden>
                                <h5>LOAN DURATION</h5>
                                <p class="text-center">Please Select approved tenor for the loan</p>
                                <br>
                                <div class="input-field">
                                    <select id="tenor" class="validate" data-parsley-required-message="Tenor is required" required>
                                        <option></option>
                                        <option value="1">1 Month</option>
                                        <option value="2">2 Months</option>
                                        <option value="3">3 Months</option>
                                        <option value="4">4 Months</option>
                                        <option value="5">5 Months</option>
                                        <option value="6">6 Months</option>
                                        <option value="7">7 Months</option>
                                        <option value="8">8 Months</option>
                                        <option value="9">9 Months</option>
                                        <option value="10">10 Months</option>
                                        <option value="11">11 Months</option>
                                        <option value="12">12 Months</option>
                                    </select>
                                    <label>Tenor</label>
                                </div>

                                <div class="input-field">
                                    <select id="frequency" class="validate" data-parsley-required-message="Frequency is required" required>
                                        <option></option>
                                        <option value="once">One Time Payment</option>
                                        <option value="monthly">Monthly</option>
                                        <option value="yearly">Yearly</option>
                                    </select>
                                    <label>Frequencies</label>
                                </div>

                                <div class="input-field col s12">
                                    <button type="submit" class="btn waves-effect waves-light full-width">Next</button>
                                </div>
                                <center>
                                    <br />
                                    <br />
                                    <span class="error-message" id="SignupErrMsg"></span>
                                    <br />
                                    <br />
                                    <a id="LnkBack3" href="javascript:void(0)" class="forgot-pwd">Go Back</a>
                                </center>
                            </form>


                            <form id="step5" hidden>
                                <h5>REPAYMENT AMOUNT</h5>
                                <br>
                                <p class="text-center">Please amount to payback</p>
                                <div class="input-field">

                                    <div class="input-field">
                                        <input id="repaymentAmount" type="text" data-type="currency" class="validate" data-parsley-required-message="Repayment Amount is required" required>
                                        <label>Repayment Amount</label>
                                    </div>

                                </div>

                                <div class="input-field col s12">
                                    <button type="submit" class="btn waves-effect waves-light full-width">Next</button>
                                </div>
                                <center>
                                    <br />
                                    <br />
                                    <span class="error-message" id="SignupErrMsg"></span>
                                    <br />
                                    <br />
                                    <a id="LnkBack4" href="javascript:void(0)" class="forgot-pwd">Go Back</a>
                                </center>
                            </form>


                            <form id="step6" hidden>
                                <h5>REPAYMENT DATE</h5>
                                <br>

                                <div class="input-field">
                                    <input id="repaymentDate" type="text" class="validate" data-parsley-required-message="Repayment Date is required" placeholder="yyyy-mm-dd" required>
                                    <label>Repayment date</label>
                                </div>


                                <div class="input-field col s12">
                                    <button type="submit" class="btn waves-effect waves-light full-width">Next</button>
                                </div>

                                <center>
                                    <br />
                                    <br />
                                    <span class="error-message" id="SignupErrMsg"></span>
                                    <br />
                                    <br />
                                    <a id="LnkBack5" href="javascript:void(0)" class="forgot-pwd">Go Back</a>
                                </center>
                            </form>


                            <form id="step7" hidden>
                                <h5>REPAYMENT INSTRUMENT</h5>
                                <br>

                                <div class="input-field">
                                    <select id="repaymentInstrument" required>
                                        <option></option>
                                        <option value="bank payment">Bank Payment</option>
                                        <option value="online transfer">Online Transfer</option>
                                        <option value="Cheque">Cheque</option>
                                    </select>
                                    <label>Repayment Instrument</label>
                                </div>


                                <div class="input-field col s12">
                                    <button type="submit" class="btn waves-effect waves-light full-width">Next</button>
                                </div>

                                <center>
                                    <br />
                                    <br />
                                    <span class="error-message" id="SignupErrMsg"></span>
                                    <br />
                                    <br />
                                    <a id="LnkBack6" href="javascript:void(0)" class="forgot-pwd">Go Back</a>
                                </center>
                            </form>


                            <form id="step8" hidden>
                                <p>How do you feel about the time taken to process your application</p>
                                <br>

                                <div class="rating">
                                    <img id="sone" src="../assets/icon/crying-1.png">
                                    <img id="stwo" src="../assets/icon/angry-1.png">
                                    <img id="sthree" src="../assets/icon/sad-1.png">
                                    <img id="sfour" src="../assets/icon/happy-1.png">
                                    <img id="sfive" src="../assets/icon/lol-1.png">
                                </div>

                                <input type="hidden" id="rate1">

                                <div class="input-field col s12">
                                    <button type="submit" id="srate" disabled class="btn waves-effect waves-light full-width">Next</button>
                                </div>

                                <center>
                                    <br />
                                    <br />
                                    <span class="error-message" id="SignupErrMsg"></span>
                                    <br />
                                    <br />
                                    <a id="LnkBack7" href="javascript:void(0)" class="forgot-pwd">Go Back</a>
                                </center>
                            </form>

                            <form id="step9" hidden>
                                <p>How do you feel about the application process</p>
                                <br>

                                <div class="rating2">
                                    <img id="Xone" src="../assets/icon/crying-1.png">
                                    <img id="Xtwo" src="../assets/icon/angry-1.png">
                                    <img id="Xthree" src="../assets/icon/sad-1.png">
                                    <img id="Xfour" src="../assets/icon/happy-1.png">
                                    <img id="Xfive" src="../assets/icon/lol-1.png">
                                </div>

                                <input type="hidden" id="rate2">


                                <div class="input-field col s12">
                                    <button type="submit" id="Xrate" disabled class="btn waves-effect waves-light full-width">Next</button>
                                </div>

                                <center>
                                    <br />
                                    <br />
                                    <span class="error-message" id="SignupErrMsg"></span>
                                    <br />
                                    <br />
                                    <a id="LnkBack8" href="javascript:void(0)" class="forgot-pwd">Go Back</a>
                                </center>
                            </form>

                            <form id="step10" hidden>
                                <p>How do you feel about the customer service</p>
                                <br>

                                <div class="rating3">
                                    <img id="Kone" src="../assets/icon/crying-1.png">
                                    <img id="Ktwo" src="../assets/icon/angry-1.png">
                                    <img id="Kthree" src="../assets/icon/sad-1.png">
                                    <img id="Kfour" src="../assets/icon/happy-1.png">
                                    <img id="Kfive" src="../assets/icon/lol-1.png">
                                </div>

                                <input type="hidden" id="rate3">

                                <!-- help check its submited -->
                                <input type="hidden" id="reviewed" value="reviewed">

                                <div class="input-field col s12">
                                    <button id="Krate" disabled type="submit" class="btn waves-effect waves-light full-width">Submit</button>
                                </div>

                                <center>
                                    <br />
                                    <br />
                                    <span class="error-message" id="SignupErrMsg"></span>
                                    <br />
                                    <br />
                                    <a id="LnkBack9" href="javascript:void(0)" class="forgot-pwd">Go Back</a>
                                </center>
                            </form>
                            <!-- // Form Ends -->

                        </div>
                    </div>
                </div>
            </div>
        </center>
    </div>

    <div id="SuccessStep" class="container" hidden>
        <div class="row">
            <center>
                <div class="general-card card login-card">
                    <div class="row">
                        <center><img src="../walletassets/img/walletCreatedIcon.svg"></center>
                        <p class="verified-phone">Your Account is ready.</p>
                        <p>Click the button below to get to your dashboard.</p>

                        <div class="input-field col s12">
                            <button id="BtnGoToDashboard" onclick="location.href='login.html'" class="btn waves-effect waves-light full-width">Show me my Dashborad</button>
                        </div>
                    </div>
                </div>
            </center>
        </div>
    </div>

    <!-- bootstrap cdn -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <!-- END EXPORTED BOOTSTRAPE FOR ERROR ALERT  -->

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="../assets/vendor/code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="../assets/vendor/loanassets/js/materialize.min.js"></script>
    <script src="../assets/vendor/newassets/js/jquery.mask.js"></script>
    <script src="../assets/vendor/Scripts/parsley.min.js"></script>
    <script src="../assets/vendor/Scripts/preview.js"></script>
    <script src="../assets/vendor/Scripts/script.js"></script>

    <script type="text/javascript">

        function getCategory()
        {
            var state_id = $("#state").val();

            // alert(state_id);
            $.ajax({
                type: "POST",
                url: "../core/lga.php",
                data: {stateID: state_id},
                cache: false,
                success: function(response)
                {
                    // alert(response);return false;
                    $("#locals").html(response);
                },
                error: function () {
                    $("#lga").html("An Error has occured while processing your request, please try again later");
                }
            });

        }
    </script>

</body>

</html>
