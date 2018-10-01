<?php
session_start();
require_once '../../../Helper/helper.php';
require_once '../../../config/database.php';
require_once '../../../config/Models.php';

$user_id = $_SESSION['community_user_session'];

// Check if user has session
if(! $user_id) return header('Location: ../?status=no_session&msg=You must be logged in to create a post.');

if(! $_POST) return header('Location: ../?status=post_failed&msg=Method not allowed.');

$title = $_POST['title'];
$description = $_POST['description'];
$tags = $_POST['tags'];
$category = $_POST['category'];
$permalink = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($title)))."-".generateRandomString(10);

$post = community_posts();
$post->obj['title'] = $title;
$post->obj['description'] = $description;
$post->obj['tags'] = $tags;
$post->obj['community_user_id'] = $user_id;
$post->obj['date_created'] = "NOW()";
$post->obj['permalink'] = $permalink;

$post_id = $post->create();
header("Location: ../".$permalink);
