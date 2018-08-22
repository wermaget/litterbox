<?php
$jobFunctionList = job_function()->list("isDeleted='0' order by `option` asc");
$remoteTeamList = remote_team()->list("isDeleted='0'");

if (isset($_GET['Id']) && $_GET['Id'] != "") {
    include 'remoteTeamDetail.php';
} else {
    ?>
    <div style="position: relative;">
        <div class="container blog grid-view">
            <h2 class="title">Your Remote Team</h2>
            <hr>
            <!-- Start of Static Projects List-->
            <div class="row">
                <?php foreach ($remoteTeamList as $row) { ?>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="blog-item">
                            <a class="blog-header-preview" href="../home/?view=remoteTeam&Id=<?= $row->Id; ?>">
                                <?php if($row->headerImage) {?>
                                    <img src="../media/<?= $row->headerImage; ?>" alt=""/>
                                <?php }else{ ?>
                                    <img src="../include/assets/images/no-image.png">
                                <?php } ?>
                            </a>
                            <div class="blog-item-info">
                                <div class="height-control">
                                    <a class="blog-title" href="../home/?view=remoteTeam&Id=<?= $row->Id; ?>"><?= $row->title; ?></a>
                                    <p class="blog-short-desc"><?php echo substr(strip_tags(html_entity_decode($row->content)),0,150).'...'; ?></p>
                                </div>
                                <span class="blog-date-posted"><?= date('F j, Y', strtotime($row->createDate)); ?></span>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="clearfix"></div>

            <!-- End of Static List -->
        </div>
    </div>

    <?php
}
?>