<?php
session_start();

include_once '../config/database.php';
include_once '../config/Models.php';
include_once '../config/site.php';

$error = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '';
$status = (isset($_GET['status']) && $_GET['status'] != '') ? $_GET['status'] : '';
$msg = (isset($_GET['msg']) && $_GET['msg'] != '') ? $_GET['msg'] : '';

$permalink = (isset($_GET['permalink']) && $_GET['permalink'] != '') ? $_GET['permalink'] : '';

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
<div id="vm-app">
    <div class="page-main wrapper">
        <div class="main-content">
            <div class="container">
                <div class="row">
                    <!-- Left Sidebar -->
                    <div class="left-sb col-lg-2">
                        <div class="block block-auth">
                            <strong>
                                <?php if (!isset($_SESSION['community_user_session'])): ?>
                                    <a data-toggle="modal" data-target="#login-modal" href="#">Login</a>
                                    <span>&nbsp;or&nbsp;</span>
                                    <a data-toggle="modal" data-target="#register-modal" href="#">Register</a>
                                <?php else: ?>
                                    Hello <?= $_SESSION['community_user_session'] ?>, <a href="logout/"
                                                                                         href="#">Logout</a>
                                <?php endif; ?>
                            </strong>
                        </div>
                        <div class="block block-categories">
                            <ul>
                                <li><a href="#">All</a></li>
                                <li><a href="#">Supply Chain</a></li>
                                <li><a href="#">Demand Planning</a></li>
                                <li><a href="#">Technical Support</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="main-column col-lg-7">
                        <?php if(!$permalink):?>
                        <div class="block block-search">
                            <div class="page-title-wrapper">
                                <h3 class="page-title"><?= 'Welcome to the Community!' ?></h3>
                            </div>
                            <div class="actions-toolbar">
                                <input type="text" class="input-search" name="search"
                                       placeholder="Search the community..">
                                <button type="submit" class="action btn-primary stepy-finish">Search</button>
                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="block block-listing">
                            <?php if (!$permalink): ?>
                                <?php include_once('post/listing/posts_partial.php') ?>
                            <?php endif; ?>
                            <?php if ($permalink): ?>
                                <?php include_once('post/index.php') ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- Right Sidebar -->
                    <div class="right-sb col-lg-3">
                        <div class="block block-post">
                            <div class="block-header">
                                <span>Create A Post</span>
                            </div>
                            <?php if ($status == "no_session"): ?>
                                <div class="alert alert-danger m-t-10">
                                    <p><?= $msg ?></p>
                                </div>
                            <?php endif; ?>
                            <div class="block-content">
                                <form id="" class="form-create-post" method="POST" action="./post/create/"
                                      enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="text" name="title" class="form-control"
                                               placeholder="What is your question?" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <textarea name="description" class="form-control" placeholder="Description"
                                                  cols="30" rows="10" autocomplete="off"></textarea>
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
                                        <input type="text" name="tags" data-role="tagsinput" class="form-control"
                                               placeholder="Tags" autocomplete="off">
                                        <span class="input-label">Separate with comma ","</span>
                                    </div>
                                    <div class="form-group">
                                        <div class="actions-toolbar">
                                            <button type="submit" class="action btn-primary stepy-finish">Submit
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="block block-answer">
                            <div class="block-header">
                                <span>Answer Questions</span>
                            </div>
                            <div class="block-content">
                                <div class="top-list">
                                    <ul class="list">
                                        <li><a href="#">Sample</a></li>
                                        <li><a href="#">Sample</a></li>
                                        <li><a href="#">Sample</a></li>
                                        <li><a href="#">Sample</a></li>
                                        <li><a href="#">Sample</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="block block-trending">
                            <div class="block-header">
                                <span>Trending Topics</span>
                            </div>
                            <div class="block-content">
                                <div class="top-list">
                                    <ul class="list">
                                        <li><a href="#">Sample</a></li>
                                        <li><a href="#">Sample</a></li>
                                        <li><a href="#">Sample</a></li>
                                        <li><a href="#">Sample</a></li>
                                        <li><a href="#">Sample</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include_once '../include/footer.php';
    include_once 'modals.php';
    ?>


    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="https://cdn.jsdelivr.net/npm/vee-validate@latest/dist/vee-validate.js"></script>
    <script>
        Vue.use(VeeValidate, {
            events: 'blur',
        })

        let VM = new Vue({
            el: "#vm-app",
            mounted() {
                console.log('mounted');
                this.getPosts();
            },

            data: {
                posts: {}
            },

            methods: {
                validateBeforeSubmit() {
                    this.$validator.validate().then(result => {
                        if (result) {
                            document.querySelector('#community-login-form').submit();
                        }
                    });
                },

                getPosts() {
                    let self = this;

                    fetch('<?= $config['base_url'] ?>' + 'community/post/listing').then(function (response) {
                        return response.json();
                    }).then(function (json) {
                        console.log(json);
                        self.posts = json
                    });
                },

                getPost(permalink) {
                    let self = this;
                    fetch('<?= $config['base_url'] ?>' + 'community?post=' + permalink).then(function (response) {
                        return response.json();
                    }).then(function (json) {
                        console.log(json);
                        self.posts = json
                    });

                }


            }
        });


    </script>

    <?php
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