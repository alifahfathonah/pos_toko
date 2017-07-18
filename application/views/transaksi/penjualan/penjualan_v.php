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
                    <label for="">Pilih Tanggal</label>
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
                    <label for="">Pilih Cabang</label>
                    <select id="i_branch" name="i_branch" class="form-control select2"></select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Pilih User</label>
                      <select id="i_user" name="i_user" class="form-control select2"></select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Pilih Customer</label>
                    <select id="i_customer" name="i_customer" class="form-control select2"></select>
                  </div>
                </div>
                <div class="col-md-3" style="top:24px;">
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
                    <label for="">Pilih Item Nama</label>
                    <select id="i_barang" name="i_barang" class="form-control select2" aria-required="true"
                    aria-describedby="select-error"></select>
                  </div>
                </div>
                <!-- <div class="col-md-2" style="top:24px;">
                  <div class="form-group">
                    <button type="button" id="buttonItem" name="buttonItem" class="btn btn-primary" onclick="takeItem()">
                      <i class="fa fa-plus"></i> Pilih Item
                    </button>
                  </div>
                </div> -->
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Pilih Item Code</label>
                    <select id="i_barangcode" name="i_barangcode" class="form-control select2" aria-required="true"
                    aria-describedby="select-error"></select>
                  </div>
                </div>
                <div class="col-md-2" style="top:24px;">
                  <div class="form-group">
                    <button type="button" id="buttonItemcode" name="buttonItemcode" class="btn btn-primary" onclick="takeItem()">
                      <i class="fa fa-plus"></i> Pilih Item
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="">

            </div>
            <table class="table table-striped table-bordered table-hover dt-responsive" width="100%">
              <thead>
                <tr>
                  <th style="text-align:center;width:5%;">No.</th>
                  <th style="text-align:center;">Item Name</th>
                  <th style="text-align:center;">Qty</th>
                  <th style="text-align:center;">Satuan</th>
                  <th style="text-align:center;">Qty Satuan Utama</th>
                  <th style="text-align:center;">Satuan Utama</th>
                </tr>
              </thead>
              <tbody id="tablekonversi">
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="6">
                    <button type="button" id="button_konversi" name="button_konversi"
                    class="btn btn-danger" onclick="addkonversi()">Reset</button>
                  </td>
                </tr>
              </tfoot>
            </table>
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
    selectlist_global2('#i_customer', 'Penjualan/get_customer');
    selectlist_global2('#i_barang', 'Penjualan/get_Barang', 'Pilih Item ...');
    // selectlist_global2('#i_barangcode', 'Penjualan/get_Barang', 'Pilih Item ...');
  });

  function addCustomer(){
    var html = '';
    var html_ = '';

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

    if($('#buttonCustomer').find('i').hasClass('fa-plus')){

      document.getElementById('div_newCustomer').innerHTML = html;
      $('#buttonCustomer').find('i').removeClass('fa-plus').addClass('fa-minus');

    } else {

      document.getElementById('div_newCustomer').innerHTML = html_;
      $('#buttonCustomer').find('i').removeClass('fa-minus').addClass('fa-plus');

    }

  }

  function takeItem(){
    var i_barang = document.getElementById('i_barang').value;
    var i_branch = document.getElementById('i_branch').value;

    var paramArr = [];
    paramArr.push( {name:'i_barang', value:i_barang}, {name:'i_branch', value:i_branch} );
    postData2(paramArr, 'Penjualan/get_ItemDetails', 'addItemtolist');
  }

  function addItemtolist(data){
    var html;
    html += '<tr>';
    html += '<td>';
    html += '</td>';
    html += '<td>'+data.data.item_name;
    html += '</td>';
    html += '<td>';
    html += '</td>';
    html += '<td>';
    html += '</td>';
    html += '<td>';
    html += '</td>';
    html += '<td>';
    html += '</td>';
    html += '</tr>';

    $('#tablekonversi').html(html);
  }

</script>
