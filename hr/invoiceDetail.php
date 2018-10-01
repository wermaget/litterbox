<?php
$timesheetId = (isset($_GET['Id']) && $_GET['Id'] != '') ? $_GET['Id'] : '';

$invoice = invoice()->get("timesheetId='$timesheetId'");
$application = application()->get("username='$invoice->owner'");
$timesheet = timesheet()->get("Id='$timesheetId'");

$dtrList = dtr()->list("timesheetId='$timesheet->Id' and owner='$invoice->owner'");
$job = job()->get("Id='$timesheet->jobId'");

// Get to total hours rendered
function total_time_rendered($record)
{
    $workTime = (strtotime($record->checkOut) - strtotime($record->checkIn)) / 3600;
    $firstBreak = (strtotime($record->breakIn) - strtotime($record->breakOut)) / 3600;
    $secondBreak = (strtotime($record->breakIn2) - strtotime($record->breakOut2)) / 3600;
    $lunch = (strtotime($record->lunchIn) - strtotime($record->lunchOut)) / 3600;

    $totalTime = $workTime - ($firstBreak + $secondBreak + $lunch);
    return number_format((float)$totalTime, 2, '.', '');
}

// Get time difference of break and lunch
function time_rendered($timeIn, $timeOut)
{
    $result = (strtotime($timeIn) - strtotime($timeOut)) / 3600;
    $tominutes = $result * 60;
    return number_format((float)$tominutes, 1, '.', '');
}
?>

<!-- Start content -->
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <div class="clearfix">
                        <div class="pull-left">
                            <img src="../include/assets/images/teamire-logo.png" alt="" height="30">
                        </div>
                        <div class="pull-right">
                            <h3 class="m-0 hidden-print">Invoice</h3>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-xs-6">
                        </div><!-- end col -->
                        <div class="col-sm-3 col-sm-offset-3 col-xs-4 col-xs-offset-2">
                            <div class="m-t-30 pull-right">
                                <p><small><strong>Invoice #: </strong></small><?=$invoice->refNum;?></p>
                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row m-t-30">
                        <div class="col-xs-6">
                            <h5>Employee Detail</h5>
                            <address class="line-h-24">
                                <?=$application->refNum;?><br>
                                <?=$application->firstName;?> <?=$application->lastName;?><br>
                                <?=$application->abn;?><br>
                            </address>
                        </div>

                        <div class="col-xs-6">
                            <h5>Client Detail</h5>
                            <address class="line-h-24">
                                <?=$job->position;?><br>
                                <?=$job->company;?><br>
                                <?=$job->abn;?><br>
                            </address>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table m-t-30">
                                    <thead>
                                    <tr><th>Date</th>
                                        <th>Login</th>
                                        <th>First Break</th>
                                        <th>Lunch</th>
                                        <th>Second Break</th>
                                        <th>Logout</th>
                                        <th class="text-right">Total</th>
                                    </tr></thead>
                                    <tbody>
                                    <?php foreach($dtrList as $row) { ?>

                                        <!-- Updated Code -->
                                        <tr>
                                            <td><?= date_format(date_create($row->createDate), 'F j, Y'); ?></td>
                                            <td><?= date_format(date_create($row->checkIn), 'g:ia'); ?></td>
                                            <td>
                                                <?php if ($row->breakIn) { ?>
                                                    <?= date_format(date_create($row->breakOut), 'g:ia'); ?>
                                                    - <?= date_format(date_create($row->breakIn), 'g:ia'); ?>
                                                    </br>
                                                    Duration: <b><?= time_rendered($row->breakIn, $row->breakOut); ?> mins</b>
                                                <?php } ?>
                                            </td>
                                            <td><?php if ($row->lunchIn) { ?>
                                                    <?= date_format(date_create($row->lunchOut), 'g:ia'); ?>
                                                    - <?= date_format(date_create($row->lunchIn), 'g:ia'); ?> <br>
                                                    Duration: <b><?= time_rendered($row->lunchIn, $row->lunchOut); ?> mins</b>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if ($row->breakIn2) { ?>
                                                    <?= date_format(date_create($row->breakOut2), 'g:ia'); ?>
                                                    - <?= date_format(date_create($row->breakIn2), 'g:ia'); ?> <br>
                                                    Duration: <b><?= time_rendered($row->breakIn2, $row->breakOut2); ?> mins</b>
                                                <?php } ?>
                                            </td>

                                            <td><?php if($row->checkOut) { echo date_format(date_create($row->checkOut), 'g:ia'); }?></td>
                                            <td><b><?php
                                                    if ($row->status == 4) {
                                                        echo total_time_rendered($row);
                                                    }
                                                    ?></b></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- end row -->

    </div> <!-- container -->

</div> <!-- content -->
