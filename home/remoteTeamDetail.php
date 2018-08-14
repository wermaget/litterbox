<?php
$Id = (isset($_GET['Id']) && $_GET['Id'] != '') ? $_GET['Id'] : '';
$remoteTeam = remote_team()->get("Id='$Id'");
//$firstRemoteTeam = remote_team()->list("isDeleted='0' order by `Id` limit 1");
?>

<div class="cms-container">
    <div class="parallax-window" data-parallax="scroll">
        <div class="">
            <span>Sample</span>
        </div>
    </div>
    <div class="cms-content">
        <?php if ($remoteTeam) { ?>
            <h3 class="cms-page-title"><?= $remoteTeam->title; ?></h3>
            <p><?= html_entity_decode(nl2br($remoteTeam->content)); ?></p>
        <?php } else { ?>
            <h4 class="text-center text-muted" style="margin-right: 35%;"><i
                        class="fa fa-file-text-o fa-5x"></i><br><br> New content will be coming soon </h4>
        <?php } ?>
    </div>
</div>
<script>
    if (!Modernizr.touch) {
        $('.parallax-window').parallax({imageSrc: '../media/<?=$remoteTeam->headerImage;?>'});
    }
</script>
