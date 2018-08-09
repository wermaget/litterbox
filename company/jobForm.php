<?php
$Id = $_GET['Id'];
$job = job()->get("Id=$Id");
?>
<div class="row">
  <div class="col-md-12">
      <div class="text-center card-box">
          <div class="clearfix"></div>
          <div class="member-card">

            <form action="process.php?action=updateJob&Id=<?=$job->Id;?>" method="post">
              <?php
              foreach ($job as $key => $value) {
                if ($key == "Id" || $key == "refNum"|| $key == "jobFunctionId"|| $key == "positionTypeId" || $key == "company" || $key == "abn"|| $key == "createDate"|| $key == "isApproved"){}
                  else {
                ?>
                  <label><?=$key;?>:</label>
                  <input type="text" name="<?=$key;?>" value="<?=$value;?>"> <br>
                    <?php
                  }
                }
              ?>
              <br>
              <button onclick="location.href='?view=clientForm&Id=<?=$job->Id?>'">Update</button>
          </div>
      </div>
  </div> <!-- end col -->
</div>
