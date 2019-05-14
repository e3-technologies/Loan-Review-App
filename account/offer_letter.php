<?php
    include '../core/review.php';

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
                            <form action="" method="POST" enctype="multipart/form-data">
                                <h5>Offer Letter</h5>
                                <p>This will help us verify that you actually have a transaction with the lender. It will help us prevent fake review.</p>
                                    <br>
                                <div class="input-field">
                                    <input type="file" name="offer_letter" required>
                                    <input type="text" name="last_id" value="<?= $_SESSION['last_id']; ?>" hidden>
                                </div>
                                <div class="input-field col s12">
                                    <button type="submit" name="submit" class="btn waves-effect waves-light full-width">Submit</button>
                                </div>
                            </form>

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

</body>

</html>
