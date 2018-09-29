<?php
session_start();
require_once '../../config/database.php';
require_once '../../config/Models.php';

$email = $_POST['login-email'];
$password = $_POST['password'];

$result = community_users()->get("email='".$email."' and password = '".sha1($password)."'");

if ($result) {
    $_SESSION['community_user_session'] = $result->community_user_id;
    header('Location: ../');
}else{
    header('Location: ../?error=User not found in the Database');
}


