<div class="page-content">
  <div class="row">
    <div class="col-md-12">
      <div class="portlet-body form">
        <div class="box-body">
          <div class="col-md-12">
            <div class="row">
              <div class="container">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-3" style="height:130px;">
                      <div class="form-group">
                        <div class='input-group date' id='i_tanggal'>
                          <input type='text' class="form-control" />
                          <span class="input-group-addon">
                            <span class="fa fa-calendar">
                            </span>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3" style="height:130px;">
                      <div class="form-group">
                        <select id="i_branch" name="i_branch" class="form-control select2"></select>
                      </div>
                    </div>
                    <div class="col-md-3" style="height:130px;">
                      <div class="form-group">
                          <select id="i_user" name="i_user" class="form-control select2"></select>
                      </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">

  $(document).ready(function(){

    var paramArr = [];
    var user_id = '<?php echo $user_id->user_id; ?>';
    var branch_id = '<?php echo $branch_id; ?>';
    selectlist_global2('#i_branch', 'Penjualan/get_branch', '', branch_id);
    selectlist_global2('#i_user', 'Penjualan/get_user', '', user_id);

  });

</script>
