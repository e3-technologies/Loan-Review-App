<?php
    include '../core/logic.php';
    // reject unAuth access
    confirm_login();

    // review details
    $row = revieDetails();
    // Get net pay
    $user = netPay($row['user_id']);
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Oficiona</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/account/assets/css/bootstrap.min.css">

    <!-- External Css -->
    <link rel="stylesheet" href="../assets/account/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/account/assets/css/themify-icons.css" />
    <link rel="stylesheet" href="../assets/account/assets/css/et-line.css" />
    <link rel="stylesheet" href="../assets/account/assets/css/bootstrap-select.min.css" />
    <link rel="stylesheet" href="../assets/account/assets/css/plyr.css" />
    <link rel="stylesheet" href="../assets/account/assets/css/flag.css" />
    <link rel="stylesheet" href="../assets/account/assets/css/slick.css" />
    <link rel="stylesheet" href="../assets/account/assets/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="../assets/account/assets/css/jquery.nstSlider.min.css" />

    <!-- Custom Css -->
    <link rel="stylesheet" type="text/css" href="../assets/account/css/main.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600%7CRoboto:100,300i,400,500" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="../assets/account/images/favicon.png">
    <link rel="apple-touch-icon" href="../assets/account/images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../assets/account/images/icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../assets/account/images/icon-114x114.png">


    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>

    <div class="alice-bg section-padding">
      <div class="container">
        <div class="row justify-content-lg-center">
          <div class="col-lg-8">
            <div class="invoice-wrap">



              <div class="invoice">
              <div class="row">
             <div class="col-3 text-center">


                </div>

                 <div class="col-6 text-center">
                    <p>Your loan offer is</p>
                    <h3>60%</h3>
                    <span class="name">Fairly good offer!</span>
                    <p>you many need to check out Lenders with more seamless appliocation process and more excellent customer service</p>

                </div>

              <div class="col-4 text-center">


                </div>
              </div>

                <div class="invoice-table" >
                  <table class="table" >
                    <thead>
                      <tr>
                        <th scope="col"></th>
                         <th scope="col"></th>

                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Principal amount</td>
                        <td>₦<?= number_format($row['amount_given']) ?></td>
                      </tr>
                       <tr>
                        <td>Repayment amount</td>
                        <td>₦<?= number_format($row['amount_payback']) ?></td>
                      </tr>
                       <tr>
                        <td>Debt-to-income</td>
                        <td><?= round(($row['amount_given'] * 100)/ $user, 2) ?>%</td>
                      </tr>
                      <tr>
                        <td>Loan duration</td>
                        <td><?= $row['duration'] ?> month(s)</td>
                      </tr>

                      <tr>
                        <td>Total repayment</td>
                        <td>₦268,000.02</td>
                      </tr>
                      <tr>
                        <td>Montly rate</td>
                         <td><?= round($row['percent'] / $row['duration'], 1) ?>%</td>
                      </tr>
                      <tr>
                        <td>Loan life rate</td>
                        <td>46.64%</td>
                      </tr>
                      <tr>
                        <td>Repayment frquently</td>
                        <td>Monthly</td>
                      </tr>
                      <tr>
                        <td>Customer type</td>
                        <td><?= $row['customer_type'] ?></td>
                      </tr>
                      <tr>
                        <td>Loan type</td>
                        <td>Loan Type</td>
                      </tr>
                      <tr>
                        <td>Instrument</td>
                        <td><?= $row['instrument'] ?></td>
                      </tr>

                    </tbody>
                  </table>
                  <div class="invoice-print">
                    <a href="<?php echo $_SERVER['HTTP_REFERER'] ?>"><i data-feather="user"></i>Back</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../assets/account/assets/js/jquery.min.js"></script>
    <script src="../assets/account/assets/js/popper.min.js"></script>
    <script src="../assets/account/assets/js/bootstrap.min.js"></script>
    <script src="../assets/account/assets/js/feather.min.js"></script>
    <script src="../assets/account/assets/js/bootstrap-select.min.js"></script>
    <script src="../assets/account/assets/js/jquery.nstSlider.min.js"></script>
    <script src="../assets/account/assets/js/owl.carousel.min.js"></script>
    <script src="../assets/account/assets/js/visible.js"></script>
    <script src="../assets/account/assets/js/jquery.countTo.js"></script>
    <script src="../assets/account/assets/js/chart.js"></script>
    <script src="../assets/account/assets/js/plyr.js"></script>
    <script src="../assets/account/assets/js/tinymce.min.js"></script>
    <script src="../assets/account/assets/js/tinymce.min.js"></script>
    <script src="../assets/account/assets/js/slick.min.js"></script>
    <script src="../assets/account/assets/js/jquery.ajaxchimp.min.js"></script>

    <script src="../assets/account/js/custom.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC87gjXWLqrHuLKR0CTV5jNLdP4pEHMhmg"></script>
    <script src="../assets/account/js/map.js"></script>

  </body>

<!-- Mirrored from themerail.com/html/oficiona/invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Dec 2018 10:40:05 GMT -->
</html>
