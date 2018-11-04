<?php
include_once('../config/reporter.php');

$rt_check = false;

$options = Reporter::getHeaders();
if(isset($_GET['type'])){
    $rtype = $_GET['type'];

    if(isset($rtype) && $rtype != ''):
        $rt_check = true;
        $rlist = model($rtype)->list();
        $report = new Reporter($rtype);
        $report = $report->getData();
    endif;
} 

?>
<div class="admin-reports-view">
    <div class="actions-topbar">
        <div class="items-left">
            <form id="report-generator" name="report-generator" class="report-generator" method="GET" action="index.php?view=reports">
                <p><strong>Select Report Type:</strong></p>
                <select id="report_type" class="input-select form-control" name="report-type">
                    <option value="" selected disabled>Select Report Type</option>
                    <?php foreach($options as $key => $o): ?>
                        <option value="<?= $key ?>" <?= ($rtype == $key) ? 'selected': ''?> ><?= $o['title'] ?></option>
                    <?php endforeach;?>
                </select>
<!--                <button type="submit" class="btn btn-primary">Generate</button>-->
            </form>
        </div>
        <div class="items-right">
            <?php
            if($rt_check):
                if($rtype == 'candidate'):
                ?>
                <a href="./resumeExport.php" class="btn btn-info btn-sm">Download All Resume as
                    .ZIP</a>
                <?php
                endif;

                if($rlist):
                ?>
                <a href="#" id="export_btn" class="btn btn-info btn-sm">Export as CSV</a>
                <?php
                endif;
            endif;
            ?>
        </div>
    </div>
    <div class="reports-table">
        <?php if($rt_check): ?>
        <table id="datatable" class="table table-striped table-bordered">
            <thead>
            <tr>
                <?php
                    if(isset($report['headers'])){
                        foreach($report['headers'] as $r){
                            echo '<th>' . $r . '</th>';
                        }
                    }
                ?>
            </tr>
            </thead>
            <tbody>
            <?php if(isset($report['result'])): ?>
                <?php
                    foreach($report['result'] as $result){
                        echo '<tr>';
                        foreach($report['cols'] as $col){
                            echo '<td>' . $result->{$col} . '</td>';
                        }
                        echo '</tr>';
                    }
                ?>
            <?php endif; ?>
            </tbody>
        </table>
        <?php else: ?>
        <div class="empty-table">
            <span>Please select a report type to generate report</span>
        </div>
        <?php endif; ?>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        let export_btn = document.querySelector('#export_btn');

        export_btn.addEventListener('click', (e) => {
            let report_type = document.querySelector('#report_type');
            e.preventDefault();
            window.location = './exportCsvHandler.php?report_type=' + report_type.value;
        })
    });

    $("#report_type").bind("change", function(e){
       $("#report-generator").submit();
    });

    $("#report-generator").on("submit", function(e) {
        e.preventDefault();

        var rt = $(this).serializeArray();
        insertParam("type", rt[0]['value']);
    });

    /* Add parameter to url */
    function insertParam(key, value) {
        key = encodeURI(key);
        value = encodeURI(value);

        var kvp = document.location.search.substr(1).split('&');

        var i = kvp.length;
        var x;
        while (i--) {
            x = kvp[i].split('=');

            if (x[0] == key) {
                x[1] = value;
                kvp[i] = x.join('=');
                break;
            }
        }

        if (i < 0) {
            kvp[kvp.length] = [key, value].join('=');
        }

        //this will reload the page, it's likely better to store this until finished
        document.location.search = kvp.join('&');
    }
</script>
