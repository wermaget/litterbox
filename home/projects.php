<?php
$jobFunctionList = job_function()->list("isDeleted='0' order by `option` asc");
$projectList = projects()->list("isDeleted='0'");

if (isset($_GET['Id']) && $_GET['Id'] != "") {
    include 'projectDetail.php';
} else {
    ?>

    <div style="position: relative;">
        <img style="position: absolute; top:0; right:0; height: 300px;"
             src="../include/assets/images/homepage-bg-1.png">
        <div class="container container-fluid m-b-30">
            <h2 class="m-t-20 text-center">Supply Chain Projects</h2>
            <hr>
            <!-- Start of Projects List-->
            <div class="row">
                <?php foreach ($projectList as $row) { ?>
                    <div class="col-lg-2">
                        <div class="project-list">
                            <a href="../home/?view=projects&Id=<?= $row->Id; ?>"><?= $row->title; ?></a>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="clearfix"></div>
            <!-- End of Project List -->
        </div>
    </div>
    <?php
}
?>