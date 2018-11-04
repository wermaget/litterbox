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
            $columns = ['refNum', 'name', 'description', 'abn', 'email', 'contactPerson', 'phoneNumber', 'mobileNumber', 'address', 'department', 'jobFunctionId', 'isApproved'];
            break;
        
        case 'candidate':
            $columns = ['firstName', 'lastName', 'jobFunctionId', 'email', 'phoneNumber', 'address1', 'address2', 'state', 'zipCode', 'keySkills', 'uploadedResume', 'speedtest', 'uploadedSpecs', 'isApproved', 'isHired'];
            break;

        case 'inquiries':
            $columns = ['firstName', 'lastName', 'phoneNumber', 'workEmail', 'jobFunctionId', 'zipCode', 'message'];
            break;

        case 'job':
            $columns = ['refNum', 'jobFunctionId', 'positionTypeId', 'position', 'rate', 'empLocation', 'company', 'abn', 'workEmail', 'jobTitle', 'businessPhone', 'zipCode', 'address', 'requiredExperience', 'comment', 'isApproved', 'status', 'contactName', 'keySkills'];
            break;
        
        default:
            break;
    }
}
$exporter = new ExportCsv($columns, $rt);
$exporter->export();

