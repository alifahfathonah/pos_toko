
<div class="page-content">
  <div class="page-bar">
    <?php echo $title_page; ?>
    <div class="row">
      <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body form">
              <form class="" action="<?php echo base_url($action_add)?>" method="post">
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                      <div class="form-group" style="margin-bottom:20px;">
                        <label for="">Nama</label>
                        <input type="hidden" name="i_id" class="form-control"
                        value="<?php echo isset($user_type_details->user_type_id) ? $user_type_details->user_type_id : ""?>">
                        <input type="text" name="i_name" class="form-control"
                        value="<?php echo isset($user_type_details->user_type_name) ? $user_type_details->user_type_name : ""?>">
                      </div>
                      <div class="portlet light bordered">
                        <div class="caption font-red-sunglo">
                            <i class="icon-home font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase">MENU</span>
                        </div>
                      </div>
                      <?php foreach ($sidebar_menu as $row) {?>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group" style="font-size: 20px;">
                              <label for=""><?php echo strtoupper($row->sidebar_name)?></label>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="input-group" style="float:right">
                              <input type="checkbox" class="" name="permit_<?php echo $row->sidebar_id?>[]"
                              <?php if (strpos($row->permit_access, 'c') !== false){echo "checked";}?> value="c">
                              <label style="text-align:left; padding-left:1em;"></label>
                              <input type="checkbox" class="" name="permit_<?php echo $row->sidebar_id?>[]"
                              <?php if (strpos($row->permit_access, 'r') !== false){echo "checked";}?> value="r">
                              <label style="text-align:left; padding-left:1em;"></label>
                              <input type="checkbox" class="" name="permit_<?php echo $row->sidebar_id?>[]"
                              <?php if (strpos($row->permit_access, 'u') !== false){echo "checked";}?> value="u">
                              <label style="text-align:left; padding-left:1em;"></label>
                              <input type="checkbox" class="" name="permit_<?php echo $row->sidebar_id?>[]"
                              <?php if (strpos($row->permit_access, 'd') !== false){echo "checked";}?> value="d">
                            </div>
                          </div>
                        </div>
                        <hr>
                      <?}; ?>
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
