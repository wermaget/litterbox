<!-- sample modal content -->
<div id="register-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Register</h4>
            </div>
            <div class="modal-body">
                <form id="default-wizard" action="process.php?action=addRemoteTeam" method="POST"
                      enctype="multipart/form-data">
                    <p class="m-b-0">
                        <?php //if($error): echo $error; else: echo "wow"; ?>
                    </p>
                    <form>
                        <div class="row">
                            <div class="col-lg-4">
                                <label class="block text-right" for="">Registering as</label>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label><input name="user_type" type="radio" checked> Teamire Member</label>
                                    <label><input name="user_type" type="radio"> Guest</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <label class="block text-right" for="">First Name</label>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <input type="text" name="first_name" id="first_name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <label class="block text-right" for="">Last Name</label>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <input type="text" name="last_name" id="last_name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <label class="block text-right" for="">Email</label>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <label class="block text-right" for="">Password</label>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <label class="block text-right" for="">Confirm Password</label>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <input type="password" name="confirm_password" id="confirm_password" class="form-control">
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary stepy-finish">Register</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

<!-- Login modal -->

<div id="login-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Login</h4>
            </div>
            <div class="modal-body">
                <form id="default-wizard" action="process.php?action=addRemoteTeam" method="POST"
                      enctype="multipart/form-data">
                    <p class="m-b-0">
                        <?php //if($error): echo $error; else: echo "wow"; ?>
                    </p>
                    <form>                       
                        <div class="row">
                            <div class="col-lg-4">
                                <label class="block text-right" for="">Email</label>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <label class="block text-right" for="">Password</label>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                            </div>
                        </div>

                        
                    </form>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary stepy-finish">Login</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

<!-- /Login modal -->