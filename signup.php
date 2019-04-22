<?php
    include 'core/signup.php';
?>

<!DOCTYPE html>
<html>

<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans:400,400i,500,500i,700" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="assets/vendor/loanassets/css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="assets/vendor/loanassets/css/font-awesome.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="assets/vendor/loanassets/css/app.css" media="screen,projection" />
    <title>Sign up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body class="onboarding">

    <div class="container">
        <div class="row">
            <center>
                <a href="index.php">
                    <img class="logo-login" src="assets/vendor/loanassets/img/logo.png" >
                </a>
                <div class="general-card card login-card">
                    <div class="row">
                        <h5>Sign up</h5>
                        <p class="text-center">Let's get started, please enter your phone number, we will send you a verification code as an SMS.</p>
                        <div class="row">

                            <form action="" method="POST">
                                <div class="input-field col s12">
                                    <input name="phone" type="number" class="validate center-align" required placeholder="Enter your phone number" >
                                </div>
                                <div class="input-field col s12">
                                    <button  class="btn waves-effect waves-light full-width" name="signup" type="submit" >Create Account</button>
                                </div>

                                <div class="input-field col s12">
                                    <center>
                                        <br />
                                        <span class="error-message" id="LoginErrMsg"></span>
                                        <a href="login.php" class="forgot-pwd">Already have an account? <span>Login</span></a>
                                    </center>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </center>
        </div>
    </div>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="../../code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="assets/vendor/loanassets/js/materialize.min.js"></script>
    <script src="assets/vendor/newassets/js/jquery.mask.js"></script>
    <script src="assets/vendor/Scripts/parsley.min.js"></script>
    <script src="assets/vendor/Scripts/jquery.signup.js"></script>
</body>

</html>
