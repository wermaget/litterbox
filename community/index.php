<?php
$error = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '';
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
                <div class="left-sb col-lg-2">
                    <div>
                        <strong>
                            <a data-toggle="modal" data-target="#login-modal" href="#">Login</a>
                            <span>&nbsp;or&nbsp;</span>
                            <a data-toggle="modal" data-target="#register-modal" href="#">Register</a>
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
                <div class="right-sb col-lg-3">right sidebar</div>
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