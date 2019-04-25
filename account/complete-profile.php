<?php
    include '../core/logic.php';

    // Get States
    $states = getStates();
?>

<!DOCTYPE html>
<html>

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans:400,400i,500,500i,700" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../assets/vendor/loanassets/css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="../assets/vendor/loanassets/css/font-awesome.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="../assets/vendor/loanassets/css/app.css" media="screen,projection" />
    <title>Sign upnhj</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
                                <h5>Personal Information</h5>
                                <p class="text-center">Now, tell us a little bit about yourself</p>
                                <div class="input-field">
                                    <input id="firstName" type="text" class="validate" data-parsley-required-message="First name is required" required placeholder="John">
                                    <label>First Name</label>
                                </div>
                                <div class="input-field">
                                    <input id="lastName" type="text" class="validate" data-parsley-required-message="Last name is required" required placeholder="Doe">
                                    <label>Last Name</label>
                                </div>
                                <div class="input-field">
                                    <input id="DateOfBirth" type="text" class="validate" data-parsley-required-message="Date of birth is required" required placeholder="dd/mm/yyyy">
                                    <label>Date of Birth</label>
                                </div>
                                <div class="input-field col s12">
                                    <button type="submit" class="btn waves-effect waves-light full-width">Next</button>
                                </div>
                            </form>

                            <form id="step2" hidden>
                                <h5>Personal Information</h5>
                                <p class="text-center">Now, tell us a little bit about yourself</p>
                                <div class="input-field">
                                    <select id="gender" required>
                                        <option></option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                     <label>Select Gender</label>
                                </div>
                                <div class="input-field">
                                    <select required id="state" onchange="getLGA();">
                                        <option></option>
                                        <?php while ($row = mysqli_fetch_assoc($states)) : ?>
                                            <option value="<?= $row['state_id'] ?>"><?= $row['name'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                      <label>Select State</label>
                                </div>
                                <div class="input-field">
                                    <input type="text" id="lga" required  class="form-control" list="lla"/>
                                    <label>LGA</label>

                                    <datalist id="lla">
                                        <select name="course" id="locals">
                                        </select>
                                    </datalist>
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
                                    <a id="LnkBack1" href="javascript:void(0)" class="forgot-pwd">Go Back</a>
                                </center>
                            </form>

                            <form id="step3" hidden>
                            <h5>Account Information</h5>
                                <p class="text-center">Give us an email we can always reach you on and set a safe, memorable password.</p>
                                <div class="input-field">
                                    <input id="email" type="email" class="validate" data-parsley-required-message="Email is required" required placeholder="nelson.mandela@xyz.com">
                                    <label>Email</label>
                                </div>
                                <div class="input-field">
                                    <input data-parsley-lengthcheck data-parsley-hasnumber data-parsley-hasspecial data-parsley-minlength="8" data-parsley-minlength-message="Almost there, your password must be at least 8 characters long" id="password" type="password" class="validate" placeholder="something memorable and safe" required>
                                    <label for="first_name">Password</label>
                                </div>

                                <div class="input-field">
                                    <input id="confirmPassword" type="password" data-parsley-equalto="#password" data-parsley-equalto-message="Password and confirmation do not match" class="validate" required placeholder="same as above">
                                    <label for="first_name">Confirm Password</label>
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
                                    <a id="LnkBack2" href="javascript:void(0)" class="forgot-pwd">Go Back</a>
                                </center>
                            </form>


                            <form id="step4" hidden>
                                <h5>EMPLOYMENT PROFILE</h5>
                                <p class="text-center">Please complete your profile to enable us accurately review if your loan offer is worth it</p>
                                <br>
                                <div class="input-field">
                                    <input type="text" id="employer" required  class="form-control" list="course"/>
                                    <label>Employer</label>

                                    <datalist id="course">
                                        <select name="course" id="">
                                            <option value="GTB">GTB</option>
                                            <option value="E3 Tech">E3 Tech</option>
                                            <option value="Paylater">Paylater</option>
                                        </select>
                                    </datalist>
                                </div>

                                <div class="input-field">
                                    <select id="industry" required>
                                        <option></option>
                                        <option value="Diction">Banking</option>
                                        <option value="Phonics">Technology</option>
                                    </select>
                                    <label>Industry</label>
                                </div>

                                <div class="input-field">
                                    <select id="sub_sector" required>
                                        <option></option>
                                        <option value="Diction">Banking</option>
                                        <option value="Phonics">Technology</option>
                                    </select>
                                    <label>Sub sector</label>
                                </div>
                                <div class="input-field">
                                    <input id="StartBirth" name="DateOfBirth" type="text" list="date" class="validate" data-parsley-required-message="Date of birth is required" required placeholder="dd/mm/yyyy">
                                    <label>Commencement date</label>

                                    <datalist id="date">
                                        <select name="date">
                                            <option value="GTB">44/44/4444</option>
                                            <option value="E3 Tech">11/11/1111 Tech</option>
                                            <option value="Paylater">01/11/2019</option>
                                        </select>
                                    </datalist>
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
                                <h5>EMPLOYMENT PROFILE</h5>
                                <br>
                                <p class="text-center"></p>
                                <div class="input-field">

                                    <div class="input-field">
                                        <select id="emp-state" required>
                                            <option></option>
                                            <option value="lagos">Lagos</option>
                                        </select>
                                        <label>Select State</label>
                                    </div>

                                        <div class="input-field">
                                        <select id="emp-lga" required>
                                            <option></option>
                                            <option value="ikj">ikeja</option>
                                        </select>
                                        <label>Select LGA</label>
                                    </div>

                                    <div class="input-field">
                                        <select id="contract_type" required>
                                            <option></option>
                                            <option value="full time">full time</option>
                                            <option value="part time">part time</option>
                                        </select>
                                        <label>Contract type</label>
                                    </div>

                                    <div class="input-field">
                                        <input id="net_pay" type="number" required>
                                        <label>Net pay(Salary)</label>
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
                                <h5>SOCIAL PROFILE</h5>
                                <br>

                                <div class="input-field">
                                    <select id="marital_status" required>
                                        <option></option>
                                        <option value="single">Single</option>
                                        <option value="married">Married</option>
                                    </select>
                                    <label>Marital status</label>
                                </div>

                                <div class="input-field">
                                    <select id="accomodation_status" required>
                                        <option></option>
                                        <option value="tentant">Tenant</option>
                                        <option value="landlord">Landlord</option>
                                    </select>
                                    <label>Accommodation  status</label>
                                </div>

                                <div class="input-field">
                                    <select id="dependacies" required>
                                        <option></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                    </select>
                                    <label>Number Of Children</label>
                                </div>

                                <input type="hidden" id="complete_profile" class="form-control" value="yes"/>
                                <input type="hidden" id="regPhone" class="form-control" value="<?= $_SESSION['phone']; ?>"/>


                                <div class="input-field col s12">
                                    <button type="submit" class="btn waves-effect waves-light full-width">Submit</button>
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
                <!-- <img class="logo-login" src="../walletassets/img/logo-login.png" srcset="/walletassets/img/logo-login@2x.png 2x"> -->
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

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="../assets/vendor/code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="../assets/vendor/loanassets/js/materialize.min.js"></script>
    <script src="../assets/vendor/newassets/js/jquery.mask.js"></script>
    <script src="../assets/vendor/Scripts/parsley.min.js"></script>
    <script src="../assets/vendor/Scripts/auth.js"></script>

    <script type="text/javascript">

        function getLGA()
        {
            var state_id = $("#state").val();

            // alert(state_id);
            $.ajax({
                type: "POST",
                url: "../core/logic.php",
                data: {stateID: state_id},
                cache: false,
                success: function(response)
                {
                    // alert(response);
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
