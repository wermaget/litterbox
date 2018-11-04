<?php

class ExportCsv {

    protected $table, $result, $report_type;
    
    protected $columns = [];

    /*  
        $columns (array) 
        $table (string) 
    */
    public function __construct($columns, $table){
        $this->columns = $columns;
        $this->table = $table;
    }
    
    public function getResult(){
        $this->result = model($this->table)->list();
    }

    public function export(){

        $this->getResult();
        $filename = $this->table;
        
        if($this->getReportType() != '') $filename = $this->getReportType();

        $generation_date = date('Y-m-d');
        // output headers so that the file is downloaded rather than displayed
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=' . $filename . '_' . $generation_date . '.csv');
        
        $csv = fopen('php://output', "w");

        fputcsv($csv, $this->columns);

        foreach($this->result as $c) {
            $cols = [];
            for( $i = 0 ; $i < count($this->columns) ; $i++ ) {
                $cols[] = $c->{$this->columns[$i]};
            }
            fputcsv($csv, $cols);
        }
    }

    public function getReportType(){

	    switch($this->table){
		    case 'company':
                return 'client';
            default:
                return '';
        }
    }
}
