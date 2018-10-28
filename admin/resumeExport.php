<?php

session_start();
include_once("../config/database.php");
include_once("../config/Models.php");
include_once('../config/ExportZip.php');

$params = [
    'table' => 'candidate',
    'folder' => 'exports',
    'filename' => 'resumes',
];


$exporter = new ExportZip($params);
$exporter->export();