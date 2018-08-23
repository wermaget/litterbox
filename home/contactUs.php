<?php
$jfList = job_function()->list("isDeleted='0' order by `option` asc");
?>

<div style="padding-top: 40px;">
    <div class="container">
        <div class="text-center m-b-20" style="font-size: 100px; color: #98a6ad;"><i class="fa fa-phone-square"></i>
        </div>
        <!--Start 2 panels -->
        <div class="container-80 center-page">
            <div class="row">
                <div class="col-lg-2">&nbsp;</div>
                <div class="col-12 col-lg-4 p-30">

                    <div class="portlet">
                        <div class="portlet-heading bg-primary">
                            <h3 class="portlet-title text-center center-page">
                                EMPLOYERS
                            </h3>
                            <div class="clearfix"></div>
                        </div>
                        <div id="bg-primary" class="panel-collapse collapse in show">
                            <div class="portlet-body center-page text-center">
                                Looking for the right candidate?
                                <div class="text-center m-b-10">
                                    <button class="btn-sm btn-primary btn-bordered"
                                            style="padding: 10px !important; width: 90%; font-size: 17px;"
                                            onclick="location.href='../home/?view=hiringForm'" role="button">REQUEST
                                        TALENT
                                    </button>
                                </div>
                                <div class="text-center m-b-10">
                                    <button class="btn-sm btn-primary btn-bordered"
                                            style="padding: 10px !important; width: 90%; font-size: 17px;"
                                            onclick="location.href='../home/?view=searchResume'" role="button">SEARCH
                                        CANDIDATE
                                    </button>
                                </div>
                                <div class="text-center m-b-10">
                                    <button class="btn-sm btn-primary btn-bordered"
                                            style="padding: 10px !important; width: 90%; font-size: 17px;"
                                            onclick="location.href='../home?view=employerFaq'" role="button">EMPLOYERS
                                        FAQ
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 p-30">
                    <div class="portlet">
                        <div class="portlet-heading bg-primary">
                            <h3 class="portlet-title text-center center-page">
                                JOB SEEKERS
                            </h3>
                            <div class="clearfix"></div>
                        </div>
                        <div id="bg-primary" class="panel-collapse collapse in show">
                            <div class="portlet-body center-page text-center">
                                Looking for a job? We can help.
                                <div class="text-center m-b-10">
                                    <button class="btn-sm btn-primary btn-bordered"
                                            style="padding: 10px !important; width: 90%; font-size: 17px;"
                                            onclick="location.href='../home/?view=submitResume'" role="button">SUBMIT
                                        YOUR RESUME
                                    </button>
                                </div>
                                <div class="text-center m-b-10">
                                    <button class="btn-sm btn-primary btn-bordered"
                                            style="padding: 10px !important; width: 90%; font-size: 17px;"
                                            onclick="location.href='../home/?view=searchJob'" role="button">SEARCH JOB
                                    </button>
                                </div>
                                <div class="text-center m-b-10">
                                    <button class="btn-sm btn-primary btn-bordered"
                                            style="padding: 10px !important; width: 90%; font-size: 17px;"
                                            onclick="location.href='../home?view=jobseekerFaq'" role="button">JOB SEEKER
                                        FAQ
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Start Form Container -->
            <div class="contact-form-container container center-page">
                <h3 class="">Still have questions?</h3>
                <h5 class="" style="margin-bottom: 30px;">Payroll and Time Reporting Assistance</h5>
                <div class="row">
                    <div class="col-lg-12" style="margin-bottom: 20px;">
                        <p class="">For Employers</p>
                        <p class=""><a href="#">hrcoordinator@teamire.com</a></p>
                        <p class=" "><a href="#">1300 513 650 (AU only) & (+61) 433 374 955</a></p>
                    </div>
                    <div class="col-lg-12">
                        <p class="">For Job Seekers</p>
                        <p class=""><a href="#">jobs@teamire.com</a></p>
                        <p class="">or <a href="#"> (+61) 433 374 955</a></p>
                    </div>
                </div>
                <hr class="h-line m-b-30 m-t-30" width="90%">

                <h3 class="">Send us an email</h3>
                <div class="col-md-12 center-page">
                    <form id="default-wizard" action="process.php?action=sendInquiry" method="POST"
                          data-parsley-validate="">
                        <div class="row">
                            <!-- Start Dropdown-->
                            <div class="p-r-10 w-50-p pull-left">
                                <div class="form-group">
                                    <label for="username">First Name <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="firstName" required>
                                </div>
                            </div>

                            <div class="p-l-10 w-50-p pull-left">
                                <div class="form-group">
                                    <label for="username">Last Name <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="lastName" required>
                                </div>
                            </div>

                            <div class="p-r-10 w-50-p pull-left">
                                <div class="form-group">
                                    <label for="firstname">Our Services <span style="color: red;">*</span></label>
                                    <select class="form-control" name="jobFunctionId" required>
                                        <option>Please Select</option>
                                        <?php foreach ($jfList as $row) { ?>
                                            <option value="<?= $row->Id; ?>"><?= $row->option; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="p-l-10 w-50-p pull-left">
                                <div class="form-group">
                                    <div class="truncate-xs"><label for="username">Business Email <span
                                                    style="color: red;">*</span></label></div>
                                    <input type="text" class="form-control" name="workEmail" required>
                                </div>
                            </div>

                            <div class="p-r-10 w-50-p pull-left">
                                <div class="form-group">
                                    <div class="truncate-xs"><label for="username">Business Phone <span
                                                    style="color: red;">*</span></label></div>
                                    <input type="text" class="form-control" name="phoneNumber"
                                           data-mask="(02) 9999-9999" required>
                                </div>
                            </div>

                            <div class="p-l-10 w-50-p pull-left">
                                <div class="form-group">
                                    <label for="username">Postal Code <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="zipCode" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="username">Message <span style="color: red;">*</span></label>
                                <textarea id="message" class="form-control" name="message"
                                          data-parsley-trigger="keyup" data-parsley-minlength="20"
                                          data-parsley-minlength-message="Come on! You need to enter at least a 20 character comment.."
                                          data-parsley-validation-threshold="10"></textarea>
                            </div>
                            <p>This information will not be transferred, disclosed, or shared with a third party, or
                                used for marketing purposes.</p>
                            <div class="text-center m-t-30 m-b-30">
                                <button type="submit" class="btn btn-primary stepy-finish"> SUBMIT</button>
                            </div>
                    </form>
                </div>
            </div> <!-- End Form -->
        </div> <!-- End Form Container -->
    </div>
</div>
<br>
