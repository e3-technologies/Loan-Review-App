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
                        <h4><a href="details.php?id=<?php echo$rw['id'] ?>"><?= $rw['loan_company'] ?></a></h4>
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
                        <!-- <p class="deadline">Deadline: <?= $rw['date']; ?></p> -->
                      </div>
                    </div>
                  </div>

                <?php endwhile; ?>

                <?php $paginate = reviewPagination(); ?>

                <?php if (totalReviews() > 3) : ?>
                <div class="pagination-list text-center">
                  <nav class="navigation pagination">
                    <div class="nav-links">
                      <!-- <a class="prev page-numbers" href="#"><i class="fas fa-angle-left"></i></a> -->

                        <!-- PAGINATION -->
                        <?php for ($i=1; $i <= $paginate; $i++) : ?>
                            <?php if ($i == $_GET['page']) : ?>
                                <a class="page-numbers current" href="review_history.php?page=<?= $i; ?>"><?= $i; ?></a>
                            <?php elseif ($_GET['page'] == 0) : ?>
                                <a class="page-numbers current" href="review_history.php?page=1"><?= $i; ?></a>
                            <?php else : ?>
                                <a class="page-numbers" href="review_history.php?page=<?= $i; ?>"><?= $i; ?></a>
                            <?php endif; ?>
                        <?php endfor; ?>
                        <!-- END PAGINATION -->

                          <!-- <a class="next page-numbers" href="#"><i class="fas fa-angle-right"></i></a> -->
                        </div>
                      </nav>
                    </div>
                    <?php endif; ?>


            <?php else: ?>
                <h4>No Result Found</a></h4>
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
