<?php
$error = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '';
$jfList = job_function()->list("isDeleted='0' order by `option` asc");
?>
<div class="row">
    <div class="col-md-12">
        <div class="center-page container">
            <form id="default-wizard" action="process.php?action=clientRequest" method="POST" data-parsley-validate=""
                <div class="row m-t-20">
                    <div class="col-sm-7 center-page">
                        <div class="" style="position:relative;">
                            <h2> Employer Registration Form </h2>
                        </div>
                        <?php if ($error) { ?>
                            <div>
                                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <?= $error; ?>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="form-group">
                            <label for="firstname">Job Category <span style="color: red;">*</span></label>
                            <select class="form-control" name="jobFunctionId" required>
                                <option value="" disabled selected>Please Select</option>
                                <?php foreach ($jfList as $row) { ?>
                                    <option value="<?= $row->Id; ?>"><?= $row->option; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="username">Department <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="department" required>
                        </div>

                        <div class="row" style="max-width: 640px; margin: 0 auto;">
                            <div class="p-r-10 w-50-p pull-left">
                                <div class="form-group">
                                    <div class="truncate-xs"><label for="username">Employer's Company Name <span
                                                    style="color: red;">*</span></label></div>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                            </div>

                            <div class="p-l-10 w-50-p pull-left">
                                <div class="form-group">
                                    <label for="username">Employer ABN </label>
                                    <input type="text" class="form-control" id="ltr" data-mask="99999999999" name="abn">
                                </div>
                            </div>
                        </div>

                        <div class="p-r-10 w-50-p pull-left">
                            <div class="form-group">
                                <div class="truncate-xs"><label for="firstname">Employer Representative <span
                                                style="color: red;">*</span></label></div>
                                <input type="text" class="form-control" name="contactPerson" required>
                            </div>
                        </div>

                        <div class="p-l-10 w-50-p pull-left">
                            <div class="form-group">
                                <div class="truncate-xs"><label for="username">Company Representative Email <span
                                                style="color: red;">*</span></label></div>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username">Business Address <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="address" required>
                        </div>

                        <div class="p-r-10 w-50-p pull-left">
                            <div class="form-group">
                                <div class="truncate-xs"><label for="username">Business Phone Registration <span
                                                style="color: red;">*</span></label></div>
                                <input type="text" class="form-control" id="ltr2" name="phoneNumber"
                                       data-mask="(+61) 999-999-999" required>
                            </div>
                        </div>

                        <div class="p-l-10 w-50-p pull-left">
                            <div class="form-group">
                                <div class="truncate-xs"><label for="username">Business Mobile Number <span
                                                style="color: red;">*</span></label></div>
                                <input type="text" class="form-control" id="ltr3" name="mobileNumber" placeholder=""
                                       data-mask="(+61) 999-999-999" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username">Please provide a brief description of your company <span
                                        style="color: red;">*</span></label>
                            <textarea id="message" class="form-control" name="description"
                                      data-parsley-trigger="keyup" data-parsley-minlength="20"
                                      data-parsley-minlength-message="Come on! You need to enter at least a 20 character comment.."
                                      data-parsley-validation-threshold="10" required></textarea>
                        </div>
                        <div class="actions-toolbar">
                            <button type="submit" class="action btn btn-primary stepy-finish"> SEND REQUEST</button>
                        </div>
                    </div>

            </form>
        </div>
    </div>
</div>
<!-- End row -->
<script>
    var textBox = document.getElementById("ltr");


    textBox.onfocus = function () {
        moveCaretToStart(textBox);

        // Work around Chrome's little problem
        window.setTimeout(function () {
            moveCaretToStart(textBox);
        }, 1);
    };
    var textBox2 = document.getElementById("ltr2");


    textBox2.onfocus = function () {
        moveCaretToStart(textBox2);

        // Work around Chrome's little problem
        window.setTimeout(function () {
            moveCaretToStart(textBox2);
        }, 1);
    };
    var textBox3 = document.getElementById("ltr3");


    textBox3.onfocus = function () {
        moveCaretToStart(textBox3);

        // Work around Chrome's little problem
        window.setTimeout(function () {
            moveCaretToStart(textBox3);
        }, 1);
    };
</script>