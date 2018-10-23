<?php

session_start();
include_once("../config/database.php");
include_once("../config/Models.php");
include_once('../config/ExportCsv.php');

$exporter = new ExportCsv(['name', 'description', 'refNum'], 'company');
$exporter->export();
