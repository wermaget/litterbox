<?php
$code = (isset($_GET['code']) && $_GET['code'] != '') ? $_GET['code'] : '';
$jfList = job_function()->list("isDeleted='0' order by `option` asc");
$ptList = position_type()->list();
$jobFunctionList = job_function()->list("isDeleted=0 order by `option` asc");

$jobFunc = job_function()->get("code='$code'");
?>

<div class="container m-t-50 m-b-50">
    <div class="" style="position:relative;">
        <div class="">
            <h1 class="title mobile-title text-center"><?=$jobFunc->title;?></h1>
        </div>
        <div class="">
            <h5 class="text-center" style="font-size: 14px;"><?=$jobFunc->header;?></h5>
            <p class="text-center m-t-30" style="width: 800px; margin: 0 auto;">
                <?=$jobFunc->description;?>
            </p>
        </div>
    </div>
</div>
