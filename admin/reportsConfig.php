<?php
$data = array();
$options = ['candidate','company','inquiries','talents'];

$_candidate = ['First Name','Last Name','Email','Mobile','Address','State','Resume'];
$_company = ['Company Name','Description','Email','Contact Person','Phone Number','Address'];

$data = [

    'candidate' => [
        'headers' => $_candidate,
        'cols' => [
            'firstName', 'lastName', 'email', 'phoneNumber', 'address1', 'state', 'uploadedResume'
        ]
    ],

    'company' => [
        'headers' => $_company,
        'cols' => [
            'name', 'description', 'email', 'contactPerson', 'phoneNumber', 'address',
        ]
        
    ],

    'inquiries' => [],
    'talents' => [],
];

//foreach($options as $option){
//    array_push($data, array('option' => $option, 'values' => $_candidate));
//}

