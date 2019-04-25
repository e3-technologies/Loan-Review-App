<?php
// db connection
include 'connection.php';

// ---------- Lenders  ----------- //
function getLenders() {
    global $con;

    $sql = "SELECT * FROM loan_companies";
    $result = mysqli_query($con, $sql);
    return $result;
}

// ---------- State  ----------- //
function getStates() {
    global $con;

    $sql = "SELECT * FROM states";
    $result = mysqli_query($con, $sql);
    return $result;
}


//========= PROFILE =================//

// Grant only authenticated users access to account
function confirm_login(){
    if (!isset($_SESSION['email'])){
        header("Location:../login.php");
    }
}

// Grant only verified phone access to complete-profile
function finishSignup(){
    if (!isset($_SESSION['verify_phone'])){
        header("Location:../signup.php");
    }
}

// ---------- User Details  ----------- //
/**
 * Get user details
 */
function usersDetails($email) {
    global $con;

    $sql = "SELECT * FROM users WHERE email='$email' ";
    $result = mysqli_query($con, $sql);
    $row = $result->fetch_assoc();
    return $row;
}

/**
 *  Get the net_pay
 */
function netPay($id) {
    global $con;

    $sql = "SELECT * FROM users WHERE id='$id' ";
    $result = mysqli_query($con, $sql);
    $row = $result->fetch_assoc();
    return $row['net_pay'];
}

// ---------- Profile Picture  ----------- //
/**
 * for displaying profile pic
 */
function profilePic($profile_pic) {
    if ($profile_pic == "" ){
        echo '<img src="img/user.jpg" class="img-fluid"/>';
    } elseif ($profile_pic !== "" ) {
   	    echo '<img src="upload/'.$profile_pic.'" class="img-fluid"  />';
    }
}

/**
 * For edit profile pic
 */
function editProfilePic($profile_pic) {
    if ($profile_pic == "" ){
        echo '<img src="img/user.jpg" class="image"/>';
    } elseif ($profile_pic !== "" ) {
   	    echo '<img src="upload/'.$profile_pic.'" class="image"  />';
    }
}

/**
 * Get last review submitted by user
 */
function rev() {
    global $con;

    // Get the recently inserted review id by user
    $max = "SELECT MAX(id) AS id FROM review WHERE user_id ={$_SESSION['id']} ";
    $query = mysqli_query($con, $max);
    $row = $query->fetch_assoc();
    $last_inserted_review = $row['id'];

    // Get details of review
    $sql = "SELECT * FROM review WHERE id='$last_inserted_review' ";
    $result = mysqli_query($con, $sql);
    $info = $result->fetch_assoc();
    return $info;
}

/**
 * Get total count of review submitted by user
 */
function totalReviews() {
    global $con;

    $sql = "SELECT COUNT(user_id) AS total FROM review WHERE user_id ={$_SESSION['id']}";
    $result = mysqli_query($con, $sql);
    $data = $result->fetch_assoc();
    return $data['total'];
}

/**
 * Get all reviews by a user
 */
function allReview() {
    global $con;
    $user_id = $_SESSION['id'];

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        $start = ($page * 3) - 3;
        $sql = "SELECT * FROM review WHERE user_id = '$user_id' ORDER BY id desc LIMIT $start, 3 ";
    } else {
        $sql = "SELECT * FROM review WHERE user_id = '$user_id' ORDER BY id desc LIMIT 0, 3 ORDER";
    }
        $result = mysqli_query($con, $sql);
        return $result;

}

/**
 * For pagination on review_history
 */
function reviewPagination() {
    global $con;

    // Get logged-in user id
    $user_id = $_SESSION['id'];

    $sql = "SELECT COUNT(*) from review WHERE user_id = '$user_id' ";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $total = array_shift($row);

    $divide = $total / 3;
    $paginate = ceil($divide);

    return $paginate;

}


/**
 * Get signle review details by user
 */
function reviewDetails() {
    global $con;

    $id = $_GET['id'];
    // Get details of review
    $sql = "SELECT * FROM review WHERE id='$id' ";
    $result = mysqli_query($con, $sql);
    $info = $result->fetch_assoc();
    return $info;
}

/**
 * Calculate loan based on income
 * And rate if its advisable
 */
function loanSafety() {
    // Get principal amount
    $row = reviewDetails();
    // Get user net_pay
    $net_pay = netPay($row['user_id']);
    // Calc loan to income percentage
    $rate = round(($row['amount_given'] * 100)/ $net_pay, 2);

    // Calc the score for the loan
    switch ($rate) {
        case $rate <= 40:
            echo 100;
            break;
        case $rate > 40 && $rate < 46:
            echo 75;
            break;
        case $rate >= 45 && $rate < 51:
            echo 65;
            break;
        case $rate >= 51 && $rate < 56:
            echo 55;
            break;
        case $rate >= 56 && $rate < 61:
            echo 45;
            break;
        case $rate > 60:
            echo 20;
            break;
        default:
            echo "Error";
    }
}

/**
 * Calculate loan based on income
 * And rate if its advisable
 * This one is for after reviewing a loan
 */
function loanSafety2() {
    // Get principal amount
    $row = rev();
    // Get user net_pay
    $net_pay = netPay($row['user_id']);
    // Calc loan to income percentage
    $rate = round(($row['amount_given'] * 100)/ $net_pay, 2);

    // Calc the score for the loan
    switch ($rate) {
        case $rate <= 40:
            echo 100;
            break;
        case $rate > 40 && $rate < 46:
            echo 75;
            break;
        case $rate >= 45 && $rate < 51:
            echo 65;
            break;
        case $rate >= 51 && $rate < 56:
            echo 55;
            break;
        case $rate >= 56 && $rate < 61:
            echo 45;
            break;
        case $rate > 60:
            echo 20;
            break;
        default:
            echo "Error";
    }
}

function ReviewInfo() {
    global $con;

    $sql = "SELECT review.*, users.employer, users.industry, users.subsector, users.contract_type, users.net_pay, users.id
    FROM review
    INNER JOIN users
    ON review.user_id = users.id
    WHERE user_id = {$_SESSION['id']}";
    $result = mysqli_query($con, $sql);
    $row = $result->fetch_assoc();
    return $row;


}

// =========== Add Review Stats ===============//

function FunctionName($value=''){
    global $con;


}

// ------------- lga  --------------//
// use the id of selected state to get LGA
if (isset($_POST['stateID'])) {
    $stateId = $_POST['stateID'];

    $sql = "SELECT * FROM locals WHERE state_id = '$stateId' ";
    $result = mysqli_query($con, $sql);

    while($row = $result->fetch_assoc()){
        echo '<option value="'.$row['local_name'].'">'.$row['local_name'].'</option>';
    }
}
