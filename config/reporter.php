<?php

class Reporter {

    protected $rtype = '';
    protected $data = [
        'title' => '',
        'value' => '',
        'headers' => [],
        'cols' => [],
        'result' => [],
    ];

    //key = table name in db, values = header name for frontend
    protected $headers = [
        'candidate' => ['First Name','Last Name','Email','Mobile','Address','State','Resume'],
        'company' => ['Company Name','Description','Email','Contact Person','Phone Number','Address'],
        'inquiries' => ['First Name','Last Name','Email','Mobile','Message'],
        'job' => ['Job Reference','Job Category','Job Classification','Company Name','Company Email','Status'],
    ];


    //database table columns
    protected $columns = [

        'candidate' => [
            'firstName', 'lastName', 'email', 'phoneNumber', 'address1', 'state', 'uploadedResume'
        ],

        'company' => [
            'name', 'description', 'email', 'contactPerson', 'phoneNumber', 'address',
        ],

        'inquiries' => [
            'firstName', 'lastName', 'workEmail', 'phoneNumber','message'
        ],

        'job' => [
            'refNum', 'jobFunctionId', 'position', 'company', 'workEmail', 'isApproved'
        ],
    ];

    public function __construct($report_type){
        
        $this->rtype = $report_type;
        $this->data['value'] = $report_type;

        $this->setTitle();
        $this->setTableHeaders();
        $this->getReports();
        $this->setTableColumns();

    }

    public function getReports(){
        $this->data['result'] = model($this->rtype)->list();
    }

    public function setTableHeaders(){
        $this->data['headers'] = $this->headers[$this->rtype];
    }

    public function setTableColumns(){
        $this->data['cols'] = $this->columns[$this->rtype];
    }

    public function setTitle(){
        if($this->rtype == 'candidate') $this->data['title'] = 'Candidates';
        if($this->rtype == 'company') $this->data['title'] = 'Clients';
        if($this->rtype == 'inquiries') $this->data['title'] = 'Inquiries';
        if($this->rtype == 'job') $this->data['title'] = 'Talent Request';
    }

    public function getData(){
        $this->formatData();
        return $this->data;
    }

    public function formatData(){
        switch($this->rtype){
            case 'candidate':
                $this->formatCandidate();
                break;
            case 'job':
                $this->formatJob();
                break;

        }
    }

    public function formatCandidate(){
        foreach($this->data['result'] as $resume){
            $resume->uploadedResume = '<a href="../media/' . $resume->uploadedResume . '">' . $resume->uploadedResume . '</a>';
        }
    }

    public function formatJob() {
        foreach($this->data['result'] as $r){
            $r->jobFunctionId = $this->getJobCategory($r->jobFunctionId);
            $r->isApproved = ($r->isApproved ) ? 'Active' : 'Pending';
        }
    }

    public function getJobCategory($category_id){
        return model('job_function')->getColumnValue('option', 'Id=' . $category_id)->option;
    }
}
