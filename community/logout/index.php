<?php
session_start();
unset($_SESSION['community_user_session']);
header('Location: ../');
