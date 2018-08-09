<?php
$success = (isset($_GET['success']) && $_GET['success'] != '') ? $_GET['success'] : '';
$Id = $_GET['Id'];
$job = job()->get("Id=$Id");

$checkAccount = company()->get("email='$job->workEmail'");

$jfList = job_function()->list("isDeleted='0' order by `option` asc");
$ptList = position_type()->list();

function getJobFunction($Id){
  $jf = job_function()->get("Id='$Id'");
  echo $jf->option;
}

function getPosition($Id){
  $pt = position_type()->get("Id='$Id'");
  echo $pt->option;
}

function formatDate($val){
  $date = date_create($val);
  return date_format($date, "F d, Y");
}
?>

<div class="container container-fluid">
  <?php if($success){?>
  <div class="alert alert-success alert-dismissible fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert"
              aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
      <?=$success;?>
  </div>
<?php }?>
  <div class="col-12 m-t-30 m-b-30">
    <h2 class="text-black"><?=$job->position;?></h2>
        <p><label class="m-r-5">Required Experience: </label><span class="text-black"><?=$job->requiredExperience;?></span></p>
        <p><label class="m-r-5">Company: </label><span class="text-black"><?=$job->company;?></span></p>
        <p><label class="m-r-5">Address: </label><span class="text-black"><?=$job->address;?></span></p>
        <div class="row">
          <div class="col-lg-6">
            <p><label class="m-r-5">Postal Code: </label><span class="text-black"><?=$job->zipCode;?></span></p>
          </div>
          <div class="col-lg-6">
            <p><label class="m-r-5">Rate: </label><span class="text-black"><?=$job->rate;?></span></p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <p><label class="m-r-5">Job Category: </label><span class="text-black"><?=getJobFunction($job->jobFunctionId);?></span></p>
          </div>
          <div class="col-lg-6">
            <p><label class="m-r-5">Employement Type: </label><span class="text-black"><?=getPosition($job->positionTypeId);?></span></p>
          </div>
        </div>

        <p><label class="m-r-5">Employment Location: </label><span class="text-black"><?=$job->empLocation;?></span></p>
        <div class="row m-t-20">
          <div class="col-lg-6">
            <label class="m-r-5">Contact Person: </label><span class="text-black"><?=$job->contactName;?></span>
            <br>
            <span class="text-black"><?=$job->jobTitle;?></span>
          </div>
          <div class="col-lg-6">
            <i class="fa fa-envelope m-r-5"></i><span class="text-black"><?=$job->workEmail;?></span>
            <br>
            <i class="fa fa-phone m-r-5"></i><span class="text-black"><?=$job->businessPhone;?></span>
          </div>
        </div>
    <div class="clearfix"></div>
    <div class="row m-t-20">
      <div class="col-lg-6">
        <p><label class="m-r-5">ABN:</label><span class="text-black"><?=$job->abn;?></span></p>
      </div>
      <div class="col-lg-6">
        <p><label class="m-r-5">Reference Number:</label><span class="text-black"><?=$job->refNum;?></span></p>
      </div>
    </div>
    <p><label class="m-r-5">Job Openings: </label><span class="text-black"><?=$job->jobOpening;?></span></p>
    <p><label class="m-r-5">Key Skills: </label><span class="text-black"><?=$job->keySkills;?></span></p>
    <div class="row m-t-20">
      <div class="col-lg-6">
        <p><label class="m-r-5">Created at: </label><span class="text-black"><?=formatDate($job->createDate);?></span></p>
      </div>
      <div class="col-lg-6">
        <p><label class="m-r-5">End Date: </label><span class="text-black"><?=formatDate($job->endDate);?></span></p>
      </div>
    </div>
    <div>
      <?php if($job->endDate < date("Y-m-d")) { ?>
        <label>Job Status</label>: <span class=" btn btn-danger btn-xs tooltips">Closed</span>
      <?php }else{ ?>
        <label>Job Status</label>: <span class=" btn btn-success btn-xs tooltips">Open</span>
      <?php } ?>
    </div>
    <div class="clearfix"></div>
    <hr>
    <h3>Comment</h3>
    <span class="text-black"><?=nl2br($job->comment);?></span>
    <hr>
        <!--  This button only shows if job is approved -->
        <?php if($job->isApproved==0) {?>
          <?php if($checkAccount) { ?>
            <button class="btn btn-blue" type="button" onclick="location.href='process.php?action=jobRequest&result=approve&Id=<?=$job->Id?>'">Approve</button>
          <?php } else { ?>
            <button class="btn btn-default" type="button">No Account Yet</button>
          <?php } ?>
          <button class="btn btn-warning" type="button" onclick="location.href='process.php?action=jobRequest&result=moreInfo&Id=<?=$job->Id?>'">Request for more info</button>
          <button class="btn btn-success" type="button" data-toggle="modal" data-target="#update-information-modal">Update Info</button>
        <?php } ?>
        <?php if($job->isApproved==-1) {?>
          <button class="btn btn-warning" type="button">Waiting for the updated info</button>
        <?php } ?>
        <br>

        <?php if($job->isApproved==1) {?>
          <div class="center-page text-center">
          <h3 class="m-b-30">Detail</h3>
          <div class="row col-12">
            <div class="col-lg-4">
          <button class="btn btn-blue" onclick="location.href='?view=employeeList&jobId=<?=$job->Id?>&status=1'">
              View <?=employee()->count("jobId=$job->Id and status=1");?> employees
          </button>
        </div>
        <div class="col-lg-4">
          <button class="btn btn-warning" onclick="location.href='?view=timesheetList&jobId=<?=$job->Id?>'">
              View <?=timesheet()->count("jobId=$job->Id");?> timesheets
          </button>
        </div>
        <div class="col-lg-4">
          <button class="btn btn-success" onclick="location.href='?view=resumeList&jobId=<?=$job->Id?>&isHired=0'">
              View <?=application()->count("jobId=$job->Id and isHired=0");?> applicants
          </button>
        </div>
        </div>
        <br>
        <button class="btn btn-success" type="button" data-toggle="modal" data-target="#update-information-modal">Update Info</button>
        <div class="clearfix"></div>
        <br>
        <br>
        <?php } ?>
        <br><br><br><br>
      </div>

