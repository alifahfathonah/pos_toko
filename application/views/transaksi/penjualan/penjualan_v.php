<div class="page-content">
  <div class="row">
    <div class="col-md-12">
      <div class="portlet-body form">
        <div class="box-body">
          <div class="col-md-12">
            <div class="row">
              <div class="row">
                <div class="col-md-3">
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
                <div class="col-md-3">
                  <div class="form-group">
                    <select id="i_branch" name="i_branch" class="form-control select2"></select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <select id="i_user" name="i_user" class="form-control select2"></select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <select id="i_customer" name="i_customer" class="form-control select2"></select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <button type="button" id="buttonCustomer" name="buttonCustomer" class="btn btn-success" onclick="addCustomer()">
                      <i class="fa fa-plus"></i> Customer Baru
                    </button>
                  </div>
                </div>
              </div>
              <div class="" id="div_newCustomer">
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <select id="i_barang" name="i_barang" class="form-control select2"></select>
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
    // selectlist_global2('#i_branch', 'Penjualan/get_branch', '', branch_id);
    // selectlist_global2('#i_user', 'Penjualan/get_user', '', user_id);
    // selectlist_global2('#i_customer', 'Penjualan/get_customer');
    selectlist_global('#i_barang', 'Penjualan/get_Barang', 'Pilih Item');
  });

  function addCustomer(){
    // if () {
    //
    // }
    var html = '';

    html += '<div class="portlet light bordered">';
    html += '<div class="portlet-title">';
    html+=  '<div class="caption font-red-sunglo">';
    html+=  '<span class="caption-subject bold uppercase">Detail Customer</span>';
    html+=  '</div>';
    html+=  '</div>';
    html+=  '<div class="box-body">' +
            '<div class="row">' +
            '<div class="col-md-8 col-md-offset-2">' +
            '<div class="form-group">' +
            '<label for="">Name</label>' +
            '<input type="hidden" name="i_id" class="form-control"' +
            'value="" required>' +
            '<input type="text" name="i_name" class="form-control"' +
            'value="" required>' +
            '</div>' +
            '<div class="form-group">' +
            '<label for="">Customer Phone</label>' +
            '<input type="" id="i_phone" name="i_phone" class="form-control"' +
            'value="" required>' +
            '</div>' +
            '<div class="form-group">' +
            '<label for="">Customer Adress</label>' +
            '<input type="" id="i_address" name="i_address" class="form-control"' +
            'value="" required>' +
            '</div>' +
            '<div class="form-group">' +
            '<label for="">Customer Email</label>' +
            '<input type="email" id="i_email" name="i_email" class="form-control"' +
            'value="" required>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>';

    document.getElementById('div_newCustomer').innerHTML = html;
    $('#buttonCustomer').find('i').removeClass('fa-plus').addClass('fa-minus');
  }

</script>
