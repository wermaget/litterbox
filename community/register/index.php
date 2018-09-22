<?php 
session_start();
require_once '../../config/database.php';
require_once '../../config/Models.php';

if(! $_POST) return header('Location: ../index.php/?status=register_failed&msg=Method not allowed.');;

$first_name = htmlspecialchars($_POST['first_name'], ENT_QUOTES);
$last_name = htmlspecialchars($_POST['last_name'], ENT_QUOTES);
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$role = $_POST['role'];

//create user
if( ! community_users()->get('email="' . $email . '"')){
    
    $user = community_users();
    $user->obj['email'] = $email;
    $user->obj['first_name'] = $first_name;
    $user->obj['last_name'] = $last_name;
    $user->obj['password'] = sha1($password);
    $user->obj['role'] = $role;
    
    $user->create();
    // header('Location: ../index.php/?&message=You have successfully created an account.');
    header('Location: ../?status=register_success&msg=Successful registration.');
    return;
}
header('Location: ../?status=register_failed&msg=Email taken.');

//user exists. do action here


