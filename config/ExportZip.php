<?php

class ExportZip {

    protected $params = [
        'table' => '',
        'folder' => '',
        'filename' => '',
    ];

    protected $resumes = [];

    public function __construct($params) {
        $this->params = $params;
    }

    public function getRecords() {
        return model($this->params['table'])->list();
    }

    public function export() {
        $records = $this->getRecords();

        foreach($records as $r) {
            $resumes[] = $r->uploadedResume;
        }

        $this->zipFiles($resumes);

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
            $zip->addFile('../media/' . $r, $r);
        }

        $zip->close();

        header('Content-Type: application/zip; charset=utf-8');
        header('Content-Disposition: attachment; filename=' . $this->params['filename']);
        readfile($root_dir . '/' . $this->params['folder'] . '/' . $this->params['filename']);
    }
}