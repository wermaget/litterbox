<?php
session_start();
require '../../config/database.php';
require '../../config/Models.php';
require '../../config/site.php';

$permalink = $_GET['permalink'];

if(isset($permalink) && $permalink != '' ) {
    $post = model('community_posts')->get("community_post_id='$permalink'");

}

if(!$post) header('Location: ' . $config['base_url'] . 'community?msg=record does not exist.');