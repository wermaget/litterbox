<?php

session_start();
include_once("../config/database.php");
include_once("../config/Models.php");
include_once('../config/ExportCsv.php');

$rt = '';
$columns = [];
if(isset($_GET['report_type'])){
    $rt = $_GET['report_type'];
    
    switch($rt){
        case 'company':
            $columns = ['name', 'description', 'refNum'];
            break;
        
        case 'candidate':
            $columns = [];
            break;

        case 'inquiries':
            $columns = [];
            break;
        
        default:
            break;
    }
}
$exporter = new ExportCsv($columns, $rt);
$exporter->export();

