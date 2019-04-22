

<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans:400,400i,500,500i,700" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="assets/vendor/loanassets/css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="assets/vendor/loanassets/css/font-awesome.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="assets/vendor/loanassets/css/app.css" media="screen,projection" />
    <link href="assets/vendor/Content/Site.css" rel="stylesheet" />
    <title>Recover Password</title>
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
                        <h5 class="login-head">Reset Password</h5>


                       <form action="reset-password.php">
                                <div class="input-field">
                                    <p class="text-center">Almost done, set your password to regain access to your account.</p>
                                </div>
                                <div class="input-field">
                                   <input autofocus data-parsley-required-message="Password is required" id="LoginPassword" name="LoginPassword" type="password" class="validate center-align" placeholder="Enter your password" required>
                                </div>

                                <div class="input-field">
                                   <input autofocus data-parsley-required-message="Password is required" id="LoginPassword" name="LoginPassword" type="password" class="validate center-align" placeholder="Confirm Password" required>
                                </div>
                                <div class="input-field">
                                    <button type="submit"  class="btn waves-effect waves-light full-width">Set Password</button>
                                </div>
                                <div class="input-field">

                                </div>
                            </form>


                    </div>
                </div>
            </center>
        </div>
    </div>


    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="assets/vendor/code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="assets/vendor/loanassets/js/materialize.min.js"></script>
    <script src="assets/vendor/Scripts/parsley.min.js"></script>
    <script src="assets/vendor/Scripts/jquery.forgot.js"></script>

</body>
</html>
