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
    $frequency = $_POST['frequency'];
    $repayment_amount = $_POST['repaymentAmount'];
    $repayment_date = $_POST['repaymentDate'];
    $repayment_instrument = $_POST['repaymentInstrument'];
    $rate1 = $_POST['rate1'];
    $rate2 = $_POST['rate2'];
    $rate3 = $_POST['rate3'];
    $user_id = $_SESSION['id'];

    // Calculate loan percentage
    // $interest = $repayment_amount - $principal_amount;
    // $intrest_percentage = ($interest * 100) / $principal_amount;

    /**
     * JOHN'S LOAN LIFE RATE FORMULAR
     * (((repayment_amt * loan_duration)-loan_amt)/loan_amt)*100
     */
    $intrest_percentage = ((($repayment_amount * $tenor)- $principal_amount)/ $principal_amount)* 100;


    // Update users table
    $sql = "INSERT INTO review (user_id, amount_given, amount_payback, percent, loan_company, duration, frequency, instrument, loan_type, customer_type)
    VALUES ('$user_id', '$principal_amount', '$repayment_amount', '$intrest_percentage', '$lender', '$tenor', '$frequency', '$repayment_instrument',
    '$loan_type', '$noe')";
    $result = mysqli_query($con, $sql);

    if ($result) {

        $last_id = mysqli_insert_id($con);
        $_SESSION['last_id'] = $last_id;

        echo "yes";
        exit;
    } else {
        echo "tt";
    }

}


if (isset($_POST['submit'])) {
    $filename = $_FILES['offer_letter']['name'];
    $last_id = $_POST['last_id'];

    // Check if file is pdf
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    if($extension != 'pdf'){
        echo "<script>alert('File have to be PDF');</script>";
    } else {

        $pdf_loc = $_FILES['offer_letter']['tmp_name'];
        $folder="../uploads/";

        // Update into db
        $query = " UPDATE review SET offer_letter='$filename' WHERE id='$last_id'";
        $offer = mysqli_query($con, $query);
        if ($offer) {

          // store file
          move_uploaded_file($pdf_loc,$folder.$filename);

          echo "<script>alert('Successful2!!'); window.location='../account/result.php'</script>";
        } else {
          echo "Error: " . $query . "<br>" . $con->error;
        }
    }
}
