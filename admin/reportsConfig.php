<?php
$data = array();
$options = ['candidate','company','inquiries','talents'];

//table headers
$_candidate = ['First Name','Last Name','Email','Mobile','Address','State','Resume'];
$_company = ['Company Name','Description','Email','Contact Person','Phone Number','Address'];

$data = [

    'candidate' => [
        'headers' => $_candidate,
        'cols' => [
            //this array can be moved outside for better readability
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

