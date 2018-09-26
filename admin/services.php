<?php
$error = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '';
$message = (isset($_GET['message']) && $_GET['message'] != '') ? $_GET['message'] : '';
$s = (isset($_GET['s']) && $_GET['s'] != '') ? $_GET['s'] : '';
$jobFunc = job_function()->list("code!='0' and isDeleted='0'");
?>

  <div class="row">
    <div class="col-sm-12">
    <br>
        <?php if($message){?>
        <div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert"
                    aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <?=$message;?>
        </div>
      <?php }?>
      <div class="card-box table-responsive">
          <button type="button" class="btn btn-prinmary" data-toggle="modal" data-target="#add-services-modal">Add New Service</button>
          <h4 class="page-title">Services</h4><br>
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Title</th>
              <th>Header</th>
              <th>Description</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
           <?php foreach($jobFunc as $row) {
            if ($row->isDeleted==0){
              ?>
              <tr>
                <td><?=$row->title;?></td>
                <td><?=$row->header;?></td>
                <td><?= html_entity_decode($row->description);?></td>
                <td>
                  <a href="#" data-toggle="modal" data-target="#update-services-modal-<?=$row->Id;?>" class=" btn btn-info btn-xs" title="Click To View"  data-trigger="hover" data-toggle="tooltip"><span class="fa fa-pencil"></span> Edit</a>
                </td>
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
<?php foreach($jobFunc as $row) { ?>
<div id="update-services-modal-<?=$row->Id;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Update Services</h4>
      </div>
      <div class="modal-body">
        <form id="default-wizard" action="process_test.php?action=updateServices" method="POST">
          <p class="m-b-0">
            <?=$error?>
          </p>
          <div class="row m-t-20">
            <input type="hidden" name="Id" value="<?=$row->Id;?>">
            <div class="col-sm-12">
              <div class="form-group">
                <label>Services</label>

                <input type="text" class="form-control" name="option" placeholder="" value="<?=$row->option;?>">
              </div>

              <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title" placeholder="" value="<?=$row->title;?>">
              </div>

              <div class="form-group">
                <label>Header</label>
                <textarea class="form-control" name="header"
                                    data-parsley-trigger="keyup" data-parsley-minlength="20"
                                    data-parsley-minlength-message="Come on! You need to enter at least a 20 character comment.."
                                    data-parsley-validation-threshold="10"><?=$row->header;?></textarea>
              </div>

              <div class="form-group">
                  <label>Description</label>
                  <textarea  class="form-control ckeditor" name="description"
                                      data-parsley-trigger="keyup" data-parsley-minlength="20"
                                      data-parsley-minlength-message="Come on! You need to enter at least a 20 character comment.."
                                      data-parsley-validation-threshold="10"><?= html_entity_decode($row->description)?></textarea>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary stepy-finish">Update</button>
          </div>
        </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
</div>
<?php } ?>


<!-- // Add new modal -->
<div id="add-services-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Add Service</h4>
      </div>
      <div class="modal-body">
        <form id="default-wizard" action="process_test.php?action=addServices" method="POST">
          <p class="m-b-0">
            <?= $error ?>
          </p>
          <div class="row m-t-20">
            <div class="col-sm-12">
              <div class="form-group">
                <label>Services</label>

                <input type="text" class="form-control" name="option" placeholder="">
              </div>

              <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title" placeholder="">
              </div>

              <div class="form-group">
                <label>Header</label>
                <textarea class="form-control" name="header"
                    data-parsley-trigger="keyup" data-parsley-minlength="20"
                    data-parsley-minlength-message="Come on! You need to enter at least a 20 character comment.."
                    data-parsley-validation-threshold="10"></textarea>
              </div>    

              <div class="form-group">
                  <label>Description</label>
                  <textarea  class="form-control ckeditor" name="description"
                                      data-parsley-trigger="keyup" data-parsley-minlength="20"
                                      data-parsley-minlength-message="Come on! You need to enter at least a 20 character comment.."
                                      data-parsley-validation-threshold="10"></textarea>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary stepy-finish">Add</button>
          </div>
        </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
</div>

<!-- // /Add new modal -->