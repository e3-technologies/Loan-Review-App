<?php
    include 'core/signup.php';

?>
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
    <title>Sign upnhj</title>
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
                        <h5>Verify Your Phone Number</h5>
                        <p class="text-center">Enter the code sent to you, to activate your phone number.</p>
                        <div class="row">

                            <form action="" method="POST">
                                <div class="input-field col s12">
                                    <input name="v_code" type="number" class="validate center-align" required placeholder="Enter your phone number" >
                                </div>
                                <input hidden value="<?php echo $_SESSION['phone']; ?>" name="phone">
                               <!--  <p>Enter this code <strong><?php echo $_SESSION['v_code']; ?></strong></p> -->

                                <div class="input-field col s12">
                                    <button  class="btn waves-effect waves-light full-width" name="verify_phone" type="submit" >Verify Number</button>
                                </div>

                                <div class="input-field col s12">
                                    <!-- <center>
                                        <br />
                                        <span class="error-message" id="LoginErrMsg"></span>
                                        <a href="login.php" class="forgot-pwd">Already have an account? <span>Login</span></a>
                                    </center> -->
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
