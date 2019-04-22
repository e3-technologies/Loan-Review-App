<?php
    $page = 'history';
    include('../core/logic.php');
    include('layouts/header.php');

    // User details
    $row = usersDetails($_SESSION['email']);

    $data = allReview();
?>

<div class="alice-bg section-padding-bottom">
    <div class="container no-gliters">
      <div class="row no-gliters">
        <div class="col">
          <div class="dashboard-container">
            <div class="dashboard-content-wrapper">
              <div class="dashboard-bookmarked">
                <h4 class="bookmark-title">Review History</h4>
                <div class="bookmark-area">

                <?php if ($data->num_rows > 0) : ?>
                    <?php while($rw = mysqli_fetch_assoc($data)) : ?>

                  <div class="job-list">
                    <div class="thumb">
                      <a href="#">
                        <img src="../assets/account/images/job/paylater.png" class="img-fluid" alt="">
                      </a>
                    </div>
                    <div class="body">
                      <div class="content">
                        <h4><a href="job-details.html"><?= $rw['loan_company'] ?></a></h4>
                        <div class="info">
                            <span class="company"><a href="#"><i data-feather="briefcase"></i>₦<?= number_format($rw['amount_given']) ?></a></span>
                          <span class="office-location"><a href="#"><i data-feather="map-pin"></i><?= round($rw['percent'],1); ?>%</a></span>
                          <span class="job-type full-time"><a href="#"><i data-feather="clock"></i><?= $rw['duration'] ?> month(s)</a></span>
                        </div>
                      </div>
                      <div class="more">
                        <div class="buttons">
                          <a href="#" class="button">Apply Now</a>
                          <a href="#" class="favourite"><i data-feather="heart"></i></a>
                        </div>
                        <a href="details.php?id=<?php echo$rw['id'] ?>" class="bookmark-remove"><i class="fas fa-eye"></i></a>
                        <p class="deadline"></p>
                      </div>
                    </div>
                  </div>

                <?php endwhile; ?>
            <?php else: ?>
                <h4><a href="job-details.html">No Result Found</a></h4>
            <?php endif; ?>

                </div>
              </div>
            </div>

              <!--==== Sidebar ===-->
              <?php include('layouts/sidebar.php'); ?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php include('layouts/footer.php'); ?>
