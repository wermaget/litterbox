<?php
$Id = $_GET['id'];
$job = job()->get("Id='$Id'");

$jobFunctionList = job_function()->list("isDeleted=0 order by `option` asc");

function getPositionName($Id)
{
    $job = position_type()->get("Id='$Id'");
    echo $job->option;
}

function getJobFunction($Id)
{
    $jf = job_function()->get("Id='$Id'");
    echo $jf->option;
}

function getApplicantCount($Id)
{
    $applicantList = application()->count("jobId='$Id' and isApproved='0'");
    return $applicantList;
}

function formatDate($val)
{
    $date = date_create($val);
    return date_format($date, "F d, Y");
}

?>
<div class="container job-detail-wrapper">
    <div class="page-controls">
        <a href="#" class="page-returner" onclick="window.history.go(-1); return false;">< Back to results</a>
    </div>
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 no-padding">
            <div class="job-detail-content">
                <div class="job-detail-upper">
                    <div class="row">
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 info-left">
                            <div class="job-detail-title">
                                <h2><?= $job->position; ?></h2>
                            </div>
                            <div class="job-detail-sub-info">
                                <span class="employment-type lozenge"><?= getPositionName($job->positionTypeId); ?></span>
                                <span class="job-function"><?= getJobFunction($job->jobFunctionId); ?></span>
                            </div>
                            <div class="job-detail-category">
                            </div>
                            <div class="job-detail-sub-desc">
                                <span class="location"><?= $job->address; ?> PC <?= $job->zipCode; ?></span>
                                <span class="dot">&#8226;</span>
                                <span class="salary"><?= $job->rate; ?></span>
                            </div>

                            <div class="job-detail-reference-number">
                                <span>Reference Number: <strong><?= $job->refNum; ?></strong></span>
                            </div>
                            <div class="job-detail-actions">
                                <div class="actions-toolbar">
                                    <?php if ($job->endDate < date("Y-m-d")) { ?>
                                    <button class="action closed" disabled>JOB CLOSED</button>
                                    <?php } else { ?>
                                    <button onclick="location.href='../home/?view=application&id=<?= $job->Id; ?>'"
                                            class="action btn btn-primary">APPLY NOW
                                    </button>
                                    <?php } ?>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-sm-12 info-right">
                            <div class="job-detail-date">
                                <span class="posted">Posted on <?= formatDate($job->createDate); ?></span>
                                <span> - </span>
                                <span class="expiration">Deadline until <?= formatDate($job->endDate); ?></span>
                            </div>
                            <div class="job-detail-counters">
                                <div class="counter-item">
                                    <h2 data-plugin="counterup"><?= $job->jobOpening; ?></h2>
                                    <p>Openings</p>
                                </div>
                                <div class="counter-item">
                                    <h2 data-plugin="counterup"><?= getApplicantCount($Id); ?></h2>
                                    <p>Applicants</p>
                                </div>
                                <div class="counter-item">
                                    <h2 data-plugin="counterup"><?= $job->viewCounter; ?></h2>
                                    <p>Views</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="job-detail-lower">
                    <h2 class="description-title">Description</h2>
                    <p>
                        <?= nl2br($job->comment); ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
            <div class="job-detail-minisearch" style="border: 1px solid #ddd; padding: 24px;">
                <h5>Search Jobs</h5>
                <div>
                    <form method="GET" accept-charset="UTF-8">
                        <input type="hidden" name="view" value="searchJob">
                        <input class="form-control" maxlength="128" type="text"
                               name="s" placeholder="Job Title, Skills or Keywords">
                        <select name="c" class="form-control m-b-20 select-sm-mobile" required>
                            <option value="">Select Category</option>
                            <?php foreach ($jobFunctionList as $row) { ?>
                                <option value="<?= $row->Id; ?>"><?= $row->option; ?></option>
                            <?php } ?>
                        </select>
                        <div class="actions-toolbar">
                            <button type="submit" class="action btn btn-primary">SEARCH JOBS</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add view counter -->
<?php
$vc = job();
$vc->obj["viewCounter"] = $job->viewCounter + 1;
$vc->update("Id='$Id'");
?>
