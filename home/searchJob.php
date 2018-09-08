<?php
$s = (isset($_GET['s']) && $_GET['s'] != '') ? $_GET['s'] : '';
$c = (isset($_GET['c']) && $_GET['c'] != '') ? $_GET['c'] : '';
$jobList = job()->list("position like '%$s%' and jobFunctionId=$c and isDeleted=0");

$jobFunctionList = job_function()->list("isDeleted=0 order by `option` asc");

function getPositionName($Id)
{
    $job = position_type()->get("Id='$Id'");
    echo $job->option;
}

function formatDate($val)
{
    $date = date_create($val);
    return date_format($date, "F d, Y");
}

?>
<div>
    <div class="search-content">
        <div class="search-items-wrapper container">
            <div>
                <div class="row">
                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-1 col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
                        <h2 class="m-b-30 m-t-20 title">Search Jobs</h2>
                    </div>
                </div>
                <form class="form-inline" method="GET">
                    <div class="form-group actions-toolbar">
                        <div class="row">
                            <input type="hidden" name="view" value="searchJob">
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 no-padding col-lg-offset-2 col-md-offset-2 col-sm-offset-1">
                                <input type="text" name="s" class="form-control select-sm-mobile"
                                       placeholder="Job Title, Skills or Keywords">
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 no-padding">
                                <select name="c" class="form-control select-sm-mobile" required>
                                    <option value="">Select Category</option>
                                    <?php foreach ($jobFunctionList as $row) { ?>
                                        <option value="<?= $row->Id; ?>"><?= $row->option; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-12 no-padding">
                                <button type="submit" class="action btn btn-primary">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="search-items col-lg-8 col-md-8 col-sm-10 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-1">
                <?php if ($jobList){ ?>
                    <?php foreach ($jobList as $row) {
                        if ($row->isApproved == 1) {
                            ?>
                            <div class="job-list-row">
                                <div class="row job-list-summary">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <a href="?view=jobDetail&id=<?= $row->Id; ?>"
                                           class="job-list-title"><?= $row->position; ?></a>
                                        <span class="job-list-zipcode"><?= $row->address; ?>, PC <?= $row->zipCode; ?></span>
                                        <span class="job-list-rate"><?= $row->rate; ?></span>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="job-list-info">
                                            <span class="job-list-date">Posted on <?= formatDate($row->createDate); ?></span>
                                            <span class="job-list-employment-type">
                                                <strong class="lozenge"><?= getPositionName($row->positionTypeId); ?></strong>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    }
            }else{ ?>
                <h3 class="text-center text-muted empty-result-label" style="padding: 100px 0;">
                    <i class="mdi mdi-account-off m-t-30"></i>
                    <br>No Jobs Found</h3>
            <?php } ?>
            </div>
        </div>
    </div>
</div>
<script>
    function myFunction() {
        var txt;
        if (confirm("Open Pick an app?")) {
            OpenWith.exe;
        } else {
            txt = "You pressed Cancel!";
        }
        document.getElementById("demo").innerHTML = txt;
    }
</script>
