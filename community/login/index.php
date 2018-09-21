<?php

session_start();
require_once '../../config/database.php';
require_once '../../config/Models.php';

function login()
{
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = community_users()->get("username='$username' and password = '" . sha1($password) . "'.");

    if ($result) {
        $_SESSION['community_user_session'] = $username;
        header('Location: /community');
    } 
    header('Location: /community?error=User not found in the Database');
    
}
