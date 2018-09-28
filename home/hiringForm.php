<?php
if (isset($_SESSION['company_session'])) {
    $jfList = job_function()->list("isDeleted='0' order by `option` asc");
    $ptList = position_type()->list();
    ?>
    <div class="row">
        <div class="col-sm-7 center-page">
            <form action="process.php?action=create" method="POST" id="default-wizard" data-parsley-validate=""
                  style="margin-bottom: 70px;">
                <div class="center-page container">
                    <div class="text-center" style="position:relative; padding: 27px 0;">
                        <h2 class="text-left"> Request Talent </h2>
                        <p class="text-left">We will help you build the workforce you desire quickly and effectively</p>
                    </div>

                    <div class="alert alert-warning hidden fade in">
                        <h4>Oh snap!</h4>
                        <p>This form seems to be invalid :(</p>
                    </div>

                    <div class="alert alert-info hidden fade in">
                        <h4>Yay!</h4>
                        <p>Everything seems to be ok :)</p>
                    </div>

                    <div>
                        <div>
                            <div class="row">
                                <div class="form-group">
                                    <label for="firstname">Job Category <span style="color: red;">*</span></label>
                                    <select class="form-control" name="jobFunctionId" required="">
                                        <option>Please Select</option>
                                        <?php
                                        foreach ($jfList as $row) {
                                            ?>
                                            <option value="<?= $row->Id; ?>"><?= $row->option; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="p-r-10 w-50-p pull-left">
                                    <div class="form-group">
                                        <div class="truncate-xs"><label for="username">Employment Type <span
                                                        style="color: red;">*</span></label></div>
                                        <select class="form-control" name="positionTypeId" required="">
                                            <option>Please Select</option>
                                            <?php foreach ($ptList as $row) { ?>
                                                <option value="<?= $row->Id; ?>"><?= $row->option; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="p-l-10 w-50-p pull-left">
                                    <div class="form-group">
                                        <div class="truncate-xs"><label for="username">Employee Location <span
                                                        style="color: red;">*</span></label></div>
                                        <select class="form-control" name="empLocation" required="">
                                            <option>Please Select</option>
                                            <option value="Onsite Staff">Onsite Staff</option>
                                            <option value="Remote Staff">Remote Staff</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="p-r-10 w-50-p pull-left">
                                    <div class="form-group">
                                        <div class="truncate-xs"><label for="username">No. of Job Position <span
                                                        style="color: red;">*</span></label></div>
                                        <input type="number" class="form-control" name="jobOpening" required="">
                                    </div>
                                </div>

                                <div class="p-l-10 w-50-p pull-left">
                                    <div class="form-group">
                                        <label for="username">End Date </label>
                                        <input type="date" name="endDate" class="form-control" placeholder="mm/dd/yyyy"
                                               id="datepicker-autoclose" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <div class="truncate-xs"><label for="username">Job Position <span
                                                    style="color: red;">*</span></label></div>
                                    <input type="text" class="form-control" name="position" required="">
                                </div>
                            </div>

                            <div class="row">
                                <div class="p-r-10 w-50-p pull-left">
                                    <div class="form-group">
                                        <div class="truncate-xs"><label for="username">Company Representative <span
                                                        style="color: red;">*</span></label></div>
                                        <input type="text" class="form-control" name="contactName" required="">
                                    </div>
                                </div>

                                <div class="p-l-10 w-50-p pull-left">
                                    <div class="form-group">
                                        <div class="truncate-xs"><label for="username">Company Representative Email
                                                <span
                                                        style="color: red;">*</span></label></div>
                                        <input type="email" class="form-control" name="workEmail"
                                               data-parsley-trigger="change" required="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="p-r-10 w-50-p pull-left">
                                    <div class="form-group">
                                        <label for="username">Company Name <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="company" required="">
                                    </div>
                                </div>

                                <div class="p-l-10 w-50-p pull-left">
                                    <div class="form-group">
                                        <label for="username">Company ABN</label>
                                        <input type="text" class="form-control" id="ltr" data-mask="99999999999"
                                               name="abn">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="p-r-10 w-50-p pull-left">
                                    <div class="form-group">
                                        <div class="truncate-xs"><label for="username">Company Representative Position
                                                <span
                                                        style="color: red;">*</span></label></div>
                                        <input type="text" class="form-control" name="jobTitle" required="">
                                    </div>
                                </div>

                                <div class="p-l-10 w-50-p pull-left">
                                    <div class="form-group">
                                        <label for="username">Business Phone <span style="color: red;">*</span></label>
                                        <input type="text" placeholder="" id="ltr2" data-mask="(+61) 999-999-999"
                                               class="form-control" name="businessPhone" required="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="p-r-10 w-50-p pull-left">
                                    <div class="form-group">
                                        <label for="username">Postal Code <span style="color: red;">*</span></label>
                                        <input type="text" placeholder="" id="ltr3" data-mask="9999"
                                               class="form-control"
                                               name="zipCode" required="">
                                    </div>
                                </div>

                                <div class="p-l-10 w-50-p pull-left">
                                    <div class="form-group">
                                        <div class="truncate-xs"><label for="username">Required Experience <span
                                                        style="color: red;">*</span></label></div>
                                        <select class="form-control" name="requiredExperience" required="">
                                            <option>Please Select</option>
                                            <option value="0-1 Year">0-1 Year</option>
                                            <option value="1-3 Years">1-3 Years</option>
                                            <option value="3-5 Years">3-5 Years</option>
                                            <option value="5-7 Years">5-7 Years</option>
                                            <option value="7-10 Years">7-10 Years</option>
                                            <option value="10+ Years Years">10+ Years</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <label for="username">Company Address <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" name="address" required="">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <label for="username">Key Skills </label>
                                    <input type="text" class="form-control" name="keySkills">
                                    <span class="help-block"><small>Separate with comma ",".</small></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <label for="username">Tell us your hiring needs</label>

                                    <textarea id="message" class="form-control" name="comment"
                                              data-parsley-trigger="keyup" data-parsley-minlength="20"
                                              data-parsley-minlength-message="Come on! You need to enter at least a 20 character comment.."
                                              data-parsley-validation-threshold="10"></textarea>
                                </div>
                            </div>
                            <div class="actions-toolbar">
                                <button type="submit" class="action btn btn-primary stepy-finish"> SEND REQUEST</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- End row -->
    <?php
}else {
    echo '<script>window.location.href = "../home";</script>';
}
?>