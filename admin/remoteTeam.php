<?php
$error = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '';
$message = (isset($_GET['message']) && $_GET['message'] != '') ? $_GET['message'] : '';
$s = (isset($_GET['s']) && $_GET['s'] != '') ? $_GET['s'] : '';

$remoteTeamList = remote_team()->list("isDeleted='0'");

function formatDate($val)
{
    $date = date_create($val);
    return date_format($date, "F d, Y g:i A");
}

?>
<div class="row">
    <div class="col-sm-12">
        <br>
        <div class="pull-right">
            <button type="button" class="btn btn-primary waves-effect waves-light btn-sm" data-toggle="modal"
                    data-target="#myModal"><i class="fa fa-plus"></i> Add New
            </button>

        </div>
        <br>
        <br>
        <?php if ($message) { ?>
            <div class="alert alert-success alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?= $message; ?>
            </div>
        <?php } ?>
        <div class="card-box table-responsive">
            <h4 class="page-title">Remote Team</h4><br>
            <table id="remote-table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Posted Date</th>
                    <?php if ($_SESSION['role'] == 'admin'): ?>
                        <th></th>
                        <th></th>
                    <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($remoteTeamList as $row) {
                    if ($row->isDeleted == 0) {
                        $id = $row->Id;
                        ?>
                        <tr>
                            <td><?= $row->title; ?></td>
                            <td style="word-break:break-all;"><?= $row->content; ?></td>
                            <td><?= formatDate($row->createDate); ?></td>
                            <?php if ($_SESSION['role'] == 'admin'): ?>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#update-account-modal-<?= $row->Id ?>"
                                       class="btn btn-info btn-xs" title="Click To View" data-trigger="hover"
                                       data-toggle="tooltip"><span class="fa fa-pencil"></span> Edit</a>
                                </td>
                                <td>
                                    <a id="<?php echo $row->Id; ?>"
                                       class="btn btn-danger btn-xs tooltips btn-cms-remote-delete"
                                       title="Click To Edit"><span
                                                class="fa fa-close"></span>Remove</a>
                                </td>
                            <?php endif; ?>
                        </tr>
                        <?php
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>


<!-- sample modal content -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Add New Remote Team</h4>
            </div>
            <div class="modal-body">
                <form id="default-wizard" action="process.php?action=addRemoteTeam" method="POST"
                      enctype="multipart/form-data">
                    <p class="m-b-0">
                        <?= $error ?>
                    </p>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Header Image</label>
                                <input type="file" class="form-control" name="header_image"
                                       value="<?= $row->headerImage; ?>" accept=".png, .jpg, .jpeg">
                                <span class="help-block"><small>Supported File: .png, .jpg, .jpeg</small></span>
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" placeholder="" autocomplete="off"
                                       required>
                            </div>

                            <div class="form-group">
                                <label>Content</label>
                                <textarea id="message" class="form-control ckeditor" name="content"
                                          data-parsley-trigger="keyup" data-parsley-minlength="20"
                                          data-parsley-minlength-message="Come on! You need to enter at least a 20 character comment.."
                                          data-parsley-validation-threshold="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary stepy-finish">Add Remote Team</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>

<?php foreach ($remoteTeamList as $row) { ?>
    <div id="update-account-modal-<?= $row->Id; ?>" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel">Update Remote Team</h4>
                </div>
                <div class="modal-body">
                    <form id="default-wizard" action="process.php?action=updateRemoteTeam" method="POST"
                          enctype="multipart/form-data">
                        <p class="m-b-0">
                            <?= $error ?>
                        </p>
                        <input type="hidden" name="Id" value="<?= $row->Id; ?>">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Header Image</label>
                                    <?php if ($row->headerImage) { ?>
                                        <div class="header-img-preview">
                                            <div class="header-img-wrapper">
                                                <img src="../media/<?= $row->headerImage; ?>" alt="" title=""/>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <input type="file" class="form-control" name="header_image"
                                           value="<?= $row->headerImage; ?>" accept=".png, .jpg, .jpeg">
                                    <span class="help-block"><small>Supported File: .png, .jpg, .jpeg</small></span>
                                </div>
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title" value="<?= $row->title; ?>">
                                </div>

                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea class="form-control ckeditor" name="content"
                                              data-parsley-trigger="keyup" data-parsley-minlength="20"
                                              data-parsley-minlength-message="Come on! You need to enter at least a 20 character comment.."
                                              data-parsley-validation-threshold="10"><?= $row->content; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect btn-sm" data-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary stepy-finish btn-sm">Save
                            </button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<?php } ?>
<script type="text/javascript">
    $(document).ready(function () {
        $(".btn-cms-remote-delete").on("click", function (e) {
            var id = $(this).attr('id');

            if (confirm("Are you sure you want to delete this?")) {
                window.location = "process.php?action=removeRemoteTeam&Id=" + id;
            }
            else {
                return false;
            }
        });
    });
</script>
