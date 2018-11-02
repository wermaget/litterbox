<?php
include_once('reportsConfig.php');

//print_r($data);
$rtype = $_GET['type'];

if(isset($rtype) && $rtype != ''):
    $rlist = model($rtype)->list();
endif;
?>
<div class="admin-reports-view">
    <div class="actions-topbar">
        <div class="items-left">
            <form id="report-generator" name="report-generator" class="report-generator" method="GET" action="index.php?view=reports">
                <p><strong>Select Report Type:</strong></p>
                <select id="report_type" class="input-select form-control" name="report-type">
                    <option value="" selected disabled>Select Report Type</option>
                    <?php
                    foreach($options as $option):
                        if($rtype == $option):
                    ?>
                        <option value="<?= $option ?>" selected><?= ucwords($option) ?></option>
                    <?php
                        else:
                    ?>
                        <option value="<?= $option ?>"><?= ucwords($option) ?></option>
                    <?php
                        endif;
                    endforeach;
                    ?>
                </select>
<!--                <button type="submit" class="btn btn-primary">Generate</button>-->
            </form>
        </div>
        <div class="items-right">
            <?php
            if($rtype == 'candidate'):
            ?>
            <a href="./resumeExport.php" class="btn btn-primary waves-effect waves-light btn-sm">Download All Resume as
                .ZIP</a>
            <?php
            endif;

            if($rlist):
            ?>
            <!-- <a href="./clientExportCsv.php" class="btn btn-primary waves-effect waves-light btn-sm">Export as CSV</a> -->
            <a href="#" id="export_btn" class="btn btn-primary waves-effect waves-light btn-sm">Export as CSV</a>
            <?php
            endif;
            ?>
        </div>
    </div>
    <div class="">
        <table id="datatable" class="table table-striped table-bordered">
            <thead>
            <tr>
                <?php
                    foreach($data as $ndx => $d){
                        if($ndx == $rtype){
                            foreach($d['headers'] as $v){
                                echo '<th>' . $v . '</th>';
                            }
                            break;
                        }
                    }
                ?>
            </tr>
            </thead>
        <?php
        if($rlist):
        ?>
            <tbody>
            <?php
            foreach($rlist as $row):
            ?>
            <tr>
                <?php

                    foreach($data as $ndx => $d){
                        if($ndx == $rtype){
                            foreach($d['cols'] as $v){
                                if($v == 'uploadedResume'){
                                    echo '<td><a href="../media/' . $row->{$v} . '">' . $row->{$v} . '</a></td>';
                                } else {
                                    echo '<td>' . $row->{$v} . '</td>';

                                }
                           }
                            break;
                        }
                    }
                ?>
            </tr>
            <?php
            endforeach;
            ?>
            </tbody>
        <?php
        endif;
        ?>
        </table>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        let export_btn = document.querySelector('#export_btn');

        export_btn.addEventListener('click', (e) => {
            let report_type = document.querySelector('#report_type');
            e.preventDefault();
            window.location = './clientExportCsv.php?report_type=' + report_type.value;
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
