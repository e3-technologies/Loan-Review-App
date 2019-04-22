<?php

    /*================================//
        Update personal information
    //================================*/
if (isset($_POST['personal-info'])) {
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $state = $_POST['state'];
    $lga = $_POST['lga'];
    $user_email =$_SESSION['email'];

    // Update users table
    $result = "UPDATE users SET name = '$name', dob = '$dob', gender = '$gender',
    state = '$state', lga = '$lga' where email = '$user_email' ";
    $data=mysqli_query($con,$result);

    if ($data) {
        echo "<script> window.location='edit-profile.php'</script>";
        exit;
    } else {
        echo "<script>alert('Bad');</script>";
    }
}

    /*================================//
        Update employment information
    //================================*/
if (isset($_POST['employment-info'])) {
    $employer = $_POST['employer'];
    $industry = $_POST['industry'];
    $subsector = $_POST['subsector'];
    $commencement_date = $_POST['commencement_date'];
    $contract_type = $_POST['contract_type'];
    $net_pay = $_POST['net_pay'];
    $user_email =$_SESSION['email'];

    // Update users table
    $result ="UPDATE users SET employer = '$employer', industry = '$industry', subsector = '$subsector',
    commencement_date = '$commencement_date',  contract_type = '$contract_type' , net_pay = '$net_pay'  where email = '$user_email' ";
     $data=mysqli_query($con,$result);

     if ($data) {
         echo "<script> window.location='edit-profile.php'</script>";
         exit;
     } else {
         echo "<script>alert('Bad');</script>";
     }
}

    /*================================//
        Update social information
    //================================*/
if (isset($_POST['social-info'])) {
    $marital_status = $_POST['marital_status'];
    $accomodation_status = $_POST['accomodation_status'];
    $dependencies = $_POST['dependencies'];
    $user_email =$_SESSION['email'];

    // Update users table
    $result = "UPDATE users SET marital_status = '$marital_status', accomodation_status = '$accomodation_status', dependencies = '$dependencies'  where email = '$user_email' ";
     $data=mysqli_query($con,$result);

     if ($data) {
         echo "<script> window.location='edit-profile.php'</script>";
         exit;
     } else {
         echo "<script>alert('Bad');</script>";
     }
}
