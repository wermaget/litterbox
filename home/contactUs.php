<?php
$jfList = job_function()->list("isDeleted='0' order by `option` asc");
?>

<div style="padding-top: 40px;">
    <div class="container">
        <!--Start 2 panels -->
        <div class="about-us-content">
            <div class="block email">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="contact-form-wrapper">
                            <h2 class="title">Contact Us</h2>
                            <p class="subtitle">Let us know what you think by filling up the form below</p>
                            <form id="default-wizard" action="process.php?action=sendInquiry" method="POST"
                                  data-parsley-validate="">
                                <div class="row">
                                    <!-- Start Dropdown-->
                                    <div class="form-group">
                                        <label for="username">First Name <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" placeholder="First Name" name="firstName" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="username">Last Name <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" placeholder="Last Name" name="lastName" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="firstname">Our Services <span style="color: red;">*</span></label>
                                        <select class="form-control" name="jobFunctionId" required>
                                            <option>Please Select From Our Services</option>
                                            <?php foreach ($jfList as $row) { ?>
                                                <option value="<?= $row->Id; ?>"><?= $row->option; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="truncate-xs"><label for="username">Business Email <span
                                                        style="color: red;">*</span></label></div>
                                        <input type="text" class="form-control" placeholder="Business Email" name="workEmail" required>
                                    </div>

                                    <div class="form-group">
                                        <div class="truncate-xs"><label for="username">Business Phone <span
                                                        style="color: red;">*</span></label></div>
                                        <input type="text" class="form-control" placeholder="Business Phone" name="phoneNumber"
                                               data-mask="(02) 9999-9999" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="username">Postal Code <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" placeholder="Postal Code" name="zipCode" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="username">Message <span style="color: red;">*</span></label>
                                        <textarea id="message" class="form-control" placeholder="Leave a message..." name="message"
                                                  data-parsley-trigger="keyup" data-parsley-minlength="20"
                                                  data-parsley-minlength-message="Come on! You need to enter at least a 20 character comment.."
                                                  data-parsley-validation-threshold="10"></textarea>
                                    </div>
                                    <p class="form-description">This information will not be transferred, disclosed, or shared with a third party, or
                                        used for marketing purposes.</p>
                                    <div class="actions-toolbar">
                                        <button type="submit" class="action submit btn btn-primary stepy-finish"> SUBMIT</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contact-details-wrapper">
                            <!-- Start Form Container -->
                            <div class="">
                                <h3 class="">Still have questions?</h3>
                                <h5 class="" style="margin-bottom: 30px;">Payroll and Time Reporting Assistance</h5>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <strong>For Employers</strong>
                                        <p class=""><a href="#">hrcoordinator@teamire.com</a></p>
                                        <p class=" "><a href="#">1300 513 650 (AU only) & (+61) 433 374 955</a></p>
                                    </div>
                                    <div class="col-lg-12">
                                        <strong>For Job Seekers</strong>
                                        <p class=""><a href="#">jobs@teamire.com</a></p>
                                        <p class="">or <a href="#"> (+61) 433 374 955</a></p>
                                    </div>
                                </div>
                            </div> <!-- End Form -->
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Form Container -->
    </div>
</div>
<br>
