<!-- Dashboard Menu -->
<div class="dashboard-sidebar">
	<div class="user-info">
		<div class="thumb">
			<?php profilePic($row['image'])  ?>
			<!-- <img src="dashboard/images/user-1.jpg" class="img-fluid" alt=""> -->
		</div>
		<div class="user-body">
			<h5><?php echo $_SESSION['name'] ?></h5>
		</div>
	</div>
	<div class="profile-progress">
		<div class="progress-item">
			<div class="progress-head">
		</div>
	</div>
</div>


<div class="dashboard-menu">
    <ul>
        <li class="<?php if($page == 'dashboard'){echo 'active';} ?>"><i class="fas fa-home"></i><a href="index.php">Dashboard</a></li>
        <li class="<?php if($page == 'edit'){echo 'active';} ?>"><i class="fas fa-user"></i><a href="edit-profile.php">Edit Profile</a></li>
        <li class="<?php if($page == 'history'){echo 'active';} ?>"><i class="fas fa-list"></i><a href="review_history.php?page=1">Review History</a></li>
        <li class="<?php if($page == 'review'){echo 'active';} ?>"><i class="fas fa-calculator"></i><a href="review.php">Add review</a></li>
        </ul>
        <ul class="delete">
        <li><i class="fas fa-power-off"></i><a href="../core/logout.php">Logout</a></li>
        <!-- <li><i class="fas fa-trash-alt"></i><a href="#" data-toggle="modal" data-target="#modal-delete">Delete Profile</a></li> -->
    </ul>
    <!-- //End -->

    <!-- Modal -->
    <div class="modal fade modal-delete" id="modal-delete" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
				<div class="modal-body">
					<h4><i data-feather="trash-2"></i>Delete Account</h4>
					<p>Are you sure! You want to delete your profile. This can't be undone!</p>
					<form action="#">
						<div class="form-group">
							<input type="password" class="form-control" placeholder="Enter password">
						</div>
						<div class="buttons">
							<button class="delete-button">Save Update</button>
							<button class="">Cancel</button>
						</div>
						<div class="form-group form-check">
							<input type="checkbox" class="form-check-input" checked="">
							<label class="form-check-label">You accepts our <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a></label>
						</div>
					</form>
				</div>
            </div>
        </div>
    </div>
