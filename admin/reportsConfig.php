<?php
$data = array();
$options = ['candidate','company','inquiries','talents'];

$_candidate = ['First Name','Last Name','Email','Mobile','Address','State','Resume'];
$_company = ['Company Name','Description','Email','Contact Person','Phone Number','Address'];

foreach($options as $option){
    array_push($data, array('option' => $option, 'values' => $_candidate));
}
