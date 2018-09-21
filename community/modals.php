<!-- sample modal content -->
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
                                <label class="block text-right" for="">Registering as</label>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label><input name="" type="radio" checked> Teamire Member</label>
                                    <label><input name="" type="radio"> Guest</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <label class="block text-right" for="">First Name</label>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <input type="text" name="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <label class="block text-right" for="">Last Name</label>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <input type="text" name="" class="form-control">
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
