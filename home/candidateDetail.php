<?php
$Id = $_GET['Id'];
$candidate = candidate()->get("Id='$Id'");

function getJobFunction($Id)
{
    $jf = job_function()->get("Id='$Id'");
    echo $jf->option;
}

function getCity($Id)
{
    if ($Id != 0) {
        $city = city_option()->get("Id='$Id'");
        echo $city->city;
    } else {
        echo "N/A";
    }
}

?>
<div class="container candidate-detail-wrapper" >
    <div class="page-controls">
        <a href="#" class="page-returner" onclick="window.history.go(-1); return false;">< Back to results</a>
    </div>
    <div class="candidate-detail-content">
        <div class="candidate-detail-upper">
            <div class="row">
                <div class="col-lg-12 no-padding">
                    <div class="candidate-detail-title">
                        <h2><?= getJobFunction($candidate->jobFunctionId); ?></h2>
                    </div>
                    <div class="candidate-detail-reference">
                        <span>Reference Number:<strong> <?= $candidate->refNum; ?></strong></span>
                    </div>
                    <?php if($_SESSION['role'] != null && $_SESSION['role'] != 'hr'): ?>
                        <div class="candidate-detail-address1">
                            <i class="fa fa-map-marker"></i> <?= $candidate->address1; ?>
                        </div>
                        <?php if ($candidate->address2) { ?>
                            <div class="candidate-detail-address2">
                                <i class="fa fa-map-o"></i> <?= $candidate->address2; ?>
                            </div>
                        <?php } ?>
                        <div class="candidate-detail-location">
                            <i class="fa fa-globe"></i> <?= getCity($candidate->city); ?> <?= $candidate->state; ?> <?= $candidate->zipCode; ?>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <div class="candidate-detail-lower">
            <ul class="nav nav-tabs navtab-bg nav-justified">
                <li class="active" style="background-color:#f2f2f2; border-radius: 5px; color: #fff;">
                    <a href="#home1" class="" data-toggle="tab" aria-expanded="false" style="text-align: left;">
                        <span class=""><i class="mdi mdi-account-star m-r-10"></i></span>
                        <span class="">Skills</span>
                    </a>
                </li>
                <li style="background-color: #f2f2f2; border-radius:5px;">
                    <a href="#profile1" class="text-left" data-toggle="tab" aria-expanded="true" style="text-align: left;">
                        <span class=""><i class="mdi mdi-comment-text m-r-10"></i></span>
                        <span class="">Description</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content" style="border: 1px solid #d2d2d2; border-top: none;">
                <div class="tab-pane active" id="home1" style="padding: 10px 40px 48px 40px;">
                    <?= $candidate->keySkills; ?>
                </div>
                <div class="tab-pane" id="profile1" style="padding: 10px 40px 48px 40px;">
                    <?= nl2br($candidate->coverLetter); ?>
                </div>
            </div>
        </div>
    </div>
</div>