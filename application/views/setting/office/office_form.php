
<div class="page-content-col">
    <!-- BEGIN PAGE BASE CONTENT -->
      <div class="page-content">
          <div class="row">
              <div class="col-md-12">
                  <div class="portlet light bordered">
                      <!-- <div class="portlet-title tabbable-line">
                          <div class="caption caption-md">
                              <i class="icon-globe theme-font hide"></i>
                              <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                          </div>
                          <ul class="nav nav-tabs">
                              <li class="active">
                                  <a href="#tab_1_1" data-toggle="tab">Personal Info</a>
                              </li>
                              <li>
                                  <a href="#tab_1_2" data-toggle="tab">Change Avatar</a>
                              </li>
                              <li>
                                  <a href="#tab_1_3" data-toggle="tab">Change Password</a>
                              </li>
                              <li>
                                  <a href="#tab_1_4" data-toggle="tab">Privacy Settings</a>
                              </li>
                          </ul>
                      </div> -->
                      <div class="portlet-body">
                          <div class="tab-content">
                              <!-- PERSONAL INFO TAB -->
                              <div class="tab-pane active" id="tab_1_1">
                                  <form class="" action="<?php echo $action_add?>" method="post" enctype="multipart/form-data">
                                      <div class="form-group">
                                          <label class="control-label">Company Name</label>
                                          <input type="hidden" name="i_id" placeholder="" class="form-control"
                                          value="<?php echo isset($office->office_detail_id) ? $office->office_detail_id : null?>"/>
                                          <input type="text" name="i_name" placeholder="" class="form-control"
                                          value="<?php echo isset($office->office_name) ? $office->office_name : ""?>"/>
                                      </div>
                                      <div class="form-group">
                                          <label class="control-label">Mobile Number</label>
                                          <input type="text" name="i_phone" placeholder="" class="form-control"
                                          value="<?php echo isset($office->office_phone) ? $office->office_phone : ""?>"/>
                                      </div>
                                      <div class="form-group">
                                        <label for="">Branch</label>
                                        <select id="i_branch" name="i_branch" class="form-control select2"></select>
                                      </div>
                                      <div class="form-group">
                                        <label for="">E-mail</label>
                                        <input type="text" name="i_email" placeholder="" class="form-control"
                                        value="<?php echo isset($office->office_email) ? $office->office_email : ""?>"/>
                                      </div>
                                      <div class="margiv-top-10">
                                          <button type="submit" class="btn green"> Save Changes </button>
                                          <a href="<?php echo $action_close?>" class="btn default"> Cancel </a>
                                      </div>
                                  </form>
                              </div>
                              <!-- END PRIVACY SETTINGS TAB -->
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
</div>
<script type="text/javascript">
$(document).ready(function() {

  var base_url = '<?php echo base_url();?>';
  var branch_selected = '<?php echo $office->branch_id?>';
  $.ajax({
    type      : "get",
    dataType  : "json",
    url       : base_url+"Office_c/get_branch",
    success   : function(data){
      $('#i_branch').empty();
      $('#i_branch').select2('destroy');
      $('#i_branch').append('\
        <option value="0"> </option>');

      for (var i = 0; i < data.length; i++) {
        var selected = '';
        if (branch_selected==data[i].branch_id) {
          selected = 'selected';
        }
        $('#i_branch').append('\
          <option value="'+data[i].branch_id+'" '+selected+'>'+data[i].branch_name+'</option>\
        ');
      }
      $('#i_branch').select2();
    },
    error     : function(data){
      alert('error');
    }
  })
});
</script>
