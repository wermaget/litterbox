<?php
$s = (isset($_GET['s']) && $_GET['s'] != '') ? $_GET['s'] : '';
$application = application()->list();

function getJobName($Id){
  if($Id=='0'){
    echo 'N/A';
  }else{
  $job = job()->get("Id='$Id'");
  echo $job->position;
  }
}

function getInterviewDate($email){
  $interviewDate = interview_date()->get("resumeEmail='$email'");
  echo $interviewDate->date;
}

function getInterviewTime($email){
  $interviewDate = interview_date()->get("resumeEmail='$email'");
  echo $interviewDate->time;
}
?>

<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b>Applicants Schedule</b></h4>

            <table id="datatable" class="table table-bordered">
                <thead>
                <tr>
                    <th>Applying For</th>
                    <th>Candidate Reference #</th>
                    <th>Full Name</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                <?php foreach($application as $row) {
                  if ($row->isApproved==1 && $row->isHired==0) {?>
                <tr>
                    <td><?=getJobName($row->jobId); ?></td>
                    <td><?=$row->refNum; ?></td>
                    <td><?=$row->firstName; ?> <?=$row->lastName; ?></td>
                    <td><?=getInterviewDate($row->email); ?></td>
                    <td><?=getInterviewTime($row->email); ?></td>
                    <td>
                        <a href="?view=resumeDetail&Id=<?=$row->Id;?>&jobId=<?=$row->jobId;?>"  class=" btn btn-success btn-xs tooltips" title="Click To Edit"><span class="fa fa-eye"></span> View Applicant </a>
                    </td>
                </tr>

              <?php } } ?>
                </tbody>
            </table>
        </div>
    </div>
</div> <!-- end row -->
