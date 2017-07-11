<div class="page-content">
  <div class="page-bar">
  		<?php echo $title_page;?>
    <div class="row">
      <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body form">
              <form class="" action="<?php echo base_url($action_add)?>" method="post">
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-2 col-md-offset-2">
                      <div class="form-group">
                        <label for="">Gambar Item</label>
                        <br>
                        <?php $img = isset($item_details->item_img) ? $item_details->item_img : "img_not_found.png";?>
                        <img src="<?php echo base_url('assets/img/items/'.$img)?>" alt="" id="img_preview">
                        <input type="file" name="i_img" class="btn btn-default" value="" onchange="readURL(this);">
                      </div>
                    </div>
                    <div class="col-md-8 col-md-offset-2">
                      <div class="form-group">
                        <label for="">Nama</label>
                        <input type="hidden" name="i_id" class="form-control" value="<?php echo isset($user_details->user_id) ? $user_details->user_id : ""?>">
                        <input type="text" name="i_name" class="form-control" value="<?php echo isset($user_details->user_name) ? $user_details->user_name : ""?>">
                      </div>
                      <div class="form-group">
                        <label for="">Kategori</label>
                        <select class="form-control js-example-basic-single" id="i_user_type" name="i_user_type">
                          <option value="0"></option>
                          <?php
                          foreach ($user_type->result() as $r_user_tipe){?>
                            <option value="<?php echo $r_user_tipe->user_type_id?>"
                              <?php if ($r_user_tipe->user_type_id == $user_details->user_type){echo "selected";} ?>>
                              <?php echo  $r_user_tipe->user_type_name?>
                            </option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="">Branch</label>
                        <select id="i_branch" name="i_branch" class="form-control select2"></select>
                      </div>
                      <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="i_password" class="form-control" value="">
                      </div>
                      <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" name="i_password_confirm" class="form-control" value="">
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
<script type="text/javascript">

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img_preview').empty();
            $('#img_preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$(document).ready(function() {

  var base_url = '<?php echo base_url();?>';
  var branch_selected = '<?php echo $user_details->branch;?>';
  $.ajax({
    type      : "get",
    dataType  : "json",
    url       : base_url+"User_c/get_branch",
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
