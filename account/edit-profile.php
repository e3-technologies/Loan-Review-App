<?php
    $page = "edit";
    include('../core/logic.php');
    include('../core/edit_profile.php');
    include('layouts/header.php');

      $row = usersDetails($_SESSION['email'])
?>



     <div class="alice-bg section-padding-bottom">
      <div class="container no-gliters">
        <div class="row no-gliters">
          <div class="col">
            <div class="dashboard-container">
              <div class="dashboard-content-wrapper">
               <!--  <?php echo $su_edit; ?> -->
                <form action="" method="post" enctype="multipart/form-data"  class="dashboard-form">
                  <div class="dashboard-section upload-profile-photo">
                    <div class="update-photo">
                     <?php editProfilePic($row['image'])  ?>
                    </div>
                    <div class="file-upload">
                      <input type="file" name="filename"  class="file-input">
                      <input type="hidden" name="filename2" value="<?php echo $row['image'] ?>">

                      Change Picture
                    </div>

                  </div>

                  <div class="dashboard-section basic-info-input">
                    <h4><i class="fa fa-user" style="color: lightblue"></i>  Personal Details</h4>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Full Name</label>
                      <div class="col-sm-9">
                        <p><?php echo $row['name'] ?></p>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Gender</label>
                      <div class="col-sm-9">
                      <p><?php echo $row['gender'] ?></p>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Date of Birthday</label>
                      <div class="col-sm-9">
                       <p><?php echo $row['dob'] ?></p>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Email Address</label>
                      <div class="col-sm-9">
                       <p><?php echo $row['email'] ?></p>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Phone</label>
                      <div class="col-sm-9">
                        <p><?php echo $row['phone'] ?></p>
                      </div>
                    </div>




                    <div id="job-summery" class="row">
                      <label class="col-md-3 col-form-label">State & City</label>
                      <div class="col-md-9">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <p><?php echo $row['state'] ?></p>


                            </div>
                          </div>
                           <div class="col-md-6">
                            <div class="form-group">
                               <p><?php echo $row['lga'] ?></p>

                            </div>
                          </div>

                        </div>
                      </div>
                    </div>

                   <!-- MODAL BUTTON FOR PERSONAL INFORMATION -->
                     <button type="button" class="btn btn-primary edit-resume" data-toggle="modal" data-target="#modal-personal-details">
                    <i data-feather="edit-2"></i>
                  </button>


                  <!-- START MODAL FOR PERSONAL INFORMATION -->
                  <!-- Modal -->
                  <div class="modal fade" id="modal-personal-details" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-body">
                          <div class="title">
                            <h4><i data-feather="user-plus"></i>Personal Details</h4>
                          </div>
                          <div class="content">
                            <form action="" method="post">
                              <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Full Name</label>
                      <div class="col-sm-9">
                        <input type="text" name="name" value="<?php echo $row['name'] ?>" class="form-control" >
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Gender</label>
                      <div class="col-sm-9">
                       <select name="gender" class="form-control">
                           <option value="<?php echo $row['gender'] ?>"><?php echo $row['gender'] ?></option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>

                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Date of Birthday</label>
                      <div class="col-sm-9">
                        <input type="date" required="" name="dob" value="<?php echo $row['dob'] ?>" class="form-control" >
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Email Address</label>
                      <div class="col-sm-9">
                        <input type="email" name="email" value="<?php echo $row['email'] ?>" class="form-control" >
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Phone</label>
                      <div class="col-sm-9">
                        <input type="text" name="phone" type="input" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"  value="<?php echo $row['phone'] ?>" class="form-control" >
                      </div>
                    </div>


                    <div id="job-summery" class="row">
                      <label class="col-md-3 col-form-label">State & City</label>
                      <div class="col-md-9">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <select class="form-control" name="state" id="state" onchange="change_location();">
                                 <option><?php echo $row['state'] ?></option>
                                        <?php
                                      while ($re_st = mysqli_fetch_array($stlg)) {
                                      echo '<option value="'.$re_st['name'].'" >
                                      '.$re_st['name'].'</option>';
                                               }
                                             ?>
                                      </select>

                              <i class="fa fa-caret-down"></i>
                            </div>
                          </div>
                           <div class="col-md-6">
                            <div class="form-group">
                               <select required=""  name="lga" id="city" class="form-control" name="choose-state">
                                            <option><?php echo $row['lga'] ?></option>

                              </select>
                              <i class="fa fa-caret-down"></i>
                            </div>
                          </div>

                        </div>
                      </div>

                              </div>
                              <div class="row">
                                <div class="offset-sm-3 col-sm-9">
                                  <div class="buttons">
                                    <button name="personal-info" type="submit" class="button">Save Change</button>
                                    <button class="button" data-dismiss="modal">Cancel</button>
                                  </div>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- END MODAL FOR PERSONAL INFORMATION -->



                  </div>
                  <br>
                   <div class="dashboard-form">
                  <div class="dashboard-section basic-info-input">
                    <h4><i class="fa fa-suitcase " style="color: lightblue"> </i>  Employment Info</h4>
                     <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Employer</label>
                      <div class="col-sm-9">
                        <p><?php echo $row['employer'] ?></p>
                      </div>
                    </div>
                     <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Industry</label>
                      <div class="col-sm-9">
                        <p><?php echo $row['industry'] ?></p>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Sector</label>
                      <div class="col-sm-9">
                       <p><?php echo $row['sector'] ?></p>

                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Sub-Sector</label>
                      <div class="col-sm-9">
                        <p><?php echo $row['subsector'] ?></p>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Commencement Date</label>
                      <div class="col-sm-9">
                        <p><?php echo $row['commencement_date'] ?></p>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Contract Type</label>
                      <div class="col-sm-9">
                        <p><?php echo $row['contract_type'] ?></p>

                      </div>
                    </div>


                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Net Pay(Salary)</label>
                      <div class="col-sm-9">
                       <p><?php echo $row['net_pay'] ?></p>
                      </div>
                    </div>





                <!-- MODAL BUTTON FOR EMPLOYMENT INFORMATION -->
                     <button type="button" class="btn btn-primary edit-resume" data-toggle="modal" data-target="#modal-employment-details">
                    <i data-feather="edit-2"></i>
                  </button>


                  <!-- START MODAL FOR EMPLOYMENT INFORMATION -->
                  <!-- Modal -->
                  <div class="modal fade" id="modal-employment-details" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-body">
                          <div class="title">
                            <h4><i data-feather="user-plus"></i>Employment Details</h4>
                          </div>
                          <div class="content">
                            <form method="post">
                             <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Employer</label>
                      <div class="col-sm-9">
                        <input type="text" name="employer" class="form-control" value="<?php echo $row['employer'] ?>" >
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Industries</label>
                      <div class="col-sm-9">
                        <select name="industry" class="form-control">
                           <option value="<?php echo $row['industry'] ?>"><?php echo $row['industry'] ?></option>
                          <option value="Agriculture">Agriculture</option>
                          <option value="Technology">Technology</option>

                        </select>

                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Sector</label>
                      <div class="col-sm-9">
                        <select name="sector" class="form-control">
                           <option value="<?php echo $row['sector'] ?>"><?php echo $row['sector'] ?></option>
                          <option value="Agriculture">Agriculture</option>
                          <option value="Technology">Technology</option>

                        </select>

                      </div>
                    </div>


                  <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Sub-Sector</label>
                      <div class="col-sm-9">
                        <select name="subsector" class="form-control">
                           <option value="<?php echo $row['subsector'] ?>"><?php echo $row['subsector'] ?></option>
                          <option value="Agriculture">Agriculture</option>
                          <option value="Technology">Technology</option>

                        </select>

                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Date Employed</label>
                      <div class="col-sm-9">
                        <input type="date" name="commencement_date" class="form-control" value="<?php echo $row['commencement_date'] ?>" >
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Contract Type</label>
                      <div class="col-sm-9">
                        <select name="contract_type" class="form-control">
                           <option value="<?php echo $row['contract_type'] ?>"><?php echo $row['contract_type'] ?></option>
                          <option value="Full-time">Full time</option>
                          <option value="Part-time">Part-time</option>

                        </select>

                      </div>
                    </div>



                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Net Pay(Salary)</label>
                      <div class="col-sm-9">
                        <input  name="net_pay" value="<?php echo $row['net_pay'] ?>" type="input" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"   class="form-control" >
                      </div>
                    </div>




                              <div class="row">
                                <div class="offset-sm-3 col-sm-9">
                                  <div class="buttons">
                                    <button name="employment-info" type="submit" class="button">Save Change</button>
                                    <button class="button" data-dismiss="modal">Cancel</button>
                                  </div>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- END MODAL FOR PERSONAL INFORMATION -->

                    <br>
                    <div class="dashboard-form">
                    <div class="dashboard-section basic-info-input">
                    <h4><i class="fa fa-users " style="color: lightblue"> </i>  Social Info</h4>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Marital Status</label>
                      <div class="col-sm-9">
                        <p><?php echo $row['marital_status'] ?></p>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Accomodation Status</label>
                      <div class="col-sm-9">
                       <p><?php echo $row['accomodation_status'] ?></p>

                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Dependencies</label>
                      <div class="col-sm-9">
                       <p><?php echo $row['dependencies'] ?></p>
                      </div>


                       <!-- MODAL BUTTON FOR EMPLOYMENT INFORMATION -->
                     <button type="button" class="btn btn-primary edit-resume" data-toggle="modal" data-target="#modal-social-details">
                    <i data-feather="edit-2"></i>
                  </button>


                  <!-- START MODAL FOR EMPLOYMENT INFORMATION -->
                  <!-- Modal -->
                  <div class="modal fade" id="modal-social-details" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-body">
                          <div class="title">
                            <h4><i data-feather="user-plus"></i>Social Details</h4>
                          </div>
                          <div class="content">
                            <form method="post">
                             <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Marital Status</label>
                      <div class="col-sm-9">
                        <select name="marital_status" class="form-control">
                           <option value="<?php echo $row['marital_status'] ?>"><?php echo $row['marital_status'] ?></option>
                          <option value="Single">Single</option>
                          <option value="Married">Married</option>
                          <option value="Divorced">Divorced</option>

                        </select>

                      </div>
                    </div>


                     <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Accomodation Status</label>
                      <div class="col-sm-9">
                        <select name="accomodation_status" class="form-control">
                           <option value="<?php echo $row['accomodation_status'] ?>"><?php echo $row['accomodation_status'] ?></option>
                          <option value="Landlord">Landlord</option>
                          <option value="Tenant">Tenant</option>

                        </select>

                      </div>
                    </div>


                       <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Dependencies</label>
                      <div class="col-sm-9">
                        <select name="dependencies" class="form-control">
                           <option value="<?php echo $row['dependencies'] ?>"><?php echo $row['dependencies'] ?></option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>

                        </select>

                      </div>
                    </div>





                              <div class="row">
                                <div class="offset-sm-3 col-sm-9">
                                  <div class="buttons">
                                    <button name="social-info" type="submit" class="button">Save Change</button>
                                    <button class="button" data-dismiss="modal">Cancel</button>
                                  </div>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- END MODAL FOR PERSONAL INFORMATION -->

                   </div>
                 </div>
               </div>

                  </div>
                </div>
              </div>





                <!--==== Sidebar ===-->
                <?php

                include('layouts/sidebar.php'); ?>


                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

 <?php include('layouts/footer.php'); ?>
