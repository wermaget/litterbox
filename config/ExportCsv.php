<?php

class ExportCsv {

    protected $table, $result;
    
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

        // output headers so that the file is downloaded rather than displayed
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=clients.csv');
        
        $csv = fopen('php://output', w);

        fputcsv($csv, $this->columns);


        foreach($this->result as $c) {
            $cols = [];
            for( $i = 0 ; $i < count($this->columns) ; $i++ ) {
                $cols[] = $c->{$this->columns[$i]};
            }
            fputcsv($csv, $cols);
        }
    }
}