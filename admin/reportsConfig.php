<?php
$data = array();

//table headers
$_candidate = ['First Name','Last Name','Email','Mobile','Address','State','Resume'];
$_company = ['Company Name','Description','Email','Contact Person','Phone Number','Address'];
$_inquiries = ['First Name','Last Name','Email','Mobile','Message'];
$_talent_requests = ['Job Reference','Job Category','Job Classification','Company Name','Company Email','Status'];

$data = [

    'candidate' => [
        'title' => 'Candidates',
        'value' => 'candidate',
        'headers' => $_candidate,
        'cols' => [
            //this array can be moved outside for better readability
            'firstName', 'lastName', 'email', 'phoneNumber', 'address1', 'state', 'uploadedResume'
        ]
    ],

    'company' => [
        'title' => 'Clients',
        'value' => 'company',
        'headers' => $_company,
        'cols' => [
            'name', 'description', 'email', 'contactPerson', 'phoneNumber', 'address',
        ]
        
    ],

    'inquiries' => [
        'title' => 'Inquiries',
        'value' => 'inquiries',
        'headers' => $_inquiries,
        'cols' => [
            'firstName', 'lastName', 'workEmail', 'phoneNumber','message'
        ]
    ],
    'job' => [
        'title' => 'Talent Request',
        'value' => 'job',
        'headers' => $_talent_requests,
        'cols' => [
            'refNum', 'jobFunctionId', 'position', 'company', 'workEmail', 'isApproved'
        ]
    ],
];

