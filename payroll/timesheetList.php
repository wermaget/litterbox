<?php
$jobId = (isset($_GET['jobId']) && $_GET['jobId'] != '') ? $_GET['jobId'] : '';
$employee = (isset($_GET['employee']) && $_GET['employee'] != '') ? $_GET['employee'] : '';

if ($jobId){
    $timesheetList = timesheet()->list("jobId='$jobId'");
    $job = job()->get("Id=$jobId");
    $headerTitle= $job->position;
}else if ($employee){
    $timesheetList = timesheet()->list("employee='$employee'");
    $resume = resume()->get("username='$employee'");
    $headerTitle = "Timesheet of " . $resume->firstName . " " . $resume->lastName;
}
else {
    $timesheetList = timesheet()->list();
    $headerTitle = "Archive timesheets";
}

// Functions

function __getName($username){
    $get = resume()->get("username='$username'");
    return $get ? $get->firstName . " " . $get->lastName : "Name not in database";
}

function __setStatus($s){
  switch($s){
      case '0':
          return "Waiting to be verified";
          break;
      case '1':
          return "Verified";
          break;
      case '2':
          return "Disputed";
          break;
      case '3':
          return "Approved";
          break;
  }
}

?>
<div class="row">
  <div class="col-sm-12">
    <div class="card-box table-responsive">
        <h4 class="page-title"><?=$headerTitle;?></h4><br>
      <table id="datatable" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Name</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($timesheetList as $row) {
          ?>

          <tr>
            <td><a href="?view=timesheetDetail&tsId=<?=$row->Id;?>"><?=$row->name;?></a></td>
            <td><?=__setStatus($row->status);?></td>
            <?php
              }
            ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
