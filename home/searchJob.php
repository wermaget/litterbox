<?php
$s = (isset($_GET['s']) && $_GET['s'] != '') ? $_GET['s'] : '';
$c = (isset($_GET['c']) && $_GET['c'] != '') ? $_GET['c'] : '';
$jobList = job()->list("position like '%$s%' and jobFunctionId=$c and isDeleted=0");

$jobFunctionList = job_function()->list("isDeleted=0 order by `option` asc");

function getPositionName($Id){
  $job = position_type()->get("Id='$Id'");
  echo $job->option;
}

function formatDate($val){
  $date = date_create($val);
  return date_format($date, "F d, Y");
}
?>

<div style="position: relative;">
<div class="search-content">
  <div class="container">
  <div class="">
    <h2 class="m-b-30 m-t-20 title">Search Jobs</h2>
    <form class="form-inline" method="GET">
    <div class="form-group">
      <input type="hidden" name="view" value="searchJob">
      <input type="text" name="s" class="form-control select-sm-mobile" placeholder="Job Title, Skills or Keywords">
      <select name="c" class="form-control select-sm-mobile" required>
        <option value="">Select Category</option>
        <?php foreach($jobFunctionList as $row){ ?>
          <option value="<?=$row->Id;?>"><?=$row->option;?></option>
        <?php } ?>
      </select>
          <button type="submit" class="btn waves-effect waves-light btn-primary btn-sm-mobile">Search</button>

    </div>
  </form>
  </div>
</div>
  <div class="clearfix"></div>

  <!-- Display contact and email buttons -->


  <!-- Start Filter Panel and Results-->

    <!-- TODO: Filters -->
    <!-- <h4>Filters: </h4>
    <div class="form-inline m-b-30" style="padding: 0; margin: 0; width: 100%;">
    <select class="form-control" style="height: 50px; width:199px; border-right: none; ">
        <option>Select City</option>
    </select>
    <select class="form-control" style="height: 50px;width:199px; border-right: none; border-radius: 0px; margin-left: -6px;">
        <option>Select City</option>
    </select>
    <select class="form-control" style="height: 50px;width:199px; border-right: none; border-radius: 0px; margin-left: -5px;">
        <option>Select City</option>
    </select>
    <select class="form-control" style="height: 50px;width:199px; border-right: none; border-radius: 0px; margin-left: -5px;">
        <option>Select City</option>
    </select>
    <select class="form-control" style="height: 50px;width:199px; border-radius: 0px; margin-left: -3px;">
        <option>Select City</option>
    </select>
    <select class="form-control" style="height: 50px;width:199px; border-left:none; margin-left: -5px;">
        <option>Select City</option>
    </select>
    </div> -->
    <!-- TODO: Filters -->
    <!-- <h4>Sort by: </h4> -->
    <!-- <div class="form-inline m-b-30" style=""> -->
    <!-- <select class="form-control" style="height: 50px; width:199px;">
        <option>Select City</option>
    </select> -->
    <!-- </div> -->
<?php if(!$jobList){?>
  <h3 class="text-center text-muted"><i class="mdi mdi-account-off mdi-48px m-t-30"></i><br>No Jobs Found</h3>
<?php }else{?>
    <div class="search-items-wrapper container">
        <div class="search-items col-lg-9">

        <?php foreach($jobList as $row) {
    if ($row->isApproved==1){
  ?>
    <div class="job-list-row">
        <div class="row job-list-summary">
            <div class="col-lg-6">
                <a href="?view=jobDetail&id=<?=$row->Id;?>" class="job-list-title"><?=$row->position;?></a>
                <span class="job-list-zipcode"><?=$row->address;?>, PC <?=$row->zipCode;?></span>
                <span class="job-list-rate"><?=$row->rate;?></span>

            </div>
            <div class="col-lg-6">

            </div>
            <span class="m-b-5"><?=getPositionName($row->positionTypeId);?></span>
            <span class="job-list-date">Posted <?=formatDate($row->createDate);?></span>
        </div>

        <?php } ?>
    </div>
<?php } }?>
        </div> <!-- End List Container -->

    </div>

</div>
<br>
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
</div>
