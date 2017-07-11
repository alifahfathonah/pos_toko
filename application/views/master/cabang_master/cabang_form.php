<style media="screen">
  body {
    font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
    font-size: 14px;
    }
  .container {
      padding: 20px;
    }
</style>

<div class="page-content">
  <div class="page-bar">
    <?php echo $title_page ?>
  </div>
    <div class="row">
      <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body form">
              <form class="" action="<?php echo base_url($action_add)?>" method="post">
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                      <div class="form-group">
                        <label for="">Branch Name</label>
                        <input type="hidden" name="i_id" class="form-control"
                        value="<?php echo isset($cabang_details->branch_id) ? $cabang_details->branch_id : ""?>" required>
                        <input type="text" name="i_name" class="form-control"
                        value="<?php echo isset($cabang_details->branch_name) ? $cabang_details->branch_name : ""?>" required>
                      </div>
                      <div class="form-group">
                        <label for="">Branch Phone</label>
                        <input type="" id="i_phone" name="i_phone" class="form-control"
                        value="<?php echo isset($cabang_details->branch_phone) ? $cabang_details->branch_phone : ""?>" required>
                      </div>
                      <div class="form-group">
                        <label for="">Branch Adress</label>
                        <input type="" id="i_address" name="i_address" class="form-control"
                        value="<?php echo isset($cabang_details->branch_address) ? $cabang_details->branch_address : ""?>" required>
                      </div>
                      <div class="form-group">
                        <label for="">Branch Email</label>
                        <input type="email" id="i_email" name="i_email" class="form-control"
                        value="<?php echo isset($cabang_details->branch_email) ? $cabang_details->branch_email : ""?>" required>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-6">
                            <label for="">Open</label>
                          </div>
                          <div class="col-md-6">
                            <label for="">Close</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <div class="input-group bootstrap-timepicker timepicker">
                                   <input id="timepicker3" name="i_hour_1" type="text" class="form-control" value="<?php echo date("H:m", $cabang_details->branch_hour_1)?>">
                                   <span class="input-group-addon">
                                   <span class="glyphicon glyphicon-time"></span>
                                   </span>
                               </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <div class="input-group bootstrap-timepicker timepicker">
                                 <input id="timepicker4" name="i_hour_2" type="text" class="form-control" value="<?php echo date("H:m", $cabang_details->branch_hour_2) ?>">
                                 <span class="input-group-addon">
                                 <span class="glyphicon glyphicon-time"></span>
                                 </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="box-footer">
                  <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                      <button type="submit" name="button" class="btn btn-primary">Simpan</button>
                      <a href="<?php echo base_url($action_close)?>" class="btn btn-danger">Keluar</a>
                    </div>
                  </div>
                </div>
              </form>
            </div>
        </div>
      </div>
    </div>
