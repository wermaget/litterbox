<?php

?>
<div class="admin-reports-view">
    <div class="actions-topbar">
        <div class="items-left">
            <form id="report-generator" name="report-generator" class="report-generator" method="POST" action="">
                <select id="" class="input-select" name="report-type">
                    <option value="" selected disabled> - Select A Report Type -</option>
                    <option>Candidates</option>
                    <option>Clients</option>
                    <option>Inquiries</option>
                    <option>Request Talent</option>
                </select>
                <button type="submit" class="btn btn-primary">Generate</button>
            </form>
        </div>
        <div class="items-right">
            <a href="#" class="btn btn-primary waves-effect waves-light btn-sm">Download All Resume as .ZIP</a>
            <a href="./clientExportCsv.php" class="btn btn-primary waves-effect waves-light btn-sm">Export as CSV</a>
        </div>
    </div>
    <div class="" style="border-top: 1px solid black;">
        <div class="row">
            <div class="col-lg-2">
                <strong>First Name</strong>
            </div>
            <div class="col-lg-2">
                <strong>Last Name</strong>
            </div>
            <div class="col-lg-2">
                <strong>Email</strong>
            </div>
            <div class="col-lg-1">
                <strong>Mobile</strong>
            </div>
            <div class="col-lg-2">
                <strong>City</strong>
            </div>
            <div class="col-lg-1">
                <strong>State</strong>
            </div>
            <div class="col-lg-2">
                <strong>Resume</strong>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <span>John Michael</span>
            </div>
            <div class="col-lg-2">
                <span>Doe</span>
            </div>
            <div class="col-lg-2">
                <span>johnmichael@email.com</span>
            </div>
            <div class="col-lg-1">
                <span>0987612862</span>
            </div>
            <div class="col-lg-2">
                <span>Bacolod City</span>
            </div>
            <div class="col-lg-1">
                <span>State</span>
            </div>
            <div class="col-lg-2">
                <span><a href="#">152349234.pdf</a></span>
            </div>
        </div>
    </div>
</div>
