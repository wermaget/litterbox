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

function getPositionName($Id){
  $job = position_type()->get("Id='$Id'");
  echo $job->option;
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
    <h2 class=""><?=$job->position;?></h2>
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
            <p><label class="m-r-5">Employement Type: </label><span class="text-black"><?=getPositionName($job->positionTypeId);?></span></p>
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
    <h3>Hiring Needs</h3>
    <p class="text-black"><?=nl2br($job->comment);?></p>
    <hr>

        <!--  This button only shows if job is approved -->
        <?php if($job->isApproved==0) {?>
          <?php if($checkAccount) { ?>
            <button class="btn btn-lg btn-blue" type="button" onclick="location.href='process.php?action=jobRequest&result=approve&Id=<?=$job->Id?>'">Approve</button>
          <?php } else { ?>
            <button class="btn btn-lg btn-default" type="button">No Account Yet</button>
          <?php } ?>
          <button class="btn btn-lg btn-warning" type="button" onclick="location.href='process.php?action=jobRequest&result=moreInfo&Id=<?=$job->Id?>'">Request for more info</button>
          <button class="btn btn-lg btn-success" type="button" data-toggle="modal" data-target="#update-information-modal">Update Info</button>
        <?php } ?>
        <?php if($job->isApproved==-1) {?>
          <button class="btn btn-lg btn-warning" type="button">Waiting for the updated info</button>
        <?php } ?>
        <?php if($job->isApproved==1) {?>
          <button class="btn btn-lg btn-blue" onclick="location.href='?view=employeeList&jobId=<?=$job->Id?>&status=1'">
              View <?=employee()->count("jobId=$job->Id and status=1");?> employees
          </button>
          <button class="btn btn-lg btn-warning" onclick="location.href='?view=timesheetList&jobId=<?=$job->Id?>'">
              View <?=timesheet()->count("jobId=$job->Id");?> timesheets
          </button>
          <button class="btn btn-lg btn-success" onclick="location.href='?view=resumeList&jobId=<?=$job->Id?>&isHired=0'">
              View <?=application()->count("jobId=$job->Id and isHired=0");?> applicants
          </button>
          <button class="btn btn-lg btn-success" type="button" data-toggle="modal" data-target="#update-information-modal">Update Info</button>
        <?php } ?>
          <button class="btn btn-lg btn-danger" type="button" onclick="location.href='process.php?action=deleteJob&Id=<?=$job->Id?>'">Delete</button>
        <br><br><br><br>
  </div>
</div>
<!-- all modals will be here -->
<div class="clearfix"></div>
<!-- dispute modal content -->
<div id="update-information-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div style="width:700px;" class="modal-dialog">
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
                      <label for="username">Employment Type <span style="color: red;">*</span></label>
                      <select class="form-control" name="positionTypeId" required="">
                      <option value="<?=$job->positionTypeId;?>"><?=getPositionName($job->positionTypeId);?></option>
                        <?php foreach($ptList as $row) {?>
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
                      <label for="username">End Date </label>
                      <input type="date" name="endDate" class="form-control" value="<?=$job->endDate;?>" id="datepicker-autoclose" required>
                  </div>

                  <div class="form-group">
                      <label for="username">Key Skills </label>
                      <input type="text" class="form-control" name="keySkills" value="<?=$job->keySkills;?>">
                  </div>

                  <div class="form-group">
                      <label>Hiring Needs</label>
                      <div>
                          <textarea name="comment" class="form-control" required=""><?=$job->comment;?></textarea>
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
