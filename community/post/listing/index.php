<?php

session_start();
require '../../../config/database.php';
require '../../../config/Models.php';

echo json_encode(model('community_posts')->list());