<?php
    include 'core/signup.php';

 ?>

<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans:400,400i,500,500i,700" rel="stylesheet">

    <title>Login</title>
    <link type="text/css" rel="stylesheet" href="assets/vendor/loanassets/css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="assets/vendor/loanassets/css/font-awesome.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="assets/vendor/loanassets/css/app.css" media="screen,projection" />

    <!--Let browser know website is optimized for mobile-->
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
                        <h5 class="login-head">Welcome back </h5>


                        <form action="" method="POST">
                            <div class="input-field col s12">
                                <input autofocus name="email"
                                        type="email" class="validate center-align" required
                                       placeholder="Enter your Email" >
                            </div>

                            <div class="input-field col s12">
                                <input data-parsley-required-message="Password is required" id="LoginPassword" name="password" type="password" class="validate center-align" placeholder="Enter your password" required>
                            </div>

                            <div class="input-field col s12">
                                <button name="login" class="btn waves-effect waves-light full-width" type="submit">Sign In</button>
                            </div>

                            <div class="input-field col s12">
                                <center>
                                    <br />

                                    <a href="reset-password.php" class="forgot-pwd">Forgot Password?</a>
                                </center>
                            </div>
                        </form>
                    </div>
                </div>

                <p class="no-account">Don't have an account? <a href="signup.php">Sign Up</a></p>
            </center>
        </div>
    </div>

    <script type="text/javascript" src="assets/vendor/loanassets/js/materialize.min.js"></script>
    <script src="assets/vendor/newassets/js/jquery.mask.js"></script>
    <script src="assets/vendor/Scripts/parsley.min.js"></script>
    <script src="assets/vendor/Scripts/jquery.signup.js"></script>
</body>
</html>
