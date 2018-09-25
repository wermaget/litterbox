<?php
session_start();
$error = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '';
$status = (isset($_GET['status']) && $_GET['status'] != '') ? $_GET['status'] : '';
$msg = (isset($_GET['msg']) && $_GET['msg'] != '') ? $_GET['msg'] : '';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include_once '../include/headScript.php'; ?>
</head>
<body class="main-site non-index community">
<header id="topnav" class="scrolled">
    <?php include_once '../include/navVisitor.php'; ?>
</header>
<div class="page-main wrapper">
    <div class="main-content">
        <div class="container">
            <div class="row">
                <!-- Left Sidebar -->
                <div class="left-sb col-lg-2">
                    <div>
                        <strong>
                            <?php if (!isset($_SESSION['community_user_session'])): ?>
                                <a data-toggle="modal" data-target="#login-modal" href="#">Login</a>
                                <span>&nbsp;or&nbsp;</span>
                                <a data-toggle="modal" data-target="#register-modal" href="#">Register</a>
                            <?php else: ?>
                                Hello <?= $_SESSION['community_user_session'] ?>, <a href="logout/" href="#">Logout</a>
                            <?php endif; ?>
                        </strong>
                    </div>
                    <ul>
                        <li><a href="#">Category 1</a></li>
                        <li><a href="#">Category 2</a></li>
                        <li><a href="#">Category 3</a></li>
                        <li><a href="#">Category 4</a></li>
                    </ul>
                </div>
                <div class="col-lg-7">content</div>
                <!-- Right Sidebar -->
                <div class="right-sb col-lg-3">
                    <div>
                        <span>Create A Post</span>
                        <?php if($status == "no_session"):?>
                        <div class="alert alert-danger m-t-10">
                            <p><?= $msg ?></p>
                        </div>
                        <?php endif; ?>
                        <form id="" class="" method="POST" action="./post/create/" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" name="title" class="form-control" placeholder="What is your question?" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <textarea name="description" class="form-control" placeholder="Description" cols="30" rows="10" autocomplete="off"></textarea>
                            </div>
                            <div class="form-group">
                                <select name="category" class="form-control" placeholder="Select Category">
                                    <option value="" selected disabled>Select Category</option>
                                    <option value="">Supply Planning</option>
                                    <option value="">Demand Planning</option>
                                    <option value="">Logistics</option>
                                    <option value="">Test</option>
                                    <option value="">Not Working</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" name="tags" data-role="tagsinput" class="form-control" placeholder="Tags" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="action">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once '../include/footer.php';
include_once 'modals.php';
include_once '../include/footScript.php';
?>
<!-- Purechat Chatbot -->
<script type='text/javascript' data-cfasync='false'>window.purechatApi = {
        l: [], t: [], on: function () {
            this.l.push(arguments);
        }
    };
    (function () {
        var done = false;
        var script = document.createElement('script');
        script.async = true;
        script.type = 'text/javascript';
        script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript';
        document.getElementsByTagName('HEAD').item(0).appendChild(script);
        script.onreadystatechange = script.onload = function (e) {
            if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) {
                var w = new PCWidget({c: 'feec8b60-28f9-44d7-b356-8ec813cf4727', f: true});
                done = true;
            }
        };
    })();
</script>
</body>
</html>