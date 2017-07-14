<div class="page-content">
  <div class="page-bar">
    <?php echo $title_page; ?>
    <div class="row">
      <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="icon-settings font-red-sunglo"></i>
                    <span class="caption-subject bold uppercase"> Default Form</span>
                </div>
                <div class="actions">
                    <div class="btn-group">
                        <a class="btn btn-sm green dropdown-toggle" href="javascript:;" data-toggle="dropdown"> Actions
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-pencil"></i> Edit </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-trash-o"></i> Delete </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-ban"></i> Ban </a>
                            </li>
                            <li class="divider"> </li>
                            <li>
                                <a href="javascript:;"> Make admin </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="portlet-body form">
              <form class="" action="<?php echo base_url($action_add)?>" method="post">
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                      <div class="form-group">
                        <label for="">Nama</label>
                        <input type="hidden" name="i_id" class="form-control"
                        value="<?php echo isset($supplier_details->supplier_id) ? $supplier_details->supplier_id : ""?>" required>
                        <input type="text" name="i_name" class="form-control"
                        value="<?php echo isset($supplier_details->supplier_name) ? $supplier_details->supplier_name : ""?>" required>
                      </div>
                      <div class="form-group">
                        <label for="">Supplier Phone</label>
                        <input type="" id="i_phone" name="i_phone" class="form-control"
                        value="<?php echo isset($supplier_details->supplier_phone) ? $supplier_details->supplier_phone : ""?>" required>
                      </div>
                      <div class="form-group">
                        <label for="">Supplier Adress</label>
                        <input type="" id="i_address" name="i_address" class="form-control"
                        value="<?php echo isset($supplier_details->supplier_address) ? $supplier_details->supplier_address : ""?>" required>
                      </div>
                      <div class="form-group">
                        <label for="">Supplier Email</label>
                        <input type="email" id="i_email" name="i_email" class="form-control"
                        value="<?php echo isset($supplier_details->supplier_email) ? $supplier_details->supplier_email : ""?>" required>
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
  </div>
