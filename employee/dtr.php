<?php
$user = $_SESSION['employee_session'];
$dtrList = dtr()->list("owner='$user'");

// Old
function get_time_difference($record)
{
    $workTime = (strtotime($record->checkOut) - strtotime($record->checkIn)) / 3600;
    $firstBreak = (strtotime("1/1/1980 $record->breakIn") - strtotime("1/1/1980 $record->breakOut")) / 3600;

    $secondBreak = (strtotime("1/1/1980 $record->breakIn2") - strtotime("1/1/1980 $record->breakOut2")) / 3600;
    $lunch = (strtotime("1/1/1980 $record->lunchIn") - strtotime("1/1/1980 $record->lunchOut")) / 3600;
    $totalTime = $workTime - ($firstBreak + $secondBreak + $lunch);

    return number_format((float)$totalTime, 2, '.', '');
}

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
                <th>Total Hrs</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $count = 0;
            foreach ($dtrList as $row) {
                if ($row->status == 4 && !$row->timesheetId) {
                    $count += 1;
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
        <?php if ($count) { ?>
            <button type="button" onclick="location.href='process.php?action=submitTimesheet'" class="btn btn-info">
                Submit timesheet
            </button>
        <?php } ?>
    </div>
</div>
