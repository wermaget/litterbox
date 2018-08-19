<?php
$Id = (isset($_GET['Id']) && $_GET['Id'] != '') ? $_GET['Id'] : '';
$projects = projects()->get("Id='$Id'");
$firstProject = projects()->list("isDeleted='0' order by `Id` limit 1");
?>

<div class="cms-container">
    <img src="<?= '../media/'.$projects->headerImage; ?>">
    <div class="parallax-window" data-parallax="scroll"></div>
    <div class="cms-content">
        <?php if($projects) {?>
            <h3 class="cms-page-title"><?= html_entity_decode($projects->title); ?></h3>
            <p><?=  html_entity_decode(nl2br($projects->content));?></p>
        <?php }else{ ?>
            <h4 class="text-center text-muted" style="margin-right: 30%;"><i class="fa fa-file-text-o fa-5x"></i><br><br> New content will be coming soon </h4>
        <?php } ?>
    </div>
</div>
<script>

    $('.parallax-window').parallax({imageSrc: '../media/1534682616.jpg'});

</script>
