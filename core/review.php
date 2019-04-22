<?php
include 'connection.php';

/*=============================//
        Complete Review
//=============================*/
if (isset($_POST['reviewed'])) {
    $lender = $_POST['lender'];
    $loan_type = $_POST['loanType'];
    $noe = $_POST['noe'];
    $principal_amount = $_POST['principalAmount'];
    $tenor = $_POST['tenor'];
    $repayment_amount = $_POST['repaymentAmount'];
    $repayment_date = $_POST['repaymentDate'];
    $repayment_instrument = $_POST['repaymentInstrument'];
    $rate1 = $_POST['rate1'];
    $rate2 = $_POST['rate2'];
    $rate3 = $_POST['rate3'];
    $user_id = $_SESSION['id'];

    // Calculate loan percentage
    $interest = $repayment_amount - $principal_amount;
    $intrest_percentage = ($interest * 100) / $principal_amount;


    // Update users table
    $sql = "INSERT INTO review (user_id, amount_given, amount_payback, percent, loan_company, duration, instrument, loan_type, customer_type)
    VALUES ('$user_id', '$principal_amount', '$repayment_amount', '$intrest_percentage', '$lender', $tenor, '$repayment_instrument',
    '$loan_type', '$noe')";
    $result = mysqli_query($con, $sql);

    if ($result) {

        echo "yes";
        exit;
    } else {
        echo "tt";
    }

}
