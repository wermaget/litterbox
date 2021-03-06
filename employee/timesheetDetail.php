<?php
$timesheetId = (isset($_GET['Id']) && $_GET['Id'] != '') ? $_GET['Id'] : '';
$user = $_SESSION['employee_session'];
$dtrList = dtr()->list("owner='$user'");

// Get timesheet record
$ts = timesheet()->get("Id='$timesheetId'");
$dispute = timesheet_dispute()->get("timesheetId='$timesheetId'");

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
<div class="col-sm-12">
    <div class="card-box table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Date</th>
                <th>Login</th>
                <th>First Break</th>
                <th>Lunch</th>
                <th>Second Break</th>
                <th>Logout</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($dtrList as $row) {
                if ($row->timesheetId == $timesheetId) {
                    ?>
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
                <?php }
            } ?>
            </tbody>
        </table>

        <?php if ($ts->status == "2") { ?>
            <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="modal"
                    data-target="#dispute-message-modal">View Dispute message
            </button>
        <?php } ?>
    </div>
</div>


<!-- dispute modal content -->
<div id="dispute-message-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel"
     aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

            <div class="modal-body">
                <h2 class="text-uppercase text-center m-b-30">
                    <a href="index.html" class="text-success">
                        <span><img src="assets/images/logo_dark.png" alt="" height="30"></span>
                    </a>
                </h2>

                <form class="form-horizontal" action="" method="post">
                    <div class="form-group">
                        <label>Reason of dispute</label>
                        <div>
                            <textarea required="" name="reason" class="form-control"
                                      disabled><?= $dispute->reason; ?></textarea>
                        </div>
                    </div>

                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
