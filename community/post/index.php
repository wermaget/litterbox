<?php
if(isset($permalink) && $permalink != '' ) {
    $post_data = model('community_posts')->get("permalink='$permalink'");

    include 'view/post.php';
}

if(!$post_data) header('Location: ' . $config['base_url'] . 'community?msg=record does not exist.');