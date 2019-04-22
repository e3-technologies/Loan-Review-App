<?php
include 'connection.php';

/**
 * -- Signup --
 */
if (isset($_POST['signup'])) {
    $phone = $_POST['phone'];

    //Check if user already exist
    $sql = "SELECT * FROM users WHERE phone = '$phone' ";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row['phone'] == $phone) {
       // echo "<script> window.location='signup.php'</script>";
       echo "working";
    } else {
        // Generate verification code
        $verification_code = mt_rand(1000,9999);

        $sql = "INSERT INTO users (phone, user_code, status)
                        VALUE ('$phone', '$verification_code', 0)";
        $result = mysqli_query($con, $sql);
        if ($result){
            // Sending SMS verification
            header("Access-Control-Allow-Origin: *");
            //rebuild form data
            $postdata = http_build_query(
                array(
                    'username' => '********@***.***',
                    'password' => '********',
                    'message' => 'VerificationCode: '.$verification_code.' ',
                    'mobiles' => $phone,
                    'sender' => '******',
                )
            );
            //prepare a http post request
            $opts = array('http' =>
                array(
                    'method'  => 'POST',
                    'header'  => 'Content-type: application/x-www-form-urlencoded',
                    'content' => $postdata
                )
            );
            //craete a stream to communicate with betasms api
            $context  = stream_context_create($opts);
            //get result from communication
            $result = file_get_contents('http://login.betasms.com/api/', false, $context);
            //return result to client, this will return the appropriate respond code

            // Save number in seesion
            $_SESSION['phone'] = $phone;
            $_SESSION['v_code'] = $verification_code;

            echo "<script> window.location='verify-phone.php'</script>";
            // echo "great";
        }
    }

}


    /*=============================//
            Verifiy_SMS
    //=============================*/

if (isset($_POST['verify_phone'])) {
    $v_code = $_POST['v_code'];
    $phone = $_POST['phone'];

    //Check if user already exist
    $sql = "SELECT * FROM users WHERE phone = '$phone' ";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row['phone'] == $phone && $row['user_code'] == $v_code) {
        $query = "UPDATE users SET status = 1 where phone = '$phone' ";
        $result = mysqli_query($con, $query);
        $_SESSION['veriried_phone'] = "yes";

        echo "<script> window.location='account/complete-profile.php'</script>";
        exit;
    } else {
        // echo "<script> window.location='signup.php'</script>";
        echo "working";
    }
}


/*=============================//
        Complete Profile
//=============================*/
if (isset($_POST['complete_profile'])) {
    $name = $_POST['firstName']. ' ' . $_POST['lastName'];
    $date_of_birth = $_POST['DateOfBirth'];
    $gender = $_POST['gender'];
    $state = $_POST['state'];
    $lga = $_POST['lga'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);
    $employer = $_POST['employer'];
    $industry = $_POST['industry'];
    $sub_sector = $_POST['sub_sector'];
    $commencement_date = $_POST['commencement_date'];
    $emp_state = $_POST['empState'];
    $emp_lga = $_POST['empLga'];
    $contract_type = $_POST['contract_type'];
    $net_pay = $_POST['net_pay'];
    $marital_status = $_POST['marital_status'];
    $accomodation_status = $_POST['accomodation_status'];
    $dependacies = $_POST['dependacies'];
    $regPhone = $_POST['regPhone'];


    // Update users table
    $sql = "UPDATE users SET name = '$name', dob = '$date_of_birth', gender = '$gender',
     state = '$state', lga = '$lga', email = '$email', password = '$password', employer = '$employer',
     industry = '$industry', subsector = '$sub_sector', commencement_date = '$commencement_date',
     emp_state = '$emp_state', emp_city = '$emp_lga', net_pay = '$net_pay', marital_status = '$marital_status',
     accomodation_status = '$accomodation_status' where phone = '$regPhone' ";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $sql = "SELECT * FROM users WHERE phone = '$regPhone' ";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);

        // Add params to session
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['regPhone'] = $regPhone;

        // unset $_SESSION['veriried_phone']
        $_SESSION['veriried_phone'] = null;

        echo "yes";
        exit;
    } else {
        echo "no";
    }

}


/*=============================//
            Login
//=============================*/
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);

    //Check if user already exist
    $sql = "SELECT * FROM users WHERE email = '$email' ";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row['email'] != $email || $row['password'] != $password) {
        //Error MSG
        // Email and password don't match

        // echo "<script> window.location='login.php'</script>";

        echo "email and password error {$email} {$password}";
        exit;
    }

    if ($row['status'] != 1){
        // Error MSG
        // Please verify your account

        // echo "<script> window.location='login.php'</script>";
        echo "status error";
        exit;
    }

    if ($row['email'] == $email && $row['password'] == $password && $row['status'] == 1) {

        // Add params to session
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['phone'] = $row['phone'];
        $_SESSION['id'] = $row['id'];

        echo "<script> window.location='account/'</script>";
        exit;
    } else {
        // An Error occured. Please try again latter

        // echo "<script> window.location='login.php'</script>";
        echo "An Error occured. Please try again latter";
    }
}
