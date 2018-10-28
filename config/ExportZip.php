<?php

class ExportZip {

    protected $params = [
        'table' => '',
        'folder' => '',
        'filename' => '',
    ];

    public function __construct($params) {
        $this->params = $params;
    }

    public function getRecords() {
        return model($this->params['table'])->list();
    }

    public function export() {

        $records = $this->getRecords();
        $this->zipFiles($records);
    }

    public function zipFiles($resumes) {
        $root_dir = $_SERVER['DOCUMENT_ROOT'];
        if( !file_exists($root_dir . '/' . $this->params['folder'])) {
            mkdir($root_dir . '/' . $this->params['folder'], 0755, true);
        }

        $zip = new ZipArchive();        
        if ($zip->open($root_dir . '/' . $this->params['folder'] .'/' . $this->params['filename'], ZipArchive::CREATE)!==TRUE) {
            exit("cannot open <$this->params['filename']>\n");
        }

        foreach($resumes as $r) {
            $zip->addFile('../media/' . $r->uploadedResume, $r->uploadedResume);
        }

        $zip->close();
        $this->download($root_dir);
    }

    public function download($root_dir) {

        header('Content-Type: application/zip; charset=utf-8');
        header('Content-Disposition: attachment; filename=' . $this->params['filename']);
        readfile($root_dir . '/' . $this->params['folder'] . '/' . $this->params['filename']);
    }
}