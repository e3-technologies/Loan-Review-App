<?php
    $page = "dashboard";
    include('../core/logic.php');
    include('layouts/header.php');

    $row = usersDetails($_SESSION['email']);
?>

  <div class="alice-bg section-padding-bottom">
    <div class="container no-gliters">
      <div class="row no-gliters">
        <div class="col">
          <div class="dashboard-container">
            <div class="dashboard-content-wrapper">
              <div class="dashboard-section user-statistic-block">
                <div class="user-statistic">
                  <i data-feather="pie-chart"></i>
                  <h3><?= totalReviews() ?></h3>
                  <span>Total Reviews</span>
                </div>
                <div class="user-statistic">
                  <i data-feather="briefcase"></i>
                  <h3>12</h3>
                  <span>Offer Accepted</span>
                </div>
                <div class="user-statistic">
                  <i data-feather="pie-chart"></i>
                  <h3>32</h3>
                  <span>Lenders Compared</span>
                </div>
              </div>
              <!-- <div class="dashboard-section dashboard-view-chart">
                <canvas id="view-chart" width="400" height="200"></canvas>
              </div> -->
             <!--  <div class="dashboard-section dashboard-recent-activity">
                <h4 class="title">Recent Activity</h4>
                <div class="activity-list">
                  <i class="fas fa-bolt"></i>
                  <div class="content">
                    <h5>Your Resume Updated!</h5>
                    <span class="time">5 hours ago</span>
                  </div>
                  <div class="close-activity">
                    <i class="fas fa-times"></i>
                  </div>
                </div>
                <div class="activity-list">
                  <i class="fas fa-arrow-circle-down"></i>
                  <div class="content">
                    <h5>Someone downloaded your resume.</h5>
                    <span class="time">11 hours ago</span>
                  </div>
                  <div class="close-activity">
                    <i class="fas fa-times"></i>
                  </div>
                </div>
                <div class="activity-list">
                  <i class="fas fa-check-square"></i>
                  <div class="content">
                    <h5>You applied for Project Manager @homeland</h5>
                    <span class="time">11 hours ago</span>
                  </div>
                  <div class="close-activity">
                    <i class="fas fa-times"></i>
                  </div>
                </div>
                <div class="activity-list">
                  <i class="fas fa-check-square"></i>
                  <div class="content">
                    <h5>You applied for Project Manager @homeland</h5>
                    <span class="time">5 hours ago</span>
                  </div>
                  <div class="close-activity">
                    <i class="fas fa-times"></i>
                  </div>
                </div>
                <div class="activity-list">
                  <i class="fas fa-user"></i>
                  <div class="content">
                    <h5>You changed password successfuly</h5>
                    <span class="time">2 days ago</span>
                  </div>
                  <div class="close-activity">
                    <i class="fas fa-times"></i>
                  </div>
                </div>
                <div class="activity-list">
                  <i class="fas fa-heart"></i>
                  <div class="content">
                    <h5>Someone bookmarked you</h5>
                    <span class="time">3 days ago</span>
                  </div>
                  <div class="close-activity">
                    <i class="fas fa-times"></i>
                  </div>
                </div>
              </div> -->
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
