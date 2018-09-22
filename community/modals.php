<!-- sample modal content -->
<div id="register-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Register</h4>
            </div>
            <div class="modal-body">
                <form id="default-wizard" action="process.php?action=addRemoteTeam" method="POST"
                      enctype="multipart/form-data">
                    <?php if($error):?>
                    <div class="alert alert-danger">
                        <strong>ERROR: </strong>&nbsp;<span><?= $error ?></span>
                    </div>
                    <?php endif; ?>
                    <form>
                        <div class="row">
                            <div class="col-lg-4">
                                <label class="block text-right" for="">Registering as</label>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <input name="user_type" type="radio" checked>&nbsp;<span>Teamire Member</span>
                                    <input name="user_type" type="radio">&nbsp;<span>Guest</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <label class="block text-right" for="">Specialization</label>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <select class="form-control">
                                        <option value="">Select Specialization</option>
                                        <option value="">Hi</option>
                                        <option value="">Hello</option>
                                        <option value="">Not Working</option>
                                        <option value="">Yet</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <label class="block text-right" for="">First Name</label>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <input type="text" name="first_name" id="first_name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <label class="block text-right" for="">Last Name</label>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <input type="text" name="last_name" id="last_name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <label class="block text-right" for="">Email</label>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <label class="block text-right" for="">Password</label>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <label class="block text-right" for="">Confirm Password</label>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <input type="password" name="confirm_password" id="confirm_password"
                                           class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-offset-4 col-lg-4">
                                <button type="submit" class="btn btn-primary stepy-finish">Register</button>
                            </div>
                        </div>
                    </form>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>

<!-- Login modal -->

<div id="login-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Login</h4>
            </div>
            <div class="modal-body">
                <form id="default-wizard" action="process.php?action=addRemoteTeam" method="POST"
                      enctype="multipart/form-data">
                    <?php if ($error): ?>
                    <div class="alert alert-danger">
                        <strong>ERROR: </strong>&nbsp;<span><?= $error ?></span>
                    </div>
                    <?php endif; ?>
                    <form>
                        <div class="row">
                            <div class="col-lg-4">
                                <label class="block text-right" for="">Email</label>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <label class="block text-right" for="">Password</label>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-offset-4 col-lg-8">
                                <span>Not a member yet? Click </span><a href="" data-toggle="modal" data-dismiss="modal" data-target="#register-modal">here</a><span> to register</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-offset-4 col-lg-8">
                                <button type="submit" class="btn btn-primary stepy-finish">Login</button>
                            </div>
                        </div>
                    </form>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- /Login modal -->
</div>