<!-- all modals will be here -->

<!-- dispute modal content -->
<div id="update-information-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

            <div class="modal-body">
                <h2 class="text-uppercase text-center m-b-30">
                    <a href="index.html" class="text-success">
                        <span><img src="assets/images/logo_dark.png" alt="" height="30"></span>
                    </a>
                </h2>

                <form class="form-horizontal" action="process.php?action=updateInformation&Id=<?=$Id;?>" method="post">
                  <div class="p-r-10 w-50-p pull-left">
                  <div class="form-group">
                      <label for="username">Job Position <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="position" value="<?=$job->position;?>" required="">
                  </div>
                  </div>

                  <div class="p-l-10 w-50-p pull-left">
                  <div class="form-group">
                      <label for="username">Company <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="company" value="<?=$job->company;?>" required="">
                  </div>
                  </div>

                  <div class="p-r-10 w-50-p pull-left">
                    <div class="form-group">
                      <label>Employment Type <span style="color:red;">*</span></label>
                      <select class="form-control" name="positionTypeId" required="">
                        <option value="<?=$job->positionTypeId;?>"><?=getPosition($job->positionTypeId);?></option>
                        <?php foreach($ptList as $row){?>
                          <option value="<?=$row->Id;?>"><?=$row->option;?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="p-l-10 w-50-p pull-left">
                    <div class="form-group">
                        <label for="firstname">Job Category <span style="color: red;">*</span></label>
                        <select class="form-control" name="jobFunctionId" required="">
                         <option value="<?=$job->jobFunctionId;?>"><?=getJobFunction($job->jobFunctionId);?></option>
                          <?php foreach($jfList as $row) {?>
                            <option value="<?=$row->Id;?>"><?=$row->option;?></option>
                          <?php } ?>
                        </select>
                    </div>
                  </div>

                  <div class="p-r-10 w-50-p pull-left">
                  <div class="form-group">
                      <label for="username">Contact Person <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="contactName" value="<?=$job->contactName;?>" required="">
                  </div>
                  </div>

                  <div class="p-l-10 w-50-p pull-left">
                  <div class="form-group">
                      <label for="username">Representative Position <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="jobTitle" value="<?=$job->jobTitle;?>" required="">
                  </div>
                  </div>

                  <div class="p-r-10 w-50-p pull-left">
                  <div class="form-group">
                      <label for="username">Representative Email <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="workEmail" value="<?=$job->workEmail;?>" required="">
                  </div>
                  </div>

                  <div class="p-l-10 w-50-p pull-left">
                  <div class="form-group">
                      <label for="username">Business Phone <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="businessPhone" value="<?=$job->businessPhone;?>" required="">
                  </div>
                  </div>

                  <div class="p-r-10 w-50-p pull-left">
                    <div class="form-group">
                        <label for="username">Employee Location <span style="color: red;">*</span></label>
                        <select class="form-control" name="empLocation" required="">
                          <option value="<?=$job->empLocation;?>"><?=$job->empLocation;?></option>
                          <option value="Onsite Staff">Onsite Staff</option>
                          <option value="Remote Staff">Remote Staff</option>
                        </select>
                    </div>
                  </div>

                  <div class="p-l-10 w-50-p pull-left">
                  <div class="form-group">
                      <label for="username">ABN </label>
                      <input type="text" class="form-control" name="abn" value="<?=$job->abn;?>">
                  </div>
                  </div>

                  <div class="p-r-10 w-50-p pull-left">
                  <div class="form-group">
                      <label for="username">Postal Code <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="zipCode" value="<?=$job->zipCode;?>" required="">
                  </div>
                  </div>

                  <div class="p-l-10 w-50-p pull-left">
                  <div class="form-group">
                      <label for="username">Rate </label>
                      <input type="text" class="form-control" name="rate" value="<?=$job->rate;?>">
                  </div>
                  </div>

                  <div class="form-group">
                      <label for="username">Company Address <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="address" value="<?=$job->address;?>" required="">
                  </div>

                  <div class="form-group">
                      <label for="username">Key Skills </label>
                      <input type="text" class="form-control" name="keySkills" value="<?=$job->keySkills;?>">
                  </div>

                  <div class="form-group">
                      <label>Hiring Needs</label>
                      <div>
                          <textarea required="" name="comment" class="form-control"><?=$job->comment;?></textarea>
                      </div>
                  </div>


                    <div class="form-group account-btn text-center m-t-10">
                        <div class="col-xs-12">
                            <button class="btn w-lg btn-rounded btn-lg btn-custom waves-effect waves-light" type="submit">Submit</button>
                        </div>
                    </div>

                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
