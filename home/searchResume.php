<?php
$j = (isset($_GET['j']) && $_GET['j'] != '') ? $_GET['j'] : '';

$cityList = city_option()->list();

if($j != '') $candidateList = candidate()->list("jobFunctionId=$j and isDeleted=0");
else $candidateList = candidate()->list("isDeleted=0");

$jobFunctionList = job_function()->list("isDeleted=0 order by `option` asc");

function getJobFunction($Id)
{
    $jf = job_function()->get("Id='$Id'");
    echo $jf->option;
}

function getCity($Id)
{
    if ($Id != 0) {
        $city = city_option()->get("Id='$Id'");
        echo $city->city;
    } else {
        echo "N/A";
    }
}

?>
<div class="search-content">
    <div class="search-items-wrapper container">
        <div>
            <div class="row">
                <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-1 col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
                    <h2 class="m-b-30 m-t-20 title">Find Candidates</h2>
                </div>
            </div>
            <form class="form-inline" method="GET">
                <div class="form-group actions-toolbar">
                    <input type="hidden" name="view" value="searchResume">
                    <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12 no-padding col-lg-offset-2 col-md-offset-2 col-sm-offset-1">
                        <select name="j" class="form-control">
                            <option value="">Select Category</option>
                            <?php foreach ($jobFunctionList as $row) { ?>
                                <option value="<?= $row->Id; ?>"><?= $row->option; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 no-padding">
                        <button type="submit"
                                class="action btn waves-effect waves-light btn-primary btn-md-mobile btn-sm-mobile">
                            Search
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="search-items col-lg-8 col-md-8 col-sm-10 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-1">
            <?php if ($candidateList){ ?>
                <ul class="candidates-list col-lg-12">
                    <?php foreach ($candidateList as $row) { ?>
                        <li class="candidates">
                            <div class="row m-t-10">
                                <div>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <span class="text-primary">
                                                <a href="../home/?view=candidateDetail&Id=<?= $row->Id; ?>">
                                                    <?= $row->firstName.' '.$row->lastName; ?>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                    <span class="reference">Reference: <?= $row->refNum; ?></span>
                                    <small>Posted on <?= $row->createDate; ?></small>
                                </div>
                            </div>
                        </li>
                    <?php }?>
                </ul>
            <?php }else{ ?>
                <h3 class="text-center text-muted empty-result-label" style="padding: 100px 0;">
                    <i class="mdi mdi-account-off m-t-30"></i>
                    <br>No Candidates Found</h3>
            <?php } ?>
        </div>
    </div>
</div>
<div>
    <div class="container m-b-30">

        <script>
            var acc = document.getElementsByClassName("accordion");
            var i;

            for (i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function () {
                    this.classList.toggle("active");
                    var panel = this.nextElementSibling;
                    if (panel.style.display === "block") {
                        panel.style.display = "none";
                    } else {
                        panel.style.display = "block";
                    }
                });
            }
        </script>
        <script>
            function myFunction() {
                var txt;
                if (confirm("Open Pick an app?")) {
                    OpenWith.exe;
                } else {
                    txt = "You pressed Cancel!";
                }
                document.getElementById("demo").innerHTML = txt;
            }
        </script>
    </div>
</div>
