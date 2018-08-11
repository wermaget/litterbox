<?php
$Id = (isset($_GET['Id']) && $_GET['Id'] != '') ? $_GET['Id'] : '';
$projects = projects()->get("Id='$Id'");
$firstProject = projects()->list("isDeleted='0' order by `Id` limit 1");
?>

<div class="cms-container">
    <div class="parallax-window" data-parallax="scroll"></div>
    <div class="cms-content">
        <?php if($projects) {?>
            <?php if ($projects->uploadedImage != ""){ ?>
                <img class="pull-right" width="30%" height="30%" src="../media/<?=$projects->uploadedImage;?>">
            <?php }else{ ?>
                <div style="width=30%; height=30%;"></div>
            <?php } ?>
            <h3 class="text-blue"><?=$projects->title;?></h3>

            <p><?=  html_entity_decode(nl2br($projects->content));?></p>
        <?php }else if($firstProject){ ?>
            <?php foreach($firstProject as $row){ ?>
                <img class="pull-right" width="30%" height="30%" src="../media/<?=$row->uploadedImage;?>">
                <h3 class="text-blue"><?=$row->title;?></h3>
                <p><?= html_entity_decode(nl2br($row->content));?></p>
            <?php } ?>
        <?php }else{ ?>
            <h4 class="text-center text-muted" style="margin-right: 30%;"><i class="fa fa-file-text-o fa-5x"></i><br><br> New content will be coming soon </h4>
        <?php } ?>
    </div>
</div>
<script>
    if(!Modernizr.touch){
        $('.parallax-window').parallax({imageSrc: '../media/hero-banner-sample.jpg'});
    }
</script>
